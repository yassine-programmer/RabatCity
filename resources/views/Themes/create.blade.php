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
        @include('inc.StandaloneImageButton')
            <input type="text" name="Theme_image">
        <br>
        <input type="submit" value="create">

    </div>
    {!! Form::close() !!}

</div>
@endsection
