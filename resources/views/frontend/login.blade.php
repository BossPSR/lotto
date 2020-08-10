@extends('frontend/option/layout')
@section('content')


<style>
    .info-card {
        padding-top: 15px;
        padding-bottom: 20px;
    }

    .info-card h2 {
        padding-top: 10px;
        padding-bottom: 10px;
        font-size: 20px;
        text-align: center;

    }

    .info-card-danger {
        background-color: #DC0B00;
    }

    .info-card-danger h2 {
        background-color: #AD1A1A;
    }

    .info-card-success {
        background-color: #00A804;
    }

    .info-card-success h2 {
        background-color: #1C5C1D;
    }

    .info-card-warning {
        background-color: #D49502;
    }

    .info-card-warning h2 {
        background-color: #C97902;
    }
</style>
<div style="background:#FFF;  min-height: calc(100vh - 100px);">
    <div class="container" style="max-width: 90%">
        <div class="row">
            <div class="w-100 bg-white p-2 m-0 rounded mt-2">
                <?php
                $index = 0;
                if (count($huay_round_by_category) > 0) {
                    foreach ($huay_round_by_category as $category_name => $huay_list) {
                ?>

                        <div class="part-head p-2 rounded button_plus_story">
                            <div class="row">
                                <div class="col-6">
                                    {{$category_name}}
                                </div>
                                <div class="col-6 text-right">
                                    <a href="/index_member" style="display: inline-block;font-size: 20px; background-color: #6f39d5;color:#FFF" class="btn btn-warning">ย้อนกลับ</a>
                                </div>

                            </div>

                        </div>
                        <div class="row m-0 mt-2">
                            <?php
                            foreach ($huay_list as $huay_round) {
                                $index++;
                            ?>
                                <div class="col-md-4 col-lg-3 col-sm-12 mb-2 px-1">
                                    <div class="info-card  shadow rounded text-center " >
                                        <a class="">
                                            <span style="font-size:22px;">{{$huay_round->name}}</span>
                                            <br>
                                            <span class="time m-1">
                                                <small>ปิดรับ : {{date('d/m/Y H:i:s',strtotime($huay_round->end_datetime))}}</small>
                                            </span>
                                            <div class="part-body">
                                                <div class="lotto_list_colum_2">
                                                    @if($huay_round->price_tree_up != -1)
                                                    <div class="lotto_list_colum_2_detail">
                                                        <div>3 ตัวบน</div>
                                                        <div>{{(($huay_round->result_tree_up != "") ? $huay_round->result_tree_up : 'xxx')}}</div>
                                                    </div>
                                                    @endif
                                                    @if($huay_round->price_tree_tod != -1)
                                                    <div class="lotto_list_colum_2_detail">
                                                        <div>3 ตัวโต้ด</div>
                                                        <div>{{(($huay_round->result_tree_tod !="") ? $huay_round->result_tree_tod : 'xxx')}}</div>
                                                    </div>
                                                    @endif
                                                    @if($huay_round->price_tree_front != -1)
                                                    <div class="lotto_list_colum_2_detail">
                                                        <div>3 ตัวหน้า</div>
                                                        <div>{{(($huay_round->result_tree_front  != "") ? $huay_round->result_tree_front : 'xxx')}}</div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="lotto_list_colum_2 mt-2">
                                                    @if($huay_round->price_tree_down != -1)
                                                    <div class="lotto_list_colum_2_detail">
                                                        <div>3 ตัวล่าง</div>
                                                        <div>{{(($huay_round->result_tree_down != "") ? $huay_round->result_tree_down : 'xxx')}}</div>
                                                    </div>
                                                    @endif
                                                    @if($huay_round->price_two_up != -1)
                                                    <div class="lotto_list_colum_2_detail">
                                                        <div>2 ตัวบน</div>
                                                        <div>{{(($huay_round->result_two_up !="") ? $huay_round->result_two_up : 'xx')}}</div>
                                                    </div>
                                                    @endif
                                                    @if($huay_round->price_two_down != -1)
                                                    <div class="lotto_list_colum_2_detail">
                                                        <div>2 ตัวล่าง</div>
                                                        <div>{{(($huay_round->result_two_down  != "") ? $huay_round->result_two_down : 'xx')}}</div>
                                                    </div>
                                                    @endif
                                                </div>

                                                <div class="lotto_list_colum_2 mt-2">
                                                    @if($huay_round->price_run_up != -1)
                                                    <div class="lotto_list_colum_2_detail">
                                                        <div>วิ่งบน</div>
                                                        <div>{{(($huay_round->result_run_up != "") ? $huay_round->result_run_up : 'x')}}</div>
                                                    </div>
                                                    @endif
                                                    @if($huay_round->price_run_down != -1)
                                                    <div class="lotto_list_colum_2_detail">
                                                        <div>วิ่งล่าง</div>
                                                        <div>{{(($huay_round->result_run_down !="") ? $huay_round->result_run_down : 'x')}}</div>
                                                    </div>
                                                    @endif
                                                </div>
                                                @if($huay_round->huay_category_id != 1 && $huay_round->round_status == 'complete')
                                                <div class="lotto_list_colum_2 mt-2 mb-0 pb-0">
                                                    <a href="lottery_result_yeekee?huay_secret={{$huay_round->secret}}" class="btn btn-md btn-warning w-100 text-white">ผลรางวัลยิงเลข</a>
                                                </div>
                                                @endif
                                            </div>

                                        </a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                <?php
                    }
                }
                else
                {
                    ?>
                    <div class="container shape-container" style="margin-top: 30px;">
                        <div class="alert alert-danger">ยังไม่มีข้อมูล</div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- jackpot end -->
<script src="https://code.jquery.com/jquery-git.min.js"></script>
<script src="{{url('backend/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script>
    @if(session()->has('message'))
    Swal.fire({
        type: '{{ session()->get("status") }}',
        title: '<small> {{ session()->get("message") }} </small>',
        showConfirmButton: false,
        timer: 5000
    });
    @endif
</script>
@endsection
