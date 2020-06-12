
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


    @if($user->confirmed == false)
        @include('Home.Verify')
    @else

    @endif
        <!--Menu home  -->
        <!--Menu home  -->
        <div class="container">
            <div class="wrapper fadeInDown" style="padding-top: 120px !important;">
                <div id="formContent">
                @php($user = Auth::user())
                <!-- Tabs Titles -->
                    <div ><i class="fa fa-home fa-4x grow Myicone" aria-hidden="true"></i>
                        <div class="small "><b>{{Session::get('role')}}</b>
                            @if($user->confirmed) <i class="fa fa-check-circle " aria-hidden="true"></i>
                            @endif
                            <div class="tab-content fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                </div>
            </div>

    </div>




    </div>
    <script src="js/ListAllUsers.js"></script>
    <!-- Scripts -->

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



