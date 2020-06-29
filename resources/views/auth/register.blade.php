
<html>
<header>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
    <link rel="stylesheet" href="/css/add.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/77c9077a65.js"></script>


</header>
<body>
@include("inc.navbar")
<section class="fplus-about-us-area bg-gray section-padding-120" id="about">
    <div class="container">
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->

                <!-- Icon -->
                <div class="fadeIn first" style="margin-top: 20px;">
                    <i class="fa fa-address-card fa-4x grow Myicone" aria-hidden="true"></i>
                </div>

                <!-- Login Form -->
                <form method="POST" action="{{ route('register') }}" style="margin-top: 20px;">
                    @csrf
                    <input id="name" type="text" placeholder="Pseudo" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                    <input id="email" type="Email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                    <input id="password" type="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                    <input id="password-confirm" placeholder="Confirmer mot de passe" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <br>
                    <!--reCAPTCHA -->
                    <div id="captcha" class="col-6 float-right">
                        <div class="g-recaptcha" data-sitekey="{{env('reCAPTCHA_site_key')}}" required></div>
                        @if($errors->has('g-recaptcha-response'))
                            <span class="invalid-feedback" style="display: block">
                             <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                         </span>
                        @endif
                    </div>
                    <div id="formFooter" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-primary">
                                S'enregitrer
                            </button>

                    </div>
                </form>

                <!-- Remind Passowrd -->


            </div>
        </div>
    </div>

    <script>
        var captcha ={
            "success": true|false,
            "challenge_ts": timestamp,  // timestamp of the challenge load (ISO format yyyy-MM-dd'T'HH:mm:ssZZ)
            "hostname": string,         // the hostname of the site where the reCAPTCHA was solved
            "error-codes": 'Faut'        // optional
        }

    </script>

</section>
</body>
</html>
