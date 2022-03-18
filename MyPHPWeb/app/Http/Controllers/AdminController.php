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
                        if( isset($_POST["BtnAddAuthor"])){
                                $resAuthor = json_decode(Http::post($url . 'tacgia',[
                                    'TenTG' => $_POST['inputAuthorName'],
                                    'Diachi' => $_POST['inputAuthorAddr'],
                                    'Tieusu' => $_POST['inputAuthorHist'],
                                    'Dienthoai' => $_POST['inputAuthorPhone'],
                                ]));
                        }

                        if(isset($_POST["BtnAddCategory"])){
                            $resAuthor = json_decode(Http::post($url . 'chude',[
                                'TenChuDe' => $_POST['inputCategory']
                            ]));
                        }

                        if( isset($_POST["BtnAddNXB"])){
                            $resAuthor = json_decode(Http::post($url . 'nhaxuatban',[
                                'TenNXB' => $_POST['inputNXB'],
                                'Diachi' => $_POST['inputAddress'],
                                'DienThoai' => $_POST['inputPhone']
                            ]));
                    }

                //             $image1 = base64_encode(file_get_contents($req->file('Banner1')->path()));
                //             $image1_base64 = 'data:image/jpeg;base64,' . $image1;

                //             $image2 = base64_encode(file_get_contents($req->file('Banner2')->path()));
                //             $image2_base64 = 'data:image/jpeg;base64,' . $image2;

                //             $image3 = base64_encode(file_get_contents($req->file('Banner3')->path()));
                //             $image3_base64 = 'data:image/jpeg;base64,' . $image3;

                //             if (isset($image1_base64) && isset($image2_base64) && isset($image3_base64)) {
                //                 $data = Http::put('https://bookingapiiiii.herokuapp.com/Banner', [
                //                     "anh1" => $image2_base64,
                //                     "anh2" => $image1_base64,
                //                     "anh3" => $image3_base64
                //                 ]);

                //                 return  view('admin_setting', ['data' => $data, 'mess', 'Cập Nhật Thành Công!']);
                //             }else {
                //                 return back()->with('mess', 'Cập Nhật Không Thành Công!');
                //             }
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

    function AdminAddNewBook(Request $req)
    {
        if (isset($req->session()->get("UserLogin")["Role"])) {
            if ($req->session()->get("UserLogin")["Role"] == true) {
                return view('admin_addnewbook');
            } else return view('admin_notAdmin');
        } else return view('admin_notAdmin');
    }
}
