<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top" style="padding: 1rem 1rem;">

        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="https://i.imgur.com/RSC5U1b.png " style="width: 10pc;margin-top: -2rem;margin-bottom: -2rem;margin-right: 5rem;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li><a class="nav-item nav-link grow" href="/Themes/services">Services<span class="sr-only">(current)</span></a> </li>
                <li><a class="nav-item nav-link grow" href="/Themes/activites">Activites</a> </li>
                <li><a class="nav-item nav-link grow" href="#">Commune</a> </li>
                <li><a class="nav-item nav-link grow" href="#">Arrondissements</a> </li>
                <li><a class="nav-item nav-link grow" href="#">Partenaires</a> </li>
                <li><a class="nav-item nav-link grow" href="/Themes/rabat">Rabat</a> </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="/home" class ="dropdown-item">Parametre</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </li>
            @endguest

            <!-- Authentication Links -->
            </ul>
        </div>
</nav>
