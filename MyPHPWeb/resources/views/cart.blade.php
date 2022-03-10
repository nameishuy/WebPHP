@extends('layout')

@section('content')
<div class="Cart__Container">
    <h3>GIỎ HÀNG</h3>
    <div class="Cart__Body">
        <div class="Cart__Products">
            <div class="Cart__Products-Header">
                <div class="Checkbox__All-Product">
                    <input type="checkbox" name="" class="checkbox" id="checkbox__all-product" onclick="onCheckAll()">
                </div>
                <span>Chọn tất cả (1 sản phẩm)</span>
                <div class="Title__Count">Số lượng</div>
                <div class="Title__Price">Giá</div>
                <div style="flex-basis: 5%;"></div>
            </div>
            <div class="Cart__Products-Body">
                <div class="Cart__Products-item">
                    <div class="checkbox__product">
                        <input type="checkbox" name="" class="checkbox" id="checkbox__product">
                    </div>
                    <div class="imgbook">
                        <img src="https://cdn0.fahasa.com/media/catalog/product/cache/1/image/400x400/9df78eab33525d08d6e5fb8d27136e95/b/_/b_-s_ch-ctst_1_3.jpg" class="Img__Book" alt="">
                    </div>
                    <a class="Cart__Products-BookName">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa culpa a adipisci quia debitis sint expedita quisquam, assumenda asperiores dolorem, id ratione explicabo qui earum non aliquam maxime, corrupti illum!
                    </a>
                    <div class="Cart__Products-group-product-info">

                        <div class="Cart__Products-Count">
                            <div class="Cart__Products-Button">
                                <button onclick="lessProducts()">
                                    <img src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/icons-remove.svg"
                                        alt="remove-icon" width="20" height="20">
                                </button>
                                <input id="inputNum" type="text" value="1" placeholder="1" class="input">
                                <button onclick="moreProducts()">
                                    <img src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/icons-add.svg"
                                        alt="add-icon" width="20" height="20">
                                </button>
                            </div>
                        </div>
                        <span>186.000đ</span>
                        <ion-icon class="trash" name="trash-outline"></ion-icon>
                    </div>

                </div>
            </div>
            <div class="Cart__Products-Footer">
                Cập Nhật Giá
            </div>
        </div>
        <div class="Cart__Bill">
            <h2>HÓA ĐƠN</h2>
            <div class="Cart__Bill-Info">
                <span class="Cart__Bill-Info-Name">
                    Tên: Đông Gia Huy
                </span>
                <span class="Cart__Bill-Info-BillID">
                    Mã Giao Dịch: E0534
                </span>
                <span class="Cart__Bill-Info-Date">
                    Ngày Giao Dịch: 09/03/2022
                </span>
            </div>
            <div class="Cart__Bill-Pay">
                <div class="Cart__Bill-Pay-Price">
                    Tổng <span>186.000đ</span>
                </div>
                <div class="Cart__Bill-Pay-BtnPay">
                    Thanh Toán
                </div>
            </div>
        </div>
    </div>
</div>
@endsection