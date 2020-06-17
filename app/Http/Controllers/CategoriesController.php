<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorie;
use App\Theme;
use App\Journal;
use Illuminate\Support\Facades\Session;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $_GET['id'];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategorie($Theme_id)
    {
        $theme =  Theme::where("Theme_id",$Theme_id)->get();
        return view('Categories.create')->with(['theme'=>$theme]); // this is sending an array for theme and we need to use theme[0] to access the first line
    }
    public function createSousCategorie($categorieParent_id){
        $categorie_parent=Categorie::where('Categorie_id',$categorieParent_id)->get();
        $theme=Theme::find($categorie_parent[0]->Theme_id);
        return view('Categories.create')->with(['categorie_parent'=>$categorie_parent,'theme'=>$theme]);
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
            'Categorie_intitule' => 'required',
            'Categorie_description' => 'required',
            'Categorie_image' => 'nullable'
        ]);
        $categorie = new Categorie;
        $categorie->Categorie_intitule = $request->input('Categorie_intitule');
        $categorie->Categorie_description = $request->input('Categorie_description');
        if ($request->input('Categorie_image'))
        $categorie->Categorie_image = $request->input('Categorie_image');
        else
            $categorie->Categorie_image ='/storage/photos/shares/noimage.jpg';
        if(empty($categorie->Cat_id)){
            $categorie->Cat_id = $request->input('Cat_id');
        };
        $categorie->Theme_id = $request->input('Theme_id');
        $categorie->save();
        //journal
        $journal = new Journal;
        $journal->Journal_action = 'Insertion';
        $journal->Journal_table = 'categories';
        $journal->Journal_intitule = $categorie->Categorie_intitule;
        $journal->Journal_user = Session::get('name');
        $journal->save();

        if(empty($categorie->Cat_id)){

            return redirect()->action(
                'ThemesController@show',  $categorie->Theme_id
            );
        }
        else
         return redirect('categories/'.$categorie->Cat_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //id is the parent categorie id
    {
        if(Session::get('role')== 'admin' || Session::get('role')== 'moderator')
        {
            $categorie_parent=Categorie::where("Categorie_id",$id)->first();
            $categories_fils=Categorie::where("Cat_id",$id)->get();
            $articles = Article::where("Categorie_id",$id)->get();
        }
        else
        {
            $categorie_parent=Categorie::where([['Categorie_id',$id],['Categorie_archiver',1]])->first();
            $categories_fils=Categorie::where([['Cat_id',$id],['Categorie_archiver',1]])->get();
            $articles = Article::where([['Categorie_id',$id],['Article_archiver',1]])->get();
        }


        //Getting vars for link
        $l_categories = array();
        $l_categories[0] = $categorie_parent;
        $i = 0;

        while ($l_categories[$i]->Cat_id != null ){
            $x= Categorie::find($l_categories[$i]->Cat_id);
            array_push($l_categories,$x);
            $i++;
        }
        $l_categories=array_reverse($l_categories);
        // return
        
        if (count($categories_fils)>0)
         return view('Categories.show')->with(['categories_fils'=>$categories_fils,'categorie_parent'=>$categorie_parent,'l_categories'=>$l_categories]);
        elseif (count($articles)>0)
            return view('Categories.showArticles')->with(['articles'=>$articles,'categorie_parent'=>$categorie_parent,'l_categories'=>$l_categories]);
        else
            return view('Categories.showEmpty')->with(['categorie_parent'=>$categorie_parent,'l_categories'=>$l_categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie=Categorie::find($id);

        return view('Categories.edit')->with('categorie',$categorie);
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
                'Categorie_intitule' => 'required',
                'Categorie_description' => 'required',
                'Categorie_image' => 'nullable'
            ]
        );

        $categorie = Categorie::find($id);
        $categorie->Categorie_intitule = $request->input('Categorie_intitule');
        $categorie->Categorie_description = $request->input('Categorie_description');
        if ($request->input('Categorie_image'))
        $categorie->Categorie_image = $request->input('Categorie_image');
        else
            $categorie->Categorie_image="noimage.jpg";
        $categorie->save();
        //journal
        $journal = new Journal;
        $journal->Journal_action = 'Modification';
        $journal->Journal_table = 'categories';
        $journal->Journal_intitule = $categorie->Categorie_intitule;
        $journal->Journal_user = Session::get('name');
        $journal->save();

        if(empty($categorie->Cat_id)){

            return redirect()->action(
                'ThemesController@show',  $categorie->Theme_id
            );
        }
        else
            return redirect('categories/'.$categorie->Cat_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        //journal
        $journal = new Journal;
        $journal->Journal_action = 'Suppression';
        $journal->Journal_table = 'categories';
        $journal->Journal_intitule = $categorie->Categorie_intitule;
        $journal->Journal_user = Session::get('name');
        $journal->save();
        return back()->withInput();
    }
}
