const formProfile = document.getElementById("Profile");
formProfile.addEventListener("submit", submitFormprofile);

function submitFormprofile(e) {
    e.preventDefault();

    const HoTen = document.getElementById("ten").value;
    const Email = document.getElementById("mail").value;
    const DiachiKH = document.getElementById("diachi").value;
    const DienthoaiKH = document.getElementById("sdt").value;
    const Ngaysinh = document.getElementById("date").value;

    let check = [];
    check.push(!(typeof HoTen == "undefined"));
    check.push(!(typeof DienthoaiKH == "undefined"));
    check.push(!(typeof Email == "undefined"));
    check.push(!(typeof Ngaysinh == "undefined"));
    check.push(!(typeof DiachiKH == "undefined"));
    check.push(typeof HoTen == "string");
    check.push(typeof DienthoaiKH == "string");
    check.push(typeof Email == "string");
    check.push(typeof Ngaysinh == "string");
    check.push(typeof DiachiKH == "string");
    let isTrue = (va) => va === true;

    if (check.every(isTrue)) {
        if (typeof idUser == "string" && !(idUser == "")) {
            if (!(typeof imgchoose == "undefined")) {
                const formData = new FormData();
                for (let i = 0; i < imgchoose.files.length; i++) {
                    formData.append("img", imgchoose.files[i]);
                }
                postimg(formData)
                    .then(async (res) => {
                        if (res.data != null) {
                            let linkAnh =
                                "https://bookingapiiiii.herokuapp.com/open-image/" +
                                res.data;
                            await UpdateProfileHaveImg(
                                HoTen,
                                Email,
                                DiachiKH,
                                DienthoaiKH,
                                linkAnh,
                                Ngaysinh
                            )
                                .then((res) => {
                                    alert(res.Messenger);
                                    window.location.href = "/profile";
                                })
                                .catch((err) => {
                                    alert(err);
                                });
                        } else {
                            alert("Upload Ảnh Thất bại");
                        }
                    })
                    .catch((err) => {
                        alert(err);
                    });
            } else {
                UpdateProfile(HoTen, Email, DiachiKH, DienthoaiKH, Ngaysinh)
                    .then((res) => {
                        alert(res.Messenger);
                        window.location.href = "/profile";
                    })
                    .catch((err) => {
                        alert(err);
                    });
            }
        } else {
            alert("Bạn Chưa Đăng Nhập");
        }
    } else {
        alert("Lỗi");
    }
}

const changepass = document.getElementById("changepass");
changepass.addEventListener("submit", Submitchangepass);
async function Submitchangepass(e) {
    e.preventDefault();

    const oldpass = document.getElementById("oldpass").value;
    const newpass = document.getElementById("newpass").value;
    const compass = document.getElementById("compass").value;

    let check = [];
    check.push(!(typeof oldpass == "undefined"));
    check.push(!(typeof compass == "undefined"));
    check.push(!(typeof newpass == "undefined"));
    check.push(typeof oldpass == "string");
    check.push(typeof compass == "string");
    check.push(typeof newpass == "string");
    check.push(!(typeof oldpass == ""));
    check.push(!(typeof compass == ""));
    check.push(!(typeof newpass == ""));

    let isTrue = (va) => va === true;

    if (check.every(isTrue)) {
        if (typeof idUser == "string" && !(idUser == "")) {
            ChangePass(oldpass, newpass, compass)
                .then((res) => {
                    if (res.Messenger == "Cập Nhật Thành Công") {
                        alert(res.Messenger);
                        window.location.href = "/profile";
                    } else {
                        alert(res.Messenger);
                    }
                })
                .catch((err) => {
                    alert(err);
                });
        } else {
            alert("Bạn Chưa Đăng Nhập");
        }
    } else {
        alert("Lỗi");
    }
}

async function postimg(formData) {
    const response = await fetch(
        "https://bookingapiiiii.herokuapp.com/upload-image",
        {
            method: "post",
            body: formData,
        }
    );
    return response.json();
}

async function UpdateProfileHaveImg(
    HoTen,
    Email,
    DiaChi,
    DienThoai,
    Anh,
    Ngaysinh
) {
    let data =
        '{\n"id" : "' +
        idUser +
        '",\n "HoTen": "' +
        HoTen +
        '", \n "Email": "' +
        Email +
        '",\n "DiachiKH": "' +
        DiaChi +
        '",\n "DienthoaiKH" : "' +
        DienThoai +
        '",\n "Ngaysinh": "' +
        Ngaysinh +
        '",\n "Anh":"' +
        Anh +
        '"\n}';
    console.log(data);
    const response = await fetch(
        "https://bookingapiiiii.herokuapp.com/khachhang",
        {
            method: "put",
            headers: {
                "Content-Type": "application/json",
            },
            body: data,
        }
    );
    return response.json();
}
async function UpdateProfile(HoTen, Email, DiaChi, DienThoai, Ngaysinh) {
    let data =
        '{\n"id" : "' +
        idUser +
        '",\n "HoTen": "' +
        HoTen +
        '", \n "Email": "' +
        Email +
        '",\n "DiachiKH": "' +
        DiaChi +
        '",\n "DienthoaiKH" : "' +
        DienThoai +
        '",\n "Ngaysinh": "' +
        Ngaysinh +
        '"\n}';

    const response = await fetch(
        "https://bookingapiiiii.herokuapp.com/khachhang",
        {
            method: "put",
            headers: {
                "Content-Type": "application/json",
            },
            body: data,
        }
    );
    return response.json();
}
async function ChangePass(Matkhaued, newMatkhau, ConfirmMatKhau) {
    let data =
        '{"id":"' +
        idUser +
        '","Matkhaued":"' +
        Matkhaued +
        '","newMatkhau":"' +
        newMatkhau +
        '","ConfirmMatKhau":"' +
        ConfirmMatKhau +
        '"}';

    console.log(data);
    const response = await fetch(
        "https://bookingapiiiii.herokuapp.com/khachhangmk",
        {
            method: "put",
            headers: {
                "Content-Type": "application/json",
            },
            body: data,
        }
    );
    return response.json();
}
