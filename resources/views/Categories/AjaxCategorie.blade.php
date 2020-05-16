
<?php

   if(isset($_GET['themeId']) && !empty($_GET['themeId'])){

       $id=$_GET['themeId'];
       ?>
       @php($categories = App\Categorie::where([['Theme_id','=',$id],['Cat_id','=',null]])->get())

       @if(count($categories)>0)
            @foreach($categories as $categorie)
                 <option value="{{$categorie->Categorie_id}}">{{$categorie->Categorie_intitule}}</option>
              @endforeach
           @else
               <option>Categories Parent indisponible</option>
       @endif
   <?php
   }
       else{
               echo '<option>Error</option>';
       }

       ?>