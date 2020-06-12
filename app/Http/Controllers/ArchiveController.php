<?php

namespace App\Http\Controllers;

use App\Article;
use App\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Theme;

class ArchiveController extends Controller
{
    public function Themearchive($id)
    {
        $theme = Theme::find($id);
            if($theme->Theme_archiver == 0)
                $theme->Theme_archiver = 1 ;
            else
                $theme->Theme_archiver = 0 ;
        $theme->save();
        return back();
    }

    public function Categoriearchive($id)
    {
        $categorie = Categorie::find($id);
            if($categorie->Categorie_archiver == 0)
                $categorie->Categorie_archiver = 1 ;
            else
                $categorie->Categorie_archiver = 0;
        $categorie->save();
        return back();
    }
    public function Articlearchive($id)
    {
        $article = Article::find($id);
            if($article->Article_archiver == 0 )
                $article->Article_archiver = 1 ;
            else
                $article->Article_archiver = 0 ;
        $article->save();
        $Article = new ArticlesController();
        return $Article->show($id);
    }
}
