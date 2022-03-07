<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebController extends Controller
{
    //
    function index()
    {
        $url = "https://bookingapiiiii.herokuapp.com/";

        $book1 = json_decode(Http::get($url . 'sachbanchayfirst'), true);
        $book2 = json_decode(Http::get($url . 'sachbanchaysecond'), true);
        $sachhay = json_decode(Http::get($url . 'sachtimestamps'), true);

        return view('home', ['book1' => $book1, 'book2' => $book2, 'sachhay' => $sachhay, 'active' => 1]);
    }
}
