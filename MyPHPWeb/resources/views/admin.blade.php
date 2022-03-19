<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin</title>
    <link rel="stylesheet" href="/css/admin/admin.css">
    <link rel="stylesheet" href="/css/admin/body_admin.css">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light border-bottom border-3 align-items-center">
        <div class="container-fluid justify-content-around align-items-center">
            <a class="navbar-brand d-flex align-items-center me-md-auto ms-md-5" href="/">
                <ion-icon name="book-outline"></ion-icon> MBook
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav text-center p-md-3 mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/admin">Trang Chủ</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page"
                            href="/admin/account-manager">Tài Khoản</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/bill-pay">Hóa Đơn</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/storage-products">Hàng Tồn Kho</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/admin/setting">Thiết Lập</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/add-newbook">Thêm Sách Mới</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="DialogDetailsPay__Container" id="DialogDetailsPay__Container">
        <div id="DialogDetailsPay" class="DialogDetailsPay">
            <div class="DialogDetailsPay__CloseBtn" onclick="closeDialog()">
                <ion-icon name="close-circle-outline"></ion-icon>
            </div>
            <div class="DialogDetailsPay__infoUser">
                <h1>THÔNG TIN ĐƠN HÀNG</h1>
                <div class="DialogDetailsPay__infoUser-Details">
                    <span>
                        <span style="font-weight: bold;">Tên Khách Hàng: </span><span id="Ten"></span>
                    </span>
                    <span>
                        <span style="font-weight: bold;">Mã Đơn Hàng: </span><span id="Ma"></span>
                    </span>
                    <span>
                        <span style="font-weight: bold;">Ngày Đặt: </span><span style="font-weight: bold;"
                            id="Date"></span>
                    </span>
                    <span>
                        <span style="font-weight: bold;">Tổng Tiền: </span><span style="color: red; font-weight: 600;"
                            id="Money"></span>đ
                    </span>
                    <span>
                        <span style="font-weight: bold;">Tình Trạng: </span><span style="color: red; font-weight: 600;"
                            id="TinhTrangFalse"></span><span style="color: green; font-weight: 600;"
                            id="TinhTrangTrue"></span>
                    </span>
                </div>
            </div>

            <div class="DialogDetailsPay__infoPay">
                <div class="DialogDetailsPay__Title-Image">Ảnh</div>
                <div class="DialogDetailsPay__Title-BookName">Tên Sách</div>
                <div class="DialogDetailsPay__Title-Count">Số Lượng</div>
                <div class="DialogDetailsPay__Title-Price">Thành Tiền</div>
            </div>

            <script>
                function showDialog(idBill) {
                    let details = document
                        .getElementById("DialogDetailsPay__Container");
                    details.style.display = "block";
                    this.getData("DonHangbyid/" + idBill).then(data => {
                        let money = new Intl.NumberFormat('vi-VN', {
                            maximumSignificantDigits: 6
                        }).format(data[0].TongTien)
                        document.getElementById('Ten').innerHTML = data[0].HoTen;
                        document.getElementById('Ma').innerHTML = data[0].id;
                        document.getElementById('Date').innerHTML = data[0].Ngaydat;
                        document.getElementById('Money').innerHTML = money;
                        if (data[0].Tinhtranggiaohang) {
                            document.getElementById('TinhTrangTrue').innerHTML = "Đã Giao Hàng";

                        } else {
                            document.getElementById('TinhTrangFalse').innerHTML = "Chưa Giao Hàng";
                        }

                    }).catch(err => {
                        alert(err)
                    })
                    this.getData("CTDonHangbyid/" + idBill).then(result => {
                        for (let data of result) {
                            let money = new Intl.NumberFormat('vi-VN', {
                                maximumSignificantDigits: 6
                            }).format(data.Dongia + data.Soluong)

                            document.getElementById("DialogDetailsPay").innerHTML +=
                                '  <div class="DialogDetailsPay__infoPay-Details"><div class="DialogDetailsPay__Image"><img id="Anh" src="' +
                                data.Anhbia + '" alt="#"></div><div id="Tensach" class="DialogDetailsPay__BookName">' + data
                                .Tensach + '</div><div id="Soluong" class="DialogDetailsPay__Count">' + data.Soluong +
                                '</div><div id="Dongia" class="DialogDetailsPay__Price">' + money + '</div></div>';

                        }
                    }).catch(err => {
                        alert(err)
                    })
                }
            </script>
        </div>
    </div>
    <div class="DialogDeleteAccount__Container" id="Dialog_Messenger">
        <div class="DialogDeleteAccount">
            <div class="DialogDeleteAccount__CloseBtn" onclick="closeDialogDeleteAccount()">
                <ion-icon name="close-circle-outline"></ion-icon>
            </div>
            <div class="DialogDeleteAccount__infoUser">
                <h1 style="margin: auto;">Bạn Muốn Xóa Tài Khoản Này?</h1>
                <h1>Tất Cả Dữ Liệu Của Tài Khoản Này Sẽ Bị Mất</h1>
            </div>
            <div class="DeleteAccount__Setting">
                <div class="DeleteAccount__Setting-details DeleteAccount__Setting-YES" onclick="DeleteAccount()">
                    Yes
                </div>
                <div class="DeleteAccount__Setting-details" onclick="closeDialogDeleteAccount()">
                    No
                </div>
            </div>
        </div>
    </div>
    <div class="DialogChangeDetailsProduct__Container" id="DialogChangeDetailsProduct__Container">
        <div class="DialogChangeDetailsProduct">
            <div class="DialogChangeDetailsProduct__CloseBtn" onclick="closeDialogChangeDetails()">
                <ion-icon name="close-circle-outline"></ion-icon>
            </div>
            <form id="UpdateBook">
                <div class="DialogChangeDetailsProduct__changeDetails">
                    <h1>Cập Nhật</h1>
                    Thêm số lượng tồn: <input type="text" required name="storageNum" id="storageNum">
                    Giá: <input type="text" name="storagePrice" required id="storagePrice">
                </div>
                <button type="submit"
                    class="DialogChangeDetailsProduct__Setting-details DialogChangeDetailsProduct__Setting-YES">
                    Cập Nhật
                </button>
            </form>
        </div>
    </div>
    <div class="Body__Container">
        @yield('admincontent')
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        let Role
        let userid
        let idbook
        let ListCTBill
        let Anh1 = '';
        let Anh2 = '';
        let Anh3 = '';
        let SolnTon = 0
        let Product__Price = 0

        function closeDialog() {
            let details = document
                .getElementById("DialogDetailsPay__Container");
            details.style.display = "none";
        }

        function showDialogDeleteAccount(id, role) {
            let dialog = document.getElementById("Dialog_Messenger");
            dialog.style.display = "block";
            this.userid = id;
            this.Role = role;
        }

        function closeDialogDeleteAccount() {
            let dialog = document.getElementById("Dialog_Messenger");
            dialog.style.display = "none";
        }

        function closeDialogChangeDetails() {
            let dialog = document.getElementById("DialogChangeDetailsProduct__Container");
            dialog.style.display = "none";
        }
        let IDBOOK;

        function showDialogChangeDetailsProduct(id, gia) {
            let dialog = document.getElementById("DialogChangeDetailsProduct__Container");
            dialog.style.display = "block";
            IDBOOK = id
        }

        const FormUpdate = document.getElementById("UpdateBook");
        FormUpdate.addEventListener("submit", submitFormprofile);

        function submitFormprofile(e) {
            e.preventDefault();
            let dongia = document.getElementById("storagePrice").value;
            let ton = document.getElementById("storageNum").value;
            let check = []
            check.push(dongia > 0);
            check.push(ton > 0);
            if (check.every(va => va === true)) {
                let body = "{\"id\":\"" + IDBOOK + "\",\"Giaban\":" + dongia + ",\"Soluongton\":" + ton + "}"
                put('sach', body).then(res => {
                    if (res._id != null) {
                        alert("Cập Nhật Thành Công")
                        window.location.href = "/admin/storage-products"
                    } else {
                        alert("Đã Xảy Ra Lỗi")
                    }
                }).catch(
                    err => {
                        alert(err)
                    }
                )
            } else {
                alert("Vui Lòng Nhập Lại")
            }
        }

        function DeleteAccount() {
            if (this.Role) {
                alert("Không Thể Xóa Tài Khoản Admin");
            } else {
                this.userid
                this.delteleData("khachhangbyid/" + this.userid).then((result) => {
                    alert("Xóa Thành Công")
                    window.location.href = "{{ route('account-manager') }}"
                }).catch((err) => {
                    alert(err)
                });
            }

        }

        async function getData(url = '') {
            let BookingApi = "https://bookingapiiiii.herokuapp.com/";
            const response = await fetch(BookingApi + url, {
                method: 'GET',
                cache: 'no-cache',
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/json'
                },
            });
            return response.json();
        }

        async function put(url = '', bodyy) {
            let BookingApi = "https://bookingapiiiii.herokuapp.com/";
            const response = await fetch(BookingApi + url, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: bodyy
            });
            return response.json();
        }

        async function delteleData(url = '') {
            let BookingApi = "https://bookingapiiiii.herokuapp.com/";
            console.log(BookingApi + url)
            const response = await fetch(BookingApi + url, {
                method: 'DELETE',
                cache: 'no-cache',
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/json'
                },
            });

            return response.json();
        }
    </script>
</body>

</html>
