
<?php
    function showFromTheme($theme,$categories){

        echo '|'.$theme->Theme_intitule.'|<br>';
        foreach ($categories as $categorie) {
            for ($j=0;$j<20;$j++)
                echo '_';
            $categories_fils=App\Categorie::where("Cat_id",$categorie->Categorie_id)->get();
            echo '*'.$categorie->Categorie_intitule.'*';
            echo showFromCategorieParent($categorie,$categories_fils).'<br>';

        }
    }
    function showFromCategorieParent($categorie_parent,$categories_fils,$i=0){
        $i+=20;
        echo '<br>';
        foreach ($categories_fils as $categorie_fils){
            for ($j=0;$j<$i+20;$j++)
                if($j<$i)
                    echo '&nbsp;';
                elseif($j==$i)
                    echo '|';
                else
                echo '_';
            echo $categorie_fils->Categorie_intitule.'<br>' ;
            $categories_fils2=App\Categorie::where("Cat_id",$categorie_fils->Categorie_id)->get();

            echo showFromCategorieParent($categorie_fils,$categories_fils2,$i);
        }


    }
    if(isset($theme))
    echo showFromTheme($theme,$categories);
    else
        echo showFromCategorieParent($categorie_parent,$categories_fils);
