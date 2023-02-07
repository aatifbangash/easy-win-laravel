@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mt-1">
        <div class="col-md-2">
            @include('includes.subnav')
        </div>
        <div class="col-md-10">
            <div class="card auth-section">
                <div class="card-header">MY PAYMENTS</div>
                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Account Name</th>
                          <th scope="col">Account Email</th>
                          <th scope="col">Country</th>
                          <th scope="col">Game ID</th>
                          <th scope="col">Game Title</th>
                          <th scope="col">Win Number</th>
                          <th scope="col">Paid Amount</th>
                          <th scope="col">Payment Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($payments as $payment)
                            <tr>
                              <th scope="row">{{$payment->payer_name}}</th>
                              <td>{{$payment->payer_email}}</td>
                              <td>{{$payment->payer_country}}</td>
                              <td>{{$payment->game_id}}</td>
                              <td>{{$payment->game->title}}</td>
                              <td>{{$payment->number}}</td>
                              <td>${{$payment->payment_gross}}</td>
                              <td>{{$payment->created_at}}</td>
                            </tr>
                        @empty
                            <tr>
                              <td colspan="8">No payment found.</td>
                            </tr>
                        @endforelse
                      </tbody>
                    </table>
                    {{$payments->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
