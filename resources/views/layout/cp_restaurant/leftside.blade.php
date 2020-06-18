<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <div >
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                <i class="icon-signout" style="color: white;"></i>

            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="/Restaurant/category" class="nav-link active">
                                <i class="fa fa-list-alt"></i>
                                <p><i class="icon-pencil"> Categories</i></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Restaurant/img" class="nav-link active">
                                <i class="fas fa-image"></i>
                                <p> Photos </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Restaurant/serves" class="nav-link active">
                                <i class="fas fa-people-carry"></i>
                                <p> Serves</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Restaurant/Ads" class="nav-link active">
                                <i class="fas fa-ad"></i>
                                <p> Ads </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Restaurant/meal" class="nav-link active">
                                <i class="fas fa-utensils"></i>
                                <p> Meals </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/Restaurant/OrderRestaurant" class="nav-link active">
                                <i class="fas fa-shopping-basket"></i>
                                <p> order </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/Restaurant/aboutUs" class="nav-link active">
                                <i class="far fa-address-card"></i>
                                <p> About Us</p>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
