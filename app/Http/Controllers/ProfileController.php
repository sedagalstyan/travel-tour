<?php

namespace App\Http\Controllers;

use App\Models\PageTitle;
use App\Models\User;
use App\Services\ImageModifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = PageTitle::findTitle('profile');
        $user = User::findOrFail(auth()->user()->id);

        return view('pages.profile', compact('user'))->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id);

        return view('pages.profile-edit', compact('user'))->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, User $profile)
    {
        $updated = $profile->update($request->all());

        if($request->hasFile('avatar')){
            $request->validate([
                'avatar' => 'image|mimes:jpg,png,jpeg|dimensions:min_width=100',
            ]);

            $filename = $profile['id'].'.'.$request->file('avatar')->getClientOriginalExtension();
            $image = new ImageModifier();

            // resize img
            $image->load($request->file('avatar')->getPathName());
            $image->resizeToWidth(300);
            $image->resizeToHeight(300);
            $image->crop(300,300);
            $image->save(storage_path().'/app/public/images/users/'.$filename.'');

            $profile->update(['avatar' => $filename]);
        }

        if($updated){
            session()->flash('success', 'Updated successfully!');

            return redirect()->route('locale.profile.index', ['locale' => app()->getLocale()]);
        }else{
            session()->flash('error', 'Could not updated!');
            return redirect()->route('locale.profile.edit', ['locale' => app()->getLocale()]);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, User $profile)
    {
        $profile->delete();

        session()->flash('success', 'Account deleted successfully!!');

        return redirect()->route('locale.signup', ['locale' => app()->getLocale()]);
    }
}
