@extends('layout')

@section('content')

<section class="py-5 my-5">
    <div class="container">
        <div class="bg-white shadow rounded-lg d-block d-sm-flex">
            <div class="profile-tab-nav border-right">
                <div class="p-4">
                    <div class="img-circle text-center mb-3">
                        <img src="https://i.imgur.com/6eIvKOg.jpg" alt="Image" class="shadow">
                    </div>
                    <h4 class="text-center">{{$data['HoTen']}}</h4>
                    <input type="file" accept="image/*">
                </div>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                        <i class="fa fa-home text-center mr-1"></i>
                        Cập Nhật Tài Khoản
                    </a>
                    <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                        <i class="fa fa-key text-center mr-1"></i>
                        Đổi Mật Khẩu
                    </a>
                </div>
            </div>
            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <h3 class="mb-4">Account Settings</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Họ Và Tên</label>
                                <input type="text" class="form-control" value="{{$data['HoTen']}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Địa Chỉ</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số Điện Thoại</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ngày Sinh</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" (click)="updateInfo()">Cập Nhật</button>
                    </div>
                </div>
                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                    <h3 class="mb-4">Password Settings</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mật Khẩu Hiện Tại</label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mật Khẩu Mới</label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Xác Nhận Mật Khẩu</label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" (click)=" UpdataPass()">Đổi Mật Khẩu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection