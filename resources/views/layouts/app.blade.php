
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rabat City</title>


    <link rel="shortcut icon" href="https://i.imgur.com/Fid6l34.png">
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>


    <!-- Fonts -->
    <script src="https://use.fontawesome.com/77c9077a65.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    @yield('css')
</head>
<body>
<div id="app">
    <a id="ToTopbutton"></a>
    @include('inc.navbar')
    @include('searchbar.searchbar')

    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                    @include("inc.messages")
                </div>
            </div>
        </div>
        @yield('content')

    </main>


   @if(!isset($place))
       @include('Contact.BannerContact')
   @endif

   @include('inc.footer')
@yield('script')
</div>

<script>
    //Get the button:
    var Topbtn = $('#ToTopbutton');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            Topbtn.addClass('showbutton');
        } else {
            Topbtn.removeClass('showbutton');
        }
    });

    Topbtn.on('click', function(e) {
        e.preventDefault();
        scrollToTop();
    });
    const scrollToTop = () => {
        // Let's set a variable for the number of pixels we are from the top of the document.
        const c = document.documentElement.scrollTop || document.body.scrollTop;
        // If that number is greater than 0, we'll scroll back to 0, or the top of the document.
        // We'll also animate that scroll with requestAnimationFrame:
        // https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame
        if (c > 0) {
            window.requestAnimationFrame(scrollToTop);
            // ScrollTo takes an x and a y coordinate.
            // Increase the '10' value to get a smoother/slower scroll!
            window.scrollTo(0, c - c / 15);
        }
    };

</script>
</body>
</html>

