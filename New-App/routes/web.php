<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});


// Task 1
Route::post('/register', 'App\Http\Controllers\RegistrationController@register');

// Task 2
Route::get('/home', function () {
    return redirect('/dashboard');
});

// Task 4
Route::middleware(['auth'])->group(function(){
    Route::get('/profile',function(){
        $user=auth()->user();

        return view('profile',['user'=>$user]);
    });

    Route::get('/settings',function(){
        $settings=auth()->user()->settings;

        return view('settings',['settings'=>$settings]);
    });
});


// Task 5
Route::resource('products',ProductController::class);


// Task 6
Route::post('/contact',ContactController::class)->name('contact.submit');


// Task 7
Route::resource('posts',PostController::class);





