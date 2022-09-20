<?php

namespace App\Http\Controllers;

use App\Actions\SendMail;
use App\Models\PageTitle;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function index()
    {
        $title = PageTitle::findTitle('signup');

        return view('pages.signup')->with('title', $title);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|max:30',
            'surname' => 'required|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:30'
        ]);
        
        session()->put('attr_signup', $attributes);

        $this->sendOTPCode($attributes);

        return redirect()->route('locale.verification', ['locale' => app()->getLocale()]);
    }
    public function sendOTPCode()
    {
        $otp_code = random_int(100000, 999999);
        session()->put('otp_code', $otp_code);

        $sendMail = new SendMail();

        $message = '<html>
                        <body>
                            <div style="font: 14px/1.5 Arial, Tahoma, Verdana, sans-serif">
                                <p style="margin-bottom: 10px;">Your OTP code is - '.$otp_code.'</p>
                            </div>
                        </body>
                    </html>';

        $sent = $sendMail->handle(session('attr_signup')['email'], session('attr_signup')['name'], 'sedagalstyann@gmail.com', '', 'OTP Code', $message);

        if($sent){
            session()->flash('success', 'The OTP code sent!');
        }else{
            session()->flash('error', 'Mail error try again');
        }

        return redirect()->route('locale.verification', ['locale' => app()->getLocale()]);
    }
}
