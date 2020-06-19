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
                        <h2 class="content-header-title float-left mb-0">ระบบคอมมิชชั่น</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">รายการเครดิตแนะนำ</a>
                                </li>

                                <li class="breadcrumb-item active">รายการเครดิต
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
                                <th>รายการ</th>
                                <th>วันที่</th>
                                <th>เวลา</th>
                                <th>ยอดเงิน</th>
                                <th class="thincell">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($transaction_lists) {
                                $i = 0;
                                $index = -1;
                                foreach ($transaction_lists as $transaction_list) {
                                    $i++;
                                    $index++;
                            ?>
                                    <tr>
                                        <td style="display:none;"></td>
                                        <td class="text-center">{{$i}}</td>
                                        <td class="product-name">{{$transaction_list->user_info->first_name}} {{$transaction_list->user_info->last_name}}</td>
                                        <td class="product-name">{{$transaction_list->user_info->username}}</td>
                                        <td class="text-center">
                                            @if($transaction_list->remark)
                                                <label class="" style="word-break:break-all">{{$transaction_list->remark}}</label><br>
                                            @endif
                                        </td>
                                        <td>{{date('d/m/Y', strtotime($transaction_list->created_at))}}</td>
                                        <td>{{date('H:i:s', strtotime($transaction_list->created_at))}}</td>
                                        <td class="text-right">{{number_format($transaction_list->amount, 2)}}</td>
                                        
                                        <td class="text-center" nowrap><?php echo $transaction_list->status_name ?></td>
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
                <form method="POST" action="/admin/commission_approve" onsubmit="doSubmit(this)" enctype="multipart/form-data">
                    <input name="id" type="hidden">
                    <div class="form-group">
                        <b>ลูกค้า</b> <label id="customer_name"></label> (<label id="username"></label>)
                        <br>
                        <b>ทำรายการเมื่อ</b> <label id="created_at"></label>
                        <br>
                        <b>ธนาคาร</b> <label id="bank_name"></label>
                        <br>
                        <b>เลขที่บัญชี</b> <label id="account_no"></label>
                        <br>
                        <b>ชื่อบัญชี</b> <label id="account_name"></label>
                        <br>
                        <b>หมายเหตุ</b> <label id="remark"></label>
                        <br>
                        <label>ยอดเงินแจ้งโอน</label>
                        <input type="number" name="amount" class="form-control" id="" readonly>
                        <label>หลักฐานการโอนเงิน</label>
                        <input type="file" name="image" accept="image/*" class="form-control" >
                    </div>

                    <div class="form-group  mb-0">
                        <div class="text-center" >
                            <button type="submit" class="btn btn-success" name="transactionConfirm">อนุมัติ</button>
                            <button class="btn btn-danger" name="transactionReject">ปฏิเสธ</button>
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

      
    });
</script>
<!-- END: transaction_list-->
@endsection