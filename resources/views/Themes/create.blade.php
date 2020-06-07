@extends("layouts.app")
@section("css")
    <link rel="stylesheet" type="text/css" href="/css/styleForm.css">
    <style>
        .DivT{
            margin-top: 30px; border:1px solid #ccc!important;
            box-shadow: 2px 2px 12px #b8b894;
        }
        .Mytitle{
            text-decoration: underline;
        }
        .Mytitle:hover{
            color: #2f3e7d;
            cursor: pointer;
        }
        .wrap-contact100{
            margin-top: 40px;
            margin-bottom: 40px;
        }
        .button1{
            background-color: #808080;
            border: none;
            color: white;
            padding: 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 2em;
            margin: 4px 2px;
            cursor: pointer;
            width: 270px;
            border-radius: 30px;
        }
        .button1:hover{
            background-color: #071f32;
        }
    </style>
    @endsection
@section("content")
    @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
        {!! Form::open(['action' => 'ThemesController@store', 'method' => 'post','id'=>'form']) !!}
        <div class="container-contact100">
            <div class="wrap-contact100">
                <form class="contact100-form">
				<span class="contact100-form-title Mytitle">
					   Theme <i class="fa fa-plus fa-1x" aria-hidden="true" style="text-decoration: underline"></i> :
				</span>
                    <div class="wrap-input100 bg1 DivT grow">
                        <span class="label-input100"><b>Type Theme *</b></span>
                        <input class="input100" type="text" name="" value="{{$theme_type}}" disabled>
                        <input class="input100" type="text" name="Theme_type" value="{{$theme_type}}" hidden>
                    </div>

                    <div class=" wrap-input100 bg1 DivT grow" >
                        <span class="label-input100"><b>Theme Intitule *</b></span>
                        <input class="input100" type="text" name="Theme_intitule" placeholder="Saisissez l'intitule du theme" required>
                    </div>

                    <div class=" wrap-input100 bg1 DivT grow">
                        <span class="label-input100"><b>Theme Image *</b></span>
                        <div class="input-group">
                                          <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                              <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                          </span>
                            <input id="thumbnail" class="form-control input100" type="text" name="Theme_image" style="border: none !important;">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    </div>


                    <div class="wrap-input100  bg0 DivT grow">
                        <span class="label-input100"><b>Theme Description *</b></span>
                        <textarea class="input100" name="Theme_description" placeholder="Votre description..."></textarea>
                    </div>
                    <div class="container-contact100-form-btn">
                        <button type="button" class="grow button1" onclick="document.getElementById('form').submit();">Valider</button>
                    </div>
                </form>
            </div>
        </div>
        {!! Form::close() !!}
    <!-- Scripts -->
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

@else
        khrj fhalk
    @endif
@endsection

@section('script')

    @endsection
