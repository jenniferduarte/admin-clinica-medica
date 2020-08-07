<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-warning">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{ asset('img/logo-mtl.png') }}" width="100px" height="auto">
    </a> 

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex text-center">
            <div class="info" >
                <a href="#" class="d-block"> <i class="fas fa-user-alt"> </i> 
                    @if(Auth::user())
                    Hi, {{ Auth::user()->name }}
                    @endif
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <hr>
                
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" >
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link">
                                <p>See all</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.create') }}" class="nav-link">
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <hr>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>

                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link">
                                <p>See all</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.create') }}" class="nav-link">
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <hr>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-palette"></i>
                        <p>
                            Colors
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('colors.index') }}" class="nav-link">
                                <p>See all</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('colors.create') }}" class="nav-link">
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <hr>

                <li class="nav-item">
                    <a href="{{ route('print-shop.edit', 1) }}" class="nav-link">
                        <i class="fas fa-print nav-icon"></i>
                        <p>Print Shop</p>
                    </a>
                </li>

                <hr>

                <li class="nav-item">
                    <a href="{{ route('orders.index') }}" class="nav-link">
                        <i class="fas fa-shopping-cart nav-icon"></i>
                        <p>Orders</p>
                    </a>
                </li>

                <hr>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>{{ __('Logout') }} </p>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>