<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorie;
use App\Theme;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 1;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategorie($Theme_id)
    {
        $theme =  Theme::where("Theme_id",$Theme_id)->get();
        return view('Categories.create')->with('theme',$theme); // this is sending an array and we need to use theme[0] to access the first line
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
            'Theme_type' => 'required',
            'Categorie_intitule' => 'required',
            'Categorie_image' => 'required'
        ]);
        $categorie = new Categorie;
        $categorie->Categorie_intitule = $request->input('Categorie_intitule');
        $categorie->Categorie_image = $request->input('Categorie_image');
        $categorie->Cat_id = $request->input('Categorie_type');
        $categorie->Theme_id = $request->input('Theme_type');
        $categorie->save();
        return redirect('themes');
        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
