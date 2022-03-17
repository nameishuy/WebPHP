<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Acc;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\AdminController;
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
Route::get('/signin', function () {

    if (session()->has('UserLogin')) {
        if (isset($data['id'])) {
            return view('home');
        } else return view('signin');
    } else {
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

Route::view('/products', 'products');
Route::get('/products', [WebController::class, 'product'])->name('product');

Route::view('/cart', 'cart');
Route::get('/cart', [WebController::class, 'cart']);


Route::view('/details', 'details');
Route::get('/details', [WebController::class, 'details']);


//Admin's Route
//Admin's Route
Route::prefix('admin')->group(function () {
    Route::get('', [AdminController::class, 'AdminIndex']);

    Route::get('account-manager', [AdminController::class, 'AdminAccount'])->name('account-manager');
    Route::get('bill-pay', [AdminController::class, 'AdminBill']);
    Route::get('storage-products', [AdminController::class, 'AdminStorage']);
    Route::get('setting', [AdminController::class, 'AdminSetting']);
    Route::get('add-newbook', [AdminController::class, 'AdminAddNewBook']);
});
