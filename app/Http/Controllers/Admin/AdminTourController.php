<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Destination;
use App\Models\PageTitle;
use App\Models\Tour;
use App\Services\ImageModifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = PageTitle::findTitle('tours');
        $tours = Tour::paginate(15);

        return view('admin.pages.tours.tour', compact('tours'))->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = PageTitle::findTitle('add-tour');
        $categories = Category::getAll();
        $destinations = Destination::getAll();

        $datas = [
            'categories' => array($categories),
            'destinations' => array($destinations),
        ];

        return view('admin.pages.tours.create', compact('datas'))->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tour $tour)
    {
        $days_en = [
            'days' => []
        ];

        $days_hy = [
            'days' => []
        ];

        $attributes = $request->validate([
            'img' => 'required|image|mimes:jpg,png,jpeg|dimensions:min_width=2000',
            'title_en' => 'required',
            'title_hy' => 'required',
            'descr_en' => 'required',
            'descr_hy' => 'required',
            'price' => 'required|numeric',
            'discount' => 'numeric|min:0|max:100',
            'duration_en' => 'required',
            'duration_hy' => 'required',
            'min_age' => 'required',
            'max_people' => 'required',
            'availability' => 'required',
            'from_en' => 'required',
            'to_en' => 'required',
            'from_hy' => 'required',
            'to_hy' => 'required',
            'destination' => 'required',
            'category' => 'required'
        ]);

        $duration_en = filter_var($request['duration_en'], FILTER_SANITIZE_NUMBER_INT);
        $duration_hy = filter_var($request['duration_hy'], FILTER_SANITIZE_NUMBER_INT);

        if(($request['days'] != $duration_en) || ($request['days'] != $duration_hy)){
            session()->flash('error', 'Days and duration fields have not same value');

            return redirect()->back();
        }

        for($i = 1; $i <= $request['days']; $i++){

            $attr = $request->validate([
                'daytitle'.$i.'_en' => 'required',
                'daydescr'.$i.'_en' => 'required',
                'daytitle'.$i.'_hy' => 'required',
                'daydescr'.$i.'_hy' => 'required'
            ]);

            if(!$attr){
                session()->flash('error', 'Fill in all the fields for the day');
                
                return redirect()->back();
            }else{
                array_push($days_en['days'], ['title' => $request['daytitle'.$i.'_en'].'', 'descr' => ['info' => $request['daydescr'.$i.'_en']]]);
                array_push($days_hy['days'], ['title' => $request['daytitle'.$i.'_hy'].'', 'descr' => ['info' => $request['daydescr'.$i.'_hy']]]);
            }
        }

        $request['availability'] = date('Y-m-d', strtotime($request['availability']));

        $requestModified = [
            'img' => $request['img'],
            'title_en' => $request['title_en'],
            'title_hy' => $request['title_hy'],
            'descr_en' => $request['descr_en'],
            'descr_hy' => $request['descr_hy'],
            'days_en' => $days_en,
            'days_hy' => $days_hy,
            'price' => $request['price'],
            'discount' => $request['discount'],
            'duration_en' => $request['duration_en'],
            'duration_hy' => $request['duration_hy'],
            'min_age' => $request['min_age'],
            'max_people' => $request['max_people'],
            'availability' => $request['availability'],
            'available_seats' => $request['max_people'],
            'from_en' => $request['from_en'],
            'to_en' => $request['to_en'],
            'from_hy' => $request['from_hy'],
            'to_hy' => $request['to_hy'],
            'destination_id' => $request['destination'],
            'category_id' => $request['category']
        ];
            
        if($attributes){
            $id = Tour::create($requestModified)->id; 

            if($request->hasFile('img')){
                $filename = 'tour-'.$id.'.'.$request->file('img')->getClientOriginalExtension();

                $request->file('img')->storeAs('images/tours', $filename, 'public');
                Tour::where('id', $id)->update(['img' => $filename]);

                $image = new ImageModifier();

                // resize img
                $image->load($request->file('img')->getPathName());
                $image->crop(500, 500);
                $image->save(storage_path().'/app/public/images/tours/thumbs/'.$filename.'');
            }

            session()->flash('success', 'Tour added successfully!');

            return redirect()->route('locale.admin.tours.index', ['locale' => app()->getLocale()]);
        }else{
            session()->flash('error', 'Could not add!');
            return redirect()->route('locale.admin.tours.create', ['locale' => app()->getLocale()]);
        }
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
    public function edit($lang, $id)
    {
        $title = PageTitle::findTitle('edit');
        $tour = Tour::findOrFail($id);
        $categories = Category::getAll();
        $destinations = Destination::getAll();

        $datas = [
            'tour' => array($tour),
            'categories' => array($categories),
            'destinations' => array($destinations),
        ];

        return view('admin.pages.tours.edit', compact('datas'))->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, Tour $tour)
    {   
        $request['availability'] = date('Y-m-d', strtotime($request['availability']));

        $duration_en = filter_var($request['duration_en'], FILTER_SANITIZE_NUMBER_INT);
        $duration_hy = filter_var($request['duration_hy'], FILTER_SANITIZE_NUMBER_INT);

        if(($request['days'] != $duration_en) || ($request['days'] != $duration_hy)){
            session()->flash('error', 'Days and duration fields have not same value');

            return redirect()->back();
        }

        $days_en = [
            'days' => []
        ];

        $days_hy = [
            'days' => []
        ];

        for($i = 1; $i <= $request['days']; $i++){

            $attr = $request->validate([
                'daytitle'.$i.'_en' => 'required',
                'daydescr'.$i.'_en' => 'required',
                'daytitle'.$i.'_hy' => 'required',
                'daydescr'.$i.'_hy' => 'required'
            ]);

            if(!$attr){
                session()->flash('error', 'Fill in all the fields for the day');
                
                return redirect()->back();
            }else{
                array_push($days_en['days'], ['title' => $request['daytitle'.$i.'_en'].'', 'descr' => ['info' => $request['daydescr'.$i.'_en']]]);
                array_push($days_hy['days'], ['title' => $request['daytitle'.$i.'_hy'].'', 'descr' => ['info' => $request['daydescr'.$i.'_hy']]]);
            }
        }

        $tour->update($request->all());
        $tour->update(['days_en' => $days_en, 'days_hy' => $days_hy]);

        if($request->hasFile('img')){
            if(Storage::exists('public/images/tours/'.$tour['img'].'')){
                Storage::delete('public/images/tours/'.$tour['img'].'');
            }

            $filename = 'tour-'.$tour['id'].'.'.$request->file('img')->getClientOriginalExtension();

            $request->file('img')->storeAs('images/tours', $filename, 'public');
            $tour->update(['img' => $filename]);

            $image = new ImageModifier();

            // resize img
            $image->load($request->file('img')->getPathName());
            $image->crop(500, 500);
            $image->save(storage_path().'/app/public/images/tours/thumbs/'.$filename.'');
        }

        session()->flash('success', 'Updated successfully!');

        return redirect()->route('locale.admin.tours.index', ['locale' => app()->getLocale()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, Tour $tour)
    {
        
        $tour->delete();

        if(Storage::exists('public/images/tours/'.$tour['img'].'')){
            Storage::delete('public/images/tours/'.$tour['img'].'');
        }

        session()->flash('success', 'Tour deleted successfully!!');

        return redirect()->route('locale.admin.tours.index', ['locale' => app()->getLocale()]);

    }
}
