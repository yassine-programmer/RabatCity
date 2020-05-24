@extends("layouts.app")
@section("css")
    <link rel="stylesheet" type="text/css" href="/css/styleForm.css">
    @endsection
@section("content")
    @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
        {!! Form::open(['action' => 'ThemesController@store', 'method' => 'post']) !!}
        <div class="container-contact100">
            <div class="wrap-contact100">
                <form class="contact100-form">
				<span class="contact100-form-title">
					Ajouter un Theme :
				</span>
                    <div class="wrap-input100 bg1" style="margin-top: 30px">
                        <span class="label-input100"><b>Type Theme *</b></span>
                        <input class="input100" type="text" name="Theme_type" placeholder="{{$theme_type}}" disabled>
                    </div>

                    <div class=" wrap-input100 bg1">
                        <span class="label-input100"><b>Theme Intitule *</b></span>
                        <input class="input100" type="text" name="Theme_intitule" placeholder="Saisissez l'intitule du theme">
                    </div>

                    <div class=" wrap-input100 bg1">
                        <span class="label-input100"><b>Theme Image *</b></span>
                        <div class="input-group">
                                          <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                              <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                          </span>
                            <input id="thumbnail" class="form-control input100" type="text" name="Theme_image">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    </div>


                    <div class="wrap-input100  bg0">
                        <span class="label-input100"><b>Theme Description *</b></span>
                        <textarea class="input100" name="Theme_description" placeholder="Votre description..."></textarea>
                    </div>

                    <div class="container-contact100-form-btn">
                        <button class="contact100-form-btn">
						<span>
							Valider
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                        </button>
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
