@extends('layout.PageView.app')
@section('content')

    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        عن المنصة
                    </h1>
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
                    <h1  style="color: red;">عن Gaza Food</h1>
                    <p>
                        هذه عبارة عن منصة تضم جميع المطاعم و الكافيهات المتواجده في قطاع غزة وتقدم لهم خدمات عديدة
                        من اهمها تقدم لهم امكانية البيع الالكتروني عن بعد وإمكانية إنشاء العروض وآلية ادارة كاملة للمطعم
                        زخدماته المقدمه وامكانية عرضها للزبائن بشكل مريح وسهل
                        وأيضا تقدم المنصة إمكانية تسجيل الدخول للزبائن الذين يريدون شراء الوجبات الغذائة ومتابعة عروض
                        المطاعم المقدمة لهم من قبل المطاعم
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End home-about Area -->

    <!-- Start services Area -->
    <section class="services-area pb-120">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10" style="color: red;">اذا كنت ترغب في إدخال مطعمك  ضمن المنصة </h1>
                        <p>فسوف يتم توفير لك الخدمات التالية</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4"   >
                    <div class="single-service">
                        <div class="thumb">
                            <img src="img/about/s1.jpg" alt="">
                        </div>
                        <a href="#">
                            <h4>إمكانية اضافة  وجبات وتصنيفات المطعم </h4>
                        </a>
                        <p>
                           ستمنحك المنصة لوحة تحكم خاصة بك يمكنك من خلالها
                            ادارة الوجبات وإضافة اسعارها وإضافة سعر الوجبات وصورها  .
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-service">
                        <div class="thumb">
                            <img src="img/about/s2.jpg" alt="">
                        </div>
                        <a href="#">
                            <h4>إمكانية إضافة نبذه عن المطعم</h4>
                        </a>
                        <p>
                           يمكنك أيضاً إضافة نبذه عن مطعمك وتفاصيل عنه
                            حيث ترغب الزبون بالتقدم الى ذلك المطعم .
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-service">
                        <div class="thumb">
                            <img src="img/about/s3.jpg" alt="">
                        </div>
                        <a href="#">
                            <h4>إمكانية إضافة الخدمات التي يقدمها المطعم </h4>
                        </a>
                        <p>
                           يمكنك إضافة كافة الخدمات التي يقدمها مطعمك الخاص
                            مثل  ( تريد المطعم _ مصف خاص للسيارات - مكان خاص للأطفال .....)
                            كل ذلك يعمل على ترغيب المستخدم لزيارة مطعمك.
                        </p>
                    </div>
                </div>
            </div>





            <div class="row mt-4">
                <div class="col-lg-4"   >
                    <div class="single-service">
                        <div class="thumb">
                            <img src="img/about/s1.jpg" alt="">
                        </div>
                        <a href="#">
                            <h4> </h4>
                        </a>
                        <p>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-service">
                        <div class="thumb">
                            <img src="img/about/s2.jpg" alt="">
                        </div>
                        <a href="#">
                            <h4>هناك العديد من المميزات المقدمة  </h4>
                        </a>
                        <p>

                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-service">
                        <div class="thumb">
                            <img src="img/about/s3.jpg" alt="">
                        </div>
                        <a href="#">
                            <h4> </h4>
                        </a>
                        <p>

                        </p>
                    </div>
                </div>
            </div>




        </div>
    </section>

@endsection
