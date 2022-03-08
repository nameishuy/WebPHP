@extends('layout')

@section('content')
<div class="Product__Container">
    <div class="Product__ListCategory">
        <h6>THỂ LOẠI SẢN PHẨM</h6>
        <ul>
            @foreach ($chude as $chude)
            <li><a href="?chude={{$chude['_id']}}">{{$chude["TenChuDe"]}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="Product__ListProduct">
        <div class="Product__ListProduct-Sort">
            <input type="text" class="form-control" placeholder="Search..." />
            <div class="Product__ListProduct-SortArea">
                <h5>Sắp xếp theo:</h5>
                <select class="form-select" aria-label="-- Loại Sắp Xếp --">
                    <option selected>Giá Tăng Dần</option>
                    <option value="1">Giá Giảm Dần</option>
                </select>
            </div>
        </div>
        <div class="Product__List" style="float: left;">
            <?php

            use App\Http\Controllers\WebController;

            $last = 4;
            $pages = 1;
            $link = "sachpagination";
            $IDCHUDE = null;
            if (isset($_GET["pages"])) {
                $pages = $_GET["pages"];
            }
            if ($_GET["chude"] != "") {
                $link = "sachpaginationbychude/" .  $_GET["chude"];
                $IDCHUDE = $_GET["chude"];
            }
            //Lấy tổng sản phẩm trong data bằng query select count(id) from name_table với JDBC Connect
            $total = WebController::countbook($IDCHUDE);
            $list = WebController::getlist($link, $pages, $last);
            foreach ($list as $data) {

            ?>
                <div class="Book">
                    <div class="Book__Img">
                        <img src="<?php echo $data["Anh"] ?>" alt="">
                    </div>
                    <div class="Book__Content">
                        <div class="Book__Content-BookName">
                            <h3><?php echo $data["Tensach"] ?></h3>
                            <p class="Book__Content-Author"><?php echo $data["TenTG"] ?></p>
                            <p class="Book__Content-Price"><?php echo $data["Giaban"] ?>đ</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <ul class="pagination" id="pagination">
            <?php
            //Button Number pages
            $loop = 0;
            $num = 0;
            if (($total / 4) % 2 == 0) {
                $num = $total / 4;
            } else {
                $num = ($total + 1) / 4;
            }
            //Nếu total lẻ thêm 1
            if ($total % 2 != 0) {
                $loop = ($total / 4) + 1;
            } else {
                //Nếu total chẵn nhỏ hơn fullpage và # fullPage thì thêm 1
                if ($total < ($num * 4) + 4 && $total != $num * 4) {
                    $loop = ($total / 4) + 1;
                } else {
                    //Nếu bằng fullPage thì không thêm
                    $loop = ($total / 4);
                }
            }
            //Lap so pages
            for ($i = 1; $i <= $loop; $i++) {
            ?>
                <?php
                if ($pages == $i) {
                ?>
                    <li class="page-item"><a class="page-link" href="?pages=<?php echo $i ?>&chude=<?php echo $IDCHUDE ?>"><?php echo $i ?></a></li>
                <?php
                } else {
                ?>
                    <li class="page-item"><a class="page-link" href="?pages=<?php echo $i ?>&chude=<?php echo $IDCHUDE ?>"><?php echo $i ?></a></li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
</div>
@endsection