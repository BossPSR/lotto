@extends('frontend/option/layout_member')
@section('contact_member')

    <!-- jackpot begin -->
    <div class="jackpot">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                    <a href="/index_member" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">ย้อนกลับ</button></a>
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
                                <span class="amount">แจ้งถอนเครดิต</span>
                                <span class="draw-date"></span>
                            </div>
                        </div>
                        <div class="part-body">
                            <div class="d-flex">

                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                    <div class="single-jackpot">
                                        <div class="part-head">

                                        </div>
                                        <div class="part-body">

                                            <div class="form-group">
                                                <div>ธนาคาร</div>
                                                <div class="d-flex" style="padding: 15px; border: 1px solid rgba(0, 0, 0, 0.125);">
                                                    <div style="margin-right: 15px;"><img src="https://i.pinimg.com/474x/00/24/29/002429e4b28532ce5273cafa10be61c2.jpg" alt=""></div>
                                                    <div>
                                                        <div><b>ธนาคารกสิกรไทย</b></div>
                                                        <div><b>ชื่อบัญชี:</b></div>
                                                        <div>นาย ณัฐพล เกียรติ</div>
                                                        <div><b>เลขที่บัญชี:</b></div>
                                                        <div>1122244554</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <form action="">
                                                    <div>จำนวนเงินที่ต้องการถอน</div>
                                                    <input type="number" class="form-control form-group">
                                                    <div>หมายเหตุ</div>
                                                    <textarea class="form-control form-group" name="" id="" cols="30" rows="5"></textarea>
                                                    <button type="submit" class="btn btn-warning new_story">แจ้งถอน</button>
                                                    <button type="reset" class="btn btn-danger ">ยกเลิก</button>
                                                </form>
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
    </div>
    <!-- jackpot end -->
@endsection
