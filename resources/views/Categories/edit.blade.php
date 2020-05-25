@extends("layouts.app")
@section("css")
    <link rel="stylesheet" type="text/css" href="/css/styleForm.css">
@endsection
@section("content")
    @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
        {!! Form::open(['action' => ['CategoriesController@update',$categorie->Categorie_id], 'method' => 'post','id'=>'form']) !!}
        <div class="container-contact100">
            <div class="wrap-contact100">
				<span class="contact100-form-title">
					Ajouter un Theme :
				</span>
                    <div class="wrap-input100 bg1" style="margin-top: 30px">
                        <span class="label-input100"><b>Categorie intitule *</b></span>
                        <input class="input100" type="text" name="Categorie_intitule" value="{{$categorie->Categorie_intitule}}">
                    </div>



                    <div class=" wrap-input100 bg1">
                        <span class="label-input100"><b>Categorie Image *</b></span>
                        <div class="input-group">
                                          <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                              <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                          </span>
                            <input id="thumbnail" class="form-control input100" type="text" name="Categorie_image" value="{{$categorie->Categorie_image}}">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    </div>


                    <div class="wrap-input100  bg0">
                        <span class="label-input100"><b>Categorie Description *</b></span>
                        <textarea class="input100" name="Categorie_description"  placeholder="Votre description...">{{$categorie->Categorie_description}}</textarea>
                    </div>
                    <div class="container-contact100-form-btn">
                        <button type="button" class="contact100-form-btn" onclick="document.getElementById('form').submit();">
						<span>
							Modifier
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                        </button>
                    </div>

            </div>

        </div>

        {!! Form::hidden('_method','PUT') !!}
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
