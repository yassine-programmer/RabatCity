<div>


            <div  class="container text-center">
                <H1><b>{{$theme->Theme_type}}</b></H1>

                <br>
                <h4><b>{{$theme->Theme_intitule}}</b></h4>
                <br>
                <h6><b>{{$theme->Theme_image}}</b><br></h6>
                <br>
                <br>
                <br>

            //<b>Parent</b> Categories are meant to be listed here
                <br>
                <br>
                <br>
                <div style="border-style: outset;">
                @if(count($categories)>0)
                    @foreach($categories as $categorie)
                        <div  class="container text-center">
                            <b>Categorie Intitule: {{$categorie->Categorie_intitule}}</b>

                            <br>
                            <b>Categorie image : {{$categorie->Categorie_image}}</b>
                            <br>
                            <a href="/themes/{{$categorie->Categorie_id}}/edit">edit</a>
                            <a href="/categories/{{$categorie->Categorie_id}}"> Afficher</a>
                        </div>
                    @endforeach
                    @endif
                </div>
                <a href="/categories/createCategorie/{{$theme->Theme_id}}">create</a>
            </div>



</div>
