@extends('layout.PageView.app')
@section('content')

    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-between">

                <div class="col-lg-12 banner-content">
                    <h1 class="text-white"
                        style="text-align: center;padding-top: 20%;"> أهلاً وسهلا
                        بكم في منصة Gaza Food</h1>
                    <h2 class="text-white" style="text-align: center;"> تسجيل الدخول عبر المنصة</h2>
                </div>
            </div>
        </div>
    </section>

    <div class="container" style="padding: 15% 15%;">
        <div class="row">
            <div class="col-md-5"
                 style="background-color: #ff524d;padding: 7% 7%;text-align: center;border:3px solid black;">
                <a href="/login" style="color: wheat;font-size:20px;">
                    <i class="fa fa-user" aria-hidden="true"></i> تسجيل الدخول بحساب مستخدم عادي
                </a>
            </div>
            <div class="col-md-5"
                 style="background-color: #ff524d;padding: 7% 7%;text-align: center;margin-right: 2%;border:3px solid black;">
                <a href="/login/blogger" style="color: wheat;font-size:20px;">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    تسجيل الدخول بحساب مطعم
                </a>
            </div>
        </div>
    </div>

@endsection
