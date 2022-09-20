<?php

namespace App\Http\Controllers;

use App\Models\PageTitle;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    { 
        $title = PageTitle::findTitle('about-us');

        return view('pages.about')->with('title', $title);
    }
}
