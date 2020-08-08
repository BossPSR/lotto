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
                    <div class="part-head"  style="display: block;">

                        <div class="text row" style="margin-left:25px;">
                            <div class="col-xl-6 col-lg-12 col-sm-6">
                                <span class="amount" style="color:#6f39d5">ตั้งค่าบัญชี</span>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-sm-6 text-right">
                                <a href="/" style="display: inline-block;font-size: 20px; background-color: #6f39d5;color:#FFF" class="btn btn-warning">ย้อนกลับ</a>
                            </div>

                        </div>
                        <br>
                        <span style="color:red; font-size: 18px;" >*** หมายเหตุ การกรอก ชื่อ-นามสกุลต้องเป็นชื่อ-นามสกุลที่ตรงกับบัตรประชาชนและเลขที่บัญชีธนาคาร เท่านั้น ไม่งั้นระบบจะไม่สามารถถอนเงินได้</span>
                    </div>
                    <br>
                    <div class="part-body">
                        <div class="d-flex">
                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                <div class="single-jackpot">
                                    <div class="row">

                                    </div>
                                    <div class="part-body">
                                        <div id="help_list">
                                            <div class="d-flex">
                                                <div class="col-xl-12 col-lg-12 col-sm-12 register_form">
                                                    <form action="" method="post" onsubmit="validateForm(this)" enctype="multipart/form-data">
                                                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                                                        {{-- <div>รูปโปรไฟล์</div>
                                                        <input accept="image/*" type="file" name="file_name" class="form-control form-group" id="imgInp" required>
                                                        <div style="width:30%; margin:auto;">
                                                            <label for="imgInp" style="cursor: pointer">
                                                                <img id="blah" src="{{url('assets/img/upload.png')}}">
                                                            </label>
                                                        </div> --}}


                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                                                <label>ชื่อเข้าสู่ระบบ</label>
                                                                <input type="text" name="username" class="form-control form-group" required placeholder="ชื่อเข้าสู่ระบบ">
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-12 col-sm-6">
                                                                <label>ชื่อจริง</label>
                                                                 <input type="text" name="first_name" class="form-control form-group" required placeholder="ชื่อจริง">
                                                            </div>
                                                            <div class="col-xl-6 col-lg-12 col-sm-6">
                                                                <label>นามสกุล</label>
                                                                <input type="text" name="last_name" class="form-control form-group" required placeholder="นามสกุล">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-12 col-sm-6">
                                                                <label>อีเมล</label>
                                                                <input type="email" name="email" class="form-control form-group" required placeholder="อีเมล">
                                                            </div>
                                                            <div class="col-xl-6 col-lg-12 col-sm-6">
                                                                <label>วัน/เดือน/ปี เกิด</label>
                                                                <input type="date" name="birthday" class="form-control form-group" required placeholder="วัน/เดือน/ปี เกิด">
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-12 col-sm-6">
                                                                <label>โทรศัพท์ติดต่อ</label>
                                                                <input type="text" name="tel" pattern="[0-9]+" class="form-control form-group" required placeholder="โทรศัพท์ติดต่อ">
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                                                <label>บัตรประชาชน</label>
                                                                <input type="file" name="file_name" class="form-control form-group" id="imgInp" accept="image/*" required>
                                                                <div style="width:30%; ">
                                                                    <label for="imgInp" style="cursor: pointer">
                                                                        <img id="blah" src="{{url('assets/img/logo_r.jpg')}}" style="max-width: 20%">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn btn-warning new_story">บันทึก</button>
                                                        <button type="reset" class="btn btn-danger new_story_cancel">ยกเลิก</button>
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

</div>
<!-- jackpot end -->
<script>
    var csrf_token = '{{ csrf_token() }}';

    function toggle(id) {
        $('.player-info').css('display', 'none');
        $('#' + id).css('display', 'block');
    }

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
