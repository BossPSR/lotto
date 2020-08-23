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
                            <div class="box__indentify-tel">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-12">
                                        <p class="text p-0 m-0 text-muted">กรุณากรอก OTP Ref:xxxx</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form__tel-number">
                            <div class="form-group"><label class="text text-dark">ใส่รหัสป้องกันเพื่อยืนยัน</label>
                                <div class="form-group"><input type="text" maxlength="4" name="captcha" class="form-control is-valid" aria-required="true" aria-invalid="false">
                                </div>
                            </div>
                        </div>
                        <div class="submit-and-reset">
                            <div class="row no-gutters">
                                <div class="col-md-12"><a href="/register_info" class="btn btn-sm btn-success w-100" type="submit" class="submit">ถัดไป</a></div>
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