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