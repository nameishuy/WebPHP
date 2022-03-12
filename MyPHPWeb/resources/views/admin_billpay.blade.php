@extends('admin')
@section('admincontent')
    <div class="Admin__HistoryPay-Header">
        <div class="Title__infoPay">
            <div class="Title__BillID">Mã Đơn</div>
            <div class="Title__Username">Tên Khách</div>
            <div class="Title__role">Thời Gian Đặt</div>
        </div>
        <div class="Title__Setting">Thiết Lập</div>
    </div>
    <div class="Admin__HistoryPay-Body">
        <div class="Admin__HistoryPay-Details">
            <div class="Bill__infoPay">
                <div class="Bill__BillID">E531</div>
                <div class="Bill__Username">Doãn Chí Bình</div>
                <div class="Bill__DatePay">12/3/2022</div>
            </div>
            <div class="Bill__Setting">
                <div class="Bill__Setting-details" onclick="showDialog()">Chi
                    Tiết</div>
            </div>
        </div>
    </div>
@endsection