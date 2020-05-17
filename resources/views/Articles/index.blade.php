<div  class="container text-center">
    <h1>Categorie Intitule: {{$categorie->Categorie_intitule}}</h1>
    <br>
    <br>
    <br>
    <h4>Categorie image : {{$categorie->Categorie_image}}</h4>
    <br>
    <br>
    <hr>
    <br><br><br><br>
    // Articles :
    <a href="/articles/create/{{$categorie->Categorie_id}}"> + Ajouter un article </a>
    <br><br><br><br>
    @if(count($articles)>0)
        @foreach($articles as $article)
            <h3>Titre article : {{$article->Article_titre}}</h3>
            <a href="/articles/{{$article->Article_id}}/edit">Edit</a>
            {!! Form::open([ 'action'=>['ArticlesController@destroy',$article->Article_id],'method' => 'post' ,'class'=>'pull-right']) !!}
            {{ Form::hidden('_method','DELETE') }}
            {{ Form::submit('Delete',['class'=>'btm btn-danger']) }}
            <br>
            <div>{{$article->Article_text}}</div>

            @endforeach
        {{$articles->links()}}
        @endif

</div>