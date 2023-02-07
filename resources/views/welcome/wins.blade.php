@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mt-1">
        <div class="col-md-2">
            @include('includes.subnav')
        </div>
        <div class="col-md-10">
            <div class="card auth-section">
                <div class="card-header">GAME WINS</div>
                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Game ID</th>
                          <th scope="col">Game Title</th>
                          <th scope="col">Win Number</th>
                          <th scope="col">Win Amount</th>
                          <th scope="col">Win Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($wins as $win)
                            <tr>
                              <th scope="row">{{$win->id}}</th>
                              <td>{{$win->title}}</td>
                              <td>{{$win->winner_number}}</td>
                              <td>${{$win->price}}</td>
                              <td>{{$win->created_at}}</td>
                            </tr>
                        @empty
                            <tr>
                              <td colspan="5">No wins found.</td>
                            </tr>
                        @endforelse
                      </tbody>
                    </table>
                    {{$wins->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
