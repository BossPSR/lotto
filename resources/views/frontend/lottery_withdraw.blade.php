@extends('frontend/option/layout_member')
@section('contact_member')
<?php
$banks_array = array(
    'ธนาคารกรุงเทพ',
    'ธนาคารกสิกรไทย',
    'ธนาคารกรุงไทย',
    'ธนาคารทหารไทย',
    'ธนาคารไทยพาณิชย์',
    'ธนาคารกรุงศรีอยุธยา',
    'ธนาคารเกียรตินาคิน',
    'ธนาคารซีไอเอ็มบีไทย',
    'ธนาคารทิสโก้',
    'ธนาคารธนชาต',
    'ธนาคารยูโอบี',
    'ธนาคารแลนด์ แอนด์ เฮาส์',
    'ธนาคารไอซีบีซี (ไทย)',
    'ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร',
    'ธนาคารออมสิน',
    'ธนาคารอาคารสงเคราะห์',
    'ธนาคารอิสลามแห่งประเทศไทย',
    'ธนาคารซิตี้แบงค์',
);
?>
<!-- jackpot begin -->
<div class="jackpot" style="background:#FFF;">
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
                    @if($user_info->bank_name)
                    <div class="part-head" style="display: block;">

                        <div class="text row" style="margin-left:25px;">
                            <div class="col-6">
                                <span class="amount" style="color:#6f39d5">แจ้งถอนเครดิต</span>
                            </div>
                            <div class="col-6 text-right" >
                                <a href="/index_member" style="display: inline-block; font-size: 20px; background-color: #6f39d5;color:#FFF" class="btn btn-warning">ย้อนกลับ</a>   
                            </div>
                            
                           
                        </div>
                    </div>
                    <br>
                    <div class="part-body">
                        <div class="d-flex">

                            <div class="col-xl-12 col-lg-12 col-sm-12">

                                <div class="single-jackpot">
                                    <div class="part-head">

                                    </div>
                                    <div class="part-body">

                                        <div class="form-group">
                                            <div>ธนาคาร</div>
                                            <div class="col-md-12 alert alert-danger">
                                            คุณสามารถใช้สิทธิการถอนได้ 5 ครั้งต่อวัน, ขณะนี้คุณใช้สิทธิถอนไปแล้ว {{$withdraw_count}} ครั้ง
                                            </div>
                                            <div class="d-flex" style="padding: 15px; border: 1px solid rgba(0, 0, 0, 0.125);">
                                                <div style="margin-right: 15px;"><img src="{{url('assets/img/banks/'.$user_info->bank_name.'.png')}}" style="max-height: 200px; max-width:200px; object-fit:contain" alt=""></div>
                                                <div>
                                                    <div><b>{{$user_info->bank_name}}</b></div>
                                                    <div><b>ชื่อบัญชี:</b></div>
                                                    <div>{{$user_info->account_no}}</div>
                                                    <div><b>เลขที่บัญชี:</b></div>
                                                    <div>{{$user_info->account_name}}</div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($withdraw_count < 5)
                                        <div class="form-group">
                                            <form action="" method="POST">
                                                @csrf
                                                <div>จำนวนเงินที่ต้องการถอน</div>
                                                <input type="number" name="amount"  step="0.01" min="0" class="form-control form-group" required>
                                                <div>หมายเหตุ</div>
                                                <textarea class="form-control form-group" name="remark" id="" cols="30" rows="5"></textarea>
                                                <button type="submit" name="addWithdraw" class="btn btn-warning text-white">แจ้งถอน</button>
                                                <button type="reset" class="btn btn-danger ">ยกเลิก</button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @else
                    <div class="part-head" style="display: block;">

                        <div class="text row"  style="margin-left:25px;">
                            <div class="col-6">
                                <span class="amount" style="color:#6f39d5">ตั้งค่าธนาคาร</span>
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
                                    <div class="part-head">

                                    </div>
                                    <div class="part-body">

                                        <div class="form-group">
                                            <div>*กรุณาตั้งค่าธนาคารก่อนจะทำการถอนได้ </div>

                                        </div>

                                        <div class="form-group">
                                            <form action="" method="POST" onsubmit="validateForm(this)" >
                                                @csrf
                                                <div class="form-group">
                                                    <label>ธนาคาร</label>
                                                    <select class="form-control" name="bank_name">
                                                        <?php
                                                        foreach ($banks_array as $bank)
                                                            echo '<option>' . $bank . '</option>';
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>เลขที่บัญชี</label>
                                                    <input pattern="[0-9, -]+" maxlength="255" type="text" name="account_no" class="form-control" id="" required>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label>ชื่อบัญชี</label>
                                                        <input maxlength="255" type="text" onkeyup="checkName()" id="account_name" name="account_name" class="form-control" id="" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>นามสกุล</label>
                                                        <input maxlength="255" type="text" onkeyup="checkName()" id="account_surname" name="account_surname" class="form-control" id="" required>
                                                    </div>
                                                    <div class="col-md-12 mt-2" id="error-name" style="display: none;">
                                                        <div class="alert alert-danger">กรุณาป้อนชื่อนามสกุลบัญชีให้ตรงกับชื่อนามสกุลของผู้ใช้งาน</div>
                                                    </div>
                                                </div>
                                                <span class="text-danger">หากทำการบันทึกแล้วจะไม่สามารถเปลี่ยนแปลงได้ภายหลัง และชื่อ-นามสกุลและเลขบัญชีต้องตรงกันไม่งั้นจะไม่สามารถดำเนินการได้</span>
                                                <br>
                                                <button type="submit" name="updateUserBank" class="btn btn-success">บันทึกข้อมูล</button>
                                                <button type="reset" class="btn btn-danger ">ยกเลิก</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
<!-- jackpot end -->
<script src="{{url('backend/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script>
    function checkName(){
        var input_name = document.getElementById("account_name")
        var alert_div = document.getElementById("error-name")
        if(input_name.value != '{{Auth::user()->first_name}}')
        {
            alert_div.style.display = 'block';
            return false;
        }
        var input_name = document.getElementById("account_surname")
        if(input_name.value != '{{Auth::user()->last_name}}')
        {
            alert_div.style.display = 'block';
            return false;
        }
        alert_div.style.display = 'none';
        return true;
    }

    function validateForm(form) {
        
        if (checkName() == false) {
            Swal.fire(
                'ไม่สำเร็จ!',
                'กรุณาป้อนชื่อให้ถูกต้อง!',
                'error'
            )
            event.preventDefault();
        }
    }
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
</script>
@endsection
