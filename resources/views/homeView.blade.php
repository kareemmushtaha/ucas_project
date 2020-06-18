@extends('layout.PageView.app')
@section('content')

    <!-- start banner Area -->
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-between">
                <div class="col-lg-12 banner-content">

                    <h1 class="text-white" style="text-align: center;"> أهلاً وسهلا بكم في منصة Gaza Food</h1>
                    <h6 class="text-white" style="text-align: center;background-color: rgba(255,0,0,0.75);padding-bottom:1%;padding-top: 1%; ">
                        منصة تشمل جميع المطاعم بكل انواعها , فلسطينية, شرقية غربية ,شعبية, مقاهي , شاورما
                    </h6>
                </div>
            </div>
        </div>
    </section>
    <section class="home-about-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 home-about-left">
                    <h1>عنا </h1>
                    <p class="About-Us">
                        موقعنا عبارة عن منصة لجميع مطاعم غزة بكل انواعها شرقية وغربية وشعبية وشاورما وبيتزا ومقاهى
                        حيث انه نتيح للمطعم اليةادارة مطعمه بشكل احترافي وايضا نوفر للمستخدم رؤية جميع منتجات المطاعم
                        والعروض المقدمة من قبل المطاعم مع امكانية شراء المنتجات الكترونيا. </p>
                    <a href="/aboutUs/gaza/food" class="primary-btn"> رؤية المزيد</a>
                </div>
                <div class="col-lg-6 home-about-right">
                    <img class="img-fluid" src="{{ asset('ShowUser/img/logo2.png')}}"
                         style="height: 100%;width: 100%;margin-right:1%;">
                </div>
            </div>
        </div>
    </section>

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
                                <a href="/detailsAdd/{{$add->id}}/">
                                    <img href="" class="img-fluid" src="{{ asset('/imgresturent/'.$add->img) }}"
                                         style="height: 250px !important; width: 250px !important;" alt="">
                                </a>
                            @else
                                <td><img class="img-fluid" src="{{ asset('ShowUser/img/b1.jpg') }}" alt=""></td>
                            @endif
                        </div>
                        <a href="/restaurant/{{ $add->Resturnt_id }}/"><h4>
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
@endsection
