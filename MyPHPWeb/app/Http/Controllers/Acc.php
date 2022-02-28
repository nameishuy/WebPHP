<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class Acc extends Controller
{
    function login(Request $req)
    {
        $tk = $req->input('username');
        $pass = $req->input('pass');
        if (isset($tk) && isset($pass)) {
            $data = Http::post('https://bookingapiiiii.herokuapp.com/login', [
                "Taikhoan" =>  $tk,
                "Matkhau" =>  $pass
            ]);
            $req->session()->put('UserLogin', $data);
            if (isset($data['id'])) {
                return  view('home');
            }
            return view('signin');
        }
    }

    function signup(Request $req)
    {
        $fullname = $req->input('fullname');
        $tk = $req->input('username');
        $pass = $req->input('pass');
        $compass = $req->input('compass');
        if (isset($tk) && isset($pass) && isset($compass) && isset($fullname)) {
            $data = Http::post('https://bookingapiiiii.herokuapp.com/khachhang', [
                "HoTen" => $fullname,
                "Taikhoan" =>  $tk,
                "Matkhau" =>  $pass,
                "ConfirmMatKhau" => $compass
            ]);
            $req->session()->put('UserLogin', $data);
            if (isset($data['id'])) {
                return  view('home');
            }
            return view('signup');
        }
    }

    function profile(Request $req)
    {
        $fullname = $req->input('ten');
        $mail = $req->input('mail');
        $diachi = $req->input('diachi');
        $sdt = $req->input('sdt');
        $date = $req->input('date');
        if (isset($mail) && isset($diachi) && isset($sdt) && isset($date) && isset($fullname)) {
            $data = Http::post('https://bookingapiiiii.herokuapp.com/khachhang', [
                "HoTen" => $fullname,
                "Email" =>  $mail,
                "DiachiKH" =>  $diachi,
                "DienthoaiKH" => $sdt,
                "Ngaysinh" => $date
            ]);
            $req->session()->put('UserLogin', $data)['HoTen'];
            if (isset($data['id'])) {
                return  view('profile');
            }
            return view('profile',$data['Messenger']);
        }
    }
}
