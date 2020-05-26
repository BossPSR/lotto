<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky Lotter</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('logo2.png') }}" type="image/x-icon">
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
        <!-- preloader begin -->
        <div class="preloader">
            <div id="nest1"></div>
        </div>
        <!-- preloader end -->

                <!-- header begin -->
                <div class="header style-2" style="border-bottom: 1px solid #fff;background: -webkit-linear-gradient(473deg, #fa8900 20%, #ffce4f 100%);">
                    <div class="topbar" style="border-bottom: 1px solid #fff;">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 d-xl-flex d-lg-flex d-block align-items-center">
                                    <div class="support-area">
                                        {{-- <ul>
                                            <li>
                                                <span class="icon"><i class="fas fa-headphones-alt"></i></span>
                                                +00 564 834 58
                                            </li>
                                            <li>
                                                <span class="icon"><i class="far fa-envelope"></i></span>
                                                support24@gmail.com
                                            </li>
                                        </ul> --}}
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="select-lang" style="font-size: 20px;">
                                        <div>
                                            <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i>สมัครสมาชิก</a>
                                        </div>
                                        <div>
                                            <a href=""><i class="fas fa-headset"></i>ติดต่อเรา</a>
                                        </div>
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
                                            <div class="logo">

                                                <img id="logo-2" src="assets/img/logo-2.png" alt="">

                                            </div>
                                        </div>
                                        <div class="d-xl-none d-lg-none d-block col-5">
                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-9 for-lottery">
                                    <div class="mainmenu">
                                        <nav class="navbar navbar-expand-lg for-lottery">

                                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                <ul class="navbar-nav ml-auto">
                                                    <li class="nav-item dropdown">
                                                        <div class="header_login">
                                                            <form action="{{ route('login_process') }}" method="post">
                                                                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                                                                <div class="form_user">
                                                                    <div>ชื่อผู้ใช้งาน</div>
                                                                    <input class="form-control" type="text" name="username" id="">
                                                                    <a href="" tabindex="-1"><i class="fas fa-book"></i>กฏกติกาและข้อบังคับ</a>
                                                                </div>
                                                                <div class="form_user">
                                                                    <div>รหัสผ่าน</div>
                                                                    <input class="form-control" type="password" name="password" id="">
                                                                    <a href=""><i class="fas fa-unlock"></i> ลืมรหัสผ่าน</a>
                                                                </div>
                                                                <div class="form_user_send">
                                                                    <button class="btn btn-warning button_login" type="submit">เข้าสู่ระบบ</button>
                                                                </div>
                                                            </form>
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
                <!-- header end -->
                @yield('content')


                <!-- copyright begin -->
                <div class="copyright">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-8">
                                <p>Copyright © 2019; All Right Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- copyright end -->

                <!-- mobile navbar begin -->
                <div class="mobile-navbar">
                    <ul>
                        <li>
                            <a href="#"><img src="assets/img/svg/home.svg" alt=""></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/img/svg/lotto.svg" alt=""></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/img/svg/ui.svg" alt=""></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/img/svg/power-ball.svg" alt=""></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/img/svg/user.svg" alt=""></a>
                        </li>
                    </ul>
                </div>
                <!-- mobile navbar end -->

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
