<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-center">
                <div id="logo">
                    <a href="index.html"><img src="{{ asset('ShowUser/img/logo.png')}}" alt="" title=""
                                              style="width: 140px;height: 140px;"/></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container main-menu">
        <div class="row align-items-center justify-content-center d-flex">
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li>
                        <a style="max-height: 30px;padding-bottom: 40px;border-radius:3px 3px;margin-right: 20% !important;"
                           href="{{route('cart.show')}}" class="nav-link"><i class="fa fa-shopping-cart">
                                السلة{{ session()->has('cart') ? session()->get('cart')->totalQty :'0' }} </i> </a></li>
                    <li class="menu-has-children">

                        @if((Auth::check()))
                            <a class="dropdown-item"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                {{ __('تسجيل الخروج') }}
                                <i class="icon-signout" style="color: white;"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a href="/chose/regester">تسجيل الدخول </a></li>
                    @endif
                    <li class="menu-has-children"><a href="/order"> طلباتي</a></li>
                    <li class="menu-has-children"><a href="">تواصل معنا</a></li>
                    <li><a href="/aboutUs/gaza/food">عنا </a></li>
                    <li><a href="/all/restaurant">المطاعم </a></li>
                    <li><a href="/add"> اخر العروض </a></li>
                    <li><a href="/">الرئيسية </a></li>
                </ul>
            </nav>

            <!-- #nav-menu-container -->
        </div>
    </div>

</header>
