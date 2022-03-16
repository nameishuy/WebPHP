@extends('admin')

@section('admincontent')
<div class="AddNewBook__Container">
    <div class="AddNewBook__Body">
        <div class="AddNewBook__Body-BookName">
            <span>Tên Sách: </span>
            <input type="text" name="" id="">
        </div>
        <div class="AddNewBook__Body-Description">
            <span>Mô Tả: </span>
            <input type="text" name="" id="">
        </div>
        <div class="AddNewBook__Body-BookCategory">
            <span>Thể Loại: </span>
            <select class="form-select" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
        </div>
        <div class="AddNewBook__Body-BookAuthor">
            <span>Tác Giả: </span>
            <select class="form-select" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
        </div>
        <div class="AddNewBook__Body-BookImage">
            <span>Ảnh: </span> 
            <input type="file" name="" id="">
            <div class="AddNewBook__Body-Image" *ngIf="true">
                <img src="https://prices.vn/photos/8/product/sach-dac-nhan-tam-cua-dale-carnegie.gif" alt="">
            </div>
        </div>
        <div class="AddNewBook__Body-BtnAdd">
            Thêm Sách
        </div>
    </div>
</div>
@endsection