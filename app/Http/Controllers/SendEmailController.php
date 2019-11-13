<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    //
    public function index()
    {
        return view('send_email');
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data = array(
            'name' => $request->name,
            'message' => $request->message
        );
        // this method send message
        // $request->mail to mail na ktorego ma zostac wyslana wiadomosc
        // klasa SendMail jest w folderze App > mail
        Mail::to($request->email)->send(new SendMail($data));
        return back()->with('success', 'Thank for contecting us!');
    }
}
