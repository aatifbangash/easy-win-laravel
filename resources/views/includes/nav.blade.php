<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="{{ url('/') }}"><i>Easy Wins</i></a>
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
                            <a class="nav-link" href="{{ url('/') }}"
                                ><i
                                    class="fa fa-home fa-lg"
                                    aria-hidden="true"
                                ></i>
                                Home</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/page/about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/page/winner') }}">Winners</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/page/credits') }}">Credits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/page/contact') }}">Contact</a>
                        </li>
                        @if(!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}"
                                ><i
                                    class="fa fa-lg fa-user-circle"
                                    aria-hidden="true"
                                ></i>
                                Login</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/register') }}"
                                ><i
                                    class="fa fa-lg fa-user-plus"
                                    aria-hidden="true"
                                ></i>
                                Register</a
                            >
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-lg fa-sign-out" aria-hidden="true"></i>
                                        Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/account') }}"
                                ><i
                                    class="fa fa-lg fa-user-md"
                                    aria-hidden="true"
                                ></i>
                                My Account</a
                            >
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
            <div>
                <button type="button" class="btn btn-primary footer-wiget">
                  Total online <span class="badge badge-light">{{$totalOnlineUsers ?? 0}}</span>
                </button>
            </div>