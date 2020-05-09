@extends('backend/option/layout_admin_after')
@section('contact_admin')
<style>
    .btn-group,
    #DataTables_Table_0_length {
        display: none;
    }
    .thincell{
        width:1px;
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
                        <h2 class="content-header-title float-left mb-0">จัดการข่าวสาร</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">จัดการข่าวสาร
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
                                <th class="thincell">#</th>
                                <th>TITLE</th>
                                <th>DESCRIPTION</th>
                                <th class="thincell">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($contents) {
                                $i = 0;
                                foreach ($contents as $content) {
                                    $i++;
                            ?>
                                    <tr>
                                        <td style="display:none;"></td>
                                        <td>{{$i}}</td>
                                        <td class="product-name">{{$content->title}}</td>
                                        <td >{{$content->description}}</td>
                                        <td class="text-center">
                                            <span data-toggle="modal" data-target="#trophy" data-edit-id="{{$content->id}}"><i class="fa fa-edit" style="font-size: 25px;"></i></span>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            <!-- Modal Edit-->
                            <div class="modal fade text-left" id="trophy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel1">แก้ไขข่าวสาร</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" id="">
                                            </div>

                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control"></textarea>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">แก้ไขข้อมูลผลหวย</button>
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
<!-- END: Content-->
@endsection