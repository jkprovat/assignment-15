<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'message'=>'required|string',
        ]);

        Mail::send([],[],function($message)use($validatedData){
            $message->to('jkp.jakaria@gmail.com')->subject('Contact Form Submission')->setBody("
            Name:{$validatedData['name']}
            Email:{$validatedData['email']}
            Message:{$validatedData['message']}
            ");
        });

        return redirect()->back()->with('success','Thank you for your message!');
    }
}
