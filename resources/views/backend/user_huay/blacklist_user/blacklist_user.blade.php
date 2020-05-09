@extends('backend/option/layout_admin_after')
@section('contact_admin')
    <style>
        .btn-group,#DataTables_Table_0_length{display: none;}
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
                            <h2 class="content-header-title float-left mb-0">บัญชีดำ</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">ระบบจัดการผู้เล่น</a>
                                    </li>

                                    <li class="breadcrumb-item active">บัญชีดำ
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


                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th style="display:none;"></th>
                                    <th>NAME</th>
                                    <th>CATEGORY</th>
                                    <th>POPULARITY</th>
                                    <th>ORDER STATUS</th>
                                    <th>PRICE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td style="display:none;"></td>
                                    <td class="product-name">Altec Lansing - Mini H2O Bluetooth Speaker</td>
                                    <td class="product-category">Fitness</td>
                                    <td>
                                        <div class="progress progress-bar-success">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:87%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="chip chip-success">
                                            <div class="chip-body">
                                                <div class="chip-text">delivered</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-price">$199.99</td>
                                    <td>
                                        <span data-toggle="modal" data-target="#watch"><i class="feather icon-watch" style="font-size: 25px;"></i></span>
                                        <span data-toggle="modal" data-target="#money"><i class="fa fa-money" style="font-size: 25px;"></i></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="display:none;"></td>
                                    <td class="product-name">rrAltec Lansing - Mini H2O Bluetooth Speaker</td>
                                    <td class="product-category">Fitness</td>
                                    <td>
                                        <div class="progress progress-bar-success">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:87%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="chip chip-success">
                                            <div class="chip-body">
                                                <div class="chip-text">delivered</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-price">$199.99</td>
                                    <td>
                                        <span data-toggle="modal" data-target="#watch"><i class="feather icon-watch" style="font-size: 25px;"></i></span>
                                        <span data-toggle="modal" data-target="#money"><i class="fa fa-money" style="font-size: 25px;"></i></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="display:none;"></td>
                                    <td class="product-name">bAltec Lansing - Mini H2O Bluetooth Speaker</td>
                                    <td class="product-category">Fitness</td>
                                    <td>
                                        <div class="progress progress-bar-success">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:87%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="chip chip-success">
                                            <div class="chip-body">
                                                <div class="chip-text">delivered</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-price">$199.99</td>
                                    <td>
                                        <span data-toggle="modal" data-target="#watch"><i class="feather icon-watch" style="font-size: 25px;"></i></span>
                                        <span data-toggle="modal" data-target="#money"><i class="fa fa-money" style="font-size: 25px;"></i></span>
                                    </td>
                                </tr>
                                 <!-- Modal watch-->
                                 <div class="modal fade text-left" id="watch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel1">แก้ไขข้อมูลเวลา</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>วันที่</label>
                                                    <input type="date" name="" class="form-control" id="">
                                                </div>

                                                <div class="form-group">
                                                    <label>เวลา</label>
                                                    <input type="time" name="" class="form-control" id="">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">แก้ไขข้อมูลเวลา</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal watch-->

                                 <!-- Modal money-->
                                 <div class="modal fade text-left" id="money" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel1">หวย</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>สามตัวบน</label>
                                                            <input type="number" name="" class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>สามตัวโต้ด</label>
                                                            <input type="number" name="" class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>สามตัวหน้า</label>
                                                            <input type="number" name="" class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>สามตัวล่าง</label>
                                                            <input type="number" name="" class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>สองตัวหน้า</label>
                                                            <input type="number" name="" class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>สองตัวล่าง</label>
                                                            <input type="number" name="" class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>วิ่งบน</label>
                                                            <input type="number" name="" class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>วิ่งล่าง</label>
                                                            <input type="number" name="" class="form-control" id="">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">แก้ไขตัวเลข</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal money-->



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
