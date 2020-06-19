@extends('frontend/option/layout_member')
@section('contact_member')

<!-- jackpot begin -->
<div class="jackpot" style="background:#FFF; min-height:100vh">
    <div class="container">
        <div class="row">
            {{-- <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                <a href="/lottery_result" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">ย้อนกลับ</button></a>
            </div> --}}
        </div>
    </div>
    <div class="container shape-container" style="max-width: 90%">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                <div class="single-jackpot">
                    <div class="part-head" style="display: block;">
                        <div class="text row" style="margin-left:25px;">
                            <div class="col-6">
                                <span class="amount" style="color:#6f39d5">ผลรางวัล</span>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/index_member" style="display: inline-block;font-size: 20px; background-color: #6f39d5;color:#FFF" class="btn btn-warning">ย้อนกลับ</a>

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="container-fluid  pl-2 pr-2">
                        <div class="row mb-2  no-gutters">
                            <div class="col-12">
                                <div style="background-color:#FFF">
                                    <div class="card-body pr-0 pl-0">
                                        <h1 class="text-center">{{$huay_round->name}}</h1>
                                        <p class="close-info text-danger text-center">ปิดรับการทายผลตัวเลขออกรางวัล</p>
                                        <div class="row no-gutters">
                                            <div class="col-12">
                                                <p class="title text-center">ผลรางวัล</p>
                                                <p class="number text-center mb-4"><?php
                                                $nums = $huay_round->result_total_shoot;

                                                $yeekee_six = $nums - intval($huay_round->result_row_sixteen);
                                                $yeekee_six = strval($yeekee_six);
                                                $three_up = $yeekee_six[(strlen($yeekee_six)) - 3] . $yeekee_six[(strlen($yeekee_six)) - 2] . $yeekee_six[(strlen($yeekee_six)) - 1];
                                                $two_up = $yeekee_six[(strlen($yeekee_six)) - 2] . $yeekee_six[(strlen($yeekee_six)) - 1];
                                                $two_down = $yeekee_six[(strlen($yeekee_six)) - 5] . $yeekee_six[(strlen($yeekee_six)) - 4];

                                                $left = substr($yeekee_six, 0, (strlen($yeekee_six) - 5));


                                                ?>{{ $left}}<span class="number text-success">{{$two_down}}</span><span class="number text-danger">{{$three_up}}</span></p>
                                            </div>
                                            <div class="col-6 border-right">
                                                <p class="title text-center">สามตัวบน</p>
                                                <p class="number text-center">{{$huay_round->result_tree_up}}</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="title text-center">สองตัวล่าง</p>
                                                <p class="number text-center">{{$huay_round->result_two_down}}</p>
                                            </div>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col-12">
                                                <p class="title text-center pt-4">ผลรวมยิงเลข</p>
                                                <p class="number text-center">{{$huay_round->result_total_shoot}}</p>
                                            </div>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col-12">
                                                <p class="title text-center pt-4">เลขแถวที่ 16</p>
                                                <p class="number text-center text-primary">{{$huay_round->result_row_sixteen}}</p>
                                            </div>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col-12">
                                                <p class="title text-center pt-4">สมาชิกยิงเลขได้ลำดับที่ 1</p>
                                                <p class="number text-center">{{$huay_round->result_user_firt}}</p>
                                            </div>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col-12">
                                                <p class="title text-center pt-4">สมาชิกยิงเลขได้ลำดับที่ 16</p>
                                                <p class="number text-center">{{$huay_round->result_user_sixteen}}</p>
                                            </div>
                                        </div>
                                        <?php $i = 0; ?>
                                        @foreach ($shoot_numbers as $number_info)
                                        <?php $i++; ?>
                                        <div class="card-body pr-2 pl-2">
                                            <p class="title-list">รายชื่อผู้ทายเลข</p>
                                            <div class="row no-gutters">
                                                <div class="col-12">
                                                    <div class="card card-lists mb-2 active-first-number">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <p class="title text-left">ลำดับ
                                                                        {{$i}}</p>
                                                                </div>
                                                                <div class="col-6 boder-right">
                                                                    <p class="text-right date">เวลาที่ส่ง {{date('d/m/Y H:i:s', strtotime($number_info->created_at))}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <p class="number text-primary">{{$number_info->number}}</p>
                                                                </div>
                                                                <div class="col-7">
                                                                    <p class="title text-left">ชื่อสมาชิกผู้ส่งเลข</p>
                                                                    <p>{{$number_info->user_name_secret}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/app.js"></script>
<script>
    var csrf_token = '{{ csrf_token() }}';
</script>
<!-- jackpot end -->
@endsection