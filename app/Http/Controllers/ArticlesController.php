<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Categorie;
use App\Journal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ArticlesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function afficher($Article_id)
    {
        $articles = Article::find($Article_id);
        return $this->show($Article_id);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($Categorie_id)
    {
        $categorie = Categorie::find($Categorie_id);
        return view('Articles.create')->with('categorie',$categorie);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'Article_titre' => 'required',
                'Article_text' => 'required',
                'Article_image' => 'nullable'
            ]
        );
        $article = new Article;
        $article->Article_titre = $request->input('Article_titre');
        $article->Article_text = $request->input('Article_text');
        if ( $request->input('Article_image'))
        $article->Article_image = $request->input('Article_image');
        else
        $article->Article_image= "/storage/photos/shares/noimage.jpg";
        $article->Categorie_id = $request->input('Categorie_id');
        $article->save();
        //journal
        $journal = new Journal;
        $journal->Journal_action = 'Insertion';
        $journal->Journal_table = 'articles';
        $journal->Journal_intitule = $article->Article_titre;
        $journal->Journal_user = Session::get('name');
        $journal->save();
        //end journal
        return $this->show($article->Article_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        $article->increment('Article_vue',1);
        $categorie = Categorie::where('Categorie_id',$article->Categorie_id)->get();

        //Getting vars for link
        $l_categories = array();
        $l_categories[0] = $categorie[0];
        $i = 0;

        while ($l_categories[$i]->Cat_id != null ){
            $x= Categorie::find($l_categories[$i]->Cat_id);
            array_push($l_categories,$x);
            $i++;
        }
        $l_categories=array_reverse($l_categories);
        // return


        return view('Articles.show')->with(['article'=>$article,'categorie'=>$categorie,'l_categories'=>$l_categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categorie = Categorie::find($article->Categorie_id);
        return view('Articles.edit')->with(['article'=>$article,'categorie'=>$categorie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
                'Article_titre' => 'required',
                'Article_text' => 'required'
            ]
        );
        $article =  Article::find($id);
        $article->Article_titre = $request->input('Article_titre');
        $article->Article_text = $request->input('Article_text');
        $article->Article_image = $request->input('Article_image');
        $article->Categorie_id = $request->input('Categorie_id');
        $article->save();
        //journal
        $journal = new Journal;
        $journal->Journal_action = 'Modification';
        $journal->Journal_table = 'articles';
        $journal->Journal_intitule = $article->Article_titre;
        $journal->Journal_user = Session::get('name');
        $journal->save();
        //end journal
        return $this->show($id);
        return redirect('Articles/'.$article->Categorie_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $cat = $article->Categorie_id;
        $Categorie2 = $article->Categorie_id;
        $article->delete();
        //journal
        $journal = new Journal;
        $journal->Journal_action = 'Suppression';
        $journal->Journal_table = 'articles';
        $journal->Journal_intitule = $article->Article_titre;
        $journal->Journal_user = Session::get('name');
        $journal->save();
        //end journal
        //send alert to all admins if the user is a moderator
        $user_id=Auth::id();
        app('App\Http\Controllers\EmailController')->AlertDelete($journal,$user_id);

        return redirect('categories/'.$cat);
    }
}
