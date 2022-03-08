<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Acc;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;
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

Route::get('/', [WebController::class, 'index'])->name('home');

Route::get('/link', function () {
    return view('link');
});


Route::post('signin', [Acc::class, 'login'])->name('login');
Route::view('signin', 'signin');
Route::get('/signin',function(){

    if(session()->has('UserLogin')){
        return view('home');
    }else{
        return view('signin');
    }
});

Route::get('/logout', function () {
    if (session()->has('UserLogin')) {
        session()->remove('UserLogin');
    }
    return  App::call('App\Http\Controllers\WebController@index');
});

Route::post('signup', [Acc::class, 'signup'])->name('signup');
Route::view('signup', 'signup');



Route::view('profile', 'profile');
Route::get('/profile', function () {
    if (session()->has('UserLogin')) {
        if (isset(session()->get('UserLogin')['id'])) {
            $id = session()->get('UserLogin')['id'];
            $data = Http::get('https://bookingapiiiii.herokuapp.com/khachhangbyid/' . $id);

            return view('profile', ['data' => $data]);
        }
    }
});
Route::post('profile', [Acc::class, 'profile'])->name('profile');
Route::post('updatepass', [Acc::class, 'updatepass'])->name('updatepass');

Route::get('/products', [WebController::class, 'product'])->name('product');
