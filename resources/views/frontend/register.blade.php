@extends('frontend/option/layout')
@section('content')
<?php
$_GET['ref_code'] = isset($_GET['ref_code']) ? $_GET['ref_code'] : null;
if(session()-> has('ref_code'))
 $_GET['ref_code'] = session()->get("ref_code");
?>

<script src="{{asset('assets/js/preview_img.js')}}"></script>
<!-- jackpot begin -->
<div class="jackpot" style="background:#FED63E;">
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

                        <div class="text" style="margin-left:25px;">
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
                                            <div class="col-xl-12 col-lg-12 col-sm-12 register_form">
                                                <form action="{{route('register_process')}}" method="post" onsubmit="validateForm(this)" enctype="multipart/form-data">
                                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                                                    <div>รูปโปรไฟล์</div>
                                                    <input accept="image/*" type="file" name="file_name" class="form-control form-group" id="imgInp" required>
                                                    <div style="width:30%; margin:auto;">
                                                        <label for="imgInp" style="cursor: pointer">
                                                            <img id="blah" src="{{url('assets/img/upload.png')}}">
                                                        </label>
                                                    </div>


                                                    <div>ชื่อเข้าสู่ระบบ</div>
                                                    <input type="text" name="username" class="form-control form-group" required>

                                                    <div>รหัสผ่าน</div>
                                                    <input type="password" id="password" name="password" class="form-control form-group" required>

                                                    <div>ยืนยันรหัสผ่าน</div>
                                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control form-group" required>

                                                    <div>ชื่อจริง</div>
                                                    <input type="text" name="first_name" class="form-control form-group" required>

                                                    <div>นามสกุล</div>
                                                    <input type="text" name="last_name" class="form-control form-group" required>
                                                    
                                                    <div>วัน/เดือน/ปี เกิด</div>
                                                    <input type="date" name="birthday" class="form-control form-group" required>

                                                    <div>อีเมล</div>
                                                    <input type="email" name="email" class="form-control form-group" required>

                                                    <div>โทรศัพท์ติดต่อ</div>
                                                    <input type="text" name="tel" pattern="[0-9]+" class="form-control form-group" required>

                                                    <div>Code ผู้แนะนำ</div>
                                                    <input type="text" name="upline_username" class="form-control form-group" value="{{$_GET['ref_code']}}">

                                                    <button type="submit" class="btn btn-warning new_story">สมัครสมาชิก</button>
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
<!-- jackpot end -->
<script src="{{url('backend/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script>
    @if(session()-> has('message'))

    var status = "{{session()->get('status')}}"
    var status_name = (status == "success" ? 'สำเร็จ' : 'ไม่สำเร็จ')
    Swal.fire(
        status_name,
        '<small> {{ session()->get("message") }} </small>',
        '{{ session()->get("status") }}',
    );
    @endif

    function validateForm(form) {
        var input_password = document.getElementById("password");
        var input_confirm_password = document.getElementById("confirm_password");
        if (input_password.value != input_confirm_password.value) {
            Swal.fire(
                'ไม่สำเร็จ!',
                'กรุณาป้อนรหัสผ่านให้ตรงกัน!',
                'error'
            )
            event.preventDefault();
        }
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
