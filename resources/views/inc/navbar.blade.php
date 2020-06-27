<nav class="navbar navbar-expand-md navbar-light bg-white shadow-lg fixed-top" style="padding: 1rem 1rem;">
    <div class="pl-35">
        <a class="navbar-brand  " href="{{ url('/') }}" style="max-width: 170px">
            <img src="https://yassinedrive.blob.core.windows.net/rabatcitycontainer/LogoMakr_5AoF95.png " >
        </a>
    </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse nav-text" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <div class="d-md-flex d-block flex-row mx-md-auto mx-0">
            <ul class="navbar-nav mr-auto">
                <li><a class="nav-item nav-link grow" href="/Themes/actualites">Actualités</a> </li>
                <li><a class="nav-item nav-link grow" href="/Themes/services">Services<span class="sr-only">(current)</span></a> </li>
                <li><a class="nav-item nav-link grow" href="/Themes/activites">Activites</a> </li>
                <li><a class="nav-item nav-link grow" href="/Themes/evenement">Evénements</a> </li>
                <li><a class="nav-item nav-link grow" href="/Themes/commune">Commune</a> </li>
                <li><a class="nav-item nav-link grow" href="/Arrondissements">Arrondissements</a> </li>
                <li><a class="nav-item nav-link grow" href="/Themes/rabat">Rabat</a> </li>
                <li><a class="nav-item nav-link grow" href="/#contact">Contactez-Nous</a> </li>
            </ul>
            </div>
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
                        <a id="navbrDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position:relative; padding-left:  50px">
                            <img src="{{Auth::user()->image}}" class="profilepic3">
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
<script type="application/javascript">
    $(document).ready(function(){
        $("#button").click(function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top
            }, 2000);
        });
    });
</script>
