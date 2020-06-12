<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::find($id);
        $btn =$_POST['modify'];
        if($btn == 'profil')
        {
            $img =$request->input('image');
            if($img <> null){$user->image = $request->input('image');}
            $user->Nom = $request->input('nom');
            $user->Prenom = $request->input('prenom');
            $user->Date_naissance = $request->input('date_naissance');
            $user->sexe = $request->input('sexe');
            $user->CIN = $request->input('cin');
            $user->Adresse = $request->input('adresse');
            $user->Tel = $request->input('tel');
            $user->save();
        }
        if ($btn == 'pw')
        {

            $pw = $request->input('pwActuel');
            $newpw = $request->input('password');
            if($pw <> $newpw) {
                if (Hash::check($pw,$user->password))
                    {
                    $user->password = Hash::make($request->input('password'));
                    $user->save();
                }
                else {
                    if (Auth::user()->role == 'admin') {
                        $users = User::all();
                        return view('home')->with(['users' => $users, 'test' => $btn]);
                    } else {
                        return view('home')->with('test', $btn);
                    }
                }
            }
            else{
                if (Auth::user()->role == 'admin') {
                    $users = User::all();
                    return view('home')->with(['users' => $users, 'match' => $btn]);
                } else {
                    return view('home')->with('match', $btn);
                }
            }
        }
        return back()->withInput();
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
