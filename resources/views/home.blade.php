
<html>
<header>
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


</header>
<body @if(isset($test) && $test == 'pw' || isset($match) && $match == 'pw') onload="document.getElementById('nav-profile-tab').click()"@endif>
@include("inc.navbar")
<script>
    @if(isset($test))
            alert('Mot de passe invalide !!');
    @endif
    @if(isset($match))
    alert("Nouveau mot de passe doit etre different d'ancien mot de passe  !!");
    @endif
</script>

<section class="fplus-about-us-area bg-gray section-padding-120" id="about">

    <div class="container">
        <div class="wrapper fadeInDown" style="padding-top: 120px !important;">
            <div id="formContent">
            @php($user = Auth::user())
            <!-- Tabs Titles -->
                <div class="card-header  justify-content-center"><i class="fa fa-home fa-4x grow Myicone" aria-hidden="true"></i>
                    <div class="small "><b>{{Session::get('role')}}</b>
                        @if($user->confirmed) <i class="fa fa-check-circle " aria-hidden="true"></i>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($user->confirmed == false)
        @include('Home.Verify')
    @else
        <div class="row">
            <!--Menu home  -->
            <div class="wrapper fadeInDown col-3" style="padding-top: 80px !important;">
                <div id="formContent" style="text-align: left">
                    <div class="card-header  justify-content-start " >
                        <div class="properties__button">
                            <!--Nav Button  -->
                            <h3>Parametres :</h3>
                            <nav>
                                <div class="nav flex-column nav-pills" id="nav-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-item nav-link active" id="nav-home-tab" onclick="afficher('nav-home-tab')" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab"  onclick="afficher('nav-profile-tab')" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Changer Mot le passe</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab"  onclick="afficher('nav-contact-tab')" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Activités</a>
                                    <a class="nav-item nav-link" id="nav-last-tab"  onclick="afficher('nav-last-tab')" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Événement</a>
                                    @if(Session::get('role')=='admin')<a class="nav-item nav-link" id="nav-Sports"  onclick="afficher('nav-Sports')" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Admin Area</a>@endif
                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>

                    </div>
                </div>
            </div>
            <!--Menu home  -->
            <div class="wrapper fadeInDown col-8" style="padding-top: 80px !important;">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        @include('Home.Information')
                    </div>

                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        @include('Home.Passwordchange')
                    </div>

                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        c
                    </div>

                    <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                        d
                    </div>
                    @if(Session::get('role')=='admin')
                        <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                            @include('Home.AdminArea')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif


    @if(session()->has('email_sent'))
        @include("email.EmailSent")
    @endif


    <script src="js/ListAllUsers.js"></script>
    <!-- Scripts -->
    <script>
        var myInput = document.getElementById("password");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
        }

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
        function afficher($id) {
            var val = document.getElementById($id).innerText;
            document.getElementById("result").innerHTML= val ;
        }
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
</section>
</body>
</html>



