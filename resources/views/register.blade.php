@extends('option/layout')
@section('register')
<!-- jackpot begin -->
<div class="jackpot">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                <a href="/" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">ย้อนกลับ</button></a>
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
                            <span class="amount">สมัครสมาชิก</span>
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
                                        <div class="d-flex">
                                            <div class="col-xl-12 col-lg-12 col-sm-12">

                                                <div>ชื่อเข้าสู่ระบบ</div>
                                                <input type="text" class="form-control form-group">

                                                <div>รหัสผ่าน</div>
                                                <input type="password" class="form-control form-group">

                                                <div>ยืนยันรหัสผ่าน</div>
                                                <input type="password" class="form-control form-group">

                                                <div>ชื่อจริง</div>
                                                <input type="text" class="form-control form-group">

                                                <div>นามสกุล</div>
                                                <input type="text" class="form-control form-group">

                                                <div>วัน/เดือน/ปี เกิด</div>
                                                <input type="date" class="form-control form-group">

                                                <div>อีเมล</div>
                                                <input type="email" class="form-control form-group">

                                                <div>โทรศัพท์ติดต่อ</div>
                                                <input type="text" class="form-control form-group">

                                                <button type="submit" class="btn btn-warning new_story">สมัครสมาชิก</button>
                                                <button type="reset" class="btn btn-danger ">ยกเลิก</button>



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

</div>
<!-- jackpot end -->
@endsection
