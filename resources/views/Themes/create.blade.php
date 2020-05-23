
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<div>
    {!! Form::open(['action' => 'ThemesController@store', 'method' => 'post']) !!}
    <div  class="container text-center">
        <b>Le type du theme: </b>
            <select name="Theme_type">
                <option>{{$theme_type}}</option>
            </select>
        <br>
        <b>Theme intitule : </b>
            <input type="text" name="Theme_intitule">
        <br>
        <b>image : </b>

                <h2 class="mt-4">Standalone Image Button</h2>
                    <div class="input-group">
                                      <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                          <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                      </span>
                        <input id="thumbnail" class="form-control" type="text" name="filepath">
                    </div>
                <div id="holder" style="margin-top:15px;max-height:100px;"></div>

            <input type="text" name="Theme_image">
        <br>
        <input type="submit" value="create">

    </div>
    {!! Form::close() !!}

</div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>
        var route_prefix = "/filemanager";
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>

