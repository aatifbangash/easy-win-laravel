@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Winners Pictures</div>
                    <div class="card-body">
                        <a href="{{ url('/winnerspictures/create') }}" class="btn btn-success btn-sm" title="Add New Picture">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Picture</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pictures as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img style="width: 50px;" src="{{ asset('uploads/' . $item->winner_picture) }}"></td>
                                        <td>
                                            <a href="{{ url('/winnerspictures/' . $item->id) }}" title="View Game"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/winnerspictures', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Game',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $pictures->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
