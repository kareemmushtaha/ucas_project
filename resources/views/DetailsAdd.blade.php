@extends('layout.PageView.app')
@section('content')

    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-between">
                <div class="col-lg-12 banner-content">
                    <h1 class="text-white" style="text-align: center;"> تفاصيل العرض </h1>
                    <h5 class="text-white" style="text-align: center;"> بلأسفل
                    </h5>
                </div>
            </div>
        </div>
    </section>
    <section class="home-about-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 home-about-right">
                    <img class="img-fluid" src="{{asset('/imgresturent/'.$adds->img)}}" height="350px" width="350px">
                </div>
                <div class="col-lg-6 home-about-left">
                    <h1>تفاصيل المنتج </h1>
                    <p>
                        {{$adds->details}}
                    </p>
                    <p>
                        تاريخ نهاية العرض :{{$adds->finish_add}}
                    </p>
                </div>

            </div>
        </div>
    </section>

@endsection
