<?php

namespace App\Http\Controllers;

use App\Article;
use App\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Theme;
use App\Journal;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    public function Themearchive($id)
    {
        $theme = Theme::find($id);
            if($theme->Theme_archiver == 0) {
                $theme->Theme_archiver = 1;
                $theme->save();
                //journal
                $journal = new Journal;
                $journal->Journal_action = 'desarchivage';
                $journal->Journal_table = 'themes';
                $journal->Journal_intitule = $theme->Theme_intitule;
                $journal->Journal_user = Session::get('name');
                $journal->save();
                //end journal

            }
            else {
                $theme->Theme_archiver = 0 ;
                $theme->save();
                DB::table('categories')->where('Theme_id',$theme->Theme_id)->update(['Categorie_archiver'=> 0]);
                $categories =Categorie::where('Theme_id',$theme->Theme_id)->get();
                if(count($categories)>0){
                    foreach ($categories as $categorie)
                    {
                        DB::table('articles')->where('Categorie_id',$categorie->Categorie_id)->update(['Article_archiver'=> 0]);
                    }
                }

                //journal
                $journal = new Journal;
                $journal->Journal_action = 'archivage';
                $journal->Journal_table = 'themes';
                $journal->Journal_intitule = $theme->Theme_intitule;
                $journal->Journal_user = Session::get('name');
                $journal->save();
                //end journal
            }

        //send alert to all admins if the user is a moderator
        $this->notify($journal);

        return back()->withInput();
    }

    public function Categoriearchive($id)
    {
        $categorie = Categorie::find($id);
            if($categorie->Categorie_archiver == 0){
                $categorie->Categorie_archiver = 1 ;
                $categorie->save();
                //journal
                $journal = new Journal;
                $journal->Journal_action = 'desarchivage';
                $journal->Journal_table = 'categories';
                $journal->Journal_intitule = $categorie->Categorie_intitule;
                $journal->Journal_user = Session::get('name');
                $journal->save();
                //end journal
            }

            else {
                $categorie->Categorie_archiver = 0;
                $categorie->save();
                DB::table('articles')->where('Categorie_id',$categorie->Categorie_id)->update(['Article_archiver'=> 0]);
                //journal
                $journal = new Journal;
                $journal->Journal_action = 'archivage';
                $journal->Journal_table = 'categories';
                $journal->Journal_intitule = $categorie->Categorie_intitule;
                $journal->Journal_user = Session::get('name');
                $journal->save();
                //end journal
            }



        //send alert to all admins if the user is a moderator
        $this->notify($journal);

        return back()->withInput();
    }

    public function Articlearchive($id)
    {
        $article = Article::find($id);
            if($article->Article_archiver == 0 ){
                $article->Article_archiver = 1 ;
                $article->save();
                //journal
                $journal = new Journal;
                $journal->Journal_action = 'desarchivage';
                $journal->Journal_table = 'articles';
                $journal->Journal_intitule = $article->Article_titre;
                $journal->Journal_user = Session::get('name');
                $journal->save();
                //end journal
            }
            else{
                $article->Article_archiver = 0 ;
                $article->save();
                //journal
                $journal = new Journal;
                $journal->Journal_action = 'archivage';
                $journal->Journal_table = 'articles';
                $journal->Journal_intitule = $article->Article_titre;
                $journal->Journal_user = Session::get('name');
                $journal->save();
                //end journal
            }

            //send alert to all admins if the user is a moderator
            $this->notify($journal);

            return back()->withInput();
    }
    function notify($journal){
        $user=Auth::user();
        if($user->role == 'moderator')
        {
            app('App\Http\Controllers\EmailController')->AlertDelete($journal,$user);
        }

    }
}

