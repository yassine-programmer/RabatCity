<div>
    <h1>Le theme : {{$theme[0]->Theme_intitule}}</h1>
    <h1>La categorie parent : {{$categorie_parent[0]->Categorie_intitule}}</h1>
    <br><br>
    {!! Form::open(['action' => 'CategoriesController@store', 'method' => 'post']) !!}
    <div  class="container text-center">
        <b>Theme : </b>
        <select name="Theme_type" >
            <option value="{{$theme[0]->Theme_id}}">
                {{$theme[0]->Theme_intitule}}
            </option>

        </select>
        <br>
        <b>Categorie intitule : </b>
        <input type="text" name="Categorie_intitule">
        <br>
        <b>image : </b>
        <input type="text" name="Categorie_image">
        <br>


        @if(isset($categorie_parent[0]))
            <b>Categorie parent : </b>
        <select name="Categorie_type" >

                <option value="{{$categorie_parent[0]->Categorie_id}}">{{$categorie_parent[0]->Categorie_intitule}}</option>

        </select>
        @endif
        <br>
        <input type="submit" value="create">

    </div>
    {!! Form::close() !!}

</div>
