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

    .commission-background {
        background: rgb(2, 0, 36);
        background: linear-gradient(13deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 0%, rgba(0, 212, 255, 1) 100%);
    }

    .withdraws-background {
        background: rgb(2, 0, 36);
        background: linear-gradient(13deg, rgba(2, 0, 36, 1) 0%, rgba(121, 9, 18, 1) 0%, rgba(255, 0, 0, 1) 100%);
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
                        <h2 class="content-header-title float-left mb-0">จัดการข้อมูลติดต่อ</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">จัดการข้อมูลติดต่อ
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
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card commission-background text-white pl-3 pr-3">
                            <h2 class="text-bold-700 mt-1 mb-1 text-white"><i class="fa fa-phone-square-alt"></i> {{$contact_header->tel}}</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card withdraws-background text-white pl-3 pr-3">
                            <h2 class="text-bold-700 mt-1 mb-1 text-white"><i class="fa fa-envelope"></i> {{$contact_header->email}} </h2>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <a class="btn btn-sm btn-warning text-white w-100" data-toggle="modal" data-target="#edit_fix" data-edit-id="{{$contact_header->id}}"><i class="fa fa-cog"></i> แก้ไขขข้อมูลติดต่อหลัก</a>
                    </div>
                </div>
            </section>
            <!-- Dashboard Analytics end -->

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
                                <th class="thincell">จัดลำดับ</th>
                                <th class="thincell">QR</th>
                                <!-- <th>หัวข้อ</th> -->
                                <th>คำอธิบาย</th>
                                <th class="thincell">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($contacts) {
                                $i = 0;
                                $index = -1;
                                foreach ($contacts as $contact) {
                                    $i++;
                                    $index++;
                            ?>
                                    <tr>
                                        <td style="display:none;"></td>
                                        <td>{{$i}}</td>
                                        <td>
                                            <?php
                                            $before = isset($contacts[($index - 1)]) ? $contacts[($index - 1)] : null;
                                            $after = isset($contacts[($index + 1)]) ? $contacts[($index + 1)] : null;
                                            echo "<div class='row' style='display: flex; flex-flow: row;'>";
                                            echo "<form onsubmit='doSubmit(this)' method='POST'>";
                                            if ($before)
                                                echo "<button name='sort' class='btn btn-sm btn-warning pl-1 pr-1'><i class='fa fa-chevron-up'></i></button><input type='hidden' name='from' value='" . $before->sort_order_id . "'><input type='hidden' name='to' value='" . $contact->sort_order_id . "'>";
                                            echo '</form>';
                                            echo "<form onsubmit='doSubmit(this)' method='POST'>";
                                            if ($after)
                                                echo "<button name='sort' class='btn btn-sm btn-warning pl-1 pr-1'><i class='fa fa-chevron-down'></i></button><input type='hidden' name='from' value='" . $after->sort_order_id . "'><input type='hidden' name='to' value='" . $contact->sort_order_id . "'>";
                                            echo '</form>';
                                            echo '</div>';

                                            ?>
                                        </td>
                                        <td class="product-name">
                                            @if($contact->image)
                                            <a target="_blank" href="{{url($contact->image)}}"><img src="{{url($contact->image)}}" class="image_rules"></a>
                                            @endif

                                        </td>
                                        <td class="product-name">
                                            {{$contact->description}}
                                        </td>
                                        <td class="text-center">
                                            <span data-toggle="modal" data-target="#edit" data-edit-id="{{$contact->id}}"><i class="fa fa-edit" style="font-size: 25px;"></i></span>
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
                                            <form method="POST" action="/admin/contact_huay" onsubmit="doSubmit(this)" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>QR</label>
                                                    <input type="file" name="image" class="form-control" accept="image/*">
                                                </div>

                                                <div class="form-group">
                                                    <label>คำอธิบาย</label>
                                                    <textarea name="description" class="form-control" required></textarea>
                                                </div>
                                                <div class="form-group  mb-0">
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary" name="addContacts">เพิ่มข้อมูล</button>
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
                                            <h4 class="modal-title" id="myModalLabel1">แก้ไข</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="/admin/contact_huay" onsubmit="doSubmit(this)" enctype="multipart/form-data">
                                                <input name="id" type="hidden">
                                                <div class="form-group">
                                                    <label>QR</label>
                                                    <input type="file" name="image" class="form-control" accept="image/*">
                                                </div>
                                                <div class="form-group">
                                                    <label>คำอธิบาย</label>
                                                    <textarea name="description" class="form-control" required></textarea>
                                                </div>
                                                <div class="form-group  mb-0">
                                                    <div class="text-right" style="display: flex;flex-direction: row-reverse;">
                                                        <button type="submit" class="btn btn-primary" name="editContacts">บันทึกข้อมูล</button>
                                                        <button class="btn btn-danger" name="deleteContacts">ลบ</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Edit-->

                            <!-- Modal EDIT -->
                            <div class="modal fade text-left" id="edit_fix" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel1">แก้ไขข้อมูลติดต่อหลัก</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="/admin/contact_huay" onsubmit="doSubmit(this)" enctype="multipart/form-data">
                                                <input name="id" type="hidden">
                                                <div class="form-group">
                                                    <label>เบอร์โทร</label>
                                                    <input type="tel" name="tel"  class="form-control" required>
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" required>
                                                </div>

                                                <div class="form-group  mb-0">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-success" name="updateContactHeader">บันทึก</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal EDIT -->
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
                        'target_secret': '{{md5("get-contacts")}}',
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
        
        $('#edit_fix').on('show.bs.modal', function(event) {

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
                        'target_secret': '{{md5("get-contact-header")}}',
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
<!-- END: Content-->
@endsection