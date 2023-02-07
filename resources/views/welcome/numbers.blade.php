@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mt-1">
        <div class="col-md-2">
            @include('includes.subnav')
        </div>
        <div class="col-md-10">
            <div class="card auth-section">
                <div class="card-header">MY NUMBERS</div>
                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Game ID</th>
                          <th scope="col">Game</th>
                          <th scope="col">Number</th>
                          <th scope="col">Status</th>
                          <th scope="col">Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($numbers as $number)
                            <tr>
                              <th scope="row">{{$number->game->id}}</th>
                              <td>{{$number->game->title}}</td>
                              <td>{{$number->number}}</td>
                              <td>{{$number->status}}</td>
                              <td>{{$number->created_at}}</td>
                            </tr>
                        @empty
                            <tr>
                              <td colspan="5">No number found.</td>
                            </tr>
                        @endforelse
                      </tbody>
                    </table>
                    {{$numbers->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
