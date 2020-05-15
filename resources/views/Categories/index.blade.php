<div>
    {!! Form::open([ 'method' => 'post']) !!}
    @if(count($categories)>0)
        @foreach($categories as $categorie)
            <div  class="container text-center">
                <b>Categorie Intitule: {{$categorie->Categorie_intitule}}</b>

                <br>
                <b>Categorie image : {{$categorie->Categorie_image}}</b>
                <br>
                <a href="/themes/{{$categorie->Categorie_id}}/edit">edit</a>
            </div>
        @endforeach
    @endif
    {!! Form::close() !!}

</div>