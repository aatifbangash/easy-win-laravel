<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/app.css" />
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        />
       <!--  <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        /> -->
        <link rel="stylesheet" href="css/style.css" />
        <title>Easy win</title>
    </head>
    <body>
        <!-- The video -->
        <div class="fullscreen-bg">
            <video
                loop
                muted
                autoplay
                poster="assets/images/main-frame.jpg"
                class="fullscreen-bg__video"
            >
                <source src="assets/vbg.webm" type="video/webm" />
                <!-- <source src="assets/vbg.mp4" type="video/mp4" /> -->
                <!-- <source src="assets/vbg.ogv" type="video/ogg" /> -->
            </video>
        </div>

        <div id="header" class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href=""><i>Easy Wins</i></a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href=""
                                ><i
                                    class="fa fa-home fa-lg"
                                    aria-hidden="true"
                                ></i>
                                Home</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Winners</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Credits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"
                                ><i
                                    class="fa fa-lg fa-user-circle"
                                    aria-hidden="true"
                                ></i>
                                Login</a
                            >
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- header end -->

        <!-- Content start-->
        <div id="content" class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-2 ">
                    <div class="game-box border border-dark m-auto">
                        <div
                            id="carouselExampleControls1"
                            class="carousel slide"
                            data-ride="carousel"
                            data-interval="3000"
                        >
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="card game-slider">
                                        <img
                                            class="card-img-top game-slider-image"
                                            src="https://via.placeholder.com/320X250.png"
                                            alt="Card image cap"
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
                                                    Entry Cost £ 100
                                                </div>
                                                <div
                                                    class="game-slider-joined p-3"
                                                >
                                                    Player Count 30 / 300
                                                </div>
                                            </div>
                                            <a
                                                href="detail.html"
                                                class="btn btn-primary mt-2 game-slider-button"
                                                >Join game</a
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card game-slider">
                                        <img
                                            class="card-img-top game-slider-ads"
                                            src="https://via.placeholder.com/320X300.png"
                                            alt="Card image cap"
                                        />
                                        <div
                                            class="card-body game-slider-container text-center"
                                        >
                                            <a
                                                href="detail.html"
                                                class="btn btn-primary mt-2 game-slider-button"
                                                >Join game</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a
                                class="carousel-control-prev"
                                href="#carouselExampleControls1"
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
                                href="#carouselExampleControls1"
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
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-2">
                    <div class="game-box border border-dark m-auto">
                        <div
                            id="carouselExampleControls2"
                            class="carousel slide"
                            data-ride="carousel"
                            data-interval="3000"
                        >
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="card game-slider">
                                        <img
                                            class="card-img-top game-slider-image"
                                            src="https://via.placeholder.com/320X250/000000/FFFFFF"
                                            alt="Card image cap"
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
                                                    Entry Cost £ 100
                                                </div>
                                                <div
                                                    class="game-slider-joined p-3"
                                                >
                                                    Player Count 30 / 300
                                                </div>
                                            </div>
                                            <a
                                                href="detail.html"
                                                class="btn btn-primary mt-2 game-slider-button"
                                                >Join game</a
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card game-slider">
                                        <img
                                            class="card-img-top game-slider-ads"
                                            src="https://via.placeholder.com/320X300/000000/FFFFFF"
                                            alt="Card image cap"
                                        />
                                        <div
                                            class="card-body game-slider-container text-center"
                                        >
                                            <a
                                                href="detail.html"
                                                class="btn btn-primary mt-2 game-slider-button"
                                                >Join game</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a
                                class="carousel-control-prev"
                                href="#carouselExampleControls2"
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
                                href="#carouselExampleControls2"
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
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-2">
                    <div class="game-box border border-dark m-auto">
                        <div
                            id="carouselExampleControls3"
                            class="carousel slide"
                            data-ride="carousel"
                            data-interval="3000"
                        >
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="card game-slider">
                                        <img
                                            class="card-img-top game-slider-image"
                                            src="https://via.placeholder.com/320X250/0000FF/808080"
                                            alt="Card image cap"
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
                                                    Entry Cost £ 100
                                                </div>
                                                <div
                                                    class="game-slider-joined p-3"
                                                >
                                                    Player Count 30 / 300
                                                </div>
                                            </div>
                                            <a
                                                href="detail.html"
                                                class="btn btn-primary mt-2 game-slider-button"
                                                >Join game</a
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card game-slider">
                                        <img
                                            class="card-img-top game-slider-ads"
                                            src="https://via.placeholder.com/320X300/0000FF/808080"
                                            alt="Card image cap"
                                        />
                                        <div
                                            class="card-body game-slider-container text-center"
                                        >
                                            <a
                                                href="detail.html"
                                                class="btn btn-primary mt-2 game-slider-button"
                                                >Join game</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a
                                class="carousel-control-prev"
                                href="#carouselExampleControls3"
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
                                href="#carouselExampleControls3"
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
            </div>
        </div>
        <!-- COntent end-->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <!-- <script src="assets/js/bootstrap.min.js"></script> -->
    </body>
</html>
