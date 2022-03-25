<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
                $url = "https://bookingapiiiii.herokuapp.com/";
                //Check POST For Add New Author, New Category, New Publishing Company:
                // 1. Add New Author
                if (isset($_POST["BtnAddAuthor"])) {
                    $resAuthor = json_decode(Http::post($url . 'tacgia', [
                        'TenTG' => $_POST['inputAuthorName'],
                        'Diachi' => $_POST['inputAuthorAddr'],
                        'Tieusu' => $_POST['inputAuthorHist'],
                        'Dienthoai' => $_POST['inputAuthorPhone'],
                    ]));
                }

                if (isset($_POST["BtnAddCategory"])) {
                    $resAuthor = json_decode(Http::post($url . 'chude', [
                        'TenChuDe' => $_POST['inputCategory']
                    ]));
                }

                if (isset($_POST["BtnAddNXB"])) {
                    $resAuthor = json_decode(Http::post($url . 'nhaxuatban', [
                        'TenNXB' => $_POST['inputNXB'],
                        'Diachi' => $_POST['inputAddress'],
                        'DienThoai' => $_POST['inputPhone']
                    ]));
                }
                return  view('admin_setting');
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
                    if ($_GET["pages"] <= 0) {
                        $pages = 1;
                    } else {
                        $pages = $_GET["pages"];
                    }
                }

                $url = "https://bookingapiiiii.herokuapp.com/";
                $listcount = json_decode(Http::get($url . 'sach'), true);
                $TotalPage = ceil(count($listcount) / $last);
                if ($pages > $TotalPage) {
                    $pages = $TotalPage;
                }
                $list = json_decode(Http::get($url . 'sachpagination/' . $pages . "/" . $last), true);
                if ($listcount == null) {
                    $total = 0;
                } else {
                    $total = count($listcount);
                }
                return view('admin_storage', ['list' => $list, 'total' =>   $total, 'pages' => $pages, 'last' => $last]);
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
                    if ($_GET["pages"] <= 0) {
                        $pages = 1;
                    } else {
                        $pages = $_GET["pages"];
                    }
                }
                $url = "https://bookingapiiiii.herokuapp.com/";
                $role = "false";
                $list = json_decode(Http::get($url . 'khachhangforadmin/' . $role . "/" . $pages . "/" . $last), true);

                return view('admin_account', ['list' => $list, 'pages' => $pages, 'last' => $last]);
            } else return view('admin_notAdmin');
        } else return view('admin_notAdmin');
    }

    function GetBill($idBill, $date, $money, $TT, Request $req)
    {
        $url = "https://bookingapiiiii.herokuapp.com/";
        $listCTBill = json_decode(Http::get($url . 'CTDonHangbyid/' . $idBill), true);

        return view('dialogBill', compact('idBill', 'date', 'money', 'TT', 'listCTBill'));
    }

    function AdminBill(Request $req)
    {
        if (isset($req->session()->get("UserLogin")["Role"])) {
            if ($req->session()->get("UserLogin")["Role"] == true) {
                $last = 3;
                $pages = 1;

                if (isset($_GET["pages"])) {
                    if ($_GET["pages"] <= 0) {
                        $pages = 1;
                    } else {
                        $pages = $_GET["pages"];
                    }
                }
                $url = "https://bookingapiiiii.herokuapp.com/";
                $listcount = json_decode(Http::get($url . 'DonHang'), true);
                $TotalPage = ceil(count($listcount) / $last);
                if ($pages > $TotalPage) {
                    $pages = $TotalPage;
                }
                $list = json_decode(Http::get($url . 'DonHang/' . $pages . "/" . $last), true);
                if ($listcount == null) {
                    $total = 0;
                } else {
                    $total = count($listcount);
                }

                return view('admin_billpay', ['list' => $list, 'total' => $total, 'pages' => $pages, 'last' => $last]);
            } else return view('admin_notAdmin');
        } else return view('admin_notAdmin');
    }

    function AdminAddNewBook(Request $req)
    {
        if (isset($req->session()->get("UserLogin")["Role"])) {
            if ($req->session()->get("UserLogin")["Role"] == true) {
                $url = "https://bookingapiiiii.herokuapp.com/";
                $list = json_decode(Http::get($url . 'GETALL'), true);
                return view('admin_addnewbook', ['list' => $list]);
            } else return view('admin_notAdmin');
        } else return view('admin_notAdmin');
    }
}
