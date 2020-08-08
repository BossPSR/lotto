<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php

use App\Models\Chat;
use App\Models\Deposits;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Withdraws;

$deposit_count = Deposits::where('status', 'pending')->count();
$withdraw_count = Withdraws::where('status', 'pending')->count();
$user_count = User::where('status', 'รอการตรวจสอบ')->count();
$chat_count = Chat::where('is_admin_read', '0')->count();
$credit_withdraw_count = Transactions::where('status', 'pending')->where('direction', 'OUT')->where('type', 'CREDIT_WITHDRAW')->count();

?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Lucky Lotto</title>
    <link rel="apple-touch-icon" href="{{ asset('backend/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo2.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/extensions/shepherd-theme-default.css') }}">
    <link rel="stylesheet" type="text/css" href=".{{ asset('backend/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href=".{{ asset('backend/app-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href=".{{ asset('backend/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/search.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/dashboard-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/card-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/plugins/tour/tour.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/plugins/file-uploaders/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/data-list-view.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">

                        </ul>
                        <ul class="nav navbar-nav">

                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">

                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>

                        {{-- <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                            <div class="media-body">
                                                <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                                            <div class="media-body">
                                                <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6><small class="notification-text">Server have 99% CPU usage.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>
                                            <div class="media-body">
                                                <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>
                                            <div class="media-body">
                                                <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li> --}}
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown" style="cursor: context-menu;">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{ Auth::user()->username }}</span><span class="user-status"></span></div><span><img class="round" src="{{ asset('backend/app-assets/images/portrait/small/user.png') }}" alt="avatar" height="40" width="40"></span>
                            </a>
                            {{-- <div class="dropdown-menu dropdown-menu-right"> --}}
                                {{-- <a class="dropdown-item" href="page-user-profile.html"><i class="feather icon-user"></i> Edit Profile</a> --}}
                                {{-- <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}"><i class="feather icon-power"></i> Logout</a>
                            </div> --}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Files</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="{{ asset('backend/app-assets/images/icons/xls.png') }}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="{{ asset('backend/app-assets/images/icons/jpg.png') }}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="{{ asset('backend/app-assets/images/icons/pdf.png') }}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="{{ asset('backend/app-assets/images/icons/doc.png') }}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
            </a></li>
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Members</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-8.jpg') }}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-1.jpg') }}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-14.jpg') }}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-6.jpg') }}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="#">

                        <h2 class="brand-text mb-0">Lucky Lotto</h2>
                    </a></li>
                <style>
                    #tippy-1 {
                        display: none;
                    }
                </style>
                {{-- <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li> --}}
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header">
                    <span>
                        @if (Auth::user()->status == "คนออกผลหวย")
                        คนออกผลห่วย
                        @elseif (Auth::user()->status == "ผู้ดูแลสมาชิก")
                        ผู้ดูแลสมาชิก
                        @elseif (Auth::user()->status == "ผู้ดูแลฝากถอน")
                        ผู้ดูแลฝากถอน
                        @elseif (Auth::user()->status == "ผู้ดูแลระบบใหญ่")
                        ผู้ดูแลระบบใหญ่
                        @endif
                    </span>
                </li>

                @if (Auth::user()->status == "คนออกผลหวย" || Auth::user()->status == "ผู้ดูแลระบบใหญ่")
                @if(Auth::user()->status == "ผู้ดูแลระบบใหญ่")
                <li class="nav-item {{ Request::segment(2) == 'index_admin' ? 'active' : '' }}">
                    <a href="{{ route('admin.index') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                <li class="nav-item {{ Request::segment(2) == 'manage_admin' ? 'active' : '' }}">
                    <a href="{{ route('admin.manage_admin') }}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="ระบบจัดการผู้ดูแล">ระบบจัดการผู้ดูแล</span></a>
                </li>
                @endif

                <li class="nav-item {{ Request::segment(2) == 'manage_huay' ||  Request::segment(2) == 'manage_huay_yeekee_cf' ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-table"></i><span class="menu-title" data-i18n="จัดการหวย">จัดการหวย (ราคา)</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ '/admin/manage_huay?category_id=1' }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="จัดการหวย">จัดการหวย-ทั่วไป</span></a>
                        <li><a href="{{ '/admin/manage_huay?category_id=2' }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="จัดการหวย">จัดการหวย-ยี่กี</span></a>
                        <li><a href="{{ '/admin/manage_huay?category_id=3' }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="จัดการหวย">จัดการหวย-ยี่กี Big Money</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Request::segment(2) == 'manage_huay_round' || Request::segment(2) == 'manage_huay_yeekee_cf' ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-table"></i><span class="menu-title" data-i18n="จัดการหวย">จัดการรอบหวย</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ '/admin/manage_huay_round?category_id=1' }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="จัดการหวย">จัดการรอบ-ทั่วไป</span></a>
                        <li><a href="{{ '/admin/manage_huay_round?category_id=2' }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="จัดการหวย">จัดการรอบ-ยี่กี</span></a>
                        <li><a href="{{ '/admin/manage_huay_round?category_id=3' }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="จัดการหวย">จัดการรอบ-ยี่กี Big Money</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Request::segment(2) == 'reward_huay' || Request::segment(2) == 'reward_huay_yeekee' || Request::segment(2) == 'reward_huay_yeekee_cf' ? 'active' : '' }}">
                    <a ><i class="fa fa-trophy"></i><span class="menu-title" data-i18n="ออกผลรางวัล">ออกผลรางวัล</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ '/admin/reward_huay?category_id=1' }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="จัดการหวย">จัดการรอบ-ทั่วไป</span></a>
                        <li><a href="{{ '/admin/reward_huay?category_id=2' }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="จัดการหวย">จัดการรอบ-ยี่กี</span></a>
                        <li><a href="{{ '/admin/reward_huay?category_id=3' }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="จัดการหวย">จัดการรอบ-ยี่กี Big Money</span></a>
                    </ul>
                </li>
                <li class="nav-item {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">สถิติการแทง</span></a>
                </li>

                <li class="nav-item {{ Request::segment(2) == 'un_huay' || Request::segment(2) == 'un_huay_yeekee' || Request::segment(2) == 'un_huay_yeekee_cf' ? 'active' : '' }}">
                    <a href="{{ route('admin.un_huay') }}"><i class="fa fa-sort-numeric-asc"></i><span class="menu-title" data-i18n="จัดการเลขอั้น">จัดการเลขอั้น</span></a>
                </li>

                <li class="nav-item {{ Request::segment(2) == 'chit_huay' ? 'active' : '' }}">
                    <a href="{{ route('admin.chit_huay') }}"><i class="fa fa-delicious"></i><span class="menu-title" data-i18n="โพยหวย">โพยหวย</span></a>
                </li>

                @endif
                @if (Auth::user()->status == "ผู้ดูแลสมาชิก" || Auth::user()->status == "ผู้ดูแลระบบใหญ่")

                <li class="nav-item {{ Request::segment(2) == 'chat' ? 'active' : '' }}">
                    <a href="{{ route('admin.chat') }}"><i class="fa fa-comments"></i><span class="menu-title" data-i18n="CHAT">CHAT ({{$chat_count}})</span></a>
                </li>

                <li class="nav-item {{ Request::segment(2) == 'approve_user' || Request::segment(2) == 'list_user' || Request::segment(2) == 'blacklist_user' ? 'active' : '' }}">
                    <a href="#"><i class="feather icon-users"></i><span class="menu-title" data-i18n="ระบบจัดการผู้เล่น">ระบบจัดการผู้เล่น ({{$user_count}})</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('admin.approve_user') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="อนุมัติสมัครสมาชิก">อนุมัติสมัครสมาชิก</span></a>
                        </li>
                        <li><a href="{{ route('admin.list_user') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="รายการผู้เล่น">รายการผู้เล่น</span></a>
                        </li>
                        <li><a href="{{ route('admin.blacklist_user') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="บัญชีดำ">บัญชีดำ</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Request::segment(2) == 'news_huay' ? 'active' : '' }}">
                    <a href="{{ route('admin.news_huay') }}"><i class="fa fa-newspaper-o"></i><span class="menu-title" data-i18n="จัดการข่าวสาร">จัดการข่าวสาร</span></a>
                </li>
                <li class="nav-item {{ Request::segment(2) == 'content_modal_huay' ? 'active' : '' }}">
                    <a href="{{ route('admin.content_modal_huay') }}"><i class="fa fa-newspaper-o"></i><span class="menu-title" data-i18n="จัดการข่าวสาร Modal">จัดการข่าวสาร Modal</span></a>
                </li>

                <li class="nav-item {{ Request::segment(2) == 'rule_huay' ? 'active' : '' }}">
                    <a href="{{ route('admin.rule_huay') }}"><i class="fa fa-list-alt"></i><span class="menu-title" data-i18n="จัดการกฎกติกา">จัดการกฎกติกา</span></a>
                </li>
                <li class="nav-item {{ Request::segment(2) == 'contact_huay' ? 'active' : '' }}">
                    <a href="{{ route('admin.contact_huay') }}"><i class="feather icon-phone-outgoing"></i><span class="menu-title" data-i18n="จัดการข้อมูลติดต่อ">จัดการข้อมูลติดต่อ</span></a>
                </li>
                @endif
                @if (Auth::user()->status == "ผู้ดูแลฝากถอน" || Auth::user()->status == "ผู้ดูแลระบบใหญ่")

                <li class="nav-item {{ Request::segment(2) == 'deposit_approve' || Request::segment(2) == 'deposit_list' ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-money"></i><span class="menu-title" data-i18n="จัดการฝากเงิน">จัดการฝากเงิน ({{$deposit_count}})</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('admin.deposit_approve') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="อนุมัติแจ้งฝาก">อนุมัติแจ้งฝาก</span></a>
                        </li>
                        <li><a href="{{ route('admin.deposit_list') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="รายการแจ้งฝากเงิน">รายการแจ้งฝากเงิน</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Request::segment(2) == 'withdraw_approve' || Request::segment(2) == 'withdraw_list' ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-credit-card-alt"></i><span class="menu-title" data-i18n="จัดการถอนเงิน">จัดการถอนเงิน ({{$withdraw_count}})</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('admin.withdraw_approve') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="อนุมัติแจ้งถอน">อนุมัติแจ้งถอน</span></a>
                        </li>
                        <li><a href="{{ route('admin.withdraw_list') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="รายการแจ้งถอนเงิน">รายการแจ้งถอนเงิน</span></a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item {{ Request::segment(2) == 'bank_huay' ? 'active' : '' }}">
                    <a href="{{ route('admin.bank_huay') }}"><i class="fa fa-university"></i><span class="menu-title" data-i18n="จัดการบัญชีธนาคาร">จัดการบัญชีธนาคาร</span></a>
                </li>

                <li class="nav-item {{ Request::segment(2) == 'commission_manage' || Request::segment(2) == 'commission_credit' || Request::segment(2) == 'commission_approve' ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-percent"></i><span class="menu-title" data-i18n="ระบบคอมมิชชั่น">ระบบคอมมิชชั่น ({{$credit_withdraw_count}})</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('admin.commission_manage') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="จัดการคอมมิชชั่น">จัดการคอมมิชชั่น</span></a>
                        </li>
                        <li><a href="{{ route('admin.commission_credit') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="รายงานเครดิตแนะนำ">รายงานเครดิตแนะนำ</span></a>
                        </li>
                        <li><a href="{{ route('admin.commission_approve') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="รายการอนุมัติถอนเงิน">รายการอนุมัติถอนเงิน</span></a>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('logout') }}"><i class="feather icon-power"></i><span class="menu-title" data-i18n="ออกจากระบบ">ออกจากระบบ</span></a>
                </li>


            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('contact_admin')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('backend/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('backend/app-assets/vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('backend/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/components.js') }}"></script>

    <script src="{{ asset('backend/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/extensions/tether.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/extensions/shepherd.min.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('backend/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/components.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('backend/app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/ui/data-list-view.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/modal/components-modal.js') }}"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
