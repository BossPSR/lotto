<!DOCTYPE html>
<html lang="zxx">

<?php

use App\Models\ContactHeader;

$contact_header = ContactHeader::first();
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky Lotter</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('LOGOV2.png') }}" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- fontawesome icon  -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">
    <!-- flaticon css -->
    <link rel="stylesheet" href="{{asset('assets/fonts/flaticon.css')}}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{asset('assets/css/modal-video.min.css')}}">
    <!-- flags css -->
    <link rel="stylesheet" href="{{asset('assets/css/flags.css')}}">
    <!-- vector map css -->
    <link rel="stylesheet" href="{{asset('assets/css/jquery-jvectormap-2.0.3.css')}}">
    <!-- scrollbar -->
    <link rel="stylesheet" href="{{asset('assets/css/simple-scrollbar.css')}}">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/newstyle.css')}}">
</head>

<body>
    @php $user = Auth::user(); @endphp
    <!-- preloader begin -->
    <div class="preloader">
        <div id="nest1"></div>
    </div>
    <!-- preloader end -->
    <!-- header begin -->
    <div class="header style-2" style="border-bottom: 1px solid #fff;background: -webkit-linear-gradient(473deg, #6f39d5 20%, #6f39d5 100%);">
        <div class="topbar" style="border-bottom: 1px solid #fff;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 d-xl-flex d-lg-flex d-block align-items-center">
                        <div class="support-area mt-2 mb-2">
                            <ul>
                                <li class=" text-white">
                                    <span class=""><i class="fas fa-headphones-alt"></i></span>
                                    {{$contact_header->tel}}
                                </li>
                                <li class=" text-white">
                                    <span class=""><i class="far fa-envelope"></i></span>
                                    {{$contact_header->email}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="select-lang">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="menu-bar" style="margin:15px 0;">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 d-xl-flex d-lg-flex d-block align-items-center">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-7">
                                <div class="logo" style="width:100%">

                                    <img id="logo-2" src="assets/img/LOGOV2.png" alt="">

                                </div>
                            </div>
                            <div class="d-xl-none d-lg-none d-block col-5">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 for-lottery text-white">
                        <div class="mainmenu">
                            <nav class="navbar navbar-expand-lg for-lottery">

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <div class="header_login">
                                                <div class="d-flex">
                                                    <div class="header_after_login">
                                                        {{number_format(Auth::user()->money, 2)}}
                                                        <i class="fa fa-coins"></i>
                                                        |
                                                        {{number_format(Auth::user()->credit, 2)}}
                                                        <i class="fa fa-coins"></i>
                                                        CF
                                                    </div>
                                                    <div class="header_after_login">
                                                        <i class="fa fa-bell" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="header_after_login" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label for="" style="font-weight: bold;font-size: 28px;color: #8d55ff;">ข้อมูลส่วนตัว</label>
                </div>
                <div class="modal-body row">
                    <!-- <div class="text-center" style="padding-bottom:15px;">
                        <img src="{{ $user->path_cover}}" style="width: 30%;">
                    </div> -->

                    <!-- <div style="padding:15px;">
                        <a href="{{ route('profile_user') }}" style="display: inline-block;">
                        <span class="set_profile" style="cursor:pointer;">
                            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="user-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="svg-inline--fa fa-user-circle fa-w-16 fa-fw fa-2x"><path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm128 421.6c-35.9 26.5-80.1 42.4-128 42.4s-92.1-15.9-128-42.4V416c0-35.3 28.7-64 64-64 11.1 0 27.5 11.4 64 11.4 36.6 0 52.8-11.4 64-11.4 35.3 0 64 28.7 64 64v13.6zm30.6-27.5c-6.8-46.4-46.3-82.1-94.6-82.1-20.5 0-30.4 11.4-64 11.4S204.6 320 184 320c-48.3 0-87.8 35.7-94.6 82.1C53.9 363.6 32 312.4 32 256c0-119.1 96.9-216 216-216s216 96.9 216 216c0 56.4-21.9 107.6-57.4 146.1zM248 120c-48.6 0-88 39.4-88 88s39.4 88 88 88 88-39.4 88-88-39.4-88-88-88zm0 144c-30.9 0-56-25.1-56-56s25.1-56 56-56 56 25.1 56 56-25.1 56-56 56z" class=""></path></svg> ตั้งค่าบัญชี
                        </span>
                        </a>
                    </div> -->
                   
                    <div class="col-12">
                        <label for="" style="font-size: 20px;">ชื่อเข้าสู่ระบบ</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="">ชื่อจริง</label>
                        <input type="text" name="fname" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="" style="font-size: 20px;">นามสกุล</label>
                        <input type="text" name="lname" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="" style="font-size: 20px;">อีเมล</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="" style="font-size: 20px;">วัน/เดือน/ปี เกิด</label>
                        <input type="text" name="bit" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="" style="font-size: 20px;">โทรศัพท์ติดต่อ</label>
                        <input type="text" name="tel" class="form-control">
                    </div>


                </div>
                <div class="modal-footer" style="display: block;">
                    <div class="row">
                        <div class="col-6" id="logout_user">
                            <a href="{{ route('logout') }}" style="display: flex;align-items: center;font-size: 22px;">
                                <i class="fas fa-sign-out-alt" style="font-size:40px;padding-right: 5px;"></i> ออกจากระบบ
                            </a>
                        </div>

                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- header end -->

    @yield('contact_member')



    <!-- jquery -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <!-- proper js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- bootstrap -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- owl carousel -->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel2.thumbs.min.js')}}"></script>

    <!-- modal video js -->
    <script src="{{asset('assets/js/jquery-modal-video.min.js')}}"></script>
    <!-- filterizr js -->
    <script src="{{asset('assets/js/jquery.filterizr.min.js')}}"></script>
    <!-- way poin js-->
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <!-- wow js-->
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <!-- flgstrap js -->
    <script src="{{asset('assets/js/jquery.flagstrap.min.js')}}"></script>
    <!-- vector map js -->
    <script src="{{asset('assets/js/jquery-jvectormap-2.0.3.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-jvectormap-world-mill.js')}}"></script>
    <script src="{{asset('assets/js/gdp-data.js')}}"></script>
    <script src="{{asset('assets/js/vector-map-activated.js')}}"></script>
    <!-- niceScroll js -->
    <script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
    <!-- slick js -->
    <script src="{{asset('assets/js/slick.js')}}"></script>
    <script src="{{asset('assets/js/slick-slider.js')}}"></script>
    <!-- main -->
    <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>