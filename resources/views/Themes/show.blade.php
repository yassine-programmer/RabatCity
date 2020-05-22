@extends("layouts.app")
@section("content")
<div>
            <div  class="container text-center">
                <br>
                <h1><b>{{$theme->Theme_intitule}}</b></h1>
                <br>
                <h6><b>{{$theme->Theme_image}}</b><br></h6>
                <br>
                <br>
                <br>

            //<b>Parent</b> Categories are meant to be listed here
                <br>
                <br>
                <br>
                <div style="border-style: outset;">
                @if(count($categories)>0)
                    @foreach($categories as $categorie)
                        <div  class="container text-center">
                            <b>Categorie Intitule: {{$categorie->Categorie_intitule}}</b>
                            <br>
                            <b>Categorie image : {{$categorie->Categorie_image}}</b>
                            <br>
                            <a href="/categories/{{$categorie->Categorie_id}}"> Afficher</a>
                            @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                            <a href="/categories/{{$categorie->Categorie_id}}/edit">Edit</a>
                            {!! Form::open([ 'action'=>['CategoriesController@destroy',$categorie->Categorie_id],'method' => 'post' ,'class'=>'pull-right']) !!}
                            {{ Form::hidden('_method','DELETE') }}
                            {{ Form::submit('Delete',['class'=>'btm btn-danger']) }}
                            @endif
                        </div>
                    @endforeach
                    @endif
                </div>
                @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                <a href="/categories/createCategorie/{{$theme->Theme_id}}">create</a>
                    @endif
            </div>
</div>

<!-- path -->
@if(Session::get('role')=='admin' || Session::get('role')=='moderator')
    <h2>PATH</h2>
    @include('showFullPath')
@endif
@endsection
