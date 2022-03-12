<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin</title>
    <link rel="stylesheet" href="/css/admin/admin.css">
    <link rel="stylesheet" href="/css/admin/body_admin.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <nav
        class="navbar navbar-expand-md navbar-light border-bottom border-3 align-items-center">
        <div class="container-fluid justify-content-around align-items-center">
            <a class="navbar-brand d-flex align-items-center me-md-auto ms-md-5"
                href="/JavaWebMVC/"> <ion-icon name="book-outline"></ion-icon> MBook
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMenu" aria-controls="navbarMenu"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse"
                id="navbarMenu">
                <ul class="navbar-nav text-center p-md-3 mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" aria-current="page"
                        href="/admin/account-manager">Tài Khoản</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/bill-pay">Hóa Đơn</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Thiết Lập</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="DialogDetailsPay__Container" id="DialogDetailsPay__Container">
        <div class="DialogDetailsPay">
            <div class="DialogDetailsPay__CloseBtn" onclick="closeDialog()">
                <ion-icon name="close-circle-outline"></ion-icon>
            </div>
            <div class="DialogDetailsPay__infoUser">
                <h1>THÔNG TIN ĐƠN HÀNG</h1>
                <div class="DialogDetailsPay__infoUser-Details">
                    <span>
                        <span style="font-weight: bold;">Tên Khách Hàng:</span> Doãn Chí Bình
                    </span>
                    <span>
                        <span style="font-weight: bold;">Mã Đơn Hàng:</span> E0531
                    </span>
                    <span>
                        <span style="font-weight: bold;">Ngày Đặt Hàng:</span> 12/3/2022
                    </span>
                    <span>
                        <span style="font-weight: bold;">Tổng Tiền:</span><span style="color: red; font-weight: 600;"> 300.000đ</span>
                    </span>
                    <span>
                        <span style="font-weight: bold;">Tình Trạng: </span><span style="color: red; font-weight: 600;"> Chưa Thanh Toán</span> 
                    </span>
                </div>
            </div>
            <div class="DialogDetailsPay__infoPay">
                <div class="DialogDetailsPay__Title-Image">Ảnh</div>
                <div class="DialogDetailsPay__Title-BookName">Tên Sách</div>
                <div class="DialogDetailsPay__Title-Count">Số Lượng</div>
                <div class="DialogDetailsPay__Title-Price">Thành Tiền</div>
            </div>
            <div class="DialogDetailsPay__infoPay-Details">
                <div class="DialogDetailsPay__Image">
                    <img src="https://taisachmoi.com/wp-content/uploads/2018/12/dac-nhan-tam.jpg" alt="">
                </div>
                <div class="DialogDetailsPay__BookName">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, culpa, ipsum nisi tempore aliquid reprehenderit debitis harum sapiente iste.</div>
                <div class="DialogDetailsPay__Count">3</div>
                <div class="DialogDetailsPay__Price">300.000đ</div>
            </div>
        </div>
    </div>
        <div class="Body__Container">
            @yield('admincontent')
        </div>
    
        <script type="module"
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script type="module"
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <script>
            function showDialog() {
                let details = document
                        .getElementById("DialogDetailsPay__Container");
                details.style.display = "block";
            }
            function closeDialog() {
                let details = document
                        .getElementById("DialogDetailsPay__Container");
                details.style.display = "none";
            }
        </script>
</body>
</html>