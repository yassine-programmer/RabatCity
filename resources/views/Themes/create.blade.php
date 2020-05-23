@extends("layouts.app")
@section("content")

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

            <br>
            <input type="submit" value="create">

        </div>
        {!! Form::close() !!}

    </div>
    <!-- Scripts -->
    <script type="application/javascript" src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script type="application/javascript">
        var route_prefix = "/filemanager";
        $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>


@endsection

@section('script')

    @endsection
