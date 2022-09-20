<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PageTitle;
use App\Models\Tour;
use Illuminate\Http\Request;

class SearchToursCotroller extends Controller
{
    public function index()
    {
        $title = PageTitle::findTitle('search-tours');
        $category = Category::getAll();
        $tours = Tour::latest()
        ->filter(request(['keyword', 'destination', 'duration', 'month', 'rating', 'min_price', 'max_price', 'min_age', 'category']))
        ->paginate(0);

        $datas = [
            'tours' => $tours,
            'category' => $category
        ];

        return view('pages.search-tours', compact('datas'))->with('title', $title);
    }
}
