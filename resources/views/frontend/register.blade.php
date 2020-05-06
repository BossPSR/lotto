@extends('frontend/option/layout')
@section('content')
<script src="{{asset('assets/js/preview_img.js')}}"></script>
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
                                                <form action="register_process" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                                                    <div>รูปโปรไฟล์</div>
                                                    <input type="file" name="file_name" class="form-control form-group" id="imgInp">
                                                    <div style="width:30%; margin:auto;">
                                                        <img id="blah"/>
                                                    </div>


                                                    <div>ชื่อเข้าสู่ระบบ</div>
                                                    <input type="text" name="username" class="form-control form-group">

                                                    <div>รหัสผ่าน</div>
                                                    <input type="password" name="password" class="form-control form-group">

                                                    <div>ยืนยันรหัสผ่าน</div>
                                                    <input type="password" name="confirm_password" class="form-control form-group">

                                                    <div>ชื่อจริง</div>
                                                    <input type="text" name="first_name" class="form-control form-group">

                                                    <div>นามสกุล</div>
                                                    <input type="text" name="last_name" class="form-control form-group">

                                                    <div>วัน/เดือน/ปี เกิด</div>
                                                    <input type="date" name="birthday" class="form-control form-group">

                                                    <div>อีเมล</div>
                                                    <input type="email" name="email" class="form-control form-group">

                                                    <div>โทรศัพท์ติดต่อ</div>
                                                    <input type="text" name="tel" class="form-control form-group">

                                                    <button type="submit" class="btn btn-warning new_story">สมัครสมาชิก</button>
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

</div>
<!-- jackpot end -->
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
    }

    $("#imgInp").change(function() {
    readURL(this);
    });
</script>
@endsection
