<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/add.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/add.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/77c9077a65.js"></script>

    <!--New look -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    @if(session()->has('changed'))
    alert('Password changed succesfuly!!');
    @endif

</script>
@if($user->confirmed)
<div id="mySidenav" class="sidenav" >
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a class="nav-item nav-link active" id="nav-home-tab" onclick="afficher(1)" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Profile<i class="Myfa fa fa-angle-right float-right"></i></a>
    <hr class="My_hr">
    <a class="nav-item nav-link My_link" id="nav-profile-tab"  onclick="afficher(2)" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Changer Mot le passe<i class="Myfa fa fa-angle-right float-right"></i></a>
    <hr class="My_hr">
    <a class="nav-item nav-link" id="nav-contact-tab"  onclick="afficher(3)" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">######<i class="Myfa fa fa-angle-right float-right"></i></a>
    <hr class="My_hr">
    <a class="nav-item nav-link" id="nav-last-tab"  onclick="afficher(4)" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Archive<i class="Myfa fa fa-angle-right float-right"></i></a>
    <hr class="My_hr">
    @if(Session::get('role')=='admin')<a class="nav-item nav-link" id="nav-Sports"  onclick="afficher(5)" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-star" aria-hidden="true"></i>
        Admin Area<i class="Myfa fa fa-angle-right float-right"></i></a>@endif
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
        <div class="container align-items-center " style="margin-left: 350px; ">
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
                    <div class="wrapper fadeInDown col-lg-8 " style="padding-top: 80px !important; margin-left: 40px;">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active " id="1" role="tabpanel" aria-labelledby="nav-home-tab">
                                @include('Home.Information')
                            </div>

                            <div class="tab-pane fade" id="2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                @include('Home.Passwordchange')
                            </div>

                            <div class="tab-pane fade" id="3" role="tabpanel" aria-labelledby="nav-contact-tab">

                            </div>
                            @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                            <div class="tab-pane fade" id="4" role="tabpanel" aria-labelledby="nav-last-tab">
                                @include('Home.Archiver')
                            </div>
                            @endif
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
<script src="js/homePW.js"></script>
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
