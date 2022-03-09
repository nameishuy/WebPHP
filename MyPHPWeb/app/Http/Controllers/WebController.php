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


    function product()
    {
        $url = "https://bookingapiiiii.herokuapp.com/";

        $chude = json_decode(Http::get($url . 'chude'), true);     

        return view('products', ['chude' => $chude]);
    }

    public static function countbook($MaCD)
    {
        $linkbook = null;
        if ($MaCD == null) {
            $linkbook = "https://bookingapiiiii.herokuapp.com/sach";
        } else {
            $linkbook = "https://bookingapiiiii.herokuapp.com/sachbyCD/" . $MaCD;
        }
        $book = json_decode(Http::get($linkbook), true);
        return count($book);
    }

    public static function getlist($link, $pages, $last)
    {
        $url = "https://bookingapiiiii.herokuapp.com/" . $link . "/" . $pages . "/" . $last;
        $book = json_decode(Http::get($url), true);     
        return $book;
    }
}
