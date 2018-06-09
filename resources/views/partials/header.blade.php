<nav class="navbar navbar-expand-md navbar-expand-lg navbar-light bg-light" >
    <div class="container">
        <div class="col-sm-6">
            <a class="navbar-brand" href="/" tabindex="20" title="Tilbake.">
                <img class="logo img-responsiv" src="{{ asset('images/CompanyName.png') }}" alt="Tilbake.">
            </a>
        </div>
        <form class="form-inline my-2 my-lg-0">
            <input type="search" class="form-control mr-sm-2" placeholder="Search" aria-label="Search">
            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Søk</button>
        </form>
    </div>
</nav>

<nav class="navbar navbar-expand-md navbar-expand-lg navbar-light bg-light tekst">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                {{--TODO: Lage categories @foreach --}}

                {{--id="navbarDropdown"--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-list"></i> Alle produkter</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($categories as $category)
                            <a class="dropdown-item" href="{{ url('category', $category->id) }}"> {{ $category->name }}</a>
                        @endforeach
                    </div>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Våre beste kupp!</a>
                </li>
            </ul>
        </div>


        <!-- Right Side Of Navbar -->
        <div class="pull-right">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.shoppingCart') }}"><i class="fas fa-shopping-cart"></i> Handlekurv  <span class="badge"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span> </a>
                    </li>

                    {{--Start: UserDropdown Not logged inn--}}
                    <li class="nav-item dropdown">
                        @guest
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <i class="fas fa-user"></i> Brukerkonto
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt"></i> {{ __('Logg inn') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('register') }}">
                                    <i class="fas fa-user-plus"></i> {{ __('Register') }}
                                </a>

                            </div>
                        @endguest
                    </li>{{--End: UserDropdown Not logged inn--}}

                    <li class="nav-item dropdown">{{--Start: UserDropdown logged inn--}}

                        @auth
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ url('/profile') }}">
                                    <i class="fas fa-user-circle"></i> Bruker konto
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out-alt"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @endauth
                    </li>{{-- End: UserDropdown logged inn--}}

                </ul>
            </div>
        </div>
    </div>
</nav>
