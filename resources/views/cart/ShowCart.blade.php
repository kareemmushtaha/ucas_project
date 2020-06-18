@extends('layout.PageView.app')
@section('content')



    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-between">
                <div class="col-lg-12 banner-content">
                    <h1 class="text-white" style="text-align: center;"> قسم سلة المنتجات </h1>
                    <h5 class="text-white" style="text-align: center;"> بالأسفل
                    </h5>
                </div>
            </div>
        </div>
    </section>

    <div class="container" style="padding-top: 3%; ">
        <div class="row">
            @if($cart)
                <div class="col-md-8">
                    @if($errors->any())
                        <div class="alert alert_danger" style="background-color: #ff0000;padding: 4% 4%;">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li style="color: wheat;font-weight: bolder;"> {{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table product-table">
                                <thead class="mdb-color ">
                                <tr>
                                    <th class="font-weight-bold">
                                        <strong>صورة الوجبة </strong>
                                    </th>
                                    <th class="font-weight-bold">
                                        <strong style="padding-right: 20px;"> الوجبة </strong>
                                    </th>
                                    <th class="font-weight-bold">
                                        <strong>السعر</strong>
                                    </th>
                                    <th class="font-weight-bold">
                                        <strong>المطعم</strong>
                                    </th>
                                    <th class="font-weight-bold">
                                        <strong>الكمية</strong>
                                    </th>
                                    <th class="font-weight-bold">
                                        <strong>تعديل الكمية</strong>
                                    </th>
                                    <th class="font-weight-bold">
                                        <strong>المجموع</strong>
                                    </th>
                                    <th class="font-weight-bold">
                                        <strong>ازالة الوجبة </strong>
                                    </th>

                                </tr>
                                </thead>

                                <div class="row"
                                     style="color:#ffff;font-weight: bolder;background-color:#f42f2c ;padding: 10px 10px;">
                                    <div class="col-md-2">
                                        <P> حسابي</P>
                                    </div>
                                    <div class="col-md-4">
                                        <P>السعر الكلي : {{$cart->totalPrice}} <i class="fa fa-ils"
                                                                                  aria-hidden="true"></i></P>
                                    </div>
                                    <div class="col-md-4">
                                        <P>الكمية : {{$cart->totalQty}}</P>
                                    </div>
                                    <div class="col-md-2">

                                        <a href="{{ route('cart.checkout',$cart->totalPrice)}}"
                                           class="btn btn-success">ادفع
                                            الآن</a>
                                    </div>
                                </div>

                                <tbody>
                                @foreach($cart->items as $meal)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('/imgresturent/'.$meal['img']) }}"
                                                 style="max-width: 400px;max-height:250px;padding-right: 20% ;padding-left:30%; "
                                                 alt="" class="img-fluid z-depth-0">
                                        </td>
                                        <td>
                                            <h5>
                                                <strong style="padding-right: 20px;">{{$meal['name']}}</strong>
                                            </h5>
                                        </td>
                                        <td>${{$meal['price']}}</td>
                                        <td>{{$meal['Resturnt_id']}}</td>

                                        <form action="{{route('meal.update',$meal['id'])}}" method="post">
                                            <td>
                                                @csrf
                                                @method('put')
                                                <input type="text" name="qty" id="qty" value="{{$meal['qty']}}"
                                                       aria-label="Search"
                                                       class="form-control" style="width: 100px">
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-sm btn-primary"> تعديل الكمية
                                                </button>
                                            </td>
                                        </form>


                                        <td class="font-weight-bold">
                                            <strong style="margin-right:1%;">{{$meal['qty']*$meal['price']}} $</strong>
                                        </td>
                                        <td>
                                            <form action="{{ route('meal.remove',$meal['id'] )}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        data-toggle="tooltip"
                                                        data-placement="top" title="Remove item"> إلغاء الطلب
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <p><strong> المجموع الكلي : {{$cart->totalPrice}} $</strong></p>
                        </div>
                    </div>
                </div>
            @else
                <p style="text-align: center;font-size: 20px;color: red;font-weight: bolder;padding: 20% 40%;"> لم تقوم
                    بإضافة أي منتج للسلة </p>
            @endif
        </div>
    </div>









@endsection
