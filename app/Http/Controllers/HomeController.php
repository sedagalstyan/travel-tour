<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\PageMeta;
use App\Models\PageTitle;
use App\Models\Tour;

class HomeController extends Controller
{
    public function index(){
        
        $title = PageTitle::findTitle('home');
        $metas = PageMeta::findMeta('home');
        $top_destinations = Destination::getTops();
        $top_tours = Tour::getTops();

        $datas = [
            'top_destinations' => $top_destinations,
            'top_tours' => $top_tours,
            'metas' => $metas
        ];

        return view('pages.default', compact('datas'))->with('title', $title);
    }
}
