<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebPHP-Laravel</title>

    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/util.css">
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light border-bottom border-3 align-items-center">
        <div class="container-fluid justify-content-around align-items-center">
            <a class="navbar-brand d-flex align-items-center me-md-auto ms-md-5" href="/">
                <ion-icon name="book-outline"></ion-icon>
                MBook
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-center" id="navbarMenu">
                <ul class="navbar-nav text-center p-md-3 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
            @if (isset(Session::get('UserLogin')['HoTen']))
            <div class="dropdown " id="Account_Info">
                <button class="dropdown-toggle bg-dark text-white rounded-pill ms-5 d-flex align-items-center" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    {{Session::get('UserLogin')['HoTen']}}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuAccount">
                    <li><a class="dropdown-item" id="Item__Account" href="/profile">Thông Tin Tài Khoản</a></li>
                    <li><a class="dropdown-item" id="Item__Account" href="#">Admin</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" id="Item__Account" href="/logout">Đăng Xuất</a></li>
                </ul>
            </div>
            @else
            <div class="Account__Area align-items-center" id="Account_Area">
                <a class="text-decoration-none link-dark border border-dark rounded-1 pe-3 ps-3 pt-1 pb-1" id="SignIn" href="/signin">Đăng Nhập</a>
                <a class="text-decoration-none link-light bg-dark border border-dark rounded-1 pe-3 ps-3 pt-1 pb-1" id="SignUp" href="/signup">Đăng Ký</a>
            </div>
            @endif
        </div>
    </nav>




    @yield('content')

    <div class="Footer">
        <div class="Footer__Header">
            <a class="Footer__About-Logo">
                <ion-icon name="book-outline"></ion-icon> MBook
            </a>
            <div class="Footer__About-Slogan" style="font-size: 16px; user-select: none;">
                Kiến thức trong tầm tay bạn
            </div>
        </div>

        <div>
            <div class="Footer_Body">
                <div class="Social__Contact">
                    <h6>LIÊN HỆ</h6>
                    <a class="Social" href="">
                        <ion-icon name="logo-facebook" class="facebook"></ion-icon>/yuhtaro.it/
                    </a>
                    <a class="Social" href="">
                        <ion-icon name="call-outline" class="phone"></ion-icon>0974264707
                    </a>
                    <a class="Social" href="">
                        <ion-icon name="mail-outline" class="mail"></ion-icon>nameishuy@gmail.com
                    </a>
                </div>
                <div class="Footer__About-Contact">
                    <h6>VỀ CHÚNG TÔI</h6>
                    <a href="" class="Footer__About-Link">Giới Thiệu</a>
                    <a href="" class="Footer__About-Link">Tin Tức</a>
                </div>
                <div class="Footer__About-Contact">
                    <h6>NÊN ĐỌC</h6>
                    <a href="" class="Footer__About-Link">Hành Động</a>
                    <a href="" class="Footer__About-Link">Ngôn Tình</a>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.4206639905988!2d106.78291401462326!3d10.855574792267845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175276e7ea103df%3A0xb6cf10bb7d719327!2sHUTECH%20University%20-%20E%20Campus%20(SHTP)!5e0!3m2!1svi!2s!4v1645182904735!5m2!1svi!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

        </div>
    </div>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="js/login.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>