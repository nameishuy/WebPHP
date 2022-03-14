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
            if($req->session()->get("UserLogin")["Role"] == true){
                return view('admin_index');
            }else return view('admin_notAdmin');
        }else return view('admin_notAdmin');
    }

    function AdminSetting(Request $req)
    {
        if (isset($req->session()->get("UserLogin")["Role"])) {
            if($req->session()->get("UserLogin")["Role"] == true){
                return view('admin_setting');
            }else return view('admin_notAdmin');
        }else return view('admin_notAdmin');
    }

    function AdminStorage(Request $req)
    {
        if (isset($req->session()->get("UserLogin")["Role"])) {
            if($req->session()->get("UserLogin")["Role"] == true){
                return view('admin_storage');
            }else return view('admin_notAdmin');
        }else return view('admin_notAdmin');
    }

    function AdminAccount(Request $req)
    {
        if (isset($req->session()->get("UserLogin")["Role"])) {
            if($req->session()->get("UserLogin")["Role"] == true){
                
                $url = "https://bookingapiiiii.herokuapp.com/";
                $role = "false";
                $listUser = json_decode(Http::get($url . 'khachhangforadmin/'. $role),true);
                return view('admin_account', ['listUser'=> $listUser]);
            }else return view('admin_notAdmin');
        }else return view('admin_notAdmin');
    }

    function AdminBill(Request $req)
    {
        if (isset($req->session()->get("UserLogin")["Role"])) {
            if($req->session()->get("UserLogin")["Role"] == true){
                return view('admin_billpay');
            }else return view('admin_notAdmin');
        }else return view('admin_notAdmin');
    }
}