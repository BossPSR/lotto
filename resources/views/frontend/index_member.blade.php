@extends('frontend/option/layout_member')


@section('contact_member')
<!-- jackpot begin -->
<div class="jackpot" style="background:#Fff;  min-height: calc(100vh - 100px);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                <!-- <a href="" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">เพิ่มบทความใหม่</button></a> -->
            </div>
        </div>
    </div>
    <div class="container shape-container" style="max-width: 1800px; margin-bottom:0px;">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                <div class="single-jackpot" style="height:auto">
                    <div class="part-head">
                        <div class="text" style="margin-left:25px;">
                            <span class="amount">ยอดเงิน</span>
                            <span class="draw-date"></span>
                        </div>
                    </div>
                    <div class="part-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                <div class="single-jackpot p-2">
                                    <div class="part-head">
                                        <h1 class="text-center w-100 mt-4">{{number_format($user_info->money, 2)}} ฿ </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('lottery_request_deposit') }}" style="display:block; color:#fff;">
                                    <div class="single-jackpot bg-primary">
                                        <div class="text-center">
                                            <i class="far fa-money-bill-alt" style="font-size: 40Px;margin-bottom: 10px; margin-left:0px;"></i>
                                        </div>
                                        <div class="text-center" style="word-break:break-word">
                                            ฝากเครดิต
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-6">
                                <a href="{{ route('lottery_withdraw') }}" style="display:block; color:#fff;">
                                    <div class="single-jackpot bg-success">
                                        <div class="text-center">
                                            <i class="fas fa-hand-holding-usd" style="font-size: 40Px;margin-bottom: 10px; margin-left:0px;"></i>
                                        </div>
                                        <div class="text-center" style="word-break:break-word">
                                            ถอนเครดิต
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container shape-container" style="max-width: 1800px">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                <div class="single-jackpot">
                    <div class="part-head">
                        <b style="font-size: 22px">รายการต่างๆ</b>
                    </div>
                    <div class="part-body">
                        <div class="row">
                            <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <a href="{{ route('lottery_play') }}" style="display:block; color:#3d5169;">
                                    <div class="single-jackpot ">
                                        <div class="text-center">
                                            <i class="fas fa-money-check-alt" style="font-size: 40Px;margin-bottom: 10px; margin-left:0px;"></i>
                                        </div>
                                        <div class="text-center" style="word-break:break-word">
                                            แทงหวย
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <a href="{{ route('lottery_transaction') }}" style="display:block; color:#3d5169;">
                                    <div class="single-jackpot ">
                                        <div class="text-center">
                                            <i class="far fa-list-alt" style="font-size: 40Px;margin-bottom: 10px; margin-left:0px;"></i>

                                        </div>
                                        <div class="text-center" style="word-break:break-word">
                                            รายการโพย

                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <a href="{{ route('lottery_result') }}" style="display:block; color:#3d5169;">
                                    <div class="single-jackpot">
                                        <div class="text-center">
                                            <i class="fas fa-trophy" style="font-size: 40Px;margin-bottom: 10px; margin-left:0px;"></i>
                                        </div>
                                        <div class="text-center" style="word-break:break-word">
                                            ผลรางวัล

                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <a href="{{ route('lottery_money') }}" style="display:block; color:#3d5169;">
                                    <div class="single-jackpot ">
                                        <div class="text-center">
                                            <i class="fas fa-university" style="font-size: 40Px;margin-bottom: 10px; margin-left:0px;"></i>
                                        </div>
                                        <div class="text-center" style="word-break:break-word">
                                            รายการแจ้ง ฝาก/ถอน

                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <a href="{{ route('lottery_credit') }}" style="display:block; color:#3d5169;">
                                    <div class="single-jackpot ">
                                        <div class="text-center">
                                            <i class="fas fa-list-ol" style="font-size: 40Px;margin-bottom: 10px; margin-left:0px;"></i>
                                        </div>
                                        <div class="text-center" style="word-break:break-word">
                                            รายงานเครดิต

                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <a href="{{ route('lottery_affiliate') }}" style="display:block; color:#3d5169;">
                                    <div class="single-jackpot ">
                                        <div class="text-center">
                                            <i class="fas fa-user-friends" style="font-size: 40Px;margin-bottom: 10px; margin-left:0px;"></i>

                                        </div>
                                        <div class="text-center" style="word-break:break-word">
                                            ระบบแนะนำ

                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <a href="{{ route('lottery_number_set') }}" style="display:block; color:#3d5169;">
                                    <div class="single-jackpot ">
                                        <div class="text-center">
                                            <i class="fas fa-th" style="font-size: 40Px;margin-bottom: 10px; margin-left:0px;"></i>

                                        </div>
                                        <div class="text-center" style="word-break:break-word">
                                            สร้างเลขชุด

                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <a href="{{ route('lottery_news') }}" style="display:block; color:#3d5169;">
                                    <div class="single-jackpot">
                                        <div class="text-center">
                                            <i class="far fa-newspaper" style="font-size: 40Px;margin-bottom: 10px; margin-left:0px;"></i>

                                        </div>
                                        <div class="text-center" style="word-break:break-word">
                                            ข่าวสารประชาสัมพันธ์

                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <a href="{{ route('lottery_bonus') }}" style="display:block; color:#3d5169;">
                                    <div class="single-jackpot ">
                                        <div class="text-center">
                                            <i class="fas fa-medal" style="font-size: 40Px;margin-bottom: 10px; margin-left:0px;"></i>

                                        </div>
                                        <div class="text-center" style="word-break:break-word">

                                            ระบบโบนัสทั้งหมด
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <a href="{{ route('help') }}" style="display: block; color:#3d5169;">
                                    <div class="single-jackpot">
                                        <div class="text-center">
                                            <i class="fas fa-book" style="font-size: 40Px;margin-bottom: 10px; margin-left:0px;"></i>

                                        </div>
                                        <div class="text-center" style="word-break:break-word">
                                            วิธีการใช้งาน

                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <a href="{{ route('message') }}" style="display: block; color:#3d5169;">
                                    <div class="single-jackpot">
                                        <div class="text-center">
                                            <i class="fas fa-envelope" style="font-size: 40Px;margin-bottom: 10px; margin-left:0px;"></i>

                                        </div>
                                        <div class="text-center" style="word-break:break-word">
                                            กล่องจดหมาย

                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <a href="{{ route('contact') }}" style="display: block; color:#3d5169;">
                                    <div class="single-jackpot">
                                        <div class="text-center">
                                            <i class="far fa-address-book" style="font-size: 40Px;margin-bottom: 10px; margin-left:0px;"></i>

                                        </div>
                                        <div class="text-center" style="word-break:break-word">
                                            ติดต่อเอเย่นต์

                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jackpot end -->
<script src="{{url('backend/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script>
    var csrf_token = '{{ csrf_token() }}';

    <?php

    if($content_modal)
    {
        ?>
        $(document).ready(function() {

            setTimeout(function(){
                $('#modal_content_huay').modal('show');

            }, 1000)

        });
    <?php
    }
    ?>
    @if(session()-> has('message'))
    Swal.fire({
        type: '{{ session()->get("status") }}',
        title: '<small> {{ session()->get("message") }} </small>',
        showConfirmButton: false,
        timer: 5000
    });
    console.log('has')
    @endif
</script>
@endsection
