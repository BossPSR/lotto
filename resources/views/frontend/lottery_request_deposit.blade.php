@extends('frontend/option/layout_member')
@section('contact_member')
<style>
    .cmb2-option:checked~label {
        outline-style: solid;
        outline-offset: 10px;
        overflow: auto;
        outline-color: #FFAB05;

    }

    .cmb2-list {
        position: relative;
        overflow: hidden;

    }

    .cmb2-list li {
        display: inline;
    }

    .cmb2-list img {
        cursor: pointer
    }

    .cmb2-list input {
        position: absolute;
        left: -999px;
    }
</style>
<script src="{{asset('assets/js/preview_img.js')}}"></script>

<!-- jackpot begin -->
<div class="jackpot" style="background:#FFF;">
    <div class="container">
        <div class="row">
            {{-- <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                <a href="/index_member" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">ย้อนกลับ</button></a>
            </div> --}}
        </div>
    </div>
    <div class="container shape-container" >
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                <div class="single-jackpot">
                    <div class="part-head"style="display: block;">

                        <div class="text row" style="margin-left:25px;">
                            <div class="col-6">
                                <span class="amount" style="color:#6f39d5">แจ้งเติมเครดิต</span>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/index_member" style="display: inline-block; font-size: 20px; background-color: #6f39d5;color:#FFF" class="btn btn-warning">ย้อนกลับ</a>
                            </div>
                          
                         
                        </div>
                    </div>
                    <br>
                    <div class="part-body">
                        <div class="d-flex">

                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                <div class="single-jackpot">
                                    <div class="part-body">
                                        @if(count($banks))
                                        <div class="form-group">
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                @csrf
                                                <div>เลือกธนาคาร</div>
                                                <div class="d-flex" style="padding:15px; border: 1px solid rgba(0, 0, 0, 0.125);">
                                                    <div class="row m-0 cmb2-list" style="padding-top: 15px;">
                                                        <?php
                                                        $index = 0;
                                                        if ($banks) {
                                                            foreach ($banks as $bank) {
                                                                $index++;
                                                                echo '
                                                            <li class="col-md-3 text-center">
                                                            <input type="radio" class="cmb2-option" name="bank_id" id="bank_id' . $index . '" value="' . $bank->id . '" required>
                                                            <label for="bank_id' . $index . '">
                                                            <img src="' . url('assets/img/banks/' . $bank->bank_name . '.png') . '">

                                                            </label>
                                                            <lable>' . $bank->bank_name . '</label><br>
                                                            <lable>' . $bank->account_no . '</label><br>
                                                            <lable>' . $bank->account_name . '</label>
                                                            </li>';
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <div>จำนวนเงินที่ต้องการเติม</div>
                                                    <input type="number" name="amount" min="0" step="0.01" style="font-size: 30px; height:50px;" class="form-control form-group" required>

                                                    <div>หลักฐานการโอน</div>
                                                    <input type="file" name="file_name" class="form-control form-group" id="imgInp" accept="image/*" required>
                                                    <div style="width:30%; ">
                                                        <label for="imgInp" style="cursor: pointer">
                                                            <img id="blah" src="{{url('assets/img/dollar-symbol.png')}}" style="max-width: 20%">
                                                        </label>
                                                    </div><br>
                                                    <button type="submit" name="addDeposit" class="btn btn-warning text-white">แจ้งเติมเครดิต</button>
                                                    <button type="reset" class="btn btn-danger ">ยกเลิก</button>
                                                </div>
                                            </form>
                                        </div>
                                        @else
                                        <div class="text">
                                            <span class="text-danger">ไม่สามารถดำเนินการได้ขณะนี้</span>
                                            <span class="draw-date"></span>
                                        </div>
                                        @endif

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
        var csrf_token = document.getElementsByName('_token')[0].value;

        @if(session()-> has('message'))

        var status = "{{session()->get('status')}}"
        var status_name = (status == "success" ? 'สำเร็จ' : 'ไม่สำเร็จ')
        Swal.fire(
            status_name,
            '<small> {{ session()->get("message") }} </small>',
            '{{ session()->get("status") }}',
        );
        @endif

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