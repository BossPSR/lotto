@extends('backend/option/layout_admin_after')
@section('contact_admin')
<style>
    .btn-group,
    #DataTables_Table_0_length {
        display: none;
    }

    .thincell {
        width: 1px;
    }
</style>

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
<!-- BEGIN: Content-->

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">จัดการบัญชีธนาคาร</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">จัดการบัญชีธนาคาร
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrum-right">
                    <div class="dropdown" style="display: none;">
                        <button class="btn-icon btn btn-primary btn-round btm-md dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Data list view starts -->
            <section id="data-list-view" class="data-list-view-header">
                <!-- DataTable starts -->
                <a data-toggle="modal" class="float-right btn btn-success btn text-white" data-target="#add"><i class="fa fa-plus"></i> เพิ่ม</a>
                <div class="table-responsive">
                    <table class="table data-list-view">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th class="thincell">#</th>
                                <th class="thincell" nowrap>จัดลำดับ</th>
                                <th class="thincell" nowrap>ชื่อธนาคาร</th>
                                <th class="thincell" nowrap>เลขที่บัญชี</th>
                                <th>ชื่อบัญชี</th>
                                <th class="thincell">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($banks) {
                                $i = 0;
                                $index = -1;
                                foreach ($banks as $bank) {
                                    $i++;
                                    $index++;
                            ?>
                                    <tr>
                                        <td style="display:none;"></td>
                                        <td>{{$i}}</td>
                                        <td>
                                            <?php
                                            $before = isset($banks[($index - 1)]) ? $banks[($index - 1)] : null;
                                            $after = isset($banks[($index + 1)]) ? $banks[($index + 1)] : null;
                                            echo "<div class='row' style='display: flex; flex-flow: row;'>";
                                            echo "<form onsubmit='doSubmit(this)' method='POST'>";
                                            if ($before)
                                                echo "<button name='sort' class='btn btm-md btn-warning pl-1 pr-1'><i class='fa fa-chevron-up'></i></button><input type='hidden' name='from' value='" . $before->sort_order_id . "'><input type='hidden' name='to' value='" . $bank->sort_order_id . "'>";
                                            echo '</form>';
                                            echo "<form onsubmit='doSubmit(this)' method='POST'>";
                                            if ($after)
                                                echo "<button name='sort' class='btn btm-md btn-warning pl-1 pr-1'><i class='fa fa-chevron-down'></i></button><input type='hidden' name='from' value='" . $after->sort_order_id . "'><input type='hidden' name='to' value='" . $bank->sort_order_id . "'>";
                                            echo '</form>';
                                            echo '</div>';

                                            ?>
                                        </td>
                                        <td class="product-name" nowrap>{{$bank->bank_name}}</td>
                                        <td class="product-name" nowrap>{{$bank->account_no}}</td>
                                        <td>{{$bank->account_name}}</td>
                                        <td class="text-center">
                                            <span data-toggle="modal" data-target="#edit" data-edit-id="{{$bank->id}}"><i class="fa fa-edit" style="font-size: 25px;"></i></span>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            <!-- Modal Add-->
                            <div class="modal fade text-left" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel1">เพิ่ม</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="/admin/bank_huay" onsubmit="doSubmit(this)">
                                                <div class="form-group">
                                                    <label>ธนาคาร</label>
                                                    <select class="form-control" name="bank_name">
                                                        <?php
                                                        foreach ($banks_array as $bank)
                                                            echo '<option>'.$bank.'</option>';
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>เลขที่บัญชี</label>
                                                    <input pattern="[0-9, -]+" maxlength="255" type="text" name="account_no" class="form-control" id="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>ชื่อบัญชี</label>
                                                    <input maxlength="255" type="text" name="account_name" class="form-control" id="" required>
                                                </div>

                                                <div class="form-group  mb-0">
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary" name="addBanks">เพิ่มข้อมูล</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Add-->

                            <!-- Modal Edit-->
                            <div class="modal fade text-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel1">แก้ไขข่าวสาร</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="/admin/bank_huay" onsubmit="doSubmit(this)">
                                                <input name="id" type="hidden">
                                                <div class="form-group">
                                                    <label>ธนาคาร</label>
                                                    <select class="form-control" name="bank_name">
                                                        <?php
                                                        foreach ($banks_array as $bank)
                                                            echo '<option>'.$bank.'</option>';
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>เลขที่บัญชี</label>
                                                    <input pattern="[0-9, -]+" maxlength="255" type="text" name="account_no" class="form-control" id="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>ชื่อบัญชี</label>
                                                    <input maxlength="255" type="text" name="account_name" class="form-control" id="" required>
                                                </div>
                                                <div class="form-group  mb-0">
                                                    <div class="text-right" style="display: flex;flex-direction: row-reverse;">
                                                        <button type="submit" class="btn btn-primary" name="editBanks">บันทึกข้อมูล</button>
                                                        <button class="btn btn-danger" name="deleteBanks">ลบ</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Edit-->
                        </tbody>
                    </table>
                </div>
                <!-- DataTable ends -->


            </section>
            <!-- Data list view end -->

        </div>
    </div>
</div>

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

        @if(session()->has('message'))
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

        $('#edit').on('show.bs.modal', function(event) {

            var modal = $(this)
            var button = $(event.relatedTarget)

            var id = $(button).data('editId');
            debug = false;

            $.ajax({
                    /* the route pointing to the post function */
                    url: '/admin/get-data',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {
                        _token: csrf_token,
                        'target_secret': '{{md5("get-banks")}}',
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
                            else if (data[element.name] && element.type == 'number')
                                element.value = data[element.name]
                            else if (data[element.name] && element.type == 'color')
                                $(element).spectrum("set", data[element.name]);
                            else if (data[element.name] && element.type == 'file') {
                                var file = data[element.name];
                                var div_out = $(element).closest("div")

                            } 
                            else
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
    });
</script>
<!-- END: Content-->
@endsection