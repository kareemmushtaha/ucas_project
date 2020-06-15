@extends('layout.PageView.app')
@section('content')

    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-between">
                <div class="col-lg-12 banner-content">
                    <h1 class="text-white" style="text-align: center;"> مطعم {{$Restaurant->name}} </h1>
                    <h5 class="text-white" style="text-align: center;"> لاشهى
                        المأكولات {{$Restaurant->TypeRestaurant->Type_Name}} </h5>
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
                    <h3>عن مطعم {{$Restaurant->name}} </h3>
                    <p class="About-Us">
                        نوع المطعم : {{$Restaurant->TypeRestaurant->Type_Name}}
                    </p>
                    <p class="About-Us">
                        نبذه عن الموقع : {{$Restaurant->Description}}

                    </p>
                    <a href="#" class="primary-btn"> رؤية المزيد</a>
                </div>
                <div class="col-lg-6 home-about-right">
                    <img class="img-fluid" src="{{ asset('ShowUser/img/about-img.jpg')}}" alt="">

                </div>
            </div>
        </div>
    </section>
    <!-- End home-about Area -->



    <!--**************************** ERROR AND SUCCESS MESSAGE ********************************-->
    <div class="row">
        <div class="col-md-12">
        </div>
        @if(session()->has('error'))
            <div class="col-md-12">
                <p class="alert alert-danger"> {{session()->get('error')}}</p>
            </div>
        @elseif(session()->has('success'))
            <div class="col-md-12">
                <div class="alert alert-success"> {{session()->get('success')}}</div>
            </div>
        @endif
    </div>
    <!--**************************** END ERROR AND SUCCESS MESSAGE ********************************-->









    <!-- Start menu-area Area -->
    <section class="menu-area section-gap" id="menu">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10"> التصنيفات ( المنيو ) </h1>
                        <p>جميع تصنيفات الطعام</p>
                    </div>
                </div>
            </div>
            <ul class="filter-wrap filters col-lg-12 no-padding">
                <li class="active" data-filter="*">كل التصنيفات</li>

                @foreach($category as $categories)
                    <li class="" data-filter=".{{$categories->id}}"> {{$categories->category_name}}</li>
                @endforeach
            </ul>


            <div class="filters-content">
                <div class="row grid">
                    @foreach($meal as $meals)
                        <div class="col-md-6 all  {{$meals->category_id}}">
                            <div class="single-menu">
                                <div class="title-wrap d-flex justify-content-between">
                                    <h4> وجبة :{{$meals->name}} </h4>
                                    <h4 class="price"><i class="fa fa-ils price"> {{$meals->price}} </i>
                                    </h4>
                                </div>

                                @if($meals->img !="NULL")
                                    <img src="{{ asset('/imgresturent/'.$meals->img) }}" width="100px" height="100px">
                                    <i> تفاصيل الوجبة : {{$meals->details }}</i>
                                @else
                                    <img class="imgMeal" src="{{asset('/images/defult.jpeg')}}">
                                    <i> تفاصيل الوجبة : {{$meals->details }}</i>
                                @endif
                                <button style="margin-right: 10% !important;margin-top: 15% !important; "
                                        class="primary-btn"><i class="fa fa-shopping-cart"><a
                                            href="{{route('cart.add',$meals->id)}}">شراء</a></i></button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="blog-area section-gap" id="blog">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">العروض الخاصة بنا</h1>
                        <p> ملاحظة هذه العروض لها تاريخ انتهاء عليك كسب هذا العرض قبل فوات تاريخ الانتهاء</p>
                    </div>
                </div>
            </div>

            <div class="row">

                {{--                 Test session How Meals Inside--}}
                {{--               {{print_r(session()->get('cart'))}}--}}
                {{--                End Test session How Meals Inside --}}


                @foreach($Adds as $offer)
                    <div class="col-lg-4 col-md-6 col-sm-6 single-blog">
                        <div class="thumb" style="margin-top: 10%;">
                            @if($offer->img !='NULL')
                                <a href="/detailsAdd/{{$offer->id}}/">
                                    <img class="img-fluid" src="{{ asset('/imgresturent/'.$offer->img)}}"
                                         style="height: 250px !important; width: 250px !important;" alt="">
                                </a>
                            @else
                                <img class="img-fluid" src="{{ asset('/images/defult.jpeg')}}"
                                     style="height: 250px !important; width: 250px !important;" alt="">
                            @endif

                        </div>
                        <P><a href="/detailsAdd/{{$offer->id}}/"> رؤية تفاصيل العرض :</a></P>
                        <p>
                            {{$offer->details}}
                        </p>
                        <p class="date" style="max-width: 250px;">تاريخ نهاية العرض {{$offer->finish_add}}</p>
                    </div>
                @endforeach
            </div>
            {{$Adds->links()}}
        </div>
    </section>

    <div class="section-top-border">
        <h3>معرض صور المطعم</h3>
        <div class="row gallery-item">
            @foreach($img as $photo)
                <div class="col-md-4">
                    @if($photo->img!="NULL")
                        <a href="{{ asset('/imgresturent/'.$photo->img)}}" class="img-gal">
                            <div class="single-gallery-image"
                                 style="background: url({{ asset('/imgresturent/'.$photo->img)}});"></div>
                        </a>
                    @else
                        <a href="{{asset('/images/defult.jpeg')}}" class="img-gal">
                            <div class="single-gallery-image"
                                 style="background: url({{ asset('/images/defult.jpeg')}});"></div>
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <section class="blog-area section-gap" id="blog" style="background-color: rgba(0,12,25,0.82);padding: 7% 7%;">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10" style="color: white;"> الخدمات المقدمة من المطعم </h1>
                        <p style="background-color:#f42f2c;color: white; ">جميع خدمات المطعم</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($serves as $data)
                    <div class="col-lg-3 col-md-6 col-sm-6 single-blog">
                        <a href="blog-single.html"><h4 style="margin-top: 40px;color: white;"><i
                                    class="fa fa-check"></i>{{$data->serves_name}} </h4></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
