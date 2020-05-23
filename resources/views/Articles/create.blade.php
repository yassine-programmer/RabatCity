<html>
    <head>
        <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
    </head>
    <body>

    <div>
        {!! Form::open(['action' => 'ArticlesController@store', 'method' => 'post']) !!}
        <br><br>

        <div  class="container text-center">
            <br>
            <b>Categorie intitule : {{$categorie->Categorie_intitule}}</b><input type="text" name="Categorie_id" value="{{$categorie->Categorie_id}}" hidden>
            <br>
            <b>Article titre</b>
            <input type="text" name="Article_titre">
            <br>
            <b>Text :  </b><br>
            <textarea id="my-editor" name="Article_text" class="form-control">{!! old('content', 'test editor content') !!}</textarea>
            <script>
                var options = {
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                };
            </script>
            <br>
            <br>
            <input type="submit" value="create">

        </div>
        {!! Form::close() !!}

    </div>
    <script>
        CKEDITOR.replace('my-editor', options);
    </script>
    </body>
</html>
