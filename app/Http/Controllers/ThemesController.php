<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Categorie;

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function afficher($Theme_type)
    {

            $themes = Theme::where('Theme_type',$Theme_type)->get();
            return view('Themes.index')->with('themes',$themes);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($theme_type)
    {

        return view('Themes.create')->with('theme_type',$theme_type);
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
            'Theme_intitule' => 'required',
            'Theme_image' => 'nullable'
        ]);
        $theme = new Theme;
        $theme->Theme_type = $request->input('Theme_type');
        $theme->Theme_intitule = $request->input('Theme_intitule');
        if ( $request->input('Theme_image'))
        $theme->Theme_image = $request->input('Theme_image');
        else
            $theme->Theme_image = 'noimage.jpg';
        $theme->save();
        return $this->afficher($theme->Theme_type);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $theme = Theme::find($id);
        $catgories = Categorie::where([['Theme_id',$id],['Cat_id',null]])->get();
        view('Categories.create')->with('theme',$theme);
        return view('Themes.show')->with(['theme'=>$theme , 'categories' => $catgories]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theme = Theme::find($id);
        //return $theme->Theme_intitule;
        return view('Themes.edit')->with('theme',$theme);
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
       $this->validate($request,[  'Theme_type' => 'required',
               'Theme_intitule' => 'required',
               'Theme_image' => 'required'
           ]
       );
        $theme = Theme::find($id);
        $theme->Theme_type = $request->input('Theme_type');
        $theme->Theme_intitule = $request->input('Theme_intitule');
        $theme->Theme_image = $request->input('Theme_image');
        $theme->save();
        return  view('Themes/'.$theme->Theme_type );
        //return $theme;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theme = Theme::find($id);
        //$theme->delete();
        return  redirect('Themes/'.$theme->Theme_type);
    }
}
