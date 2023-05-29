<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    function register(Request $request){
        $validatedData=$request->validate([
            'name'=>'required|string|min:2',
            'email'=>'required|email',
            'password'=>'required|string|min:8',
        ]);

        $user=User::create([
            'name'=>$validatedData['name'],
            'email'=>$validatedData['email'],
            'password'=>bcrypt($validatedData['password']),
        ]);

        return response()->json(['massage'=>'Registration successful','user'=>$user]);
    }
}
