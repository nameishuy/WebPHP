@extends('layout')

@section('content')
<div class="DialogDetailsHistoryPay__Container"
id="DialogDetailsHistoryPay__Container">
<div class="DialogDetailsHistoryPay">
    <div class="DialogDetailsHistoryPay__CloseBtn"
        onclick="closeDialog_HistoryPay()">
        <ion-icon name="close-circle-outline"></ion-icon>
    </div>
    <div class="DialogDetailsHistoryPay__infoUser">
        <h1>THÔNG TIN ĐƠN HÀNG</h1>
        <div class="DialogDetailsHistoryPay__infoUser-Details">
            <span> <span style="font-weight: bold;">Tên Khách
                    Hàng: </span> Tên Khách
            </span> <span> <span style="font-weight: bold;">Mã Đơn Hàng:
            </span> ID
            </span> <span> <span style="font-weight: bold;">Ngày Đặt
                    Hàng: </span> 16/3/2022
            </span> <span> <span style="font-weight: bold;">Tổng Tiền: </span><span
                style="color: red; font-weight: 600;"> 300.000đ</span>
            </span> <span> <span style="font-weight: bold;">Tình Trạng:
            </span><span style="color: red; font-weight: 600;"> Chưa Giao Hàng</span>
            </span> <span> <span style="font-weight: bold;">Tình Trạng:
            </span><span style="color: rgba(12, 134, 1, 0.767); font-weight: 600;">
                    Đã Giao Hàng</span>
            </span>
        </div>
    </div>
    <div class="DialogDetailsHistoryPay__infoPay">
        <div class="DialogDetailsHistoryPay__Title-Image">Ảnh</div>
        <div class="DialogDetailsHistoryPay__Title-BookName">Tên Sách</div>
        <div class="DialogDetailsHistoryPay__Title-Count">Số Lượng</div>
        <div class="DialogDetailsHistoryPay__Title-Price">Thành Tiền</div>
    </div>
    <div class="DialogDetailsHistoryPay__infoPay-Details">
        <div class="DialogDetailsHistoryPay__Image">
            <img
                src="https://firstnews.com.vn/public/uploads/products/dac-nhan-tam-biamem2019-76k-bia11.jpg"
                alt="Ảnh Sách">
        </div>
        <div class="DialogDetailsHistoryPay__BookName">Tên Sách</div>
        <div class="DialogDetailsHistoryPay__Count">Số Lượng</div>
        <div class="DialogDetailsHistoryPay__Price">100.000đ</div>
    </div>
</div>
</div>





<div class="HistoryPay__Container">
<h1>Lịch sử mua hàng</h1>
<div class="HistoryPay__Header">

    <div class="HistoryPay__Title-BillID">Mã Đơn</div>
    <div class="HistoryPay__Title-Status">Trạng Thái</div>
    <div class="HistoryPay__Title-DatePay">Thời Gian Đặt</div>

    <div class="HistoryPay__Title-Setting">Thiết Lập</div>
</div>
<div class="HistoryPay__Body">
    <?php foreach ($listHistoryPay as $data) { ?>
        <div class="HistoryPay__Details">

            <div class="HistoryPay__Bill-BillID"><?php echo $data->_id; ?></div>
            <?php if($data->Dathanhtoan == true){ ?>
                <?php if($data->Tinhtranggiaohang == true){ ?>
                        <div class="HistoryPay__Bill-Status" style="color: rgb(50, 238, 50)">Đã Giao Hàng</div>
                        
                <?php }else{ ?>
                        <div class="HistoryPay__Bill-Status" style="color: red">Chưa Giao Hàng</div>
                <?php } ?>
            <?php }else{ ?>
                    <div class="HistoryPay__Bill-Status" style="color: red">Chưa Thanh Toán</div>
            <?php } ?>
            <div class="HistoryPay__Bill-DatePay"><?php echo $data->Ngaydat; ?></div>

            <div class="HistoryPay__Bill-Setting">
                <div class="HistoryPay__Bill-Setting-details"
                    onclick="showDialog_HistoryPay()">Chi Tiết</div>
            </div>
        </div>
    <?php } ?>

</div>
</div>


<script>
    function showDialog_HistoryPay() {
        let details = document
                .getElementById("DialogDetailsHistoryPay__Container");
        details.style.display = "block";
    }
    function closeDialog_HistoryPay() {
        let details = document
                .getElementById("DialogDetailsHistoryPay__Container");
        details.style.display = "none";
    }
</script>
@endsection