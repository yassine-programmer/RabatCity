<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Categorie;
use App\Journal;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function afficher($Theme_type)
    {
            if(Session::get('role')== 'admin' || Session::get('role')== 'moderator')
            $themes = Theme::where('Theme_type',$Theme_type)->get();
                else
            $themes = Theme::where([['Theme_type',$Theme_type],['Theme_archiver',1]])->get();

            return view('Themes.index')->with(['themes'=>$themes,'Theme_type'=>$Theme_type]);
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
            'Theme_description' => 'required',
            'Theme_image' => 'nullable'
        ]);
        $theme = new Theme;
        $theme->Theme_type = $request->input('Theme_type');
        $theme->Theme_intitule = $request->input('Theme_intitule');
        $theme->Theme_description = $request->input('Theme_description');
        if ( $request->input('Theme_image'))
        $theme->Theme_image = $request->input('Theme_image');
        else
            $theme->Theme_image = Storage::disk('azure')->url('photos/shares/noimage.jpg');
        $theme->save();
        //Journal
        $journal = new Journal;
        $journal->Journal_action = 'Insertion';
        $journal->Journal_table = 'themes';
        $journal->Journal_intitule = $theme->Theme_intitule;
        $journal->Journal_user = Session::get('name');
        $journal->save();
        //send alert to all admins if the user is a moderator
        $this->notify($journal);
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
        if(Session::get('role')== 'admin' || Session::get('role')== 'moderator')
        $catgories = Categorie::where([['Theme_id',$id],['Cat_id',null]])->get();
        else
        $catgories = Categorie::where([['Theme_id',$id],['Cat_id',null],['Categorie_archiver',1]])->get();
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
               'Theme_description' => 'required',
               'Theme_image' => 'required'
           ]
       );
        $theme = Theme::find($id);
        $theme->Theme_type = $request->input('Theme_type');
        $theme->Theme_intitule = $request->input('Theme_intitule');
        $theme->Theme_description = $request->input('Theme_description');
        $theme->Theme_image = $request->input('Theme_image');
        $theme->save();
        $journal = new Journal;
        $journal->Journal_action = 'Modification';
        $journal->Journal_table = 'themes';
        $journal->Journal_intitule = $theme->Theme_intitule;
        $journal->Journal_user = Session::get('name');
        $journal->save();
        //send alert to all admins if the user is a moderator
        $this->notify($journal);
        return  $this->afficher($theme->Theme_type);


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
        $theme->delete();
        //journal
        $journal = new Journal;
        $journal->Journal_action = 'Suppression';
        $journal->Journal_table = 'themes';
        $journal->Journal_intitule = $theme->Theme_intitule;
        $journal->Journal_user = Session::get('name');
        $journal->save();
        //end journal
        //send alert to all admins if the user is a moderator
        $user_id=Auth::id();
        app('App\Http\Controllers\EmailController')->AlertDelete($journal,$user_id);
        return  redirect('Themes/'.$theme->Theme_type);
    }
    function notify($journal){
        $user=Auth::user();
        if($user->role == 'moderator')
        {
            app('App\Http\Controllers\EmailController')->Alert($journal,$user);
        }

    }
}
