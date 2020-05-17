<div  class="container text-center">
    <h1>Categorie Intitule: {{$categorie_parent->Categorie_intitule}}</h1>
    <br>
    <br>
    <br>
    <h4>Categorie image : {{$categorie_parent->Categorie_image}}</h4>
    <br>
    <br>
    <hr>
    <br><br><br><br>
    // Les categories fils de cette categorie :

    <br><br><br><br>
    <div style="border-style: outset;">
        @if(count($categories_fils)>0)
            @foreach($categories_fils as $categorie)
                <div  class="container text-center">
                    <b>Categorie Intitule: {{$categorie->Categorie_intitule}}</b>

                    <br>
                    <b>Categorie image : {{$categorie->Categorie_image}}</b>
                    <br>
                    <a href="/categories/{{$categorie->Categorie_id}}/edit">edit</a>
                    <a href="/categories/{{$categorie->Categorie_id}}"> Afficher</a>
                </div>
            @endforeach
        @endif
    </div>
    <br>
    <a href="/categories/{{$categorie_parent->Categorie_id}}/create-sous-categorie">Creer une Sous Categorie de {{$categorie_parent->Categorie_intitule}} </a>

</div>
