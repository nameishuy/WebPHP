@extends('admin')

@section('admin')
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Account</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/admin_home">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Account</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
<h2 style="text-align:center;font-size: 24px;">Thông Tin Khách Hàng </h2>


<table class="table" border="1">
    <tr>
        <th>
            Họ Tên
        </th>
        <th>
            Email
        </th>
        <th>
            Địa Chỉ
        </th>
        <th>
            Điện Thoại
        </th>
        <th>
            Ngày Sinh
        </th>
    </tr>

    {{-- @foreach (var item in Model)
    {
        <tr>
            <td>
                @Html.DisplayFor(modelItem => item.HoTen)
            </td>
            <td>
                @Html.DisplayFor(modelItem => item.Email)
            </td>
            <td>
                @Html.DisplayFor(modelItem => item.DiachiKH)
            </td>
            <td>
                @Html.DisplayFor(modelItem => item.DienthoaiKH)
            </td>
            <td>
                @Html.DisplayFor(modelItem => item.Ngaysinh)
            </td>
        </tr>
    } --}}
</div>
</table>
    <style>
        .ADD-Btn {
            margin-left: 40%;
            width: 21%;
            background: linear-gradient(to right, #1623ae, #090c5e);
            margin-top: 10px;
            margin-bottom: 10px;
            float: left;
        }
            .ADD-Btn:hover {
                background: linear-gradient(to left, #1623ae, #1892a5);
            }
                .ADD-Btn:hover .icon {
                    background-color: #090c5e;
                }
            .ADD-Btn p {
                float: left;
            }
        .text {
            padding-top: 4px;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 20px;
            height: 30px;
        }
        .icon {
            margin: 10px 10px;
            width: 30px;
            height: 30px;
            padding-left: 10px;
            border-radius: 50%;
            background-color: #1623ae;
        }
        .pagination {
            position: relative;
            background: #fff;
            display: flex;
            padding: 10px 20px;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(0,0,0,.2);
            text-align: center;
            justify-content: center;
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
                    color: #fff;
                }
        .tool:hover {
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
        th {
            height: 50px;
            background: #fff;
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
        @@media(max-width: 1024px) {
            .ADD-Btn {
                width: 30%;
            }
        }
        @@media(max-width: 768px) {
            .ADD-Btn {
                width: 40%;
                margin-left: 30%
            }
            .pagination {
                width: 95%;
                padding: 5px 20px;
                margin-left: 15px;
            }
            th, td {
                padding-left: 20px;
                padding-right: 10px;
                padding-top: 15px;
                padding-bottom: 20px;
            }
        }
        @@media(max-width: 430px) {
            .ADD-Btn {
                width: 55%;
                margin-left: 22%
            }
            table {
                font-size: 12px;
            }
            .pagination {
                width: 95%;
                padding: 5px 20px;
                margin-left: 15px;
            }
        }
        @@media(max-width: 320px) {
            .ADD-Btn {
                width: 70%;
                margin-left: 15%
            }
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
    </style>
    
@endsection