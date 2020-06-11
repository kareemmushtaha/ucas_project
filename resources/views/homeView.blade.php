@extends('layout.PageView.app')
@section('content')
    <!-- start banner Area -->

    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-between">

                <div class="col-lg-12 banner-content">

                    <h6 class="text-white">Wide Options of Choice</h6>
                    <h1 class="text-white" style="text-align: center;"> مطااعم غزة</h1>
                    <h6 class="text-white" style="text-align: center;">
                        منصة مطاعم تشمل جميع المطاعم بكل انواعها مطاعم, فلسطينية, شرقية غربية ,شعبية, مقاهي , شاورما
                        .
                    </h6>

                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start home-about Area -->
    <section class="home-about-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 home-about-left">
                    <h1>عنا </h1>
                    <p class="About-Us">
                        موقعنا عبارة عن منصة لجميع مطاعم غزة بكل انواعها شرقية وغربية وشعبية وشاورما وبيتزا ومقاهى
                        حيث انه نتيح للمطعم اليةادارة مطعمه بشكل احترافي وايضا نوفر للمستخدم رؤية جميع منتجات المطاعم
                        والعروض المقدمة من قبل المطاعم مع امكانية شراء المنتجات الكترونيا. </p>
                    <a href="#" class="primary-btn"> رؤية المزيد</a>
                </div>
                <div class="col-lg-6 home-about-right">
                    <img class="img-fluid" src="{{ asset('ShowUser/img/about-img.jpg')}}" alt="">

                </div>
            </div>
        </div>
    </section>
    <!-- End home-about Area -->

    <!-- Start menu-area Area -->
    <section class="menu-area section-gap" id="menu">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">كل المطاعم </h1>
                        <p>جميع تصنيفات المطاعم</p>
                    </div>
                </div>
            </div>
            <ul class="filter-wrap filters col-lg-12 no-padding">
                <li class="active" data-filter="*">كل المطاعم</li>

                @foreach($data as $type)
                    <li class="{{$type->Type_Name}}" data-filter=".{{$type->Type_Name}}"> {{$type->Type_Name}} </li>
                @endforeach
            </ul>

            <div class="filters-content">
                <div class="row grid">
                    @foreach($Restaurant as $rest)
                        <div class="col-md-6 all {{$rest->TypeRestaurant->Type_Name}}">
                            <div class="single-menu">
                                <div class="title-wrap d-flex justify-content-between">
                                    <h4><a href="/restaurant/{{ $rest->id }}/">{{$rest->name}} </a></h4>
                                    <h4 class="price">{{$rest->id}}</h4>
                                </div>
                                <p>
                                    {{$rest->Description}}
                                </p>
                                <p>
                                    {{$rest->TypeRestaurant->Type_Name}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{ $Restaurant->links() }}

            </div>
        </div>
    </section>
    <!-- End menu-area Area -->

    <!-- Start reservation Area -->
    <section class="reservation-area section-gap relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 reservation-left">
                    <h1 class="text-white"> ان كان هناك اي تعليق فعليك تعبئه هذا النموذج
                    </h1>
                    <p class="text-white pt-20">
                        قسم الادارة والمتابعة
                    </p>
                </div>
                <div class="col-lg-5 reservation-right">
                    <form class="form-wrap text-center" action="#">
                        <input type="text" class="form-control" name="name" placeholder="Your Name"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'">
                        <input type="email" class="form-control" name="email" placeholder="Your Email Address"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'">
                        <input type="text" class="form-control" name="phone" placeholder="Phone Number"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'">
                        <input type="text" class="form-control date-picker" name="date" placeholder="Select Date & time"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Select Date & time'">
                        <div class="form-select" id="service-select">
                            <select>
                                <option data-display="">Select Event</option>
                                <option value="1">Event One</option>
                                <option value="2">Event Two</option>
                                <option value="3">Event Three</option>
                                <option value="4">Event Four</option>
                            </select>
                        </div>
                        <button class="primary-btn text-uppercase mt-20">Make Reservation</button>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-area section-gap" id="blog">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">آخر العروض</h1>
                        <p>هنا يتم عرض احدث العروض المقدمة من المطاعم يمكنك رؤية المزيد </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($adds as $add)
                <div class="col-lg-3 col-md-6 col-sm-6 single-blog">
                    <div class="thumb">

                        @if($add->img!="NULL")
                            <td><img class="img-fluid" src="{{ asset('/imgresturent/'.$add->img) }}" style="height: 250px !important; width: 250px !important;" alt="">
                            </td>
                        @else
                            <td><img class="img-fluid" src="{{ asset('ShowUser/img/b1.jpg') }}" alt=""></td>
                        @endif






                    </div>
                    <a href="blog-single.html"><h4>
                            {{$add->getRestaurantByAdd->name}}
                        </h4></a>
                    <p>
                        {{$add->details}}
                       </p>
                    <p class="date">{{$add->finish_add}}</p>

                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End blog Area -->


@endsection
