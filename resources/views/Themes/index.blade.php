<div>

    @if(count($themes)>0)
        @foreach($themes as $theme)
    <div  class="container text-center">
        <b>Le type du theme: {{$theme->Theme_type}}</b>

        <br>
        <b>Theme intitule : {{$theme->Theme_intitule}}</b>
        <br>
        <b>image : {{$theme->Theme_image}}</b><br>
        <a href="/themes/{{$theme->Theme_id}}">Afficher</a>
        <a href="/themes/{{$theme->Theme_id}}/edit">Edit</a>
       <?php
         // {!! Form::open([ 'action'=>['ThemesController@destroy',$theme->Theme_id],'method' => 'post' ,'class'=>'pull-right']) !!}
        //{{ Form::hidden('_methos','DELETE') }}
        //{{ Form::submit('Delete',['class'=>'btm btn-danger']) }}

        //{!! Form::close !!}
        ?>
    </div>
        @endforeach
    @endif


</div>
