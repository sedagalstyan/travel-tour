<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageTitle;
use App\Models\User;
use App\Services\ImageModifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = PageTitle::findTitle('admin');
        $users = User::paginate(15);

        return view('admin.pages.users.user', compact('users'))->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = PageTitle::findTitle('add-user');

        return view('admin.pages.users.create')->with('title', $title);
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
            'name' => 'required|max:30',
            'surname' => 'required|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:30'
        ]);

        if($attributes){
            User::create(request()->all()); 
            session()->flash('success', 'User added successfully!');

            return redirect()->route('locale.admin.users.index', ['locale' => app()->getLocale()]);
        }else{
            session()->flash('error', 'Could not add!');
            return redirect()->route('locale.admin.users.create', ['locale' => app()->getLocale()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($lang, User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {
        $title = PageTitle::findTitle('edit');
        $user = User::findOrFail($id);

        return view('admin.pages.users.edit', compact('user'))->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, User $user)
    {
        if($request->has('avatarDel')){
            $path = $request->avatarDel;

            if(Storage::exists('public/images/users/'.$user['avatar'].'')){
                Storage::delete('public/images/users/'.$user['avatar'].'');
            }

            $user->update(['avatar' => $path]);

            session()->flash('success', 'Profile picture deleted successfully!');

            return redirect()->route('locale.admin.users.index', ['locale' => app()->getLocale()]);
        }else{
            $updated = $user->update($request->all());

            if($request->hasFile('avatar')){

                $request->validate([
                    'avatar' => 'image|mimes:jpg,png,jpeg|dimensions:min_width=100',
                ]);

                $filename = $user['id'].'.'.$request->file('avatar')->getClientOriginalExtension();
                $image = new ImageModifier();

                // resize img
                $image->load($request->file('avatar')->getPathName());
                $image->resizeToWidth(300);
                $image->resizeToHeight(300);
                $image->crop(300,300);
                $image->save(storage_path().'/app/public/images/users/'.$filename.'');

                $user->update(['avatar' => $filename]);
            }

            if($updated){
                session()->flash('success', 'Updated successfully!');

                return redirect()->route('locale.admin.users.index', ['locale' => app()->getLocale()]);
            }else{
                session()->flash('error', 'Could not updated!');
                return redirect()->route('locale.admin.users.edit', ['locale' => app()->getLocale()]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, User $user)
    {
        $user->delete();

        session()->flash('success', 'User deleted successfully!!');

        return redirect()->route('locale.admin.users.index', ['locale' => app()->getLocale()]);
    }
}
