@extends("layouts.app")
@section("css")
    <link rel="stylesheet" type="text/css" href="/css/styleForm.css">

@endsection
@section("content")
    <script type="application/javascript" src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
    @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
        {!! ['action' => ['ArticlesController@update',$article->Article_id], 'method' => 'post','id'=>'form']) !!}
        <div class="container-contact100">
            <div class="wrap-contact100">
				<span class="contact100-form-title">
					Ajouter un Article :
				</span>
                    <div class="wrap-input100 bg1" style="margin-top: 30px">
                        <span class="label-input100"><b>Categorie intitule : *</b></span>
                        <input class="input100" type="text" name="" value="{{$categorie[0]->Categorie_intitule}}" disabled>
                        <input class="input100" type="text" name="Categorie_id" value="{{$categorie[0]->Categorie_id}}" hidden>
                    </div>

                    <div class=" wrap-input100 bg1">
                        <span class="label-input100"><b>Article titre : </b></span>
                        <input class="input100" type="text" name="Article_titre" value="{{$article->Article_titre}}">
                    </div>

                    <div class=" wrap-input100 bg1">
                        <span class="label-input100"><b>Article Image *</b></span>
                        <div class="input-group">
                                          <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                              <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                          </span>
                            <input id="thumbnail" class="form-control input100" type="text" name="Article_image" value="{{$article->Article_image}}">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    </div>


                    <div class="wrap-input100  bg0">
                        <span class="label-input100"><b>Article text *</b></span>
                        <textarea id="my-editor" name="Article_text" class="form-control">{{$article->Article_text}} </textarea>
                        <CKEditor onBeforeLoad={ ( CKEDITOR ) = ( CKEDITOR.disableAutoInline = true ) } />
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
        {!! Form::close() !!}
        <!-- Scripts -->
        <script type="application/javascript">
            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };
        </script>
        <script type="application/javascript">
            CKEDITOR.replace('my-editor', options);
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

    @else
        khrj fhalk
    @endif
@endsection

@section('script')

@endsection
