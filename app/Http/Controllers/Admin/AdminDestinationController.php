<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\PageTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = PageTitle::findTitle('destinations');
        $destinations = Destination::paginate(15);

        return view('admin.pages.destinations.destination', compact('destinations'))->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = PageTitle::findTitle('add-destination');

        return view('admin.pages.destinations.create')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Destination $destination)
    {
        $attributes = $request->validate([
            'title_en' => 'required|unique:destinations',
            'title_hy' => 'required|unique:destinations',
            'slug' => 'required|unique:destinations',
            'img' => 'required|image|mimes:jpg,png,jpeg|dimensions:min_width=100'
        ]);

        if($attributes){
            $id = Destination::create(request()->all())->id; 

            if($request->hasFile('img')){
                $filename = 'destination-'.$id.'.'.$request->file('img')->getClientOriginalExtension();

                $request->file('img')->storeAs('images/destinations', $filename, 'public');
                
                Destination::where('id', $id)->update(['img' => $filename]);
            }

            session()->flash('success', 'Category added successfully!');

            return redirect()->route('locale.admin.destinations.index', ['locale' => app()->getLocale()]);
        }else{
            session()->flash('error', 'Could not add!');
            return redirect()->route('locale.admin.destinations.create', ['locale' => app()->getLocale()]);
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
        $destination = Destination::findOrFail($id);

        return view('admin.pages.destinations.edit', compact('destination'))->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, Destination $destination)
    {
        $destination->update($request->all());

        if($request->hasFile('img')){
            $filename = 'destination-'.$destination['id'].'.'.$request->file('img')->getClientOriginalExtension();

            $request->file('img')->storeAs('images/destinations', $filename, 'public');
            $destination->update(['img' => $filename]);
        }

        session()->flash('success', 'Updated successfully!');

        return redirect()->route('locale.admin.destinations.index', ['locale' => app()->getLocale()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, Destination $destination)
    {
        $destination->delete();

        if(Storage::exists('public/images/destinations/'.$destination['img'].'')){
            Storage::delete('public/images/destinations/'.$destination['img'].'');
        }

        session()->flash('success', 'Destination deleted successfully!!');

        return redirect()->route('locale.admin.destinations.index', ['locale' => app()->getLocale()]);
    }
}
