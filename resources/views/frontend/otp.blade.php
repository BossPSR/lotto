@extends('frontend/option/layout')
@section('content')
<?php
$_GET['ref_code'] = isset($_GET['ref_code']) ? $_GET['ref_code'] : null;
if (session()->has('ref_code'))
    $_GET['ref_code'] = session()->get("ref_code");
?>

<script src="{{asset('assets/js/preview_img.js')}}"></script>
<!-- jackpot begin -->
<div class="jackpot" style="background:#FFF;">
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
                    <div class="box__register register-tel is-valid">
                        <div class="form__register">
                            <div class="form-group"><label class="text text-dark">ลงทะเบียนโทรศัพท์</label>
                                <div class="info">
                                    <div class="row no-gutters">
                                        <div class="col-4">
                                            <div class="box__flag row no-gutters align-items-center">
                                                <div class="col-auto"><i class="icon-flag"><img src="/assets/register/img/icon/icon-flag-TH.png" alt=""></i></div>
                                                <div class="col-auto">
                                                    <p class="text-country">+66</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8"><input type="text" maxlength="10" pattern="[0-9.]+" id="phone" name="phone" placeholder="ใส่หมายเลขเบอร์โทรศัพท์" class="form-control is-valid" aria-required="true" aria-invalid="false" data-mask="##########" data-previous-value="">
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box__indentify-tel">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-12">
                                        <p class="text p-0 m-0 text-muted">กรุณาใส่หมายเลขโทรศัพท์เพื่อยืนยันตัวตน</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form__tel-number">
                            <div class="form-group"><label class="text text-dark">ใส่รหัสป้องกันเพื่อยืนยัน</label>
                                <div class="form-group"><input type="text" maxlength="4" name="captcha" class="form-control is-valid" aria-required="true" aria-invalid="false">
                                    <!---->
                                    <p class="panel text-center m-t-xs m-b-none" style="margin-top: 10px;"><img src="https://www.huay.com/captcha?r=426628" class="captcha-image" style=""></p>
                                </div>
                                <div class="info d-none">
                                    <div class="row no-gutters">
                                        <div class="col-3"><input readonly="readonly" type="text" class="form-control p-0"></div>
                                        <div class="col-3"><input readonly="readonly" type="text" class="form-control p-0"></div>
                                        <div class="col-3"><input readonly="readonly" type="text" class="form-control p-0"></div>
                                        <div class="col-3"><input readonly="readonly" type="text" class="form-control p-0"></div>
                                    </div>
                                </div>
                                <div class="box__keyboard d-none">
                                    <div class="group"><button class="text-white">1</button> <button class="text-white">2</button> <button class="text-white">3</button> <button class="text-white delete"><i class="fal fa-backspace fa-lg fa-2x"></i></button></div>
                                    <div class="group"><button class="text-white">4</button> <button class="text-white">5</button> <button class="text-white">6</button></div>
                                    <div class="group"><button class="text-white">7</button> <button class="text-white">8</button> <button class="text-white">9</button></div>
                                    <div class="group"><button class="text-white">0</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-and-reset">
                            <div class="row no-gutters">
                                <div class="col-md-12"><a href="/otp_confirm" class="btn btn-sm btn-success w-100" type="submit" class="submit">ถัดไป</a></div>
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

            if (result.value) {} else if (
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