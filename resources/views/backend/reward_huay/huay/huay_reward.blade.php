@extends('backend/option/layout_admin_after')
@section('contact_admin')
<style>
    .btn-group,
    #DataTables_Table_0_length {
        display: none;
    }

    .thincell {
        width: 1%;
    }


    * {
        user-select: none;
        -webkit-tap-highlight-color: transparent;
    }

    *:focus {
        outline: none;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        background-color: #f1f9f9;
    }

    #app-cover {
        display: table;
        width: 600px;
        margin: 80px auto;
        counter-reset: button-counter;
    }

    .toggle-button-cover {
        display: table-cell;
        position: relative;
        box-sizing: border-box;
    }

    .button-cover {
        background-color: #fff;
        box-shadow: 0 10px 20px -8px #c5d6d6;
        border-radius: 4px;
    }

    .button-cover:before {
        counter-increment: button-counter;
        content: counter(button-counter);
        position: absolute;
        right: 0;
        bottom: 0;
        color: #d7e3e3;
        font-size: 12px;
        line-height: 1;
        padding: 5px;
    }

    .button-cover,
    .knobs,
    .layer {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .button {
        position: relative;
        top: 50%;
        width: 74px;
        height: 36px;
        margin: -20px auto 0 auto;
        overflow: hidden;
    }

    .button.r,
    .button.r .layer {
        border-radius: 100px;
    }

    .button.b2 {
        border-radius: 2px;
    }

    .checkbox {
        position: relative;
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
        opacity: 0;
        cursor: pointer;
        z-index: 3;
    }

    .knobs {
        z-index: 2;
    }

    .layer {
        font-size: 5px;

        width: 100%;
        height: 100%;
        background-color: #ebfcec;
        transition: 0.3s ease all;
        z-index: 1;
    }


    #button-10 .knobs:before,
    #button-10 .knobs:after,
    #button-10 .knobs span {
        position: absolute;
        top: 4px;
        width: 30px;
        height: 80%;
        font-size: 10px;
        font-weight: bold;
        text-align: center;
        line-height: 1;
        padding: 9px 4px;
        border-radius: 2px;
        transition: 0.3s ease all;
    }

    #button-10 .knobs:before {
        content: '';
        left: 4px;
        background-color: #78c200;
    }

    #button-10 .knobs:after {
        content: 'ปิด';
        right: 4px;
        color: #4e4e4e;
    }

    #button-10 .knobs span {
        display: inline-block;
        left: 4px;
        color: #fff;
        z-index: 1;
    }

    #button-10 .checkbox:checked+.knobs span {
        color: #4e4e4e;
    }

    #button-10 .checkbox:checked+.knobs:before {
        left: 42px;
        background-color: #F44336;
    }

    #button-10 .checkbox:checked+.knobs:after {
        color: #fff;
    }

    #button-10 .checkbox:checked~.layer {
        background-color: #fcebeb;
    }
</style>
<?php
if (date('Y-m-d', strtotime($_GET['start_date'])) > date('Y-m-d', strtotime($_GET['end_date'])))
    $_GET['end_date'] =  $_GET['start_date'];
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">ออกผลรางวัล</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrum-right">
                    <div class="dropdown" style="display: none;">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Data list view starts -->
            <section id="data-list-view" class="data-list-view-header">

                <div class="row">

                    <div class="col-md-4">
                        <form method="GET">
                            <label>เลือกสถานะ</label>
                            <select class="form-control" name="round_status" onchange="this.form.submit()">
                                <option value="" selected>ทั้งหมด</option>
                                <?php

                                $huay_status = array(
                                    'pending' => 'กำลังดำเนินการ',
                                    'complete' => 'ประกาศผลแล้ว',
                                    'cancel' => 'คืนโพย',
                                    'close' => 'ปิดรับแทง',
                                );

                                if (count($huay_status)) {
                                    foreach ($huay_status as $key => $status) {
                                        if ($_GET['round_status'] == $key)
                                            echo '<option value="' . $key . '" selected>' . $status . '</option>';
                                        else
                                            echo '<option value="' . $key . '">' . $status . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <label>ช่วงเวลา</label>
                            <div class="row m-0">
                                <input class="form-control col-md-6" type="date" name="start_date" value="{{$_GET['start_date']}}" onchange="this.form.submit()">
                                <input class="form-control col-md-6" type="date" name="end_date" value="{{$_GET['end_date']}}" onchange="this.form.submit()">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">

                        <!-- DataTable starts -->
                        <div class="table-responsive">
                            <table class="table data-list-view">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>NAME</th>
                                        <th>CATEGORY</th>
                                        <th>RESULT</th>
                                        <th>วันที่</th>
                                        <th>เวลา</th>
                                        <th>เปลี่ยนแปลงสถานะ</th>
                                        <th>สถานะ</th>
                                        <th class="thincell">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result_array = array(
                                        'result_tree_up' => 'สามตัวบน',
                                        'result_tree_tod' => 'สามตัวโต้ด',
                                        'result_tree_front' => 'สามตัวหน้า',
                                        'result_tree_down' => 'สามตัวล่าง',
                                        'result_two_up' => 'สองตัวบน',
                                        'result_two_down' => 'สองตัวล่าง',
                                        'result_run_up' => 'วิ่งบน',
                                        'result_run_down' => 'วิ่งล่าง',
                                    );

                                    $result_length = array(
                                        'result_tree_up' => 3,
                                        'result_tree_tod' => 3,
                                        'result_tree_front' => 3,
                                        'result_tree_down' => 2,
                                        'result_two_up' => 2,
                                        'result_two_down' => 2,
                                        'result_run_up' => 1,
                                        'result_run_down' => 1,
                                    );

                                    if (count($huay_rounds)) {
                                        foreach ($huay_rounds as $huay_round) {
                                    ?>
                                            <tr>
                                                <td style="display:none;"></td>
                                                <td class="product-name">{{$huay_round->name}}</td>
                                                <td class="product-category">{{$huay_round->category_name}}</td>
                                                <td class="product-category">
                                                    <?php
                                                    $index = 0;
                                                    foreach ($result_array as $key => $name) {
                                                        $index++;
                                                        if ($index == 5)
                                                            echo '<br>';

                                                        if($huay_round->$key == '')
                                                        {
                                                            for ($i=0; $i < $result_length[$key] ; $i++)  
                                                                $huay_round->$key.= 'X';
                                                        }

                                                        echo '   <small>' . $name . ' <b style="font-size:15px;" class="text-warning">' . $huay_round->$key . '</b></small>';
                                                        if($key != 'result_run_down')
                                                            echo',';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="product-category">{{date('d/m/Y', strtotime($huay_round->start_datetime))}}</td>
                                                <td class="product-category">{{date('H:i:s', strtotime($huay_round->start_datetime))}} - {{date('H:i:s', strtotime($huay_round->end_datetime))}} น.</td>
                                                <td class="product-category">
                                                    <form method="POST" onsubmit="doSubmit(this)">
                                                        <input type="hidden" name="id" value="{{$huay_round->id}}" class="thincell">
                                                        <?php
                                                        if($huay_round->round_status  != 'complete' and $huay_round->round_status != 'cancel')
                                                        {
                                                            if ($huay_round->is_active) {
                                                                echo '<a name="on" class="btn btn-success btn-sm text-white" >เปิด</a>';
                                                                echo '<button name="off" class="btn btn-outline-danger btn-sm">ปิด</button>';
                                                            } else {
                                                                echo '<button name="on" class="btn btn-outline-success btn-sm ">เปิด</button>';
                                                                echo '<a name="off" class="btn btn-danger btn-sm text-white" >ปิด</a>';
                                                            }
                                                        }
                                                        ?>
                                                    </form>
                                                </td>
                                                <td class="product-category"><?php echo $huay_round->status_name ?></td>

                                                <td class="text-right">
                                                    @if($huay_round->round_status != 'complete' and $huay_round->round_status != 'cancel' && $huay_round->huay_category_id == 1)
                                                        <span data-toggle="modal" data-edit-id="{{$huay_round->id}}" data-target="#updateRound" class="text-success"><i class="fa fa-bullhorn" style="font-size: 25px;"></i></span>
                                                    @endif
                                                    @if($huay_round->huay_category_id != 1 && $huay_round->round_status != 'complete' && $huay_round->is_active == 0)
                                                        <span 
                                                        data-toggle="modal" 
                                                        data-edit-id="{{$huay_round->id}}" 
                                                        data-unknow-yeekee_six="<?php echo $huay_round->unknow->yeekee_six ?>" 
                                                        data-unknow-three_up="<?php echo $huay_round->unknow->three_up ?>" 
                                                        data-unknow-two_up="<?php echo $huay_round->unknow->two_up ?>" 
                                                        data-unknow-two_down="<?php echo $huay_round->unknow->two_down ?>" 

                                                        data-rand-yeekee_six="<?php echo $huay_round->rand->yeekee_six ?>" 
                                                        data-rand-three_up="<?php echo $huay_round->rand->three_up ?>" 
                                                        data-rand-two_up="<?php echo $huay_round->rand->two_up ?>" 
                                                        data-rand-two_down="<?php echo $huay_round->rand->two_down ?>" 
                                                        data-target="#updateRoundYeekee" 
                                                        class="ml-2 text-success"><i class="fa fa-crosshairs" style="font-size: 25px;"></i></span>
                                                    @endif
                                                    @if($huay_round->huay_category_id != 1 && $huay_round->round_status != 'complete' && $huay_round->is_active == 1)
                                                        <a data-toggle="tooltip"  title="กรุณาปิดรอบก่อนประกาศผล"  class="ml-2 disabled"  disabled><i class="fa fa-crosshairs" style="font-size: 25px;"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- DataTable ends -->

                    <!-- Modal edit round-->
                    <div class="modal fade text-left" id="updateRound" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel1">ประกาศผล</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/admin/reward_huay" onsubmit="doSubmit(this)" enctype="multipart/form-data">
                                        <input name="id" type="hidden">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวบน</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="3"  maxlength="3" name="result_tree_up" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวโต้ด</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="3"  maxlength="3" name="result_tree_tod" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวหน้า</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="3"  maxlength="3" name="result_tree_front" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวล่าง</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="3"  maxlength="3" name="result_tree_down" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สองตัวบน</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="2"  maxlength="2" name="result_two_up" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สองตัวล่าง</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="2"  maxlength="2" name="result_two_down" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>วิ่งบน</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="1"  maxlength="1" name="result_run_up" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>วิ่งล่าง</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="1"  maxlength="1" name="result_run_down" class="form-control" id="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group  mb-0">
                                            <div class="text-right" style="display: flex;flex-direction: row-reverse;">
                                                <button type="submit" class="btn btn-primary" name="updateRound">ประกาศ</button>
                                                <button type="submit" class="btn btn-danger mr-1" name="return" onclick="doSubmit(this.form), this.form.submit()">คืนโพย</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal edit--><!-- Modal edit round-->
                    <div class="modal fade text-left" id="updateRoundYeekee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel1">ประกาศผล</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/admin/reward_huay" onsubmit="doSubmit(this)" enctype="multipart/form-data">
                                        <input name="id" type="hidden">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a style="padding: 5px" class="bg-warning rounded text-white" onclick="copy('unknow')">แบบไม่กำหนดเลข</a>
                                                <legend style="font-size: 30px;" class="text-center p-2" id="unknow-yeekee_six"><span>XXXXXX</span></legend>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>สามตัวบน</label>
                                                        <legend style="font-size: 20px;" class="text-center" id="unknow-three_up">XXX</legend>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>สองตัวบน</label>
                                                        <legend style="font-size: 20px;" class="text-center" id="unknow-two_up">XX</legend>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>สองตัวล่าง</label>
                                                        <legend style="font-size: 20px;" class="text-center" id="unknow-two_down">XX</legend>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>

                                                <a style="padding: 5px" class="bg-warning rounded text-white" onclick="copy('rand')">แบบกำหนดเลข</a>
                                                <legend style="font-size: 30px;" class="text-center p-2" id="rand-yeekee_six"><span>XXXXXX</span></legend>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>สามตัวบน</label>
                                                        <legend style="font-size: 20px;" class="text-center"  id="rand-three_up">XXX</legend>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>สองตัวบน</label>
                                                        <legend style="font-size: 20px;" class="text-center"  id="rand-two_up">XX</legend>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>สองตัวล่าง</label>
                                                        <legend style="font-size: 20px;" class="text-center" id="rand-two_down">XX</legend>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวบน</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="3"  name="result_tree_up" maxlength="3" id="result_tree_up" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวโต้ด</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="3" name="result_tree_tod" maxlength="3" name="result_tree_tod" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวหน้า</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="3"  maxlength="3" name="result_tree_front" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวล่าง</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="3"  maxlength="3" name="result_tree_down" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สองตัวบน</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="2"  maxlength="2" id="result_two_up" name="result_two_up" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สองตัวล่าง</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="2"  maxlength="2" id="result_two_down" name="result_two_down" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>วิ่งบน</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="1"  maxlength="1" name="result_run_up" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>วิ่งล่าง</label>
                                                    <input type="text" pattern="[0-9]*"  minlength="1"  maxlength="1" name="result_run_down" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>รางวัลคนยิงเลข</label>
                                                    <input type="number" min="0" step="0.01" name="price_shoot" class="form-control" id="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group  mb-0">
                                            <div class="text-right" style="display: flex;flex-direction: row-reverse;">
                                                <button type="submit" class="btn btn-primary" name="updateRoundYeekee">ประกาศ</button>
                                                <button type="submit" class="btn btn-danger mr-1" name="return" onclick="doSubmit(this.form), this.form.submit()">คืนโพย</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal edit-->


            </section>
            <!-- Data list view end -->

        </div>
    </div>
</div>
<!-- END: Content-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{url('backend/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-git.min.js"></script>
<!-- END: Page Vendor JS-->

<script type="text/javascript">
    var csrf_token = '{{ csrf_token() }}';

    function copy(type)
    {
        $('#result_tree_up').val($('#'+type+'-three_up').html())
        $('#result_two_up').val($('#'+type+'-two_up').html())
        $('#result_two_down').val($('#'+type+'-two_down').html())
    }
    function doSubmit(form) {
        var inputElem = document.createElement('input');
        inputElem.type = 'hidden';
        inputElem.name = '_token';
        inputElem.value = csrf_token;
        form.append(inputElem)

    };
    $(document).ready(function() {

        @if(session()-> has('message'))
        Swal.fire({
            position: 'bottom-end',
            type: '{{ session()->get("status") }}',
            width: 200,
            title: '<small> {{ session()->get("message") }} </small>',
            showConfirmButton: false,
            backdrop: false,
            timer: 2000
        });
        @endif

        $('#updateRound').on('show.bs.modal', function(event) {

            var modal = $(this)
            var button = $(event.relatedTarget)

            var id = $(button).data('editId');
            debug = true;

            $.ajax({
                    /* the route pointing to the post function */
                    url: '/admin/get-data',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {
                        _token: csrf_token,
                        'target_secret': '{{md5("get-huay_rounds")}}',
                        'get-id': id
                    },
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function(data) {

                        if (debug) {
                            console.log(data);
                        }
                        var input_all = modal.find('input')

                        var gen_image_all = modal.find('.gen-auto');

                        var element;
                        if (gen_image_all.length)
                            gen_image_all.remove();

                        for (let index = 0; index < input_all.length; index++) {
                            element = input_all[index];
                            if (debug) {
                                console.log(index)
                                console.log('type')
                                console.log(element.type)
                            }

                            if (data[element.name] && element.type == 'text')
                                element.value = data[element.name]
                            if (data[element.name] && element.type == 'number')
                                element.value = data[element.name]
                            else if (data[element.name] && element.type == 'color')
                                $(element).spectrum("set", data[element.name]);
                            else if (data[element.name] && element.type == 'file') {
                                var file = data[element.name];
                                var div_out = $(element).closest("div")

                            } else
                                element.value = data[element.name]
                        }
                        var input_all = modal.find('textarea')
                        for (let index = 0; index < input_all.length; index++) {
                            element = input_all[index];
                            if (data[element.name])
                                element.value = data[element.name]
                        }

                        var input_all = modal.find('select')
                        for (let index = 0; index < input_all.length; index++) {
                            element = input_all[index];
                            if (data[element.name])
                                element.value = data[element.name]
                        }
                    }
                })
                .fail(function(data) {
                    console.log(data.responseText);
                });
        });

        $('#updateRoundYeekee').on('show.bs.modal', function(event) {

        var modal = $(this)
        var button = $(event.relatedTarget)

        $('#unknow-yeekee_six').text($(button).data('unknow-yeekee_six'));
        $('#unknow-three_up').text($(button).data('unknow-three_up'));
        $('#unknow-two_up').text($(button).data('unknow-two_up'));
        $('#unknow-two_down').text($(button).data('unknow-two_down'));

        $('#rand-yeekee_six').text($(button).data('rand-yeekee_six'));
        $('#rand-three_up').text($(button).data('rand-three_up'));
        $('#rand-two_up').text($(button).data('rand-two_up'));
        $('#rand-two_down').text($(button).data('rand-two_down'));


        var id = $(button).data('editId');
        debug = true;

        $.ajax({
                /* the route pointing to the post function */
                url: '/admin/get-data',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {
                    _token: csrf_token,
                    'target_secret': '{{md5("get-huay_rounds")}}',
                    'get-id': id
                },
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function(data) {

                    if (debug) {
                        console.log(data);
                    }
                    var input_all = modal.find('input')

                    var gen_image_all = modal.find('.gen-auto');

                    var element;
                    if (gen_image_all.length)
                        gen_image_all.remove();

                    for (let index = 0; index < input_all.length; index++) {
                        element = input_all[index];
                        if (debug) {
                            console.log(index)
                            console.log('type')
                            console.log(element.type)
                        }

                        if (data[element.name] && element.type == 'text')
                            element.value = data[element.name]
                        if (data[element.name] && element.type == 'number')
                            element.value = data[element.name]
                        else if (data[element.name] && element.type == 'color')
                            $(element).spectrum("set", data[element.name]);
                        else if (data[element.name] && element.type == 'file') {
                            var file = data[element.name];
                            var div_out = $(element).closest("div")

                        } else
                            element.value = data[element.name]
                    }
                    var input_all = modal.find('textarea')
                    for (let index = 0; index < input_all.length; index++) {
                        element = input_all[index];
                        if (data[element.name])
                            element.value = data[element.name]
                    }

                    var input_all = modal.find('select')
                    for (let index = 0; index < input_all.length; index++) {
                        element = input_all[index];
                        if (data[element.name])
                            element.value = data[element.name]
                    }
                }
            })
            .fail(function(data) {
                console.log(data.responseText);
            });
        });

        $('#select_huay').on('change', function(event) {

            var modal = $("#addRound")
            var button = $(event.relatedTarget)

            var id = this.value;
            debug = false;

            $.ajax({
                    /* the route pointing to the post function */
                    url: '/admin/get-data',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {
                        _token: csrf_token,
                        'target_secret': '{{md5("get-huays")}}',
                        'get-id': id
                    },
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function(data) {

                        if (debug) {
                            console.log(id);
                            console.log(data);
                        }
                        var input_all = modal.find('input')

                        var gen_image_all = modal.find('.gen-auto');

                        var element;
                        if (gen_image_all.length)
                            gen_image_all.remove();

                        for (let index = 0; index < input_all.length; index++) {
                            element = input_all[index];
                            if (debug) {
                                console.log(index)
                                console.log('type')
                                console.log(element.type)
                                console.log(element.name)
                            }

                            if (data[element.name] && element.type == 'text')
                                element.value = data[element.name]
                            if (data[element.name] && element.type == 'number')
                                element.value = data[element.name]
                            else if (data[element.name] && element.type == 'color')
                                $(element).spectrum("set", data[element.name]);
                            else if (data[element.name] && element.type == 'file') {
                                var file = data[element.name];
                                var div_out = $(element).closest("div")

                            } else if (data[element.name])
                                element.value = data[element.name]
                        }
                        var input_all = modal.find('textarea')
                        for (let index = 0; index < input_all.length; index++) {
                            element = input_all[index];
                            if (data[element.name])
                                element.value = data[element.name]
                        }
                    }
                })
                .fail(function(data) {
                    console.log(data.responseText);
                });
        });

        $('#select_huay2').on('change', function(event) {

            var modal = $("#updateRound")
            var button = $(event.relatedTarget)

            var id = this.value;
            debug = false;

            $.ajax({
                    /* the route pointing to the post function */
                    url: '/admin/get-data',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {
                        _token: csrf_token,
                        'target_secret': '{{md5("get-huays")}}',
                        'get-id': id
                    },
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function(data) {

                        if (debug) {
                            console.log(id);
                            console.log(data);
                        }
                        var input_all = modal.find('input')

                        var gen_image_all = modal.find('.gen-auto');

                        var element;
                        if (gen_image_all.length)
                            gen_image_all.remove();

                        for (let index = 0; index < input_all.length; index++) {
                            element = input_all[index];

                            if (element.name == 'id')
                                continue;
                            if (debug) {
                                console.log(index)
                                console.log('type')
                                console.log(element.type)
                                console.log(element.name)
                            }

                            if (data[element.name] && element.type == 'text')
                                element.value = data[element.name]
                            if (data[element.name] && element.type == 'number')
                                element.value = data[element.name]
                            else if (data[element.name] && element.type == 'color')
                                $(element).spectrum("set", data[element.name]);
                            else if (data[element.name] && element.type == 'file') {
                                var file = data[element.name];
                                var div_out = $(element).closest("div")

                            } else if (data[element.name])
                                element.value = data[element.name]
                        }
                        var input_all = modal.find('textarea')
                        for (let index = 0; index < input_all.length; index++) {
                            element = input_all[index];
                            if (data[element.name])
                                element.value = data[element.name]
                        }
                    }
                })
                .fail(function(data) {
                    console.log(data.responseText);
                });
        });
    });
</script>
@endsection