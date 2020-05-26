@extends('backend/option/layout_admin_after')
@section('contact_admin')
<style>
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
                        <h2 class="content-header-title float-left mb-0">จัดการคอมมิชชั่น</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">ระบบคอมมิชชั่น</a>
                                </li>

                                <li class="breadcrumb-item active">จัดการคอมมิชชั่น
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card commission-background text-white">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <h2 class="text-bold-700 mt-1 mb-25 text-white">{{number_format($setting->commission_percent, 2)}}%</h2>
                                <p>ค่าคอมมิชชั่น</p>
                            </div>
                            <!-- <div class="card-content">
                                    <div id="subscribe-gain-chart"></div>
                                </div> -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card withdraws-background text-white">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <h2 class="text-bold-700 mt-1 mb-25 text-white">{{number_format($setting->min_withdraws, 2)}} บาท</h2>
                                <p>ยอดกำหนดแจ้งถอน</p>
                            </div>
                            <!-- <div class="card-content">
                                    <div id="orders-received-chart"></div>
                                </div> -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a class="btn btn-sm btn-warning text-white w-100" data-toggle="modal" data-target="#edit" 
                                            data-edit-id="{{$setting->id}}" ><i class="fa fa-cog"></i> แก้ไขค่าคอมมิชชั่น</a>
                    </div>
                </div>
            </section>
            <!-- Dashboard Analytics end -->

        </div>
    </div>
</div>
<!-- Modal Edit-->
<div class="modal fade text-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">อนุมัติแจ้งถอน</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/admin/commission_manage" onsubmit="doSubmit(this)" enctype="multipart/form-data">
                    <input name="id" type="hidden">
                    <div class="form-group">
                        <label>ค่าคอมมิชชั่น</label>
                        <input type="number" name="commission_percent" step="0.01" min="0" max='100' class="form-control" required>
                        <label>ยอดกำหนดแจ้งถอน</label>
                        <input type="number" name="min_withdraws" step="0.01" min="0"  accept="image/*" class="form-control" required>
                    </div>

                    <div class="form-group  mb-0">
                        <div class="text-center" >
                            <button type="submit" class="btn btn-success" name="updateCommissionSetting">บันทึก</button>
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
                        'target_secret': '{{md5("get-commission_setting")}}',
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