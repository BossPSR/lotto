@extends('frontend/option/layout_member')
@section('contact_member')

       <!-- jackpot begin -->
       <div class="jackpot">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                    <a href="{{ route('plus_story') }}" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">เพิ่มบทความใหม่</button></a>
                </div>
            </div>
        </div>
        <div class="container shape-container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                    <div class="single-jackpot">
                        <div class="part-head">
                            <div class="icon">
                                <img src="assets/img/svg/euro-million.png" alt="">
                            </div>
                            <div class="text">
                                <span class="amount">ยอดเงิน</span>
                                <span class="draw-date"></span>
                            </div>
                        </div>
                        <div class="part-body">
                            <div class="d-flex">
                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                    <div class="single-jackpot">
                                        <div class="part-head">
                                           ฿ 0
                                        </div>
                                        <div class="part-body">


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-xl-6 col-lg-6 col-sm-12">
                                    <a href="{{ route('lottery_request_deposit') }}" style="display:block; color:#fff;">
                                        <div class="single-jackpot bg-primary">
                                            <div class="part-head">
                                                ฝากเครดิต
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-sm-12">
                                    <a href="{{ route('lottery_withdraw') }}" style="display:block; color:#fff;">
                                        <div class="single-jackpot bg-success">
                                            <div class="part-head">
                                                ถอนเครดิต
                                            </div>
                                            <div class="part-body">


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

        <div class="container shape-container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                    <div class="single-jackpot">
                        <div class="part-head">

                        </div>
                        <div class="part-body">
                            <div class="d-flex">
                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_play') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot">
                                            <div class="part-head">
                                                แทงหวย
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_transaction') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot">
                                            <div class="part-head">
                                                รายการโพย
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_result') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot">
                                            <div class="part-head">
                                                ผลรางวัล
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>

                            <div class="d-flex">

                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_credit') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot">
                                            <div class="part-head">
                                                รายงานเครดิต
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_affiliate') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot">
                                            <div class="part-head">
                                                ระบบแนะนำ
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_number_set') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot">
                                            <div class="part-head">
                                                สร้างเลขชุด
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>

                            <div class="d-flex">


                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_news') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot">
                                            <div class="part-head text-success">
                                                ข่าวสารประชาสัมพันธ์
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_bonus') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot">
                                            <div class="part-head">
                                                ระบบโบนัสทั้งหมด
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('help') }}" style="display: block; color:#3d5169;">
                                        <div class="single-jackpot">
                                            <div class="part-head">
                                                วิธีการใช้งาน
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>

                            <div class="d-flex">



                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('contact') }}" style="display: block; color:#3d5169;">
                                        <div class="single-jackpot">
                                            <div class="part-head">
                                                ติดต่อเอเย่นต์
                                            </div>
                                            <div class="part-body">


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
    @if(session()->has('message'))
    Swal.fire({
        type: '{{ session()->get("status") }}',
        title: '<small> {{ session()->get("message") }} </small>',
        showConfirmButton: false,
        timer: 5000
    });
    @endif
</script>
@endsection
