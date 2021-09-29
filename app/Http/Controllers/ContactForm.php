<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Controller
{
    public function sendMail(Request $request) {
        $details = [
          'name' => $request->name,
          'email' => $request->email,
          'message' => $request->msg
        ];

        \Mail::send('espaceClient.mailContent',
            $details
            , function($msg) use ($request)
            {
                $msg->from($request['email']);
                $msg->to('autrecmp@gmail.com');
            });
    }
}
