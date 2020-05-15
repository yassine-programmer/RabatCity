<div>
    {!! Form::open([ 'method' => 'post']) !!}
    @if(count($themes)>0)
        @foreach($themes as $theme)
    <div  class="container text-center">
        <b>Le type du theme: {{$theme->Theme_type}}</b>

        <br>
        <b>Theme intitule : {{$theme->Theme_intitule}}</b>
        <br>
        <b>image : {{$theme->Theme_image}}</b><br>
        <a href="/themes/{{$theme->Theme_id}}/edit">edit</a>
    </div>
        @endforeach
    @endif
    {!! Form::close() !!}

</div>