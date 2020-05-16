<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;


class ServicesController extends Controller
{
    public function index()
    {
        $themes = Theme::where('Theme_type','services')->get();
        return view('Themes.index')->with('themes',$themes);
    }
}
