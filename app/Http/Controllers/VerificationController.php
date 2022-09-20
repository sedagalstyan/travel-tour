<?php

namespace App\Http\Controllers;

use App\Models\PageTitle;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function index()
    {
        $title = PageTitle::findTitle('verification');
        
        return view('pages.verification')->with('title', $title);
    }
    
    public function verificate(Request $request)
    {   
        $otp_code = $request->validate([
            'otp-code' => 'required|min:6|max:6',
        ]);

        if(session()->has('otp_code') && ($otp_code['otp-code'] == session('otp_code'))){
            User::create(session('attr_signup')); 

            session()->flash('success', 'You have succesfully registered!');
            session()->forget('attr_signup');
            
            return redirect()->route('locale.login', ['locale' => app()->getLocale()]);
        }else{
            session()->flash('error', 'The OTP code is wrong, Try again!');

            return redirect()->route('locale.signup', ['locale' => app()->getLocale()]);
        }
    }
}
