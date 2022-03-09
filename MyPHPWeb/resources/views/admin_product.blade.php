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
                                        <a href="/admin">Home</a>
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
<a href="#" class="ADD-Btn">
    <p class="text">THÊM LOẠI CHỦ ĐỀ</p>
    <p class="icon">&#43;</p>
</a>
<a href="#" class="ADD-Btn">
    <p class="text">THÊM NHÀ XUẤT BẢN</p>
    <p class="icon">&#43;</p>
</a>

<table class="table" border="2.5">
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
                <a href="#">Sửa</a> /
                <a href="#">Xóa</a>
            </td>
        </tr>

</table>
</div>

    <style>     
        .tool{
            width: 100px;
        }
        .tool>a:hover {
            text-decoration: underline;
        }
        .page {
            text-align: center;
            justify-content: center;
            display: inline;
        }
        .table {
            width: 100%;
            font-size: 14px;
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
            text-align: center;
            border: solid 1.5px;
        }
        td {
            text-align: center;
            border: solid 1.5px;
        }
        td:hover {
            background-color: #ff006e;
        }
        /*Nut Them*/
        .text {
            padding-top: 2px;
            margin: 0 20px;
        }
        .icon {
            width: 30px;
            height: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 50%;
            background-color: #1623ae;
        }
        .ADD-Btn {
            margin-top: 30px;
            margin-left: 10%;
            width: fit-content;
            height: 50px;
            padding: 10px 10px;
            background: linear-gradient(to right, #1623ae, #090c5e);
            margin-bottom: 30px;
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
        }
        @media(max-width: 320px) {
            .ADD-Btn {
                width: 70%;
                margin-left: 15%
            }
            table{
                font-size: 8px;
            }
        }
    </style>
    
@endsection