<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;

class ActivitesController extends Controller
{
    public function index()
    {

        $themes = Theme::where('Theme_type','activites')->get();
        return view('Themes.index')->with('themes',$themes);
    }
}
