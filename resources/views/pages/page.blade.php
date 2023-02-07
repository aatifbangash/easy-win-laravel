@extends('layouts.app')
@section('content')
<div id="content" class="container mt-5">
            <div class="row">
                <div
                    class="col-12 col-sm-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2"
                >
                    <div
                        class="game-box page-content border border-dark m-auto "
                    >
                        <h2 class="mb-4">{{$page->title}}</h2>
                        <p class="lead text-justify">
                            {!! $page->content !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
@endsection