let Role;
let userid;
let idbook;
let ListCTBill;
let Anh1 = "";
let Anh2 = "";
let Anh3 = "";
let SolnTon = 0;
let Product__Price = 0;

function closeDialog() {
    let details = document.getElementById("DialogDetailsPay__Container");
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
    let dialog = document.getElementById(
        "DialogChangeDetailsProduct__Container"
    );
    dialog.style.display = "none";
}
let IDBOOK;
let GIA;

function showDialogChangeDetailsProduct(id, gia) {
    let dialog = document.getElementById(
        "DialogChangeDetailsProduct__Container"
    );
    dialog.style.display = "block";
    IDBOOK = id;
    GIA = gia;
    document.getElementById("storagePrice").value = gia;
}

//Update Storage
const FormUpdate = document.getElementById("UpdateBook");
FormUpdate.addEventListener("submit", submitFormprofile);
function submitFormprofile(e) {
    e.preventDefault();
    let dongia = document.getElementById("storagePrice").value;
    let ton = document.getElementById("storageNum").value;
    let check = [];
    check.push(dongia > 0);
    check.push(ton > 0);
    if (check.every((va) => va === true)) {
        let body =
            '{"id":"' +
            IDBOOK +
            '","Giaban":' +
            dongia +
            ',"Soluongton":' +
            ton +
            "}";
        put("sach", body)
            .then((res) => {
                if (res._id != null) {
                    alert("Cập Nhật Thành Công");
                    window.location.href = "/admin/storage-products";
                } else {
                    alert("Đã Xảy Ra Lỗi");
                }
            })
            .catch((err) => {
                alert(err);
            });
    } else {
        alert("Vui Lòng Nhập Lại");
    }
}

//Add New Book
const FormAddBook = document.getElementById("formNewBook");
FormAddBook.addEventListener("submit", submitFormAddBook);

function submitFormAddBook(e) {
    e.preventDefault();
    let tensach = document.getElementById("inputName").value;
    let mota = document.getElementById("inputDesc").value;
    let nxb = document.getElementById("inputNXB").value;
    let tacgia = document.getElementById("inputTG").value;
    let chude = document.getElementById("inputCD").value;
    let Soln = document.getElementById("inputSoLuong").value;
    let Gia = document.getElementById("inputPrice").value;

    let check = [];
    check.push(tensach != null);
    check.push(mota != null);
    check.push(nxb != null);
    check.push(tacgia != null);
    check.push(chude != null);
    check.push(Soln != null);
    check.push(Gia != null);

    if (check.every((va) => va === true)) {
        if (!(typeof img1 == "undefined")) {
            const chudearr = [];
            chudearr.push(chude);

            const files = document.getElementById("inputImage");
            const formData = new FormData();
            for (let i = 0; i < files.files.length; i++) {
                formData.append("img", files.files[i]);
            }
            postimg(formData).then(async (res) => {
                if (res.data != null) {
                    let linkAnh =
                        "https://bookingapiiiii.herokuapp.com/open-image/" +
                        res.data;
                    let body =
                        '{"Tensach":"' +
                        tensach +
                        '","Mota":"' +
                        mota +
                        '","Anhbia":"' +
                        linkAnh +
                        '","Soluongton":' +
                        Soln +
                        ',"Giaban":' +
                        Gia +
                        ',"MaCD":["' +
                        chudearr +
                        '"],"MaNXB":"' +
                        nxb +
                        '","MaTacGia":"' +
                        tacgia +
                        '"}';
                    console.log(body);
                    await fetch("https://bookingapiiiii.herokuapp.com/sach", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: body,
                    })
                        .then((result) => {                           
                            alert(result);
                        })
                        .catch((err) => {                          
                            alert(err);
                        });
                } else {
                    alert(res.Messager);
                }
            });
        } else {
            alert("Vui Lòng Nhập Lại");
        }
    }
}

function DeleteAccount() {
    if (this.Role) {
        alert("Không Thể Xóa Tài Khoản Admin");
    } else {
        this.userid;
        this.delteleData("khachhangbyid/" + this.userid)
            .then((result) => {
                alert("Xóa Thành Công");
                window.location.href = "{{ route('account-manager') }}";
            })
            .catch((err) => {
                alert(err);
            });
    }
}

async function getData(url = "") {
    let BookingApi = "https://bookingapiiiii.herokuapp.com/";
    const response = await fetch(BookingApi + url, {
        method: "GET",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json",
        },
    });
    return response.json();
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

async function put(url = "", bodyy) {
    let BookingApi = "https://bookingapiiiii.herokuapp.com/";
    const response = await fetch(BookingApi + url, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
        },
        body: bodyy,
    });
    return response.json();
}

async function delteleData(url = "") {
    let BookingApi = "https://bookingapiiiii.herokuapp.com/";
    console.log(BookingApi + url);
    const response = await fetch(BookingApi + url, {
        method: "DELETE",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json",
        },
    });

    return response.json();
}

function showDialog(idBill) {
    let details = document.getElementById("DialogDetailsPay__Container");
    details.style.display = "block";

    $.ajax({
        url: "account-manager/" + idBill,
        type: "GET",
    }).done((res) => {
        $("#DialogDetailsPay").empty();
        $("#DialogDetailsPay").html(res);
    });
}
