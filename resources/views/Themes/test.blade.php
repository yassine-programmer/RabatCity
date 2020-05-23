<div>
    <div  class="container text-center">
        <h1>{{$themes[0]->Theme_type}}</h1>
        <br>

        @if(Session::get('role')=='admin' || Session::get('role')=='moderator') <a href="/themes/create/{{$themes[0]->Theme_type}}">Ajouter</a> @endif
        @if(count($themes)>0)
            @foreach($themes as $theme)

                <b>Le type du theme: {{$theme->Theme_type}}</b>

                <br>
                <b>Theme intitule : {{$theme->Theme_intitule}}</b>
                <br>
                <b>image : {{$theme->Theme_image}}</b><br>
                <a href="/themes/{{$theme->Theme_id}}">Afficher</a>
                {!! Form::open([ 'action'=>['ThemesController@destroy',$theme->Theme_id],'method' => 'post' ,'class'=>'pull-right']) !!}
                @if(Session::get('role')=='admin' || Session::get('role')=='moderator')

                    <a href="/themes/{{$theme->Theme_id}}/edit">Edit</a>
                    {{ Form::hidden('_method','DELETE') }}
                    {{ Form::submit('Delete',['class'=>'btm btn-danger']) }}

                @endif

                {!! Form::close() !!}


            @endforeach
        @endif
    </div>

</div>