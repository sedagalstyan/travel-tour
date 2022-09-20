<?php

namespace App\Http\Controllers;

use App\Models\PageMeta;
use App\Models\PageTitle;
use App\Models\Review;
use App\Models\Tour;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    public function index(){
        
        $title = PageTitle::findTitle('tours');
        $tours = Tour::paginate(8);
        $metas = PageMeta::findMeta('tours');

        $datas = [
            'tours' => $tours,
            'metas' => $metas
        ];

        return view('pages.tours', compact('datas'))->with('title', $title);
    }
    public function tour($lang, $destination, Tour $tour_id){
        $title = Tour::select('title_'.app()->getLocale().'')->where('id', $tour_id['id'])->get();
        $tour = Tour::findOrFail($tour_id['id']);
        $reviews = Review::where('tour_id', $tour_id['id'])->get();

        $datas = [
            'tour' => $tour,
            'reviews' => $reviews
        ];

        return view('pages.tour', compact('datas'))->with('title', $title);
    }
}
