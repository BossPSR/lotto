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
                        <h2 class="content-header-title float-left mb-0">รายการแจ้งถอนเงิน</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">จัดการถอนเงิน</a>
                                </li>

                                <li class="breadcrumb-item active">รายการแจ้งถอนเงิน
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
                                <th>หลักฐานการโอนเงิน</th>
                                <th>ลูกค้า</th>
                                <th>บัญชีผู้ใช้งาน</th>
                                <th>ผู้อนุมัติ</th>
                                <th>รายละเอียดการโอน</th>
                                <th>วันที่</th>
                                <th>เวลา</th>
                                <th>ยอดเงินแจ้งโอน</th>
                                <th class="thincell">สถานะ</th>
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
                                        <td class="product-name">
                                            @if($withdraw_list->proof_image)
                                            <a target="_blank" href="{{url($withdraw_list->proof_image)}}"><img src="{{url($withdraw_list->proof_image)}}" class="image_rules"></a>
                                            @endif
                                        </td>
                                        <td class="product-name">{{$withdraw_list->user_info->first_name}} {{$withdraw_list->user_info->last_name}}</td>
                                        <td class="product-name">{{$withdraw_list->user_info->username}}</td>
                                        <td class="product-name">{{$withdraw_list->admin_info->username}}</td>
                                        <td>{{date('d/m/Y', strtotime($withdraw_list->created_at))}}</td>
                                        <td>{{date('H:i:s', strtotime($withdraw_list->created_at))}}</td>
                                        <td class="text-right">{{number_format($withdraw_list->amount, 2)}}</td>
                                        <td class="text-center">
                                            <label>{{$withdraw_list->bank_name}}</label><br>
                                            <small>{{$withdraw_list->account_no}}</small><br>
                                            <small>{{$withdraw_list->account_name}}</small><br>
                                        </td>
                                        <td class="text-center" nowrap><?php echo $withdraw_list->status_name ?></td>
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
<!-- END: Content-->
@endsection