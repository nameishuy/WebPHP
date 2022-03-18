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


    function product(Request $req)
    {
        $url = "https://bookingapiiiii.herokuapp.com/";

        $chude = json_decode(Http::get($url . 'chude'), true);
        $search = $req->input('search');
        return view('products', ['chude' => $chude]);
    }

    public static function countbook()
    {

        $linkbook = "https://bookingapiiiii.herokuapp.com/sach";
        if (isset($_GET["chude"])) {
            $linkbook = "https://bookingapiiiii.herokuapp.com/sachbyCD/" . $_GET["chude"];
        } elseif (isset($_GET["search"])) {
            $linkbook = "https://bookingapiiiii.herokuapp.com/sachbyname";
            $book = json_decode(Http::post($linkbook, ["name" => $_GET["search"]]), true);
            return count($book);
        }
        $book = json_decode(Http::get($linkbook), true);
        return count($book);
    }

    public static function getlist($pages, $last)
    {
        $url = "https://bookingapiiiii.herokuapp.com/sachpagination/" . $pages . "/" . $last;
        //
        if (isset($_GET["chude"])) {
            //
            $url = "https://bookingapiiiii.herokuapp.com/sachpaginationbychude/" . $_GET["chude"] . "/" . $pages . "/" . $last;

            //
        } elseif (isset($_GET["search"])) {
            //
            $url = "https://bookingapiiiii.herokuapp.com/sachpaginationSearch";
            //
            $book = json_decode(Http::post($url, [
                "keyword" => $_GET["search"],
                "page" => $pages,
                "limit" => $last
            ]), true);
            //
            return $book;
        }
        //
        $book = json_decode(Http::get($url), true);
        //      
        return $book;
    }

    public static function ifEmptyCart(Request $req)
    {
        return true;
    }


    function details(Request $req)
    {
        $id = "";
        $url = "https://bookingapiiiii.herokuapp.com/";
        if (isset($_GET["id"])) {
            $id =   $_GET['id'];
            $url =  $url . "sachbyid/" . $id;
        }
        $bookdetails = json_decode(Http::get($url), true);    
        return view('details', ['details' => $bookdetails]);
    }

    function cart(Request $req){
        //$req->session()->remove("idbookforcart");
        
        if(isset($_GET['id'])){
            $itemCart = [
                "id" => $_GET['id'],
                "name" => $_GET['name'],
                "image" => $_GET['image']. '&token=' . $_GET['token'],
                "price" => $_GET['price'],
                "count" => 1
            ];
            if ($req->session()->get("idbookforcart") != null) {
                $arr = $req->session()->get("idbookforcart");
                $length = 1;
                foreach($arr as $item){

                    if($item['id'] == $itemCart['id']){
                        $item['count'] += 1;
                        

                        $req->session()->put("idbookforcart",$arr);
                        break;
                    }
                    if($item['id'] != $itemCart['id'] && $length == count($arr)){
                        array_push($arr,$itemCart);
                        $req->session()->put("idbookforcart",$arr);  
                    }
                    $length++;
                }
   
            } else {
                $arr = array($itemCart);
                $req->session()->put("idbookforcart",$arr);
            }
        }
        if (session()->has('UserLogin')) {
            
            if (isset(session()->get('UserLogin')['id'])) {
                $id = session()->get('UserLogin')['id'];
                $data = Http::get('https://bookingapiiiii.herokuapp.com/khachhangbyid/' . $id);
                

                return view('cart', ['data' => $data, 'listCart' => $req->session()->get("idbookforcart")]);
            } else return view('cart', ['data','listCart' => $req->session()->get("idbookforcart")]);
        }else return view('cart', ['data','listCart' => $req->session()->get("idbookforcart")]);
    }
}
