<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $attributes = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(auth()->guard('admin')->attempt($attributes, ($request->remember == 'on'))){
            session()->regenerate();

            return redirect()->route('locale.admin.users.index', ['locale' => app()->getLocale()]);
        }

        throw ValidationException::withMessages(['username' => 'Your provided credentials could not be verified.', 'password' => 'The password is incorrect.']);
    }
    public function destroy(){
        auth()->guard('admin')->logout();

        return redirect()->route('locale.admin.login', ['locale' => app()->getLocale()]);
    }
}
