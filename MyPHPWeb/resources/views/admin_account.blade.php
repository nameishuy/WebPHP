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
                                        <a href="/admin">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Account</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
<h2>Thông Tin Khách Hàng </h2>


<table class="table" border="2.5">
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

    
        <tr>
            <td>
                
            </td>
            <td>
                
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
        </tr>
</div>
</table>
    <style>
        h2{
            text-align:center;
            font-family: var(--bs-font-sans-serif);
            font-size: 20px;
            margin: 20px 0;
        }
        .tool:hover {
            text-decoration: underline;
        }
        
        .table {
            width: 100%;
            font-size: 14px;
        }
        th {
            height: 50px;
            background: #fff;
            color: black;
            text-transform: uppercase;
            text-align: center;
            border: solid 1.5px;
        }   
        td {
            height: 50px;
            text-align: center;
            border: solid 1.5px;
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