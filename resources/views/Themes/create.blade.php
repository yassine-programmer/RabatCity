<div>
    {!! Form::open(['action' => 'ThemesController@store', 'method' => 'post']) !!}
    <div class="container text-center">
        <b>Le type du theme: </b>

            <input type="radio"  name="gender" value="Activite"><label>Activites</label>
            <input type="radio"  name="gender" value="Service"><label>Service</label>
            <input type="radio"  name="gender" value="Evenement"><label>Evenement</label>

        
        {{Form::submit('Ajouter',['class' =>'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}

</div>
