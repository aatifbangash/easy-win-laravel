<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Game;
use App\Number;
use App\User;
use App\Payment;
use App\WinnersPictures as Picture;

class WelcomeController extends Controller
{

    public $paypalEnv       = 'production'; // 'sandbox' Or 'production'
    public $paypalURL       = 'https://api.paypal.com/v1/'; // 'https://api.sandbox.paypal.com/v1/';
    public $paypalClientID  = 'XXXXXXXX-t-KfMyTiAAXixHbR_qP'; // sendbox = 'AYlWdjkATDp5DYe2cQotUmGRRqg-dOslH-WF0XOaZDcg7hOiBcm6hVe0Ci4_xkBXUfS7ttL7BFjEXbO0';
    private $paypalSecret   = 'XXXXXXX-NeRqQmm3_d3P1'; // sendbox = 'EEN5ftCXxOgZr7pZgWJhxNNBDZPSYWWxsIT0ERqNR2R7fhjge48wX7jZGfzAzZsLpGV5Ej2a_FRKNHBj';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['show', 'expire_num', 'user_account', 'user_numbers', 'user_wins']]);
        parent::__construct();
    }

    //
    public function index()
    {
        $games = Game::orderBy('id', 'DESC')->get();
        return view('welcome.index', ['games' => $games]);
    }

    public function show($id)
    {

        //if isset winnerId, counter_time and isComleted is zero 
        $game = Game::findOrFail($id);

        $allSoldNumbersArray = [];
        $allSoldNumbers = $game->numbers->where('status', 'sold');
        if (count($allSoldNumbers) > 0) {
            foreach ($allSoldNumbers as $k => $num) {
                array_push($allSoldNumbersArray, $num->number);
            }
        }

        $winnerData = '';

        if (!empty($game->is_completed)) {
            // $winnerData = Number::where([['game_id', $id], ['user_id', $game->winner_id], ['status', 'sold']])->first();
            $winnerData = $game->winner_number;
        } elseif (!empty($game->winner_id) && !empty($game->counter_time)) {
            // $winnerData = Number::where([['game_id', $id], ['user_id', $game->winner_id], ['status', 'sold']])->first();
            $winnerData = $game->winner_number;
        }

        return view('welcome.show', compact('game', 'allSoldNumbersArray', 'winnerData'));
    }

    // public function about()
    // {
    //     return view('pages.about');
    // }

    public function winner()
    {
        $pictures = Picture::orderBy('id', 'DESC')->get();
        return view('pages.winner', compact('pictures'));
    }

    // public function credits()
    // {
    //     return view('pages.credits');
    // }

    // public function contact()
    // {
    //     return view('pages.contact');
    // }

    public function expire_num()
    {
        $gameId = request()->get('gameId');
        $numberClicked = request()->get('num');
        $numberObject = Number::where('game_id', $gameId)->where('number', $numberClicked)->where('user_id', auth()->user()->id)->first();
        $numberObject->delete();
        return response()->json(['data' => 'OK'], 200);
    }

    public function validate_num()
    {

        $data = [];
        if (!Auth::check()) {
            $data = [
                'type' => 'NOT_LOGGED_IN',
                'status' => '400'
            ];
        } else {

            $userId = auth()->user()->id;
            $gameId = request()->query('gameId');
            $numberClicked = request()->query('num');

            $isAlreadySoldGameNumberSql = "SELECT * FROM numbers
                                            WHERE game_id=?
                                            AND user_id=?
                                            AND status = 'sold'
                                            LIMIT 3";
            $isAlreadySoldGameNumber = DB::select($isAlreadySoldGameNumberSql, [$gameId, $userId]);

            if (count($isAlreadySoldGameNumber) == 3) {
                $data = [
                    'type' => 'ALREADY_BOUGHT_BY_YOU',
                    'status' => '400'
                ];
            } else {
                $this->expireLockedNumbers($gameId, $numberClicked);

                $number = Number::where('game_id', $gameId)->where('number', $numberClicked)->first();

                if (!empty($number->status) && $number->status == 'sold') { //if sold
                    $data = [
                        'type' => 'ALREADY_BOUGHT_BY_OTHER',
                        'status' => '400'
                    ];
                } elseif (!empty($number->status) && $number->status == 'lock') { //if lock and unexpired
                    $data = [
                        'type' => 'NUMBER_LOCK',
                        'status' => '400'
                    ];
                } else { //insert with status lock
                    $newNumber = new Number;

                    $newNumber->user_id = $userId;
                    $newNumber->game_id = $gameId;
                    $newNumber->number = $numberClicked;
                    $newNumber->status = 'lock';

                    $isSaved = $newNumber->save();
                    if ($isSaved) {
                        $data = [
                            'type' => 'DONE',
                            'status' => '200'
                        ];
                    } else {
                        $data = [
                            'type' => 'QUERY_ERROR',
                            'status' => '400'
                        ];
                    }
                }
            }
        }

        return response()->json(['data' => $data], 200);
    }

    public function expireLockedNumbers($gameId, $numberClicked)
    {
        if (empty($gameId) || empty($numberClicked)) {
            die('invalid call');
        }

        //expire lock number after 2 mins
        $expireSql = "DELETE FROM numbers
                        WHERE game_id = '" . $gameId . "' 
                        
                        AND status <> 'sold'
                        AND TIMESTAMPDIFF(minute, created_at, '" . date('Y-m-d H:i:s') . "') > 5";
        //AND number = '" . $numberClicked . "'
        DB::statement($expireSql);
    }

    public function page_paypal()
    {
        return 'paypal page';
    }

    public function process()
    {
        if (
            !empty(request()->query('paymentID'))
            && !empty(request()->query('token'))
            && !empty(request()->query('payerID'))
            && !empty(request()->query('uid'))
            && !empty(request()->query('gid'))
            && !empty(auth()->user()->id)
        ) {

            // Get payment info from URL
            $paymentID = request()->query('paymentID');
            $token = request()->query('token');
            $payerID = request()->query('payerID');
            $gameID = request()->query('gid');
            $userID = auth()->user()->id;

            // Validate transaction via PayPal API
            $paymentCheck = $this->authorizePaypal($paymentID);
            if ($paymentCheck && $paymentCheck->state == 'approved') {

                //always return latest clicked number row
                $userNumber = Number::where('game_id', $gameID)->where('user_id', $userID)->where('status', 'lock')->orderBy('id', 'desc')->first();
                if (empty($userNumber)) {
                    return abort(404);
                }
                // dd($userNumber);
                // // Get the transaction data
                $id = $paymentCheck->id;
                $state = $paymentCheck->state;
                $payerFirstName = $paymentCheck->payer->payer_info->first_name;
                $payerLastName = $paymentCheck->payer->payer_info->last_name;
                $payerName = $payerFirstName . ' ' . $payerLastName;
                $payerEmail = $paymentCheck->payer->payer_info->email;
                $payerID = $paymentCheck->payer->payer_info->payer_id;
                $payerCountryCode = $paymentCheck->payer->payer_info->country_code;
                $paidAmount = $paymentCheck->transactions[0]->amount->details->subtotal;
                $currency = $paymentCheck->transactions[0]->amount->currency;
                $todayDate = date('Y-m-d H:i:s');
                $paymentInsertSql = "INSERT INTO payments
                                        SET `user_id` = '{$userID}',
                                            `game_id` = '{$gameID}',
                                            `number` = '{$userNumber->number}',
                                            `txn_id` = '{$id}',
                                            `payment_gross` = '{$paidAmount}',
                                            `currency_code` = '{$currency}',
                                            `payer_id` = '{$payerID}',
                                            `payer_name` = '{$payerName}',
                                            `payer_email` = '{$payerEmail}',
                                            `payer_country` = '{$payerCountryCode}',
                                            `payment_status` = '{$state}',
                                            `created_at` = '{$todayDate}',
                                            `updated_at` = '{$todayDate}' ";

                $isInserted = DB::insert($paymentInsertSql);
                if ($isInserted) {
                    $userNumber->status = 'sold';
                    $userNumber->save();

                    //update total joined in game table
                    $game = Game::findOrFail($gameID);
                    $game->total_joined = ((int) $game->total_joined) + 1;

                    if ($game->total_joined >= 3) { //when total joined reached to 300
                        $counter_time = date('Y-m-d H:i:s', strtotime("+5 min")); /// add 5 minutes to current datetime
                        $game->counter_time = $counter_time; // coutner time is 5 minutes

                        $randomWinner = Number::where([['game_id', $gameID], ['status', 'sold']])->inRandomOrder()->first();
                        $game->winner_id = $randomWinner->user_id;
                        $game->winner_number = $randomWinner->number;

                        $game->save();
                        return redirect('/play/' . $gameID); //redirect to game details page and start countdown.
                    }

                    $game->save();

                    return redirect('/paypal/thanks');
                }
            }
        } else {
            // Redirect to 404 page
            return abort(404);
        }
    }

    public function authorizePaypal($paymentID)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->paypalURL . 'oauth2/token');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $this->paypalClientID . ":" . $this->paypalSecret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $response = curl_exec($ch);
        curl_close($ch);

        if (empty($response)) {
            return false;
        } else {
            $jsonData = json_decode($response);
            $curl = curl_init($this->paypalURL . 'payments/payment/' . $paymentID);
            curl_setopt($curl, CURLOPT_POST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $jsonData->access_token,
                'Accept: application/json',
                'Content-Type: application/xml'
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            // Transaction data
            return json_decode($response);
        }
    }

    public function thanks()
    {
        return view('pages.thanks');
    }

    public function mark_completed()
    {
        $gameId = request()->get('gameId');
        $game = Game::findOrFail($gameId);
        if (!empty($game->winner_id) && !empty($game->counter_time) && $game->total_joined >= 3) {
            $game->is_completed = 1;
            $game->save();
        }

        return response()->json(['data' => 'OK'], 200);
    }

    public function user_account() {
        $user = Auth::user();
        return view('welcome.account', compact('user'));
    }

    public function update_account() {
        $userId = Auth()->user()->id;
        $user = User::findOrFail($userId);

        $newName = request()->get('name');
        $userAddress = request()->get('address');

        if(!empty($newName)) {
            $user->name = $newName;        
        }

        if(!empty($userAddress)) {
            $user->address = $userAddress;        
        }

        if(request()->hasFile('picture')){
            $user->picture = request()->file('picture')->store('game_images', 'public_uploads');
        }

        $user->save();
        return redirect()->back()->with('success', 'Account updated.'); 
    }

    public function user_numbers() {
        $userId = auth()->user()->id;
        $numbers = Number::where([['user_id', $userId], ['status', 'sold']])->orderBy('id', 'DESC')->paginate(20);
        return view('welcome.numbers', compact('numbers'));
    }

    public function user_wins() {
        $userId = auth()->user()->id;
        $wins = Game::where([['winner_id', $userId], ['is_completed', '1']])->orderBy('id', 'DESC')->paginate(20);
        return view('welcome.wins', compact('wins'));
    }

    public function user_payments() {
        $userId = auth()->user()->id;
        $payments = Payment::where([['user_id', $userId]])->orderBy('id', 'DESC')->paginate(20);
        return view('welcome.payments', compact('payments'));
    }

    public function static_page($slug) {
        $page = \App\Page::where('slug', $slug)->first();
        return view('pages.page', compact('page'));
    }
}
