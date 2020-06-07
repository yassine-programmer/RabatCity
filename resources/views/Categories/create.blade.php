@if(Session::get('role')=='admin' || Session::get('role')=='moderator')
@extends("layouts.app")
@section("css")
    <link rel="stylesheet" type="text/css" href="/css/styleForm.css">
    <link rel="stylesheet" type="text/css" href="/css/crud.css">
@endsection
@section("content")

        {!! Form::open(['action' => 'CategoriesController@store', 'method' => 'post','id'=>'form']) !!}
        <div class="container-contact100">
            <div class="wrap-contact100 ">
                <form class="contact100-form">
				<span class="contact100-form-title Mytitle">
					   <i class="fa fa-plus fa-1x" aria-hidden="true"></i> Catégorie :
				</span>
                    @if(isset($categorie_parent))
                        <div class="wrap-input100 bg1 DivT grow" style="margin-top: 30px">
                            <span class="label-input100"><b>Type Intitule *</b></span>
                            <input class="input100" type="text" name="" value="{{$theme->Theme_intitule}}" disabled>
                            <input class="input100" type="text" name="Theme_id" value="{{$theme->Theme_id}}" hidden>
                        </div>
                        <div class="wrap-input100 bg1 DivT grow" style="margin-top: 30px">
                            <span class="label-input100"><b>Categorie Parent *</b></span>
                            <input class="input100" type="text" name="" value="{{$categorie_parent[0]->Categorie_intitule}}" disabled>
                            <input class="input100" type="text" name="Cat_id" value="{{$categorie_parent[0]->Categorie_id}}" hidden>
                        </div>
                    @else
                        <div class="wrap-input100 bg1 DivT grow" style="margin-top: 30px">
                            <span class="label-input100"><b>Type Intitule *</b></span>
                            <input class="input100" type="text" name="" value="{{$theme[0]->Theme_intitule}}" disabled>
                            <input class="input100" type="text" name="Theme_id" value="{{$theme[0]->Theme_id}}" hidden>
                        </div>
                    @endif

                    <div class=" wrap-input100 bg1 DivT grow">
                        <span class="label-input100"><b>Categorie intitule : </b></span>
                        <input class="input100" type="text" name="Categorie_intitule" placeholder="Saisissez l'intitule du categorie">
                    </div>

                    <div class=" wrap-input100 bg1 DivT grow">
                        <span class="label-input100"><b>Categorie Image *</b></span>
                        <div class="input-group">
                                          <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                              <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                          </span>
                            <input id="thumbnail" class="form-control input100" type="text" name="Categorie_image" style="border: none !important;">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    </div>


                    <div class="wrap-input100  bg0 DivT grow">
                        <span class="label-input100"><b>Categorie Description *</b></span>
                        <textarea class="input100" name="Categorie_description" placeholder="Votre description..."></textarea>
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


@endsection

@section('script')

@endsection
@else
    @include('errors.404')
@endif
