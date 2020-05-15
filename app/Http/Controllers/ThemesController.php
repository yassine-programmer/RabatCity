<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::all();
        return view('Themes.index')->with('themes',$themes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Themes.create');
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
            'Theme_image' => 'required'
        ]);
        $theme = new Theme;
        $theme->Theme_type = $request->input('Theme_type');
        $theme->Theme_intitule = $request->input('Theme_intitule');
        $theme->Theme_image = $request->input('Theme_image');
        $theme->save();
        return redirect('themes');
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

        //return $theme->Theme_intitule;
        //return view('Themes.show')->with('theme',$theme);
        return redirect('categories/'.$theme.'/index');

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
        return redirect('themes');
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
        //
    }
}
