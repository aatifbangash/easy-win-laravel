@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Game {{ $game->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/game') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/game/' . $game->id . '/edit') }}" title="Edit Game"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['game', $game->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Game',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $game->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $game->title }}</td>
                                    </tr>
                                    <tr><th> Price </th>
                                        <td> ${{ $game->price }} </td>
                                    </tr>
                                    <tr>
                                        <th> Price Image </th>
                                        <td> <img style="width: 100px;" src="{{ asset('uploads/' . $game->price_image) }}"> </td>
                                    </tr>
                                    <tr>
                                        <th> Ads Image </th>
                                        <td> <img style="width: 100px;" src="{{ asset('uploads/' . $game->ads_image) }}"> </td>
                                    </tr>
                                    <tr>
                                        <th> Total Joined </th>
                                        <td> {{ $game->total_joined ?? 0 }} / 300 </td>
                                    </tr>
                                    <tr>
                                        <th> Winner User </th>
                                        <td> {{ $game->winner_id ?? 0 }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
