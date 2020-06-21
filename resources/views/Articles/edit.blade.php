@if(Session::get('role')=='admin' || Session::get('role')=='moderator')
@extends("layouts.app")

@section("css")
    <link rel="stylesheet" type="text/css" href="/css/add.css">
    <link rel="stylesheet" type="text/css" href="/css/styleForm.css">
    <link rel="stylesheet" type="text/css" href="/css/crud.css">
@endsection

@section("content")
    <script type="application/javascript" src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
    @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
        {!! Form::open(['action' => ['ArticlesController@update',$article->Article_id], 'method' => 'post','id'=>'form']) !!}
        <div class="container-contact100">
            <div class="wrap-contact100">
				<span class="contact100-form-title Mytitle">
					   <i class="fa fa-refresh" aria-hidden="true"></i> Article :
				</span>
                    <div class="wrap-input100 bg1 DivT grow" style="margin-top: 30px">
                        <span class="label-input100"><b>Categorie intitule : *</b></span>
                        <input class="input100" type="text" name="" value="{{$categorie->Categorie_intitule}}" disabled>
                        <input class="input100" type="text" name="Categorie_id" value="{{$categorie->Categorie_id}}" hidden>
                    </div>

                    <div class=" wrap-input100 bg1 DivT grow">
                        <span class="label-input100"><b>Article titre : </b></span>
                        <input class="input100" type="text" name="Article_titre" value="{{$article->Article_titre}}">
                    </div>

                    <div class=" wrap-input100 bg1 DivT grow">
                        <span class="label-input100"><b>Article Image *</b></span>
                        <div class="input-group">
                                          <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                              <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                          </span>
                            <input id="thumbnail" class="form-control input100" type="text" name="Article_image" value="{{$article->Article_image}}" style="border: none !important;">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    </div>


                    <div class="wrap-input100  bg0 DivT grow">
                        <span class="label-input100"><b>Article text *</b></span>
                        <textarea id="my-editor" name="Article_text" class="form-control">{{$article->Article_text}} </textarea>
                        <CKEditor onBeforeLoad={ ( CKEDITOR ) = ( CKEDITOR.disableAutoInline = true ) } />
                    </div>
                    <div class="container-contact100-form-btn">
                        <button type="button" class="grow button1" onclick="document.getElementById('form').submit();">Modifier</button>
                    </div>
            </div>
        </div>
        {!! Form::hidden('_method','PUT') !!}
        {!! Form::close() !!}
        @endif
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
@endsection

@section('script')

@endsection
@else
    @include('errors.404')
@endif
