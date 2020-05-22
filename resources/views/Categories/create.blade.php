@extends("layouts.app")
@section("content")
<div>
    {!! Form::open(['action' => 'CategoriesController@store', 'method' => 'post']) !!}

    @if(isset($categorie_parent))
    <h1>Le theme : {{$theme->Theme_intitule}}</h1>
        <input type="text" name="Theme_id" value="{{$theme->Theme_id}}" hidden/>
    <h1>La categorie parent : {{$categorie_parent[0]->Categorie_intitule}}</h1>
        <input type="text" name="Cat_id" value="{{$categorie_parent[0]->Categorie_id}}" hidden/>
        @else
    <h1>Le theme : {{$theme[0]->Theme_intitule}}</h1>
        <input type="text" name="Theme_id" value="{{$theme[0]->Theme_id}}" hidden/>
    @endif

    <br><br>

    <div  class="container text-center">
        <br>
        <b>Categorie intitule : </b>
        <input type="text" name="Categorie_intitule">
        <br>
        <b>image : </b>
        <input type="text" name="Categorie_image">
        <br>
        <br>
        <input type="submit" value="create">

    </div>
    {!! Form::close() !!}

</div>
@endsection
