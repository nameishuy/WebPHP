@extends('layout')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="{{url('signup')}}" method="POST">
                @csrf
                <span class="login100-form-title p-b-43">
                    Login to continue
                </span>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="fullname" required>
                    <span class="focus-input100"></span>
                    <span class="label-input100">FullName</span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="username" required>
                    <span class="focus-input100"></span>
                    <span class="label-input100">UserName</span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" name="pass" required>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" name="compass" required>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Confirm Password</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Sign Up
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection