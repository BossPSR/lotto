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
                                    <a href="/bonus_normal" class="nav-link text-warning"><i class="far fa-money-bill-alt"></i> แทงหวยสะสมครบ 10 วัน รับ 200 เครดิต</a>
                                    <a href="/bonus_vip" class="nav-link text-secondary"><i class="fa fa-star"></i> ระดับVIP แทงครบยอด รับเครดิตพิเศษ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="display: flex; justify-content: center; align-items: center; font-size:20px;">
                                        วันที่ 1
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="display: flex; justify-content: center; align-items: center; font-size:20px;">
                                        วันที่ 2
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="display: flex; justify-content: center; align-items: center; font-size:20px;">
                                        วันที่ 3
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="display: flex; justify-content: center; align-items: center; font-size:20px;">
                                        วันที่ 4
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="display: flex; justify-content: center; align-items: center; font-size:20px;">
                                        วันที่ 5
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="display: flex; justify-content: center; align-items: center; font-size:20px;">
                                        วันที่ 6
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="display: flex; justify-content: center; align-items: center; font-size:20px;">
                                        วันที่ 7
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="display: flex; justify-content: center; align-items: center; font-size:20px;">
                                        วันที่ 8
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="display: flex; justify-content: center; align-items: center; font-size:20px;">
                                        วันที่ 9
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="display: flex; justify-content: center; align-items: center; font-size:20px;">
                                        วันที่ 10
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
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
