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
                        <h2 class="content-header-title float-left mb-0">จัดการหวย</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">จัดการรอบหวย</a>
                                </li>
                            </ol>
                        </div>
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
                            <label>วันที่</label>
                            <div class="row m-0">
                                <input class="form-control col-md-12" type="date" name="date" value="{{$_GET['date']}}" onchange="this.form.submit()">
                            </div>
                        </form>
                    </div>
                    @if(count($huay_rounds) == 0)
                    <div class="col-md-8">
                        <form method="POST" onsubmit="doSubmit(this)">
                        <input type="hidden" name="date" value="{{$_GET['date']}}" >
                            <button  class="float-right btn btn-success btn text-white" name="generate" ><i class="fa fa-plus"></i> GENERATE รอบวันที่นี้</button>
                        </form>
                    </div>
                    @endif
                    <div class="col-md-12">

                        <!-- DataTable starts -->
                        <div class="table-responsive">
                            <table class="table data-list-view">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>NAME</th>
                                        <th>CATEGORY</th>
                                        <th>PRICE</th>
                                        <th>วันที่</th>
                                        <th>เวลา</th>
                                        <th>สถานะ</th>
                                        <th class="thincell">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $price_array = array(
                                        'price_tree_up' => 'สามตัวบน',
                                        'price_tree_tod' => 'สามตัวโต้ด',
                                        'price_tree_front' => 'สามตัวหน้า',
                                        'price_tree_down' => 'สองตัวล่าง',
                                        'price_two_up' => 'สองตัวบน',
                                        'price_two_down' => 'สองตัวล่าง',
                                        'price_run_up' => 'วิ่งบน',
                                        'price_run_down' => 'วิ่งล่าง',
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
                                                    foreach ($price_array as $key => $name) {
                                                        $index++;
                                                        if ($index == 5)
                                                            echo '<br>';
                                                        echo ' <small>' . $name . ' ' . $huay_round->$key . '</small>,   ';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="product-category">{{date('d/m/Y', strtotime($huay_round->start_datetime))}}</td>
                                                <td class="product-category">{{date('H:i:s', strtotime($huay_round->start_datetime))}} - {{date('H:i:s', strtotime($huay_round->end_datetime))}} น.</td>
                                                <td class="product-category">
                                                    <form method="POST" onsubmit="doSubmit(this)">
                                                        <input type="hidden" name="id" value="{{$huay_round->id}}" class="thincell">
                                                        <?php
                                                        if ($huay_round->is_active) {
                                                            echo '<a name="on" class="btn btn-success btn-sm text-white" >เปิด</a>';
                                                            echo '<button name="off" class="btn btn-outline-danger btn-sm">ปิด</button>';
                                                        } else {
                                                            echo '<button name="on" class="btn btn-outline-success btn-sm ">เปิด</button>';
                                                            echo '<a name="off" class="btn btn-danger btn-sm text-white" >ปิด</a>';
                                                        }


                                                        ?>

                                                    </form>
                                                </td>
                                                <td class="text-right">
                                                    <span data-toggle="modal" data-edit-id="{{$huay_round->id}}" data-target="#updateRound"><i class="fa fa-money" style="font-size: 25px;"></i></span>
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


                    <!-- Modal add round-->
                    <div class="modal fade text-left" id="addRound" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel1">เพิ่มรอบ</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/admin/manage_huay_round" onsubmit="doSubmit(this)" enctype="multipart/form-data">
                                        <input name="id" type="hidden">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>เลือกหวย</label>
                                                    <select class="form-control" name="huay_id" id="select_huay" required>
                                                        <option selected disabled value="">เลือกประเภทหวย</option>
                                                        <?php
                                                        if (count($huays)) {
                                                            foreach ($huays as $huay) {
                                                                echo "<option value='" . $huay->id . "'>" . $huay->category_name . '-' . $huay->name . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>ชื่อที่แสดง</label>
                                                    <input type="text" name="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>วันที่</label>
                                                    <input type="date" name="date" class="form-control" value="{{$_GET['date']}}" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>เวลาเริ่มต้น</label>
                                                    <input type="time" name="start_time" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>เวลาสิ้นสุด</label>
                                                    <input type="time" name="end_time" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวบน</label>
                                                    <input type="number" step="0.01" min="0" name="price_tree_up" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวโต้ด</label>
                                                    <input type="number" step="0.01" min="0" name="price_tree_tod" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวหน้า</label>
                                                    <input type="number" step="0.01" min="0" name="price_tree_front" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวล่าง</label>
                                                    <input type="number" step="0.01" min="0" name="price_tree_down" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สองตัวบน</label>
                                                    <input type="number" step="0.01" min="0" name="price_two_up" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สองตัวล่าง</label>
                                                    <input type="number" step="0.01" min="0" name="price_two_down" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>วิ่งบน</label>
                                                    <input type="number" step="0.01" min="0" name="price_run_up" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>วิ่งล่าง</label>
                                                    <input type="number" step="0.01" min="0" name="price_run_down" class="form-control" id="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group  mb-0">
                                            <div class="text-right" style="display: flex;flex-direction: row-reverse;">
                                                <button type="submit" class="btn btn-primary" name="addRound">เพิ่มรอบ</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal add-->

                    <!-- Modal edit round-->
                    <div class="modal fade text-left" id="updateRound" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel1">แก้ไข</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/admin/manage_huay_round" onsubmit="doSubmit(this)" enctype="multipart/form-data">
                                        <input name="id" type="hidden">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>เลือกหวย</label>
                                                    <select class="form-control" name="huay_id" id="select_huay2" required>
                                                        <option selected disabled value="">เลือกประเภทหวย</option>
                                                        <?php
                                                        if (count($huays)) {
                                                            foreach ($huays as $huay) {
                                                                echo "<option value='" . $huay->id . "'>" . $huay->category_name . '-' . $huay->name . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>ชื่อที่แสดง</label>
                                                    <input type="text" name="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>วันที่</label>
                                                    <input type="date" name="date" class="form-control" value="{{$_GET['date']}}" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>เวลาเริ่มต้น</label>
                                                    <input type="time" name="start_time" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>เวลาสิ้นสุด</label>
                                                    <input type="time" name="end_time" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวบน</label>
                                                    <input type="number" step="0.01" min="0" name="price_tree_up" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวโต้ด</label>
                                                    <input type="number" step="0.01" min="0" name="price_tree_tod" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวหน้า</label>
                                                    <input type="number" step="0.01" min="0" name="price_tree_front" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สามตัวล่าง</label>
                                                    <input type="number" step="0.01" min="0" name="price_tree_down" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สองตัวบน</label>
                                                    <input type="number" step="0.01" min="0" name="price_two_up" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>สองตัวล่าง</label>
                                                    <input type="number" step="0.01" min="0" name="price_two_down" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>วิ่งบน</label>
                                                    <input type="number" step="0.01" min="0" name="price_run_up" class="form-control" id="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>วิ่งล่าง</label>
                                                    <input type="number" step="0.01" min="0" name="price_run_down" class="form-control" id="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group  mb-0">
                                            <div class="text-right" style="display: flex;flex-direction: row-reverse;">
                                                <button type="submit" class="btn btn-primary" name="updateRound">แก้ไข</button>
                                                <button type="submit" class="btn btn-danger mr-1" name="deleteRound">ลบ</button>
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