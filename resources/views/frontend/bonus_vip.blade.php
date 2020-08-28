@extends('frontend/option/layout_member')
@section('contact_member')

<!-- jackpot begin -->
<div class="jackpot" style="background:#FFF; min-height:100vh">
    <div class="container">
        <div class="row">
            {{-- <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                <a href="/index_member" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">ย้อนกลับ</button></a>
            </div> --}}
        </div>
    </div>
    <div class="container shape-container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                <div class="single-jackpot">
                    <div class="part-head" style="display: block;">

                        <div class="text row" style="margin-left:25px;">
                            <div class="col-6">
                                <span class="amount"  style="color:#6f39d5">ระบบโบนัสทั้งหมด</span>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/index_member" style="display: inline-block; font-size: 20px; background-color: #6f39d5;color:#FFF" class="btn btn-warning">ย้อนกลับ</a>
                            </div>

                        </div>

                        <div class="text row" style="margin-left:25px;">
                            <div class=" text-left mb-2">
                                <div style="display: inline-flex;">
                                    <a href="/lottery_bonus" class="nav-link text-secondary"><i class="fa fa-birthday-cake"></i> โบนัสวันเกิด</a>
                                    <a href="/bonus_normal" class="nav-link text-secondary"><i class="far fa-money-bill-alt"></i> แทงหวยสะสมครบ 10 วัน รับ 200 เครดิต</a>
                                    <a href="/bonus_vip" class="nav-link text-warning"><i class="fa fa-star"></i> ระดับVIP แทงครบยอด รับเครดิตพิเศษ</a>
                                </div>
                            </div>
                        </div>

                        <div class="text row" style="justify-content:center;">
                            <div class="mb-2">
                                <div style="font-size:20px;">
                                    ระดับสมาชิกปัจจุบันของคุณ
                                </div>
                                <div class="text-center" style="background:#3b9854; font-size:25px; color:#fff;">VIP 1</div>
                            </div>
                        </div>

                        <div class="text row" style="justify-content:center;">
                            <div class="mb-2">
                                <div class="text-center" style="font-size:20px;">
                                    ยอดแทงสะสมทั้งหมดของคุณ
                                </div>
                                <div class="text-center" style="font-size:25px;">{{ $numPrice_complete }} ฿</div>
                                <div class="text-center" style="font-size:20px;">
                                    แถบแสดงยอดแทงของคุณที่เริ่มนับจาก VIP ปัจจุบัน
                                </div>

                            </div>
                        </div>

                        <div class="mb-2" style="overflow:hidden;">
                            <div class="text-center" style="float: left; width:49%; border:#3b9854 1px solid; font-size:25px; color:#3b9854; padding:15px;">{{ $numPrice_complete }} ฿</div>
                            <div class="text-center" style="float: right; width:49%; border:#dd9117 1px solid; font-size:25px; color:#dd9117; padding:15px;">{{ $numPrice_pending }} ฿</div>
                        </div>

                        <div class="mb-2">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="text row" style="justify-content:space-between; padding: 0 15px;">
                                <div>
                                    VIP ปัจจุบัน
                                </div>
                                <div>
                                    VIP 1
                                </div>
                            </div>
                        </div>

                        <div class="text row" style="justify-content:center;">
                            <div class="mb-2">
                                <div class="text-center" style="border:#3d5169 1px solid; font-size:20px; color:#3d5169; padding:15px;">
                                    <div>ยอดแทงเพื่อระดับถัดไป : 1</div>
                                    <div style="color:#3b9854;">
                                        {{ $numPrice_complete }} ฿
                                    </div>

                                </div>
                                <div class="text-center" style="color:red;">
                                    ยอดแทงหวยที่นับในระบบโบนัสจะต้องเป็นยอดแทงที่ ”ออกผลแล้ว” จึงจะนับเป็นยอดแทง
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="text row" style="justify-content: center;">
                            <div class="text-center" >
                                เมื่อสมาชิกแทงถึงยอดที่กำหนดจะได้รับการเลื่อนลำดับ VIP และได้รับโบนัสเครดิตจากเรา โดยการกดรับด้านล่าง
                            </div>
                            <br>
                            <div class=" text-left mb-2">
                                <div style="display: inline-flex;">
                                    <a href="/lottery_bonus" class="nav-link text-secondary"><i class="fa fa-list"></i> 0-9</a>
                                    <a href="/lottery_bonus" class="nav-link text-secondary"><i class="fa fa-list"></i> 10-19</a>
                                    <a href="/lottery_bonus" class="nav-link text-secondary"><i class="fa fa-list"></i> 20-29</a>
                                    <a href="/lottery_bonus" class="nav-link text-secondary"><i class="fa fa-list"></i> 30-39</a>
                                    <a href="/lottery_bonus" class="nav-link text-secondary"><i class="fa fa-list"></i> 40-49</a>
                                    <a href="/lottery_bonus" class="nav-link text-secondary"><i class="fa fa-list"></i> 50-59</a>
                                    <a href="/lottery_bonus" class="nav-link text-secondary"><i class="fa fa-list"></i> 60-69</a>
                                    <a href="/lottery_bonus" class="nav-link text-secondary"><i class="fa fa-list"></i> 70-79</a>
                                    <a href="/lottery_bonus" class="nav-link text-secondary"><i class="fa fa-list"></i> 80-89</a>
                                    <a href="/lottery_bonus" class="nav-link text-secondary"><i class="fa fa-list"></i> 90-99</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>


                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP 0&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP 1</div>
                                        <div>10,000 ฿</div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div>200 ฿</div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div class="form-control text-center">รับโบนัส</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP 1&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP 2</div>
                                        <div>10,000 ฿</div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div>200 ฿</div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div class="form-control text-center">รับโบนัส</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP 2&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP 3</div>
                                        <div>10,000 ฿</div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div>200 ฿</div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div class="form-control text-center">รับโบนัส</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP 3&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP 4</div>
                                        <div>10,000 ฿</div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div>200 ฿</div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div class="form-control text-center">รับโบนัส</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP 4&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP 5</div>
                                        <div>10,000 ฿</div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div>200 ฿</div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div class="form-control text-center">รับโบนัส</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP 5&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP 6</div>
                                        <div>10,000 ฿</div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div>200 ฿</div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div class="form-control text-center">รับโบนัส</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP 6&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP 7</div>
                                        <div>10,000 ฿</div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div>200 ฿</div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div class="form-control text-center">รับโบนัส</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP 7&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP 8</div>
                                        <div>10,000 ฿</div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div>200 ฿</div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div class="form-control text-center">รับโบนัส</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP 8&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP 9</div>
                                        <div>10,000 ฿</div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div>200 ฿</div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div class="form-control text-center">รับโบนัส</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP 9&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP 10</div>
                                        <div>10,000 ฿</div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div>200 ฿</div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <div class="form-control text-center">รับโบนัส</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- jackpot end -->
<script>
    var csrf_token = '{{ csrf_token() }}';

</script>
@endsection
