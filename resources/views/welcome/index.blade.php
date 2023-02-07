@extends('layouts.app')
@section('content')
        <!-- Content start-->
        <div id="content" class="container mt-5">
            @if(count($games) > 0)
            <div class="row">
                @foreach($games as $key => $game)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-2 ">
                        <div class="game-box border border-dark m-auto">
                            <div
                                id="carouselExampleControls{{$key}}"
                                class="carousel slide"
                                data-ride="carousel"
                                data-interval="3000"
                            >
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="card game-slider auth-section">
                                            <img
                                                class="card-img-top game-slider-image"
                                                src="{{ asset('uploads/' . $game->price_image) }}"
                                                alt="{{$game->title}}"
                                            />
                                            <div
                                                class="card-body game-slider-container text-center"
                                            >
                                                <div
                                                    class="game-slider-details d-flex justify-content-center"
                                                >
                                                    <div
                                                        class="game-slider-price p-3"
                                                    >
                                                        Entry Cost <br /> £ {{$game->price ?? 0}}
                                                    </div>
                                                    <div
                                                        class="game-slider-joined p-3"
                                                    >
                                                        Player Count <br />{{$game->total_joined ?? 0}} / 300
                                                    </div>
                                                </div>
                                                <a
                                                    href="/play/{{$game->id}}"
                                                    class="btn btn-primary mt-2 game-slider-button"
                                                    >Join game</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="card game-slider auth-section">
                                            <img
                                                class="card-img-top game-slider-ads"
                                                src="{{ asset('uploads/' . $game->ads_image) }}"
                                                alt="{{$game->title}}"
                                            />
                                            <div
                                                class="card-body game-slider-container text-center"
                                            >
                                                <a
                                                    href="/play/{{$game->id}}"
                                                    class="btn btn-primary mt-2 game-slider-button"
                                                    >Join game</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a
                                    class="carousel-control-prev"
                                    href="#carouselExampleControls{{$key}}"
                                    role="button"
                                    data-slide="prev"
                                >
                                    <span
                                        class="carousel-control-prev-icon"
                                        aria-hidden="true"
                                    ></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a
                                    class="carousel-control-next"
                                    href="#carouselExampleControls{{$key}}"
                                    role="button"
                                    data-slide="next"
                                >
                                    <span
                                        class="carousel-control-next-icon"
                                        aria-hidden="true"
                                    ></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if($loop->iteration % 3 == 0)
                        </div><div class="row">
                    @endif
                @endforeach
            </div>
            @else
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-2 ">
                    <span class="text-light-blue">You have no games.</span>
                </div>
            </div>
            @endif
        </div>
@endsection