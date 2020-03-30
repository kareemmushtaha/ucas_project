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
                        <h1 class="mb-10">كل  المطاعم </h1>
                        <p>جميع تصنيفات المطاعم</p>
                    </div>
                </div>
            </div>

            <ul class="filter-wrap filters col-lg-12 no-padding">
                <li class="active" data-filter="*">All Resturent</li>
                <li data-filter=".breakfast">مطاعم شعبية</li>
                <li data-filter=".lunch">مطاعم شرقية</li>
                <li data-filter=".dinnerr">مطاعم غربية </li>
                <li data-filter=".budget-meal"> بيتزا</li>
                <li data-filter=".buffet">شاورما</li>
                <li data-filter=".buffet">مقاهي</li>
            </ul>

            <div class="filters-content">
                <div class="row grid">
                    <div class="col-md-6 all breakfast">
                        <div class="single-menu">
                            <div class="title-wrap d-flex justify-content-between">
                                <h4>التايلندي</h4>
                                <h4 class="price">$49</h4>
                            </div>
                            <p>
                                 مطعم التايلندي (جلسات هادئة - طعام لذيذ -شاورما)
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 all dinnerr">
                        <div class="single-menu">
                            <div class="title-wrap d-flex justify-content-between">
                                <h4>التايلندي</h4>
                                <h4 class="price">$49</h4>
                            </div>
                            <p>
                                مطعم التايلندي (جلسات هادئة - طعام لذيذ -شاورما)
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 all budget-meal">
                        <div class="single-menu">
                            <div class="title-wrap d-flex justify-content-between">
                                <h4>التايلندي</h4>
                                <h4 class="price">$49</h4>
                            </div>
                            <p>
                                مطعم التايلندي (جلسات هادئة - طعام لذيذ -شاورما)
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 all breakfast">
                        <div class="single-menu">
                            <div class="title-wrap d-flex justify-content-between">
                                <h4>التايلندي</h4>
                                <h4 class="price">$49</h4>
                            </div>
                            <p>
                                مطعم التايلندي (جلسات هادئة - طعام لذيذ -شاورما)
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 all lunch">
                        <div class="single-menu">
                            <div class="title-wrap d-flex justify-content-between">
                                <h4>التايلندي </h4>
                                <h4 class="price">$49</h4>
                            </div>
                            <p>
                                مطعم التايلندي (جلسات هادئة - طعام لذيذ -شاورما)
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 all buffet">
                        <div class="single-menu">
                            <div class="title-wrap d-flex justify-content-between">
                                <h4>التايلندي</h4>
                                <h4 class="price">$49</h4>
                            </div>
                            <p>
                                مطعم التايلندي (جلسات هادئة - طعام لذيذ -شاورما)
                            </p>
                        </div>
                    </div>
                </div>
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
    <!-- End reservation Area -->

    <!-- Start gallery-area Area -->
    <section class="gallery-area section-gap" id="gallery">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Food and Customer Gallery</h1>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
            </div>

            <ul class="filter-wrap filters col-lg-12 no-padding">
                <li class="active" data-filter="*">All Menu</li>
                <li data-filter=".breakfast">Breakfast</li>
                <li data-filter=".lunch">Lunch</li>
                <li data-filter=".dinner">Dinner</li>
                <li data-filter=".budget-meal">Budget Meal</li>
                <li data-filter=".buffet">Buffet</li>
            </ul>


            <div class="filters-content">
                <div class="row grid">
                    <div class="col-lg-4 col-md-6 col-sm-6 all breakfast">
                        <div class="single-gallery">
                            <img class="img-fluid" src="{{ asset('ShowUser/img/g1.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 all dinner">
                        <div class="single-gallery">
                            <img class="img-fluid" src="{{ asset('ShowUser/img/g2.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 all budget-meal">
                        <div class="single-gallery">
                            <img class="img-fluid" src="{{ asset('ShowUser/img/g3.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 all breakfast">
                        <div class="single-gallery">
                            <img class="img-fluid" src="{{ asset('ShowUser/img/g4.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 all lunch">
                        <div class="single-gallery">
                            <img class="img-fluid" src="{{ asset('ShowUser/img/g5.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 all buffet">
                        <div class="single-gallery">
                            <img class="img-fluid" src="{{ asset('ShowUser/img/g6.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End gallery-area Area -->

    <!-- Start review Area -->
    <section class="review-area section-gap">
        <div class="container">
            <div class="row">
                <div class="active-review-carusel">
                    <div class="single-review">
                        <img src="img/user.png" alt="">
                        <h4>Hulda Sutton</h4>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <p>
                            “Accessories Here you can find the best computer accessory for your laptop, monitor,
                            printer, scanner, speaker. Here you can find the best computer accessory for your laptop,
                            monitor, printer, scanner, speaker.”
                        </p>
                    </div>
                    <div class="single-review">
                        <img src="img/user.png" alt="">
                        <h4>Hulda Sutton</h4>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <p>
                            “Accessories Here you can find the best computer accessory for your laptop, monitor,
                            printer, scanner, speaker. Here you can find the best computer accessory for your laptop,
                            monitor, printer, scanner, speaker.”
                        </p>
                    </div>
                    <div class="single-review">
                        <img src="img/user.png" alt="">
                        <h4>Hulda Sutton</h4>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <p>
                            “Accessories Here you can find the best computer accessory for your laptop, monitor,
                            printer, scanner, speaker. Here you can find the best computer accessory for your laptop,
                            monitor, printer, scanner, speaker.”
                        </p>
                    </div>
                    <div class="single-review">
                        <img src="img/user.png" alt="">
                        <h4>Hulda Sutton</h4>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <p>
                            “Accessories Here you can find the best computer accessory for your laptop, monitor,
                            printer, scanner, speaker. Here you can find the best computer accessory for your laptop,
                            monitor, printer, scanner, speaker.”
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End review Area -->

    <!-- Start blog Area -->
    <section class="blog-area section-gap" id="blog">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Latest From Our Blog</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 single-blog">
                    <div class="thumb">
                        <img class="img-fluid" src="{{ asset('ShowUser/img/b1.jpg')}}" alt="">
                    </div>
                    <p class="date">10 Jan 2018</p>
                    <a href="blog-single.html"><h4>Cooking Perfect Fried Rice
                            in minutes</h4></a>
                    <p>
                        inappropriate behavior ipsum dolor sit amet, consectetur.
                    </p>
                    <div class="meta-bottom d-flex justify-content-between">
                        <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                        <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 single-blog">
                    <div class="thumb">
                        <img class="img-fluid" src="{{ asset('ShowUser/img/b2.jpg')}}" alt="">
                    </div>
                    <p class="date">10 Jan 2018</p>
                    <a href="blog-single.html"><h4>Secret of making Heart
                            Shaped eggs</h4></a>
                    <p>
                        inappropriate behavior ipsum dolor sit amet, consectetur.
                    </p>
                    <div class="meta-bottom d-flex justify-content-between">
                        <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                        <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 single-blog">
                    <div class="thumb">
                        <img class="img-fluid" src="{{ asset('ShowUser/img/b3.jpg')}}" alt="">
                    </div>
                    <p class="date">10 Jan 2018</p>
                    <a href="blog-single.html"><h4>How to check steak if
                            it is tender or not</h4></a>
                    <p>
                        inappropriate behavior ipsum dolor sit amet, consectetur.
                    </p>
                    <div class="meta-bottom d-flex justify-content-between">
                        <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                        <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 single-blog">
                    <div class="thumb">
                        <img class="img-fluid" src="{{ asset('ShowUser/img/b4.jpg')}}" alt="">
                    </div>
                    <p class="date">10 Jan 2018</p>
                    <a href="blog-single.html"><h4>Seaseme and black seed
                            Flavored Bun Rocks</h4></a>
                    <p>
                        inappropriate behavior ipsum dolor sit amet, consectetur.
                    </p>
                    <div class="meta-bottom d-flex justify-content-between">
                        <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                        <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog Area -->


@endsection
