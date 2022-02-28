<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Acc;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/link', function () {
    return view('link');
});


Route::post('signin', [Acc::class, 'login'])->name('login');
Route::view('signin', 'signin');

Route::get('/logout', function () {
    if (session()->has('UserLogin')) {
        session()->remove('UserLogin');
    }
    return view('home');
});

Route::post('signup', [Acc::class, 'signup'])->name('signup');
Route::view('signup', 'signup');


Route::post('profile', [Acc::class, 'profile'])->name('profile');
Route::get('/profile', function () {
    if (session()->has('UserLogin')) {
        if (isset(session()->get('UserLogin')['id'])) {
            $id = session()->get('UserLogin')['id'];
            $data = Http::get('https://bookingapiiiii.herokuapp.com/khachhangbyid/' . $id);

            return view('profile', ['data' => $data]);
        }
    }
});