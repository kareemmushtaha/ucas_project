@extends('layout.PageView.app')
@section('content')


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


<h3 style="padding: 3% 3% ;">        قائمة طلباتي   :{{auth()->user()->name}}   </h3>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @foreach($carts as $cart)
                    <div class="card mb-3">
                        <div class="card-body">

                            <table class="table table-striped mt-2 mb-2">
                                <thead>
                                <tr>
                                    <th scope="col">اسم الوجبة</th>
                                    <th scope="col">السعر </th>
                                    <th scope="col">الكمية</th>
                                    <th scope="col">اسم المطعم</th>
                                    <th scope="col">تفاصيل الوجبة</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart->items as $item)
                                    <tr>

                                        <td>{{$item['name'] }}</td>
                                        <td>${{$item['price'] }}</td>
                                        <td>{{$item['qty'] }}</td>
                                        <td>{{$item['Resturnt_id'] }} </td>
                                        <td>{{$item['details'] }} </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <p class="badge badge-pill badge-info mb-3 p-3 text-white">Total Price : ${{$cart->totalPrice}}</p>
                @endforeach
            </div>
        </div>
    </div>



@endsection
