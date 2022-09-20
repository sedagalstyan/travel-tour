<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageTitle;
use Illuminate\Http\Request;

class AdminPagesTitlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = PageTitle::findTitle('pages-titles');
        $pages_titles = PageTitle::paginate(15);

        return view('admin.pages.pages-titles.page-title', compact('pages_titles'))->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = PageTitle::findTitle('pages-titles');

        return view('admin.pages.pages-titles.create')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title_en' => 'required|unique:pages_titles',
            'title_hy' => 'required|unique:pages_titles',
            'page' => 'required|unique:pages_titles'
        ]);

        if($attributes){
            PageTitle::create($attributes); 
            session()->flash('success', 'Title added successfully!');

            return redirect()->route('locale.admin.pages-titles.index', ['locale' => app()->getLocale()]);
        }else{
            session()->flash('error', 'Could not add!');
            return redirect()->route('locale.admin.pages-titles.create', ['locale' => app()->getLocale()]);
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
        $page_title = PageTitle::findOrFail($id);

        return view('admin.pages.pages-titles.edit', compact('page_title'))->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, PageTitle $pages_title)
    {  
        $pages_title->update($request->all());
        session()->flash('success', 'Updated successfully!');

        return redirect()->route('locale.admin.pages-titles.index', ['locale' => app()->getLocale()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, PageTitle $pages_title)
    {
        $pages_title->delete();

        session()->flash('success', 'Title deleted successfully!!');

        return redirect()->route('locale.admin.pages-titles.index', ['locale' => app()->getLocale()]);
    }
}
