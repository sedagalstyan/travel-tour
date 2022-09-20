<?php

namespace App\Http\Controllers;

use App\Actions\SendMail;
use App\Models\PageTitle;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        
        $title = PageTitle::findTitle('contact');

        return view('pages.contact')->with('title', $title);
    }
    public function contact(SendMail $sendMail, Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|max:30',
            'surname' => 'required|max:30',
            'email' => 'required|email',
            'message' => 'required|min:10'
        ]);

        $message = '<html>
                        <body>
                            <div style="font: 14px/1.5 Arial, Tahoma, Verdana, sans-serif">
                                <p style="margin-bottom: 5px;">Name - '.$attributes['name'].'</p>
                                <p style="margin-bottom: 5px;">Surname - '.$attributes['surname'].'</p>
                                <p style="margin-bottom: 5px;">Email - '.$attributes['email'].'</p>
                                <p style="margin-bottom: 5px;">Message - '.$attributes['message'].'</p>
                            </div>
                        </body>
                    </html>';

        $sendMail->handle('sedagalstyann@gmail.com', $attributes['name'], $attributes['email'], '', 'Contact', $message);

        return redirect()->back();
    }
}
