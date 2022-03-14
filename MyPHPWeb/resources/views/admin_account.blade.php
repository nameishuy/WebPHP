@extends('admin')

@section('admincontent')
    <div class="Admin__Account-Header">
        <div class="Checkbox__All-Account">

        </div>
        <div class="Title__username">Tài Khoản</div>
        <div class="Title__email">Email</div>
        <div class="Title__role">Loại Tài Khoản</div>

        <div class="Title__setting">Thiết Lập</div>
    </div>
    <div class="Admin__Account-Body">
        @foreach ($listUser as $user)
        <div class="Admin__Account-Account-Details">             
                <div class="Checkbox__Account">
                    <input type="checkbox" name="" class="checkbox" id="checkbox__account">
                </div>

                <div class="User__username">{{$user['Taikhoan']}}</div>

                <?php 
                    if(isset($user['Email'])) echo "<div class='User__email' >{$user['Email']}</div>";
                    else echo "<div class='User__email' >Chưa Cập Nhật</div>";
                ?>

                <?php 
                    if($user['Role']==true) echo "<div class='User__role' >Admin</div>";
                    else {
                        echo "<div class='User__role' >Khách</div>";
                        echo "
                            <div class='User__setting'>
                                <div class='User__setting-deleteAccount' onclick='showDialogDeleteAccount()'>
                                    Xóa Tài Khoản
                                </div>
                            </div>
                        ";
                    } 
                ?>

        </div>
        @endforeach
        <div class="UpdateAll__Setting">
            Cấp Quyền Admin
        </div>
    </div>
@endsection