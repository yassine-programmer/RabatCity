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
    <div class="container">
        <div class="wrapper fadeInDown" >
            <div id="formContent" >
                <!-- Tabs Titles -->

                <!-- Icon -->
                <div class="fadeIn first fadeInDown no-flick" style="margin-top: 20px;">
                    <i class="fa fa-users fa-4x" aria-hidden="true"></i>
                </div>

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" style="margin-top: 20px;">
                    @csrf

                    <div class="form-group">
                        <i class="fa fa-user"></i>
                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style=" margin-bottom: 14px;">
                    </div>
                        @error('email')
                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                    @enderror
                    <div class="form-group">
                    <i class="fa fa-lock"></i>
                    <input id="password" type="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="margin-bottom: 14px;">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                    @enderror
                    <button type="submit" class="btn btn-primary" style="width: 85%;">
                        S'identifier
                    </button>
                    <div id="formFooter" style="margin-top: 20px;">

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Mot de passe oublié ?
                        </a>


                    </div>
                </form>

                <!-- Remind Passowrd -->


            </div>
        </div>
    </div>

</body>
</html>

