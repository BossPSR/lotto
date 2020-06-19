@extends('backend/option/layout_admin_after')
@section('contact_admin')
<?php
$_GET['category_id'] = isset($_GET['category_id']) ? $_GET['category_id'] : null;
?>
<style>
    .btn-group,
    #DataTables_Table_0_length {
        display: none;
    }

    .thincell {
        width: 1%;
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
                        <h2 class="content-header-title float-left mb-0">จัดการหวย</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">จัดการหวย</a>
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
                                <th>NAME</th>
                                <th>CATEGORY</th>
                                <th>PRICE</th>
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

                            if (count($huays)) {
                                foreach ($huays as $huay) {
                            ?>
                                    <tr>
                                        <td style="display:none;"></td>
                                        <td class="product-name">{{$huay->name}}</td>
                                        <td class="product-category">{{$huay->category_name}}</td>
                                        <td class="product-category">
                                            <?php
                                            $index = 0;
                                            foreach ($price_array as $key => $name) {
                                                if($huay->$key  == -1)
                                                    continue;
                                                $index++;
                                                if ($index == 5)
                                                    echo '<br>';
                                                echo ' <small>' . $name . ' ' . $huay->$key . '</small>,   ';
                                            }
                                            ?>
                                        </td>
                                        <td class="text-right">
                                            <span data-toggle="modal" data-edit-id="{{$huay->id}}" data-huay-name="{{$huay->name}}" data-target="#money"><i class="fa fa-money" style="font-size: 25px;"></i></span>
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

                <!-- Modal money-->
                <div class="modal fade text-left" id="money" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">แก้ไข</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/admin/manage_huay" onsubmit="doSubmit(this)" enctype="multipart/form-data">
                                    <input name="id" type="hidden">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>สามตัวบน</label>
                                                <input type="number" step="0.01" min="0" name="price_tree_up" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>สามตัวโต้ด</label>
                                                <input type="number" step="0.01" min="0" name="price_tree_tod" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>สามตัวหน้า</label>
                                                <input type="number" step="0.01" min="0" name="price_tree_front" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>สามตัวล่าง</label>
                                                <input type="number" step="0.01" min="0" name="price_tree_down" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>สองตัวบน</label>
                                                <input type="number" step="0.01" min="0" name="price_two_up" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>สองตัวล่าง</label>
                                                <input type="number" step="0.01" min="0" name="price_two_down" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>วิ่งบน</label>
                                                <input type="number" step="0.01" min="0" name="price_run_up" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>วิ่งล่าง</label>
                                                <input type="number" step="0.01" min="0" name="price_run_down" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group  mb-0">
                                        <div class="text-right" style="display: flex;flex-direction: row-reverse;">
                                            <button type="submit" class="btn btn-primary" name="updateHuay">บันทึกข้อมูล</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal money-->


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

        $('#money').on('show.bs.modal', function(event) {

            var modal = $(this)
            var button = $(event.relatedTarget)

            var id = $(button).data('editId');
            var huay_name = $(button).data('huayName');
            document.getElementById("myModalLabel1").innerHTML = (huay_name);
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
                            {
                                el = $('[name="'+element.name+'"]')[0].closest(".col-6");
                                if(data[element.name] == -1)
                                {
                                   $(el).hide()
                                   element.required = false;    
                                   element.min = null;    
                                }
                                else
                                {
                                    $(el).show()
                                    element.required = true;  
                                   element.min = 0;    

                                }
                                element.value = data[element.name]
                            }
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
@endsection