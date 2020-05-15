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

            //Categories are meant to be listed here
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
                <a href="/categories/create">create</a>
            </div>



</div>
