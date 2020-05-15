<div>
    {!! Form::open(['action' => 'CategoriesController@store', 'method' => 'post']) !!}
    <div  class="container text-center">
        <?php echo @$_GET['ThemeId'];?>
        <b>Theme : </b>
        <select name="Theme_type">
            @php($themesA =App\Theme::all())
            @foreach($themesA as $theme)
                <option value="{{$theme->Theme_id}}" @if(@$_POST['ThemeId'] == $theme->Theme_id) selected="selected" @endif >
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
        <b>sous Cat : </b>
        <select name="Categorie_type">
            @php($categories =App\Categorie::where('Cat_id',null)->get())
            @foreach($categories as $categorie)
                <option value="{{$categorie->Categorie_id}}">{{$categorie->Categorie_intitule}}</option>
            @endforeach
        </select>
        <br>
        <input type="submit" value="create">

    </div>
    {!! Form::close() !!}

</div>