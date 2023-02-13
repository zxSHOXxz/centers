<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> CMSA | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free-6.1.1/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('cms/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom style for RTL -->
    <link rel="stylesheet" href="{{ asset('cms/dist/css/custom.css') }}">
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home') }}" class="nav-link">الرئيسية</a>
                </li>

            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="بحث"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav mr-auto-navbav">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('cms/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('cms/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('cms/dist/img/CMSA-LOGO.jpg') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">CENTER</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">

                        {{--  <img src="{{ asset('storage/images/admin/' . auth('admin')->user()->images) }}" class="img-circle elevation-2"  --}}
                        {{--  <img class="brand-image img-circle elevation-3" src="{{ asset('storage/images/admin/' . auth('admin')->user()->images) }}"  --}}
                        {{--  alt="User Image">  --}}
                    </div>
                    <div class="info">
                        {{--  <a href="#" class="d-block"> {{ auth('admin')->user()->full_name }}</a>  --}}
                        @if (Auth::guard('admin')->id())
                            @if (auth('admin')->user()->images != '')
                                <img class="brand-image img-circle elevation-3"
                                    src="{{ asset('images/admin/' . auth('admin')->user()->images) }}"alt="User Image">
                            @else
                                <img class="brand-image img-circle elevation-3"
                                    src="{{ asset('images/userSolid.png') }}"alt="User Image">
                            @endif
                        @elseif (Auth::guard('employee')->id())
                            @if (auth('employee')->user()->images != '')
                                <img src="{{ asset('images/employee/' . auth('employee')->user()->images) }}"
                                    class="brand-image img-circle elevation-3" alt="User Image">
                            @else
                                <img class="brand-image img-circle elevation-3"
                                    src="{{ asset('images/userSolid.png') }}"alt="User Image">
                            @endif
                        @elseif (Auth::guard('trainer')->id())
                            @if (auth('trainer')->user()->images != '')
                                <img src="{{ asset('images/trainer/' . auth('trainer')->user()->images) }}"
                                    class="brand-image img-circle elevation-3" alt="User Image">
                            @else
                                <img class="brand-image img-circle elevation-3"
                                    src="{{ asset('images/userSolid.png') }}"alt="User Image">
                            @endif
                        @else
                            <img class="brand-image img-circle elevation-3"
                                src="{{ asset('images/userSolid.png') }}"alt="User Image">

                        @endif
                        {{-- <img src="{{ asset('cms/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" --}}

                    </div>
                    <div class="info">
                        @if (Auth::guard('admin')->id())
                            <a href="#" class="d-block"> {{ auth('admin')->user()->full_name }}</a>
                        @elseif (Auth::guard('employee')->id())
                            <a href="#" class="d-block"> {{ auth('employee')->user()->full_name }}</a>
                        @elseif (Auth::guard('trainer')->id())
                            <a href="#" class="d-block"> {{ auth('trainer')->user()->full_name }}</a>
                        @elseif (Auth::guard('student')->id())
                            <a href="#" class="d-block"> {{ auth('student')->user()->full_name }}</a>
                        @else
                            <a href="#" class="d-block"> users</a>
                        @endif
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="{{ route('home') }}" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    الرئيسية | @yield('sub-title')
                                </p>
                            </a>

                        </li>
                        <li class="nav-header">
                            الأدوار والصلاحيات
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-users ml-2"></i>
                                <p>
                                    الأدوار
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link">
                                        <i class="fas fa-desktop ml-2"></i>
                                        <p> عرض الأدوار</p>
                                    </a>
                                </li>
                                {{-- @can('Create-Role') --}}
                                <li class="nav-item">
                                    <a href="{{ route('roles.create') }}" class="nav-link">
                                        <i class="fas fa-plus ml-2"></i>
                                        <p>إضافة دور جديد</p>
                                    </a>
                                </li>


                            </ul>
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-users ml-2"></i>
                                <p>
                                    الصلاحيات
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('permissions.index') }}" class="nav-link">
                                        <i class="fas fa-desktop ml-2"></i>
                                        <p> عرض الصلاحيات</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('permissions.create') }}" class="nav-link">
                                        <i class="fas fa-plus ml-2"></i>
                                        <p>إضافة صلاحية جديدة</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-header">
                            مستخدمين النظام
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                {{-- <i class="fas fa-user ml-2"></i> --}}
                                <i class="fa-solid fa-user-gear ml-2"></i>

                                <p>
                                    المشرف
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('admins.index') }}" class="nav-link">
                                        <i class="fas fa-desktop ml-2"></i>
                                        <p> عرض المشرفين</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admins.create') }}" class="nav-link">
                                        <i class="fas fa-plus ml-2"></i>
                                        <p>إضافة مشرف جديد</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user ml-2"></i>

                                <p>
                                    الموظف
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('employees.index') }}" class="nav-link">
                                        <i class="fas fa-desktop ml-2"></i>

                                        <p> عرض الموظفين</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('employees.create') }}" class="nav-link">
                                        <i class="fas fa-plus ml-2"></i>
                                        <p>إضافة موظف جديد</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                {{-- <i class="fas fa-user "></i> --}}
                                <i class="fa-solid fa-chalkboard-user ml-2"></i>
                                <p>
                                    المدرب
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">


                                <li class="nav-item">
                                    <a href="{{ route('trainers.index') }}" class="nav-link">
                                        <i class="fas fa-desktop ml-2"></i>
                                        <p> عرض المدربين</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('trainers.index') }}" class="nav-link">
                                        <i class="fas fa-plus ml-2"></i>
                                        <p>إضافة مدرب جديد</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                {{-- <i class="fas fa-user "></i> --}}
                                {{-- <i class="fa-solid fa-graduation-cap ml-2"></i> --}}
                                <i class="fa-solid fa-user-graduate ml-2"></i>
                                <p>
                                    الطالب
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">


                                <li class="nav-item">
                                    <a href="{{ route('students.index') }}" class="nav-link">
                                        <i class="fas fa-desktop ml-2"></i>
                                        <p> عرض الطلاب</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('students.create') }}" class="nav-link">
                                        <i class="fas fa-plus ml-2"></i>
                                        <p>إضافة طالب جديد</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-header">
                            العلاقات العامة
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                {{-- <i class="fas fa-users"></i> --}}
                                <i class="fas fa-history ml-2"></i>
                                <p>
                                    سجل الزيارات
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('vistors.index') }}" class="nav-link">
                                        <i class="fas fa-desktop"></i>
                                        <p> عرض الزائرين</p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{ route('vistors.create') }}"class="nav-link">
                                        <i class="fas fa-plus"></i>
                                        <p>إضافة زائر جديد</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">

                                <i class="fa-solid fa-address-card ml-2"></i>
                                <p>
                                    ملف الاتصالات
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('connections.index') }}" class="nav-link">
                                        <i class="fas fa-desktop"></i>
                                        <p> عرض الاتصالات </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('connections.create') }}" class="nav-link">
                                        <i class="fas fa-plus"></i>
                                        <p>إضافة اتصالات </p>
                                    </a>
                                </li>


                            </ul>
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">

                                <i class="fas fa-file-alt ml-2"></i>
                                <p>
                                    تقديم طلب
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('applies.index') }}" class="nav-link">
                                        <i class="fas fa-desktop"></i>
                                        <p> عرض الطلبات </p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{ route('applies.create') }}" class="nav-link">
                                        <i class="fas fa-plus"></i>
                                        <p>إضافة طلبات </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">

                                <i class="fa-solid fa-money-bill ml-2"></i>
                                <p>
                                    ملف الدفعات
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('financial_payments.index') }}" class="nav-link">
                                        <i class="fas fa-desktop"></i>
                                        <p> عرض الدفع </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('financial_payments.create') }}" class="nav-link">
                                        <i class="fas fa-plus"></i>
                                        <p>إضافة دفعة </p>
                                    </a>
                                </li>


                            </ul>
                        </li>


                        <li class="nav-header">
                            إدارة محتوى النظام
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">

                                <i class="fa-solid fa-tree-city ml-2"></i>
                                <p>
                                    المدينة
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('cities.index') }}" class="nav-link">
                                        <i class="fas fa-desktop"></i>
                                        <p> عرض المدن</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('cities.create') }}" class="nav-link">
                                        <i class="fas fa-plus"></i>
                                        <p>إضافة مدينة جديدة</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fab fa-servicestack ml-2"></i>

                                {{-- <i class="fal fa-chalkboard-teacher "></i> --}}

                                <p>
                                    القاعة
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('rooms.index') }}" class="nav-link">
                                        <i class="fas fa-desktop"></i>
                                        <p> عرض القاعات</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('rooms.create') }}" class="nav-link">
                                        <i class="fas fa-plus"></i>
                                        <p>إضافة قاعة جديد </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('timelines.index') }}" class="nav-link">
                                        <i class="fas fa-desktop"></i>
                                        <p>عرض جدول القاعة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('timelines.create') }}" class="nav-link">
                                        <i class="fas fa-plus"></i>
                                        <p>إضافة جدول القاغة </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-header">
                            إدارة التدريب
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                {{-- <i class="fas fa-star ml-2"></i> --}}

                                <i class="fa-solid fa-book-bookmark ml-2"></i>
                                <p>
                                    الدبلومة
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('diplomas.index') }}" class="nav-link">
                                        <i class="fas fa-desktop"></i>
                                        <p> عرض الدبلومة</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('diplomas.create') }}" class="nav-link">
                                        <i class="fas fa-plus"></i>
                                        <p>إضافة دبلومة جديدة</p>
                                    </a>
                                </li>


                            </ul>
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-users ml-2"></i>
                                <p>
                                    المجموعات
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('groups.index') }}" class="nav-link">
                                        <i class="fas fa-desktop"></i>
                                        <p> عرض المجموعات</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('groups.create') }}" class="nav-link">
                                        <i class="fas fa-plus"></i>
                                        <p>إضافة مجموعة جديدة</p>
                                    </a>
                                </li>




                            </ul>
                        </li>

                        {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fas fa-star ml-2"></i>
              <p>
                  المساقات
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('courses.index') }}" class="nav-link">
                    <i class="fas fa-desktop"></i>
                  <p>  عرض المساقات</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('courses.create') }}" class="nav-link">
                    <i class="fas fa-plus"></i>
                  <p>إضافة مساق جديدة</p>
                </a>
              </li>

            </ul>
          </li> --}}
                        <li class="nav-header">
                            الإعدادات
                        </li>
                        @if (Auth::guard('admin')->id())
                            <li class="nav-item">
                                <a href="{{ route('dashboard.auth.profile-edit') }}" class="nav-link">
                                    <i class="fas fa-user-cog ml-2"></i>
                                    <p> تعديل الصفحة الشخصية</p>
                                </a>
                            </li>
                        @elseif (Auth::guard('trainer')->id())
                            <li class="nav-item">
                                <a href="{{ route('trainer_edit') }}" class="nav-link">
                                    <i class="fas fa-user-cog ml-2"></i>
                                    <p> تعديل الصفحة الشخصية</p>
                                </a>
                            </li>
                        @elseif (Auth::guard('employee')->id())
                            <li class="nav-item">
                                <a href="{{ route('employee_edit') }}" class="nav-link">
                                    <i class="fas fa-user-cog ml-2"></i>
                                    <p> تعديل الصفحة الشخصية</p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::guard('admin')->id())
                            <li class="nav-item">
                                <a href="{{ route('cms.admin.edit-password') }}" class="nav-link">
                                    <i class="fas fa-lock ml-2"></i>
                                    <p> تغيير كلمة المرور </p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('cms.admin.logout') }}" class="nav-link">
                                <i class="fas fa-sign-out-alt ml-2"></i>
                                <p> تسجيل الخروج </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> @yield('page title')</h1>
                        </div><!-- /.col -->

                        <div class="col-sm-12">
                            <ol class="breadcrumb float-sm-left">

                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                <li class="breadcrumb-item active"> @yield('active title')</li>

                                <!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                @yield('content')

            </div>
        </div>


        <div>
            <footer class="main-footer ">
                <strong> جميع الحقوق محفوظة {{ now()->year }}-{{ now()->year + 1 }} &copy;<a
                        href="#">{{ env('APP_NAME') }}</a>.</strong>
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> {{ env('APP_VERSION') }}
                </div>
            </footer>
        </div>
        {{-- @endif --}}

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- ./wrapper -->

    </div>
    <!-- jQuery -->
    <script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('cms/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 rtl -->
    <script src="{{ asset('cms/https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('cms/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('cms/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('cms/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('cms/plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('cms/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('cms/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('cms/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('cms/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('cms/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('cms/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('cms/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('cms/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('cms/dist/js/demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('cms/js/crud.js') }}"></script>
    @yield('scripts')
</body>

</html>
