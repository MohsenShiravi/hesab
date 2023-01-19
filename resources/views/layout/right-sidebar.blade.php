<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            دسته بندی ها
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('categories.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لیست دسته بندی ها</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('categories.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ایجاد دسته بندی جدید</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            نوع هزینه ها
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('cost-types.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لیست نوع هزینه ها</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('cost-types.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>افزودن نوع هزینه</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            هزینه ها
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('costs.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لیست هزینه ها</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('costs.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>افزودن هزینه جدید</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            انبارها
                        </p><i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('warehouses.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ایجاد انبار</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('warehouses.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لیست انبارها</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>
                            نقش ها
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('role.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لیست نقش ها</p>
                            </a>
                        </li>
                        <li class="nav nav-item">
                            <a href="{{route('role.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ایجاد نقش جدید</p>
                            </a>
                        </li>
                    </ul>

                </li>

                <li class="nav-item has-treeview menu-open">
                    <a href="" class="nav-link">
                        {{--                        <i class="nav-icon fas fa-tachometer-alt"></i>--}}
                        <i class="fab fa-product-hunt"></i>
                        <p>
                            محصولات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(auth()->user()->hasRole('admin'))
                            <li class="nav-item">
                                <a href="{{route('products.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>لیست محصولات</p>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{route('products.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>محصولات درخواستی</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{route('products.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ایجاد محصول جدید</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('product-users.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لیست محصولات من</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class=" nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            سفارش ها
                        </p><i class="right fa fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('invoices.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ایجاد سفارش</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('invoices.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> لیست سفارش ها</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class=" nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            حساب های بانکی من
                        </p><i class="right fa fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('bank-accounts.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ایجاد حساب</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('bank-accounts.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لیست حساب ها</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class=" nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            تراکنش ها
                        </p><i class="right fa fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('transactions.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ایجاد تراکنش</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('transactions.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لیست تراکنش ها</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class=" nav-icon fas fa-users"></i>
                        <p>
                            کاربران
                        </p><i class="right fa fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ایجاد کاربر</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لیست کاربران</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
