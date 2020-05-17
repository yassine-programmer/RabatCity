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
        <b>Text : </b>
        <textarea name="Article_text">

        </textarea>
        <br>
        <br>
        <input type="submit" value="create">

    </div>
    {!! Form::close() !!}

</div>