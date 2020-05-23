@extends("layouts.app")
@section("content")
    @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
<div>
    {!! Form::open(['action' => ['ArticlesController@update',$article->Article_id], 'method' => 'post']) !!}
    <br><br>

    <div  class="container text-center">
        <br>
        <b>Categorie intitule : {{$categorie[0]->Categorie_intitule}}</b><input type="text" name="Categorie_id" value="{{$categorie[0]->Categorie_id}}" hidden>
        <br>
        <b>Article titre</b>
        <input type="text" name="Article_titre" value="{{$article->Article_titre}}">
        <br>
        <b>Image : </b>
        <div class="input-group">
                                          <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                              <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                          </span>
            <input id="thumbnail" class="form-control" type="text" name="Article_image" value="{{$article->Article_image}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>

        <br>
        <b>Text : </b>
        <textarea name="Article_text">
            {{$article->Article_text}}
        </textarea>
        <br>
        <br>
        <input type="submit" value="update">

    </div>
    {!! Form::hidden('_method','PUT') !!}
    {!! Form::close() !!}

</div>
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
