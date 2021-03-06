@extends('frontend/option/layout_member')
@section('contact_member')
<!-- jackpot begin -->
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
        color: white;

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

    .info-card-complete {
        background-color: #FFBB00;
    }

    .info-card-complete h2 {
        background-color: #805E00;
    }
</style>
<div class="jackpot" style="background:#FFF;  min-height: calc(100vh - 100px);">
    <div class="container" style="max-width: 90%">
        <div class="row">
            {{-- <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                <a href="/index_member" style="display: inline-block;"><button type="button" class="btn btn-warning ">ย้อนกลับ</button></a>
            </div> --}}
        </div>
    </div>
    <div class="container shape-container" style="max-width: 90%">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                <div class="single-jackpot m-0 p-3">
                    <div class="part-head m-0" style="display: block;">

                        <div class="text row" style="margin-left:25px;">

                            <div class="col-6" >
                            <span class="amount" style="color:#6f39d5">แทงหวย</span>
                            </div>
                            <div class="col-6 text-right ">
                                <a href="/index_member" style="display: inline-block; font-size: 20px; background-color: #6f39d5;color:#FFF" class="btn btn-warning">ย้อนกลับ</a>

                            </div>
                           
                            
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $index = 0;
    if (count($huay_round_by_category) > 0) {
        foreach ($huay_round_by_category as $category_name => $huay_list) {
    ?>
            <div class="container shape-container" style="max-width: 90%">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                        <div class="single-jackpot m-0">
                            <div class="part-head p-2 rounded button_plus_story">
                                {{$category_name}}
                            </div>
                            <br>
                            <div class="row">
                                <?php
                                foreach ($huay_list as $huay_round) {
                                    $index++;

                                    $style = '';
                                    if ($huay_round->is_active && date('Y-m-d H:i:s') >= date('Y-m-d H:i:s', strtotime($huay_round->start_datetime)))
                                        $style = 'success';
                                    else if (date('Y-m-d H:i:s') < date('Y-m-d H:i:s', strtotime($huay_round->start_datetime)))
                                        $style = 'warning';
                                    else if($huay_round->round_status == 'complete')
                                        $style = 'complete';
                                    else
                                        $style = 'danger';

                                    $href = "";
                                    if ($style == 'success')
                                        $href = 'lottery_government?huay_secret=' . $huay_round->secret;
                                    else if ($style == 'complete')
                                        $href = 'lottery_result';

                                ?>
                                    <div class="col-6 col-md-3 col-lg-2 mb-2 px-1">
                                    <a <?php echo $href ? 'href="' . $href . '"' : "" ?> class="text-white">

                                        <div class="info-card info-card-{{$style}} shadow rounded text-center " style="cursor: pointer !important">
                                                <h2><span>
                                                        <div id="timer" style="cursor: pointer !important">
                                                            <label id="hours{{$index}}" class="m-0" style="cursor: pointer !important"></label><label id="minutes{{$index}}" class="m-0" style="cursor: pointer !important">
                                                            <?php 
                                                            if($style == 'danger')
                                                                echo 'ปิดรับแทง';
                                                            else if($style == 'warning')
                                                                echo 'ยังไม่ถึงเวลาเริ่มต้น';
                                                            else if($style == 'complete')
                                                                echo 'ประกาศผลแล้ว';
                                                            ?>
                                                            </label><label id="seconds{{$index}}" class="m-0" style="cursor: pointer !important"></label>
                                                        </div>
                                                    </span></h2>
                                                <span class="name">{{$huay_round->name}}</span>
                                                <br>
                                                <span class="time m-1">
                                                    <small>ปิดรับ : {{date('d/m/Y H:i:s',strtotime($huay_round->end_datetime))}}</small>
                                                </span>
                                        </div>
                                        </a>

                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    else
    {
        ?>
        <div class="container shape-container">
            <div class="alert alert-danger">ยังไม่มีข้อมูล</div>
        </div>
        <?php
    }
    ?>


</div>
<!-- jackpot end -->
<script src="https://code.jquery.com/jquery-git.min.js"></script>
<script src="{{url('backend/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script>
    var csrf_token = '{{ csrf_token() }}';
    
    @if(session()-> has('message'))
    Swal.fire({
        type: '{{ session()->get("status") }}',
        title: '<small> {{ session()->get("message") }} </small>',
        showConfirmButton: false,
        timer: 5000
    });
    @endif

    <?php
    $index = 0;
    if (count($huay_round_by_category) > 0) {
        foreach ($huay_round_by_category as $category_name => $huay_list) {
            foreach ($huay_list as $huay_round) {
                $index++;
                if ($huay_round->is_active == 0 or date('Y-m-d H:i:s') < date('Y-m-d H:i:s', strtotime($huay_round->start_datetime)))
                    continue;
    ?>

                function makeTimer<?php echo $index ?>() {
                    var endTime = new Date("{{date('d M Y H:i:s', strtotime($huay_round->end_datetime))}} GMT+07:00");
                    endTime = (Date.parse(endTime) / 1000);

                    var now = new Date();
                    now = (Date.parse(now) / 1000);

                    var timeLeft = endTime - now;

                    var days = Math.floor(timeLeft / 86400);
                    var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                    var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
                    var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

                    if (hours < "10") {
                        hours = "0" + hours;
                    }
                    if (minutes < "10") {
                        minutes = "0" + minutes;
                    }
                    if (seconds < "10") {
                        seconds = "0" + seconds;
                    }

                    if (now < endTime) {
                        $("#hours{{$index}}").html(hours + ':');
                        $("#minutes{{$index}}").html(minutes + ":");
                        $("#seconds{{$index}}").html(seconds);
                    } else
                        $("#minutes{{$index}}").html('ปิดรับแทง');


                }
                setInterval(function() {
                    makeTimer<?php echo $index ?>();
                }, 1000);
    <?php
            }
        }
    }

    ?>
</script>
@endsection