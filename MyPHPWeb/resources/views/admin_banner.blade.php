@extends('admin')

@section('admin')
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Banner</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/admin">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Banner</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

<a href="#" class="ADD-Btn">
    <p class="text">THÊM BANNER</p>
    <p class="icon">&#43;</p>
</a>    
<table class="table" border="2.5" >
    <tr>
        <th>
            Banner
        </th>
        <th>
            Ảnh
        </th>
        <th></th>
    </tr>

    
    <tr>
            <td>
            </td>
            <td>
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
        .table {
            width: 100%;
            font-size: 16px;
            font-family: var(--bs-font-sans-serif);
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
            font-size: 16px;
            border: solid 1.5px;
            text-align: center;
        }
        td {
            text-align: center;
            border: solid 1.5px;
            font-size: 16px;
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
            margin-left: 45%;
            width: fit-content;
            height: 50px;
            padding: 10px 10px;
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