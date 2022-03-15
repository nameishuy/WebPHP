<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;


class AdminController extends Controller
{

    function AdminIndex(Request $req)
    {

        if (isset($req->session()->get("UserLogin")["Role"])) {
            if ($req->session()->get("UserLogin")["Role"] == true) {
                return view('admin_index');
            } else return view('admin_notAdmin');
        } else return view('admin_notAdmin');
    }

    function AdminSetting(Request $req)
    {
        if (isset($req->session()->get("UserLogin")["Role"])) {
            if ($req->session()->get("UserLogin")["Role"] == true) {
                return view('admin_setting');
            } else return view('admin_notAdmin');
        } else return view('admin_notAdmin');
    }

    function AdminStorage(Request $req)
    {
        if (isset($req->session()->get("UserLogin")["Role"])) {
            if ($req->session()->get("UserLogin")["Role"] == true) {
                $last = 2;
                $pages = 1;

                if (isset($_GET["pages"])) {
                    $pages = $_GET["pages"];
                }

                $url = "https://bookingapiiiii.herokuapp.com/";              
                $listcount = json_decode(Http::get($url . 'sach'), true);
                $list = json_decode(Http::get($url . 'sachpagination/' . $pages . "/" . $last), true);

                return view('admin_storage', ['list' => $list, 'total' => count($listcount), 'pages' => $pages, 'last' => $last]);
            } else return view('admin_notAdmin');
        } else return view('admin_notAdmin');
    }

    function AdminAccount(Request $req)
    {
        if (isset($req->session()->get("UserLogin")["Role"])) {
            if ($req->session()->get("UserLogin")["Role"] == true) {
                $last = 3;
                $pages = 1;

                if (isset($_GET["pages"])) {
                    $pages = $_GET["pages"];
                }

                $url = "https://bookingapiiiii.herokuapp.com/";
                $role = "false";
                $listUsercount = json_decode(Http::get($url . 'khachhangforadmin/' . $role), true);
                $listUser = json_decode(Http::get($url . 'khachhangforadmin/' . $role . "/" . $pages . "/" . $last), true);

                return view('admin_account', ['listUser' => $listUser, 'total' => count($listUsercount), 'pages' => $pages, 'last' => $last]);
            } else return view('admin_notAdmin');
        } else return view('admin_notAdmin');
    }

    function AdminBill(Request $req)
    {
        if (isset($req->session()->get("UserLogin")["Role"])) {
            if ($req->session()->get("UserLogin")["Role"] == true) {
                $last = 3;
                $pages = 1;

                if (isset($_GET["pages"])) {
                    $pages = $_GET["pages"];
                }

                $url = "https://bookingapiiiii.herokuapp.com/";               
                $listcount = json_decode(Http::get($url . 'DonHang'), true);
                $list = json_decode(Http::get($url . 'DonHang/' . $pages . "/" . $last), true);
                return view('admin_billpay', ['list' => $list, 'total' => count($listcount), 'pages' => $pages, 'last' => $last]);
            } else return view('admin_notAdmin');
        } else return view('admin_notAdmin');
    }
}
