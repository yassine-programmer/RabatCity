@if(count($themes)>0)
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">

    </script>
    <script>
        $(document).ready(function () {
            $("#ThemeId").on('change',function () {
                var themeId = $(this).val();
                if (themeId)
                {
                    $.get(
                        "/AjaxCat",
                        {themeId:themeId},
                        function(data) {
                            $("#categorie").html(data);
                        });
                }
                else
                {
                    $("#categorie").html("<option>Selectionner un theme d'abord</option>");
                }

            });
        });
    </script>
    <div>

        {!! Form::open(['action' => 'CategoriesController@store', 'method' => 'post']) !!}
        <div  class="container text-center">
            <b>Theme : </b>
            <select name="Theme_type" id="ThemeId">
                <option value="">Selectionner un Theme</option>
                @foreach($themes as $theme)
                    <option value="{{$theme->Theme_id}}">
                        {{$theme->Theme_intitule}}
                    </option>
                @endforeach
            </select>
            <br>
            <b>Categorie intitule : </b>
            <input type="text" name="Categorie_intitule">
            <br>
            <b>image : </b>
            <input type="text" name="Categorie_image">
            <br>
            <b>Categorie parent : </b>
            <select name="Categorie_type" id="categorie" >

            </select>

            <br>
            <input type="submit" value="create">

        </div>
        {!! Form::close() !!}

    </div>
@endif
