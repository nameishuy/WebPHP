<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
                return App::call('App\Http\Controllers\WebController@index');
            }else{
                return view('signin');
            }
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
                return  App::call('App\Http\Controllers\WebController@index');
            }
            return view('signup');
        }
    }

    function updatepass(Request $req)
    {
        if ($req->session()->has('UserLogin')) {
            if (isset($req->session()->get('UserLogin')['id'])) {
                $id = $req->session()->get('UserLogin')['id'];
                $oldpass = $req->input('oldpass');
                $newpass = $req->input('newpass');
                $compass = $req->input('compass');
                if ($newpass !=  $compass) {
                    return back()->with('mess', 'Mật Khẩu Mới Không Khớp');
                }
                if (isset($oldpass) && isset($newpass) && isset($compass)) {
                    $data = Http::put('https://bookingapiiiii.herokuapp.com/khachhangmk', [
                        "id" => $id,
                        "Matkhaued" => $oldpass,
                        "newMatkhau" =>  $newpass,
                        "ConfirmMatKhau" =>  $compass
                    ]);
                    if (isset($data['id'])) {
                        return back()->with('mess', 'Cập Nhật Thành Công!');
                    } else {
                        return  back()->with('mess', 'Mật Khẩu Hiện Tại Không Đúng!');
                    }
                }
                return  back()->with('mess', 'Cập Nhật Không Thành Công!');
            }
        }
    }
    function profile(Request $req)
    {
        if ($req->session()->has('UserLogin')) {
            if (isset($req->session()->get('UserLogin')['id'])) {
                $id = $req->session()->get('UserLogin')['id'];
                $fullname = $req->input('ten');
                $mail = $req->input('mail');
                $diachi = $req->input('diachi');
                $sdt = $req->input('sdt');
                $date = $req->input('date');
                if ($req->has('image')) {
                    $image = base64_encode(file_get_contents($req->file('image')->path()));
                    $image_base64 = 'data:image/jpeg;base64,' . $image;
                    if (isset($mail) && isset($diachi) && isset($sdt) && isset($date) && isset($fullname) && isset($image_base64)) {
                        $data = Http::put('https://bookingapiiiii.herokuapp.com/khachhang', [
                            "id" => $id,
                            "HoTen" => $fullname,
                            "Anh" => $image_base64,
                            "Email" =>  $mail,
                            "DiachiKH" =>  $diachi,
                            "DienthoaiKH" => $sdt,
                            "Ngaysinh" => $date
                        ]);
                        $req->session()->remove('UserLogin');
                        $req->session()->put('UserLogin', $data);
                        if (isset($data['id'])) {
                            return  view('profile', ['data' => $data, 'mess', 'Cập Nhật Thành Công!']);
                        }
                        return back()->with('mess', 'Cập Nhật Không Thành Công!');
                    }
                } else {
                    if (isset($mail) && isset($diachi) && isset($sdt) && isset($date) && isset($fullname)) {
                        $data = Http::put('https://bookingapiiiii.herokuapp.com/khachhang', [
                            "id" => $id,
                            "HoTen" => $fullname,
                            "Email" =>  $mail,
                            "DiachiKH" =>  $diachi,
                            "DienthoaiKH" => $sdt,
                            "Ngaysinh" => $date
                        ]);
                        $req->session()->remove('UserLogin');
                        $req->session()->put('UserLogin', $data);
                        if (isset($data['id'])) {
                            return  view('profile', ['data' => $data, 'mess', 'Cập Nhật Thành Công!']);
                        }
                        return back()->with('mess', 'Cập Nhật Không Thành Công!');
                    }
                }
            }
        }
    }
}
