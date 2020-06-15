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
                    <li><a style="max-height: 30px;padding-bottom: 40px;border-radius:3px 3px;margin-right: 20% !important;" href="{{route('cart.show')}}" class="nav-link"><i class="fa fa-shopping-cart"> السلة{{ session()->has('cart') ? session()->get('cart')->totalQty :'0' }} </i> </a></li>
                    <li class="menu-has-children"><a href="/order"> طلباتي</a></li>
                    <li class="menu-has-children"><a href="">تواصل معنا</a></li>
                    <li><a href="about.html">عنا </a></li>
                    <li><a href="menu.html">المطاعم </a></li>
                    <li><a href="/add"> اخر العروض </a></li>
                    <li><a href="/">الرئيسية </a></li>
                </ul>
            </nav>

            <!-- #nav-menu-container -->
        </div>
    </div>
</header>
