<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

use App\WinnersPictures as Pictures;
use Illuminate\Http\Request;

class WinnersPicturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;

        $pictures = Pictures::latest()->paginate($perPage);
        
        return view('admin.picture.index', compact('pictures'));
    }

    public function winners(Request $request) {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $game = Pictures::where('is_completed', '>', "0")->where(function ($q) {
                global $keyword;
                $q->Where('price', 'LIKE', "%$keyword%")
                ->orWhere('price_image', 'LIKE', "%$keyword%")
                ->orWhere('ads_image', 'LIKE', "%$keyword%")
                ->orWhere('total_joined', 'LIKE', "%$keyword%")
                ->orWhere('winner_id', 'LIKE', "%$keyword%");
            })
                
                ->latest()->paginate($perPage);
        } else {
            $game = Pictures::where('is_completed', '>', "0")->latest()->paginate($perPage);
        }
        
        return view('admin.picture.winners', compact('game'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.picture.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'winner_picture' => 'required|image'
		]);
        $requestData = $request->all();
        if($request->hasFile('winner_picture')){
            // Upload Image
            $priceImgToStore = $request->file('winner_picture')->store('game_images', 'public_uploads');
        } else {
            $priceImgToStore = 'noimg.jpg';
        }

        $requestData['winner_picture'] = $priceImgToStore;

        Pictures::create($requestData);

        return redirect('winnerspictures')->with('flash_message', 'Picture uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $picture = Pictures::findOrFail($id);

        return view('admin.picture.show', compact('picture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    // public function edit($id)
    // {
    //     $game = Pictures::findOrFail($id);

    //     return view('admin.picture.edit', compact('game'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
  //   public function update(Request $request, $id)
  //   {
  //       $this->validate($request, [
  //           'title' => 'required',
		// 	'price' => 'required',
  //           'price_image' => 'image',
  //           'ads_image' => 'image'
		// ]);
  //       $requestData = $request->all();
        
  //       $game = Pictures::findOrFail($id);

  //       if($request->hasFile('price_image')){
  //           $priceImgToStore = $request->file('price_image')->store('game_images', 'public_uploads');
  //           $priceImgPath = public_path().'/uploads/'.$game->price_image;
  //           File::delete($priceImgPath);
  //       } else {
  //           $priceImgToStore = $game->price_image;
  //       }

  //       if($request->hasFile('ads_image')){
  //           $adsImgToStore = $request->file('ads_image')->store('game_images', 'public_uploads');
  //           $adsImgPath = public_path().'/uploads/'.$game->ads_image;
  //           File::delete($adsImgPath);
  //       } else {
  //           $adsImgToStore = $game->ads_image;
  //       }

  //       $requestData['price_image'] = $priceImgToStore;
  //       $requestData['ads_image'] = $adsImgToStore;

  //       $game->update($requestData);

  //       return redirect('game')->with('flash_message', 'Game updated!');
  //   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $picture = Pictures::findOrFail($id);
        File::delete(public_path().'/uploads/'.$picture->winner_picture);
        Pictures::destroy($id);

        return redirect('winnerspictures')->with('flash_message', 'Picture deleted!');
    }
}
