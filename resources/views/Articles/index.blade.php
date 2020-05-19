<div  class="container text-center">
    <h1>Categorie Intitule: {{$categorie->Categorie_intitule}}</h1>
    <br>
    <br>
    <br>
    <h4>Categorie image : {{$categorie->Categorie_image}}</h4>
    <br>
    <br>
    <hr>
    <br><br><br><br>
    // Les categories fils de cette categorie :

    <br><br><br><br>
    <br>
    @if(Session::get('role')!='user')
    <a href="/articles/create/{{$categorie->Categorie_id}}">Ajouter Article</a>
    <br>
    <a href="/categories/{{$categorie->Categorie_id}}/create-sous-categorie">Creer une Sous Categorie de {{$categorie->Categorie_intitule}} </a>
       @endif

</div>
