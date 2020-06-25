@extends('backend/option/layout_admin_after')
@section('contact_admin')
<style>
    .btn-group,
    #DataTables_Table_0_length {
        display: none;
    }

    .image_rules {
        width: 80px;
        height: 60px;
        object-fit: contain;
    }

    .thincell {
        width: 1px;
    }
</style>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">อนุมัติแจ้งถอน</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">จัดการถอนเงิน</a>
                                </li>

                                <li class="breadcrumb-item active">อนุมัติแจ้งถอน
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
                <div class="table-responsive">
                    <table class="table data-list-view">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th class="thincell">#</th>
                                <th>ลูกค้า</th>
                                <th>บัญชีผู้ใช้งาน</th>
                                <th>บัญชี</th>
                                <th>วันที่</th>
                                <th>เวลา</th>
                                <th>ยอดเงินแจ้งโอน</th>
                                <th class="thincell">สถานะ</th>
                                <th class="thincell">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($withdraw_lists) {
                                $i = 0;
                                $index = -1;
                                foreach ($withdraw_lists as $withdraw_list) {
                                    $i++;
                                    $index++;
                            ?>
                                    <tr>
                                        <td style="display:none;"></td>
                                        <td class="text-center">{{$i}}</td>
                                        <td class="product-name">{{$withdraw_list->user_info->first_name}} {{$withdraw_list->user_info->last_name}}</td>
                                        <td class="product-name">{{$withdraw_list->user_info->username}}</td>
                                        <td class="text-center">
                                            @if($withdraw_list->remark)
                                                <small class="text-danger" style="word-break:break-all">*หมายเหตุ : {{$withdraw_list->remark}}</small><br>
                                            @endif
                                            <label>{{$withdraw_list->bank_name}}</label><br>
                                            <small>{{$withdraw_list->account_no}}</small><br>
                                            <small>{{$withdraw_list->account_name}}</small><br>
                                        </td>
                                        <td>{{date('d/m/Y', strtotime($withdraw_list->created_at))}}</td>
                                        <td>{{date('H:i:s', strtotime($withdraw_list->created_at))}}</td>
                                        <td class="text-right">{{number_format($withdraw_list->amount, 2)}}</td>
                                        
                                        <td class="text-center" nowrap><?php echo $withdraw_list->status_name ?></td>
                                        <td class="text-center">
                                            <span data-toggle="modal" data-target="#condition" 
                                            data-edit-id="{{$withdraw_list->id}}" 
                                            data-customer-name="{{$withdraw_list->user_info->first_name}} {{$withdraw_list->user_info->last_name}}" 
                                            data-username="{{$withdraw_list->user_info->username}}" 
                                            data-created-at="{{date('d/m/Y H:i:s', strtotime($withdraw_list->created_at))}}"
                                            data-bank-name="{{$withdraw_list->bank_name}}"
                                            data-account-no="{{$withdraw_list->account_no}}"
                                            data-account-name="{{$withdraw_list->account_name}}"
                                            data-remark="{{$withdraw_list->remark}}"
                                            ><i class="fa fa-search" style="font-size: 25px;"></i></span>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <!-- DataTable ends -->

               

            </section>
            <!-- Data list view end -->

        </div>
    </div>
</div>

<!-- Modal Edit-->
<div class="modal fade text-left" id="condition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">อนุมัติแจ้งถอน</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/admin/withdraw_approve" onsubmit="doSubmit(this)" enctype="multipart/form-data">
                    <input name="id" type="hidden">
                    <div class="form-group" style="font-size: 18PX">
                        <b>ลูกค้า</b> <label id="customer_name" style="font-size: 16PX"></label> (<label id="username" style="font-size: 16PX"></label>)
                        <br>
                        <b>ทำรายการเมื่อ</b> <label id="created_at" style="font-size: 16PX"></label>
                        <br>
                        <b>ธนาคาร</b> <label id="bank_name" style="font-size: 16PX"></label>
                        <br>
                        <b>เลขที่บัญชี</b> <label id="account_no" style="font-size: 16PX"></label>
                        <br>
                        <b>ชื่อบัญชี</b> <label id="account_name" style="font-size: 16PX"></label>
                        <br>
                        <b>หมายเหตุ</b> <label id="remark" style="font-size: 16PX"></label>
                        <br>
                        <label style="font-size: 18PX">ยอดเงินแจ้งโอน</label>
                        <input type="number" name="amount" class="form-control" id="" readonly style="font-size: 16PX">
                        <label style="font-size: 18PX">หลักฐานการโอนเงิน</label>
                        <input type="file" name="image" accept="image/*" class="form-control" >
                    </div>

                    <div class="form-group  mb-0">
                        <div class="text-center" >
                            <button type="submit" class="btn btn-success" name="withdrawConfirm">อนุมัติ</button>
                            <button class="btn btn-danger" name="withdrawReject">ปฏิเสธ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit-->


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

        $('#condition').on('show.bs.modal', function(event) {

            var modal = $(this)
            var button = $(event.relatedTarget)

            var id = $(button).data('editId');
            debug = false;
            $('#customer_name').text($(button).data('customerName'));
            $('#created_at').text($(button).data('createdAt'));
            $('#username').text($(button).data('username'));
            $('#bank_name').text($(button).data('bankName'));
            $('#account_no').text($(button).data('accountNo'));
            $('#account_name').text($(button).data('accountName'));
            $('#remark').text($(button).data('remark'));


            $.ajax({
                    /* the route pointing to the post function */
                    url: '/admin/get-data',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {
                        _token: csrf_token,
                        'target_secret': '{{md5("get-withdraws")}}',
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
                    }
                })
                .fail(function(data) {
                    console.log(data.responseText);
                });
        });
    });
</script>
<!-- END: withdraw_list-->
@endsection