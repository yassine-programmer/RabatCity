@extends("layouts.app")
@section("content")
    <div  class="container text-center">
        <h1>Categorie Intitule: {{$categorie_parent->Categorie_intitule}}</h1>
        <br>
        <br>
        <br>
        <h4>Categorie image : {{$categorie_parent->Categorie_image}}</h4>
        <br>
        <br>
        <hr>
        <br><br><br><br>
        // Les categories fils de cette categorie :

        <br><br><br><br>
        <div style="border-style: outset;">
            @if(count($categories_fils)>0)
                @foreach($categories_fils as $categorie)
                    <div  class="container text-center">
                        <b>Categorie Intitule: {{$categorie->Categorie_intitule}}</b>

                        <br>
                        <b>Categorie image : {{$categorie->Categorie_image}}</b>
                        <br>
                        <a href="/categories/{{$categorie->Categorie_id}}"> Afficher</a>
                        @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                            <a href="/categories/{{$categorie->Categorie_id}}/edit">edit</a>
                            {!! Form::open([ 'action'=>['CategoriesController@destroy',$categorie->Categorie_id],'method' => 'post' ,'class'=>'pull-right']) !!}
                            {{ Form::hidden('_method','DELETE') }}
                            {{ Form::submit('Delete',['class'=>'btm btn-danger']) }}
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
        <br>
        @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
            <a href="/categories/{{$categorie_parent->Categorie_id}}/create-sous-categorie">Creer une Sous Categorie de {{$categorie_parent->Categorie_intitule}} </a>
        @endif
    </div>
    <!-- path -->
    @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
        <h2>PATH</h2>
        @include('showFullPath')
    @endif
@endsection
