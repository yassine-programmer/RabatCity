@extends("layouts.app")
@section("content")
@if(Session::get('role')=='admin')
<div>
    {!! Form::open([ 'action' => ['ThemesController@update',$theme->Theme_id],'method' => 'post']) !!}
    <div  class="container text-center">
        <b>Le type du theme: </b>
        <select name="Theme_type">
            <option @if($theme->Theme_type == 'Services') selected="selected" @endif>Services</option>
            <option @if($theme->Theme_type == 'Activites') selected="selected" @endif  >Activites</option>
        </select>
        <br>
        <b>Theme intitule : </b>
        <input type="text" name="Theme_intitule" value="{{$theme->Theme_intitule}}">
        <br>
        <b>image : </b>
        <input type="text" name="Theme_image" value="{{$theme->Theme_image}}">
        <br>
        <input type="submit" value="update">

    </div>
    {!! Form::hidden('_method','PUT') !!}
    {!! Form::close() !!}

</div>
    @else
    khrj fhalk
@endif
@endsection
