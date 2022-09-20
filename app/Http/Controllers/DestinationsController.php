<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\PageMeta;
use App\Models\PageTitle;
use App\Models\Tour;

class DestinationsController extends Controller
{
    public function index(){
        
        $title = PageTitle::findTitle('destinations');
        $metas = PageMeta::findMeta('destinations');

        $datas = [
            'metas' => $metas
        ];

        return view('pages.destinations', compact('datas'))->with('title', $title);
    }
    public function destination($lang, $slug){
        $title = Destination::select('title_'.app()->getLocale().'')->where('slug', $slug)->get();
        $id = Destination::select('id')->where('slug', $slug)->first();
        $tours = Tour::where('destination_id', $id['id'])->paginate(4);
        
        $datas = [
            'tours' => $tours,
        ];
        
        return view('pages.tours', compact('datas'))->with('title', $title);
    }
}