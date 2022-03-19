<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;

use function PHPUnit\Framework\isEmpty;

class WebController extends Controller
{
    //
    function index()
    {
        $url = "https://bookingapiiiii.herokuapp.com/";
        $listBanner = json_decode(Http::get($url . 'Banner'), true);
        $book1 = json_decode(Http::get($url . 'sachbanchayfirst'), true);
        $book2 = json_decode(Http::get($url . 'sachbanchaysecond'), true);
        $sachhay = json_decode(Http::get($url . 'sachtimestamps'), true);


        return view('home', ['book1' => $book1, 'book2' => $book2, 'sachhay' => $sachhay, 'active' => 1, 'listBanner' => $listBanner]);
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

    function cart(Request $req)
    {
        if (isset($_GET['id'])) {
            $itemCart = [
                "id" => $_GET['id'],
                "name" => $_GET['name'],
                "image" => $_GET['image'] . '&token=' . $_GET['token'],
                "price" => $_GET['price'],
                "count" => 1
            ];


            if ($req->session()->get("idbookforcart") != null) {
                $arr = $req->session()->get("idbookforcart");
                $length = 1;
                foreach ($arr as $item) {

                    if ($item['id'] == $itemCart['id']) {
                        $item['count'] += 1;
                        $req->session()->put("idbookforcart", $arr);
                        break;
                    }
                    if ($item['id'] != $itemCart['id'] && $length == count($arr)) {
                        array_push($arr, $itemCart);
                        $req->session()->put("idbookforcart", $arr);
                    }
                    $length++;
                }
            } else {
                $arr = array($itemCart);
                $req->session()->put("idbookforcart", $arr);
            }
        }
        if (isset($_GET['deleteid'])) {
            $objNeed = [];
            $arr = $req->session()->get("idbookforcart");
            foreach ($arr as $item) {
                if ($item['id'] == $_GET['deleteid']) {
                    $objNeed = $item;
                    break;
                }
            }
            if (($key = array_search($objNeed, $arr)) !== false) {
                unset($arr[$key]);
            }

            $req->session()->put("idbookforcart", $arr);
        }

        if (isset($_GET['deleteAll'])) {
            $req->session()->put("idbookforcart", []);
        }

        if (isset($_GET['pay'])) {
            if ($req->session()->get("idbookforcart") != null) {
                $dagiao = false;
                $dathanhtoan = false;
                $date = date('Y-m-d H:i:s');
                $kh = session()->get('UserLogin')['id'];
                $total = 0;
                $masach = [];
                $soluongcheck = [];
                foreach (session()->get('idbookforcart') as $item) {
                    array_push($masach, $item['id']);
                    array_push($soluongcheck, $item['count']);
                    $total += $item['price'] * $item['count'];
                }

                if (isset($kh) && isset($date) && $masach != [] && $soluongcheck != []) {
                    $data = json_decode(Http::post('https://bookingapiiiii.herokuapp.com/DonHang', [
                        "Dathanhtoan" => $dathanhtoan,
                        "Tinhtranggiaohang" => $dagiao,
                        "Ngaydat" => $date,
                        "TongTien" =>  $total,
                        "MaKH" =>  $kh,
                        "MasachCheck" => $masach,
                        "SoluongCheck" => $soluongcheck
                    ]), true);
                    if (isset($data['_id'])) {

                        Http::post("");












                        $req->session()->put("idbookforcart", []);

                        return view('/cart', ['listCart' =>
                        $req->session()->get("idbookforcart"), 'mess' => "Đặt hàng thành công nhá"]);
                    } else {
                        return view('/cart', ['listCart' => $req->session()->get("idbookforcart"), 'mess' => "Đặt hàng thất bại nhá"]);
                    }
                }
            } else {
                if (session()->has('UserLogin')) {
                    if (isset(session()->get('UserLogin')['id'])) {
                        if (isset($_POST['inputNum'])) {
                            dd("inputNum");
                        }
                    }
                } else {
                    // do nothing
                }
            }
        }
        if (session()->has('UserLogin')) {

            if (isset(session()->get('UserLogin')['id'])) {
                $id = session()->get('UserLogin')['id'];
                $data = Http::get('https://bookingapiiiii.herokuapp.com/khachhangbyid/' . $id);


                return view('cart', ['data' => $data, 'listCart' => $req->session()->get("idbookforcart")]);
            } else return view('cart', ['data', 'listCart' => $req->session()->get("idbookforcart")]);
        } else return view('cart', ['data', 'listCart' => $req->session()->get("idbookforcart")]);
    }

    function plusCountItem(Request $req)
    {
        if (isset($_GET['id'])) {
            if ($req->session()->get("idbookforcart") != null) {
                $arr = $req->session()->get("idbookforcart");
                $arrrr = [];
                foreach ($arr as $item) {
                    if ($item['id'] == $_GET['id']) {
                        $item['count'] += 1;
                    }
                    array_push($arrrr, $item);
                }
                $req->session()->remove("idbookforcart");
                $req->session()->put("idbookforcart", $arrrr);
            }
        }
        if (session()->has('UserLogin')) {

            if (isset(session()->get('UserLogin')['id'])) {
                $id = session()->get('UserLogin')['id'];
                $data = Http::get('https://bookingapiiiii.herokuapp.com/khachhangbyid/' . $id);


                return view('cart', ['data' => $data, 'listCart' => $req->session()->get("idbookforcart")]);
            } else return view('cart', ['data', 'listCart' => $req->session()->get("idbookforcart")]);
        } else return view('cart', ['data', 'listCart' => $req->session()->get("idbookforcart")]);
    }

    function minusCountItem(Request $req)
    {
        if (isset($_GET['id'])) {
            if ($req->session()->get("idbookforcart") != null) {
                $arr = $req->session()->get("idbookforcart");
                $arrrr = [];
                foreach ($arr as $item) {
                    if ($item['id'] == $_GET['id']) {
                        if ($item['count'] == 1) {
                            break;
                        } else {
                            $item['count'] -= 1;
                        }
                    }
                    array_push($arrrr, $item);
                }
                $req->session()->remove("idbookforcart");
                $req->session()->put("idbookforcart", $arrrr);
            }
        }
        if (session()->has('UserLogin')) {

            if (isset(session()->get('UserLogin')['id'])) {
                $id = session()->get('UserLogin')['id'];
                $data = Http::get('https://bookingapiiiii.herokuapp.com/khachhangbyid/' . $id);


                return view('cart', ['data' => $data, 'listCart' => $req->session()->get("idbookforcart")]);
            } else return view('cart', ['data', 'listCart' => $req->session()->get("idbookforcart")]);
        } else return view('cart', ['data', 'listCart' => $req->session()->get("idbookforcart")]);
    }
}
