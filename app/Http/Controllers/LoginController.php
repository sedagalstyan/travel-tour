<?php

namespace App\Http\Controllers;

use App\Models\PageTitle;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        
        $title = PageTitle::findTitle('login');

        return view('pages.login')->with('title', $title);
    }
    public function login(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt($attributes, ($request->remember == 'on'))){
            session()->regenerate();

            return redirect()->route('locale.profile.index', ['locale' => app()->getLocale()]);
        }

        throw ValidationException::withMessages(['email' => 'Your provided credentials could not be verified.']);
    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
