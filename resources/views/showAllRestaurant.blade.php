@extends('layout.PageView.app')
@section('content')

    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        رؤية جميع المطاعم
                    </h1>
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






@endsection
