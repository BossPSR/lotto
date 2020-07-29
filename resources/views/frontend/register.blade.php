@extends('frontend/option/layout')
@section('content')
<?php
$_GET['ref_code'] = isset($_GET['ref_code']) ? $_GET['ref_code'] : null;
if(session()-> has('ref_code'))
 $_GET['ref_code'] = session()->get("ref_code");
?>

<script src="{{asset('assets/js/preview_img.js')}}"></script>
<!-- jackpot begin -->
<div class="jackpot" style="background:#FFF;">
    <div class="container">
        <div class="row">
            {{-- <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                <a href="/" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">ย้อนกลับ</button></a>
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
                                <span class="amount" style="color:#6f39d5">สมัครสมาชิก</span>
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
                                    <div class="part-head">

                                    </div>
                                    <div class="part-body">
                                        <div class="d-flex">
                                            <div class="col-xl-12 col-lg-12 col-sm-12 register_form">
                                                <form action="{{route('register_process')}}" method="post" onsubmit="validateForm(this)" enctype="multipart/form-data">
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
                                                            <label>รหัสผ่าน</label>
                                                            <div class="input-group">
                                                                <input onkeyup="validatePassOnKeyup()" type="password" id="password" name="password" class="form-control form-group" required placeholder="รหัสผ่าน">
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text" >
                                                                        <a id="showPass1" style="cursor: pointer;" onclick="
                                                                        input = document.getElementById('password')
                                                                        input.type = 'text'
                                                                        eye =  document.getElementById('hidePass1')
                                                                        eye.style.display = 'block'
                                                                        eye =  document.getElementById('showPass1')
                                                                        eye.style.display = 'none'
                                                                        "><i class="fas fa-eye"></i></a>
                                                                        <a id="hidePass1" style="cursor: pointer; display:none" onclick="
                                                                        input = document.getElementById('password')
                                                                        input.type = 'password'
                                                                        eye =  document.getElementById('showPass1')
                                                                        eye.style.display = 'block'
                                                                        eye =  document.getElementById('hidePass1')
                                                                        eye.style.display = 'none'
                                                                        "><i class="fas fa-eye-slash"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-12 col-sm-6">
                                                            <label>ยืนยันรหัสผ่าน</label>
                                                            <div class="input-group">
                                                            <input onkeyup="validatePassOnKeyup()" type="password" id="confirm_password" name="confirm_password" class="form-control form-group" required placeholder="ยืนยันรหัสผ่าน">
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text" >
                                                                        <a id="showPass2" style="cursor: pointer;" onclick="
                                                                        input = document.getElementById('confirm_password')
                                                                        input.type = 'text'
                                                                        eye =  document.getElementById('hidePass2')
                                                                        eye.style.display = 'block'
                                                                        eye =  document.getElementById('showPass2')
                                                                        eye.style.display = 'none'
                                                                        "><i class="fas fa-eye"></i></a>
                                                                        <a id="hidePass2" style="cursor: pointer; display:none" onclick="
                                                                        input = document.getElementById('confirm_password')
                                                                        input.type = 'password'
                                                                        eye =  document.getElementById('showPass2')
                                                                        eye.style.display = 'block'
                                                                        eye =  document.getElementById('hidePass2')
                                                                        eye.style.display = 'none'
                                                                        "><i class="fas fa-eye-slash"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="alert_password" class="col-md-12 alert alert-danger p-2" style="font-size: 20px;">
                                                            รหัสผ่านไม่ตรงกัน
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
                                                        <div class="col-xl-6 col-lg-12 col-sm-6">
                                                            <label>Code ผู้แนะนำ</label>
                                                            <input type="text" name="upline_username" class="form-control form-group" value="{{$_GET['ref_code']}}" placeholder="Code ผู้แนะนำ">
                                                        </div>
                                                    </div>

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
                    <br><br><br>
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

    function validatePassOnKeyup() {
        var input_password = document.getElementById("password");
        var input_confirm_password = document.getElementById("confirm_password");
        if (input_password.value != input_confirm_password.value) {
           document.getElementById("alert_password").style.display = "block";
        }
        else
        document.getElementById("alert_password").style.display = "none";

    }

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

        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })
        event.preventDefault();


        swalWithBootstrapButtons.fire({
        title: 'ข้อกำหนดการใช้งาน',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: false,
        confirmButtonText: 'ยินยอม',
        //cancelButtonText: 'ไม่ยินยอม',

        reverseButtons: true
        }).then((result) => {
            form.submit();

        if (result.value) {
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel) {
                event.preventDefault();
        }
        })
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
