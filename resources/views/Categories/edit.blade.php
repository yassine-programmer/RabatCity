@extends("layouts.app")
@section("content")
<div>
    {!! Form::open([ 'action' => ['CategoriesController@update',$categorie->Categorie_id],'method' => 'post']) !!}
    <div  class="container text-center">
        <h1>Edit {{$categorie->Categorie_intitule}}</h1>
        <b>Categorie intitule : </b>
        <input type="text" name="Categorie_intitule" value="{{$categorie->Categorie_intitule}}">
        <br>
        <b>image : </b>
        <input type="text" name="Categorie_image" value="{{$categorie->Categorie_image}}">
        <br>
        <input type="submit" value="update">
    </div>
    {!! Form::hidden('_method','PUT') !!}
    {!! Form::close() !!}

</div>
@endsection
