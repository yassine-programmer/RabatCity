<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\DB;

class HomeArticlesController extends Controller
{
    public function home1($id){
        $article = Article::find($id);
        if($article->Article_home1 == 1){
            if($article->Article_home2 == 1){
                DB::table('articles')->where('Article_home1', '=', 0)->update(array('Article_home1' => 1));
                $article->Article_home1 = 0;
                $article->save();
                return back()->withInput();
            }else {
                return back()->withInput();
            }

        }
        else{
            $article->Article_home1 = 1;
            $article->save();
            return back()->withInput();
        }
    }
    public function home2($id){
        $article = Article::find($id);
        if($article->Article_home2 == 1){
            if($article->Article_home1 == 1){
                DB::table('articles')->where('Article_home2', '=', 0)->update(array('Article_home2' => 1));
                $article->Article_home2 = 0;
                $article->save();
                return back()->withInput();
            }else {
                return back()->withInput();
            }

        }
        else{
            $article->Article_home2 = 1;
            $article->save();
            return back()->withInput();
        }
    }
}
