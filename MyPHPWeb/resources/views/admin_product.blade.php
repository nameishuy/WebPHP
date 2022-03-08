@extends('admin')

@section('admin')
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Product</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/admin_home">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Product</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

<a href="#" class="ADD-Btn">
    <p class="text">THÊM SẢN PHẨM</p>
    <p class="icon">&#43;</p>
</a>
<a href="#" class="ADD-Btn2">
    <p class="text">THÊM LOẠI CHỦ ĐỀ</p>
    <p class="icon">&#43;</p>
</a>
<a href="#" class="ADD-Btn2">
    <p class="text">THÊM NHÀ XUẤT BẢN</p>
    <p class="icon">&#43;</p>
</a>

<table class="table" border="1">
    <tr>
        <th>
            Tên Sách
        </th>
        <th>
            Ảnh
        </th>
        <th>
            Giá bán
        </th>
        <th>
            Tác giả
        </th>
        <th>
            Nhà Xuất Bản
        </th>
        <th>
            Ngày cập nhật
        </th>
        <th>
            Số lượng tồn
        </th>
        <th>
            Chủ đề
        </th>
        <th></th>
    </tr>

    
        <tr>
            <td>
                {{-- @Html.DisplayFor(modelItem => item.TenSP) --}}
            </td>
            <td>
                {{-- @Html.DisplayFor(modelItem => item.Giaban) --}}
            </td>
            <td>
               {{-- @Truncate(item.Mota, 50)--}}
            </td>
            <td>
                {{--<img src="~/Sản Phẩm/@Html.DisplayFor(modelItem => item.Anhbia)" alt="Alternate Text" />--}}
            </td>
            <td>
                {{--@String.Format("{0:dd/MM/yyyy}", item.Ngaycapnhat)--}}
            </td>
            <td>
               {{-- @Html.DisplayFor(modelItem => item.Soluongton)--}}
            </td>
            <td>
               {{-- @Html.Action("loai", "ChucNang", new { id = item.MaloaiSP })--}}
            </td>
            <td>
               {{-- @Html.Action("NCC", "ChucNang", new { id = item.MaNCC })--}}
            </td>
            <td class="tool">
                Sửa
                Xóa
            </td>
        </tr>

</table>
</div>

    <style>
        .pagination {
            position: relative;
            background: #fff;
            display: flex;
            padding: 10px 20px;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(0,0,0,.2);
            text-align: center;
            justify-content: center
        }
            .pagination > li {
                margin: 0 5px;
                width: 50px;
                height: 50px;
                line-height: 50px;
                text-align: center;
            }
                .pagination > li > a {
                    color: #777;
                    font-weight: 600;
                    border-radius: 50%;
                    display: block;
                }
                .pagination > li:hover a,
                .pagination > li.active a {
                    background: #333;
                    color: #fff
                }
        .tool>a:hover {
            text-decoration: underline;
        }
        .page {
            text-align: center;
            justify-content: center;
            display: inline;
        }
        table {
            width: 100%;
        }
        img{
            width: 300px;
            height:150px;
        }
        th {
            height: 50px;
            background: #ffff;
            color: black;
            text-transform: uppercase;
        }
        td {
            text-align: center;
        }
        th, td {
            text-align: center;
        }
        td:hover {
            background-color: #ff006e;
        }
        @media(max-width: 430px) {
            table {
                font-size: 10px;
            }
            .pagination {
                width: 95%;
                padding: 5px 20px;
                margin-left: 15px;
            }
        }
        @media(max-width: 320px) {
            table {
                font-size: 8px;
            }
            .pagination {
                width: 95%;
                padding: 5px 20px;
                margin-left: 15px;
                font-size: 10px;
            }
        }
        /*Nut Them*/
        .text {
            padding-top: 4px;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .icon {
            margin: 10px 0px;
            width: 30px;
            height: 30px;
            padding-left: 10px;
            border-radius: 50%;
            background-color: #1623ae;
        }
        .ADD-Btn {
            margin-left: 20%;
            width: 18%;
            background: linear-gradient(to right, #1623ae, #090c5e);
            margin-top: 10px;
            margin-bottom: 10px;
            color: #fff;
            float: left;
        }
            .ADD-Btn:hover {
                background: linear-gradient(to left, #1623ae, #1892a5);
                color: #fff;
            }
                .ADD-Btn:hover .icon {
                    background-color: #090c5e;
                }
            .ADD-Btn p {
                float: left;
            }
        .ADD-Btn2 {
            margin-left: 3%;
            width: 20%;
            background: linear-gradient(to right, #1623ae, #090c5e);
            margin-top: 10px;
            margin-bottom: 10px;
            color: #fff;
            float: left;
        }
            .ADD-Btn2:hover {
                background: linear-gradient(to left, #1623ae, #1892a5);
                color: #fff;
            }
                .ADD-Btn2:hover .icon {
                    background-color: #090c5e;
                }
            .ADD-Btn2 p {
                float: left;
            }
        @media(max-width: 1024px) {
            .ADD-Btn {
                width: 30%;
                margin-left: 20%
            }
            .ADD-Btn2 {
                width: 32%;
            }
            table {
                font-size: 10px;
            }
            th, td {
                padding-right: 0px;
                padding-left: 10px;
            }
        }
        @media(max-width: 768px) {
            .ADD-Btn {
                width: 40%;
                margin-left: 30%
            }
            .ADD-Btn2 {
                width: 47%;
                margin-left: 27%
            }
            table {
                font-size: 9px;
            }
            th, td {
                padding-right: 0px;
                padding-left: 5px;
            }
        }
        @media(max-width: 430px) {
            .ADD-Btn {
                width: 55%;
                margin-left: 22%
            }
            .ADD-Btn2 {
                width: 55%;
                margin-left: 22%
            }
            table{
                font-size: 9px;
            }
            th, td{
                padding-right: 0px;
                padding-left: 5px;
            }
        }
        @media(max-width: 380px) {
            .ADD-Btn {
                width: 55%;
                margin-left: 22%
            }
            .ADD-Btn2 {
                width: 63%;
                margin-left: 18%
            }
        }
        @media(max-width: 320px) {
            .ADD-Btn {
                width: 70%;
                margin-left: 15%
            }
            .ADD-Btn2 {
                width: 75%;
                margin-left: 12%
            }
            table{
                font-size: 8px;
            }
        }
    </style>
    
@endsection