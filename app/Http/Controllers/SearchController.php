<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = Str::lower(session()->get('req'));
        $words = explode(' ' ,$search);
        //$titles = DB::select("select * from articles where Article_titre like '%".$request->input('haha')."%' or Article_text like '%".$request->input('haha')."%'");
        foreach ($words as $word){
        $titles= DB::table('articles')->select('*')
            ->whereRaw('LOWER(`Article_titre`) like (?)', '%'.$word.'%' )
            ->orWhereRaw('LOWER(`Article_text`) like (?)', '%'.$word.'%')
            ->orderby('created_at','desc')
            ->paginate(6);
        $tabs[]=$titles;
        }

        $articles=$tabs[0];


        return view("searchbar.show")->with('articles',$tabs);
    }
    public function store(Request $request)
    {
        $request->session()->put('req',request()->input('search'));
       return $this->index();
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
