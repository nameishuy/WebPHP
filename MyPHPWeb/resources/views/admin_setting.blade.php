@extends('admin')

@section('admincontent')
    <?php if (isset($mess)) : ?>
    <h1>{{ $mess }}</h1>
    <?php else : ?>
    <h1>{{ Session::get('mess') }}</h1>
    <?php endif; ?>
    <div class="Admin__Setting-Container">
        <div class="Admin__Setting-Banner">
            <h1>Banner</h1>
            <div class="Setting__Banner">
                <div class="Setting__Banner-Feature">
                    <div>Banner 1</div>
                    <input type="file" name="Banner1" id="" onchange="loadFile(event)" accept="image/*">
                </div>
                <img id="banner1" src="#" alt="banner1">
            </div>
            <div class="Setting__Banner">
                <div class="Setting__Banner-Feature">
                    <div>Banner 2</div>
                    <input type="file" name="Banner2" id="" onchange="loadFile2(event)">
                </div>
                <img id="banner2" src="#" alt="">
            </div>
            <div class="Setting__Banner">
                <div class="Setting__Banner-Feature">
                    <div>Banner 3</div>
                    <input type="file" name="Banner3" id="" onchange="loadFile3(event)">
                </div>
                <img id="banner3" src="#" alt="">
            </div>
            <div onclick="UpdateBanner()" class="Setting__Banner-Feature-Btn">
                Cập Nhật
            </div>
        </div>

    </div>
@endsection
