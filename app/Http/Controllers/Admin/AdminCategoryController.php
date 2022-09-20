<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PageTitle;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = PageTitle::findTitle('categories');
        $categories = Category::paginate(15);

        return view('admin.pages.categories.category', compact('categories'))->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = PageTitle::findTitle('add-category');

        return view('admin.pages.categories.create')->with('title', $title);
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
            'title_en' => 'required|unique:categories',
            'title_hy' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
        ]);

        if($attributes){
            Category::create($attributes); 
            session()->flash('success', 'Category added successfully!');

            return redirect()->route('locale.admin.categories.index', ['locale' => app()->getLocale()]);
        }else{
            session()->flash('error', 'Could not add!');
            return redirect()->route('locale.admin.categories.create', ['locale' => app()->getLocale()]);
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
        $category = Category::findOrFail($id);

        return view('admin.pages.categories.edit', compact('category'))->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, Category $category)
    {
        $category->update($request->all());
        session()->flash('success', 'Updated successfully!');

        return redirect()->route('locale.admin.categories.index', ['locale' => app()->getLocale()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, Category $category)
    {
        $category->delete();

        session()->flash('success', 'Category deleted successfully!!');

        return redirect()->route('locale.admin.categories.index', ['locale' => app()->getLocale()]);
    }
}
