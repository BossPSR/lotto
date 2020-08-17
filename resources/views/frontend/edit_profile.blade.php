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
                            <div class="col-xl-6 col-lg-12 col-sm-6">
                                <span class="amount" style="color:#6f39d5">ตั้งค่าบัญชี</span>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-sm-6 text-right">
                                <a href="/" style="display: inline-block;font-size: 20px; background-color: #6f39d5;color:#FFF" class="btn btn-warning">ย้อนกลับ</a>
                            </div>

                        </div>
                        <br>
                        <span style="color:red; font-size: 18px;">*** หมายเหตุ การกรอก ชื่อ-นามสกุลต้องเป็นชื่อ-นามสกุลที่ตรงกับบัตรประชาชนและเลขที่บัญชีธนาคาร เท่านั้น ไม่งั้นระบบจะไม่สามารถถอนเงินได้</span>
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
                                                        <input type="hidden" name="_token" value="<?php

                                                                                                    use Illuminate\Support\Facades\Auth;

                                                                                                    echo csrf_token() ?>">
                                                        {{-- <div>รูปโปรไฟล์</div>
                                                        <input accept="image/*" type="file" name="file_name" class="form-control form-group" id="imgInp" >
                                                        <div style="width:30%; margin:auto;">
                                                            <label for="imgInp" style="cursor: pointer">
                                                                <img id="blah" src="{{url('assets/img/upload.png')}}">
                                                        </label>
                                                </div> --}}


                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                                        <label>ชื่อเข้าสู่ระบบ</label>
                                                        <input type="text" class="form-control form-group" placeholder="ชื่อเข้าสู่ระบบ" value="{{Auth::user()->username}}" readonly>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-12 col-sm-6">
                                                        <label>ชื่อจริง</label>
                                                        <input type="text" name="first_name" class="form-control form-group" required placeholder="ชื่อจริง" value="{{Auth::user()->first_name}}">
                                                    </div>
                                                    <div class="col-xl-6 col-lg-12 col-sm-6">
                                                        <label>นามสกุล</label>
                                                        <input type="text" name="last_name" class="form-control form-group" required placeholder="นามสกุล" value="{{Auth::user()->last_name}}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-12 col-sm-6">
                                                        <label>อีเมล</label>
                                                        <input type="email" name="email" class="form-control form-group" required placeholder="อีเมล" value="{{Auth::user()->email}}">
                                                    </div>
                                                    <div class="col-xl-6 col-lg-12 col-sm-6">
                                                        <label>วัน/เดือน/ปี เกิด</label>
                                                        <input type="date" name="birthday" class="form-control form-group" required placeholder="วัน/เดือน/ปี เกิด" value="{{date('Y-m-d', strtotime(Auth::user()->birthday))}}">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-12 col-sm-6">
                                                        <label>โทรศัพท์ติดต่อ</label>
                                                        <input type="text" name="tel" pattern="[0-9]+" class="form-control form-group" required placeholder="โทรศัพท์ติดต่อ" value="{{Auth::user()->tel}}">
                                                    </div>
                                                </div>
                                                <hr>
                                                <label>เปลี่ยนแปลงรหัสผ่าน</label>
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-12 col-sm-6">
                                                        <label>รหัสผ่านเดิม</label>
                                                        <div class="input-group">
                                                            <input onkeyup="validatePassOnKeyup()" type="password" id="old_password" name="old_password" class="form-control form-group"  placeholder="รหัสผ่าน">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <a id="showPass1" style="cursor: pointer;" onclick="
                                                                    input = document.getElementById('old_password')
                                                                    input.type = 'text'
                                                                    eye =  document.getElementById('hidePass1')
                                                                    eye.style.display = 'block'
                                                                    eye =  document.getElementById('showPass1')
                                                                    eye.style.display = 'none'
                                                                    "><i class="fas fa-eye"></i></a>
                                                                    <a id="hidePass1" style="cursor: pointer; display:none" onclick="
                                                                    input = document.getElementById('old_password')
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
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-12 col-sm-6">
                                                        <label>รหัสผ่านใหม่</label>
                                                        <div class="input-group">
                                                            <input onkeyup="validatePassOnKeyup()" type="password" id="password" name="password" class="form-control form-group"  placeholder="รหัสผ่าน">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
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
                                                            <input onkeyup="validatePassOnKeyup()" type="password" id="confirm_password" name="confirm_password" class="form-control form-group"  placeholder="ยืนยันรหัสผ่าน">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
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

                                                </div>
                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-12">
                                                        <div id="alert_password" class="col-md-12 alert alert-danger p-2" style="font-size: 20px; display:none">
                                                            รหัสผ่านไม่ตรงกัน
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                                $citizen_image = Auth::user()->citizen_image;
                                                if ($citizen_image)
                                                    $citizen_image = url($citizen_image);
                                                else
                                                    $citizen_image = url('assets/img/logo_r.jpg');

                                                ?>
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-sm-12 text-center">
                                                        <label>บัตรประชาชน</label>
                                                        <input type="file" name="file_name" class="form-control form-group" id="imgInp" accept="image/*" >
                                                        <label for="imgInp" style="cursor: pointer">
                                                            <img id="blah" src="{{$citizen_image}}" style="max-width: 50%">
                                                        </label>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{url('backend/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script>
    var csrf_token = '{{ csrf_token() }}';

    function toggle(id) {
        $('.player-info').css('display', 'none');
        $('#' + id).css('display', 'block');
    }

    function validatePassOnKeyup() {
        var input_password = document.getElementById("password");
        var input_confirm_password = document.getElementById("confirm_password");
        if (input_password.value != input_confirm_password.value) {
            document.getElementById("alert_password").style.display = "block";
        } else
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