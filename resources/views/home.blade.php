<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/add.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/add.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/77c9077a65.js"></script>

    <!--New look -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            transition: background-color .5s;
        }

        .sidenav {
            height: 100%;
            width: 6px;
            position: fixed;
            z-index: 1;
            top: 5rem;
            left: 0;
            background-color: #3771b0;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 17%;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #fff;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
    </style>
</head>
<body>
@if(isset($test) && $test == 'pw' || isset($match) && $match == 'pw') onload="document.getElementById('nav-profile-tab').click()"@endif>
@include("inc.navbar")
@php($user = Auth::user())
<script>
    @if(isset($test))
    alert('Mot de passe invalide !!');
    @endif
    @if(isset($match))
    alert("Nouveau mot de passe doit etre different d'ancien mot de passe  !!");
    @endif
</script>
@if($user->confirmed)
<div id="mySidenav" class="sidenav" >
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a class="nav-item nav-link active" id="nav-home-tab" onclick="afficher(1)" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>
    <a class="nav-item nav-link" id="nav-profile-tab"  onclick="afficher(2)" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Changer Mot le passe</a>
    <a class="nav-item nav-link" id="nav-contact-tab"  onclick="afficher(3)" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Activités</a>
    <a class="nav-item nav-link" id="nav-last-tab"  onclick="afficher(4)" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Événement</a>
    @if(Session::get('role')=='admin')<a class="nav-item nav-link" id="nav-Sports"  onclick="afficher(5)" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Admin Area</a>@endif
</div>
@endif


<div id="main">
    @if($user->confirmed)
    <div id="sidediv" style="position: fixed;margin-left: -17px;">
        <img id="config" src="/storage/photos/shares/config.png"
             onclick="openNav()" onmouseup="closeNav()" style=" margin-top: 9rem; max-width: 25%; background-color: #3771b0;">
    </div>
    @endif
    <div id="main2">
      <section class="fplus-about-us-area bg-gray section-padding-120" id="about">
        <div class="container align-items-center " style="margin-left: 25%; ">
            <div class="row d-flex align-items-center vertical-align-center ">
                <div class="wrapper fadeInDown col-md-8 " style="padding-top: 100px !important;">
                    <div id="formContent">
                    <!-- Tabs Titles -->
                        <div class="card-header  justify-content-center"><i class="fa fa-home fa-4x grow Myicone" aria-hidden="true"></i>
                            <div class="small "><b>{{Session::get('role')}}</b>
                                @if($user->confirmed) <i class="fa fa-check-circle " aria-hidden="true"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if(!$user->confirmed)
                    @include("Home.Verify")
                @else
                    <div class="wrapper fadeInDown col-8" style="padding-top: 80px !important; margin-left: 3%;">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active " id="1" role="tabpanel" aria-labelledby="nav-home-tab">
                                @include('Home.Information')
                            </div>

                            <div class="tab-pane fade" id="2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                @include('Home.Passwordchange')
                            </div>

                            <div class="tab-pane fade" id="3" role="tabpanel" aria-labelledby="nav-contact-tab">
                                c
                            </div>

                            <div class="tab-pane fade" id="4" role="tabpanel" aria-labelledby="nav-last-tab">
                                d
                            </div>
                            @if(Session::get('role')=='admin')
                                <div class="tab-pane fade" id="5" role="tabpanel" aria-labelledby="nav-Sports">
                                    @include('Home.AdminArea')
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    </div>
</div>
@if(session()->has('email_sent'))
    @include("email.EmailSent")
@endif
@include("Home.EditPic")
<script src="js/ListAllUsers.js"></script>
<!-- Scripts -->
<script type="application/javascript">
    function afficher($id) {
        var val = document.getElementById($id);
        for (i  = 1;i<6;i++){
            if($id == i){
                if(val.classList.contains('active')){
                }
                else{
                    val.classList.add('show');
                    val.classList.add('active');
                }
            }
            else{
                if(document.getElementById(i).classList.contains('active')){
                    document.getElementById(i).classList.remove('show');
                    document.getElementById(i).classList.remove('active');
                }
            }
        }
    }
</script>
<script >
    var myInput = document.getElementById("password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
    };

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
    };

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
</script>
<script type="application/javascript">
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password")
        , btn_pw = document.getElementById("btn_pw");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
            password.style.borderColor = "red";
            confirm_password.style.borderColor = "red";
        } else {
            confirm_password.setCustomValidity('');
            password.style.borderColor = "green";
            confirm_password.style.borderColor = "green";
        }
    }
    function validatePassword2(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
            password.style.borderColor = "red";
            confirm_password.style.borderColor = "red";
        } else {
            confirm_password.setCustomValidity('');
            document.getElementById('form').submit();
        }
    }
    confirm_password.onkeyup = validatePassword;
    btn_pw.onclick = validatePassword2;

</script>

<script type="application/javascript">
    (function( $ ){
        $.fn.filemanager = function(type, options) {
            type = type || 'file';

            $("a#lfm").on('click', function(e) {
                var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
                var target_input = $('#' + $(this).data('input'));
                var target_preview = $('#' + $(this).data('preview'));
                window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
                window.SetUrl = function (items) {
                    var file_path = items.map(function (item) {
                        return item.url;
                    }).join(',');

                    // set the value of the desired input to image url
                    target_input.val('').val(file_path).trigger('change');

                    // clear previous preview
                    target_preview.html('');

                    // set or change the preview image src
                    items.forEach(function (item) {
                        target_preview.append(
                            $('<img>').css('height', '5rem').attr('src', item.thumb_url)
                        );
                    });

                    // trigger change event
                    target_preview.trigger('change');
                };
                return false;
            });
        }

    })(jQuery);

</script>

<script type="application/javascript">

    $('#lfm').filemanager('image');
</script>
<script>
    window.addEventListener('click', function(e){
        if (document.getElementById('main2').contains(e.target)){
            // Clicked in box
            closeNav();
        } else{

        }
    });
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

        var x = document.getElementById("mySidenav");
        if (x.classList.contains("d-inline")) {
            x.classList.remove('d-inline');
            closeNav();
        }
        else {
            x.classList.add('d-inline');
        }
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "6px";
        document.getElementById("main").style.marginLeft= "6px";
        document.body.style.backgroundColor = "white";

    }
</script>

</body>
</html>
