
<html>
<header>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
    <link rel="stylesheet" href="/css/add.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/add.css') }}" rel="stylesheet">
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
                @php($user = Auth::user())
                <div class="card-header  justify-content-center"><i class="fa fa-home fa-4x grow Myicone" aria-hidden="true"></i> <div class="small "><b>{{Session::get('role')}}</b>
                        @if($user->confirmed) <i class="fa fa-check-circle " aria-hidden="true"></i>
                        @endif
                    </div>

                @if($user->confirmed == false)
                    Veuillez verifier votre compte pour utiliser ce site en toute ces fonctionalites
                    <a href="/sendVerificationCode/{{$user->id}}"><button class="btn btn-success">Verify</button></a>
                    @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Session::get('role')=='admin')
                        <div class="container text-center" >
                            <button  class="btn btn-outline-secondary" onclick="showdiv('users')" style="width: 300px">Afficher les utilisateurs</button>
                            <br>
                            @include('Dashboard.ListAllUsers')
                            <br>
                            <button  class="btn btn-outline-secondary" onclick="showdiv('journals')" style="width: 300px">Afficher le journal</button>
                            <br>
                            @include('Dashboard.Journal')
                            <br>
                            <a href="/scraping" class="btn btn-outline-secondary" onclick="return confirm('Est-ce que vous voulez mettre a jour les posts facebook ?')" style="width: 300px;">Update Post Facebook</a>
                        </div>
                    @endif
                    <br>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <script src="js/ListAllUsers.js"></script>
</section>
</body>
</html>



