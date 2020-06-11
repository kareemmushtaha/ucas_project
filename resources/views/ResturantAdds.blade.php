@extends('layout.PageView.app')
@section('content')

    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        أحدث عروض المنصة </h1>
                </div>
            </div>
        </div>
    </section>



    <!-- Start services Area -->
    <section class="services-area pb-120" style="margin-top: 5% !important;">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">جميع عروض المطاعم عبر المنصه</h1>
                        <p>يمكنك مشاهدة جميع العروض المقدمة </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-service">
                        <div class="thumb">
                            <img src="{{asset('/images/defult.jpeg')}}" alt="">
                        </div>
                        <a href="#">
                            <h4>عرض عيد الفطر السعيد </h4>
                        </a>
                        <p>
                            وجبة الهت بيتزا الشهية نقدمها 8 قطع وسلطة الكراش الحارة نقدمها بعرض جديد </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-service">
                        <div class="thumb">
                            <img src="{{asset('/images/defult.jpeg')}}" alt="">
                        </div>
                        <a href="#">
                            <h4>عرض عيد الفطر السعيد</h4>
                        </a>
                        <p>
                            وجبة الهت بيتزا الشهية نقدمها 8 قطع وسلطة الكراش الحارة نقدمها بعرض جديد </p>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-service">
                        <div class="thumb">
                            <img src="{{asset('/images/defult.jpeg')}}" alt="">
                        </div>
                        <a href="#">
                            <h4>عرض عيد الفطر السعيد</h4>
                        </a>
                        <p>
                            وجبة الهت بيتزا الشهية نقدمها 8 قطع وسلطة الكراش الحارة نقدمها بعرض جديد </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
