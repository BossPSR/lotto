@extends('frontend/option/layout_member')
@section('contact_member')
<?php
$_GET['start_date'] = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d');
$_GET['end_date'] = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d');
?>
<style>
    .chip {
        border-radius: 100vh;
        padding-right: 10px;
        padding-left: 10px;
        padding-bottom: 5px;
        padding-top: 5px;
        color: white;
        font-size: 15px;
    }
</style>
<!-- jackpot begin -->
<div class="jackpot" style="background:#FED63E;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                <a href="/index_member" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">ย้อนกลับ</button></a>
            </div>
        </div>
    </div>
    <div class="container shape-container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                <div class="single-jackpot">
                    <div class="part-head">

                        <div class="text" style="margin-left:25px;">
                            <span class="amount">รายงานเครดิต</span>
                            <span class="draw-date"></span>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <form method="GET">
                            <label>ช่วงเวลา</label>
                            <div class="row m-0 mb-2">
                                <input class="form-control col-md-5" type="date" name="start_date" value="{{$_GET['start_date']}}" >
                                <input class="form-control col-md-5" type="date" name="end_date" value="{{$_GET['end_date']}}" >
                                <button class="btn btn-sm btn-info col-md-2"><i class="fa fa-search"></i> ค้นหา</button>
                            </div>
                        </form>
                    </div>
                    <div class="part-body">
                        @if(count($transactions) == 0)
                        <div class="alert alert-danger">
                            คุณยังไม่มีรายได้
                        </div>
                        @endif

                        <?php
                        $status_list = array(
                            'pending' => array(
                                'txt' => 'รอยืนยัน',
                                'html' => ' <div class="chip bg-warning">
                                            <div class="chip-body">
                                                <div class="chip-text">รอยืนยัน</div>
                                            </div>
                                        </div>'
                            ),
                            'confirm' => array(
                                'txt' => 'อนุมัติ',
                                'html' => ' <div class="chip bg-success">
                                            <div class="chip-body">
                                                <div class="chip-text">อนุมัติ</div>
                                            </div>
                                        </div>'
                            ),
                            'reject' => array(
                                'txt' => 'ปฏิเสธ',
                                'html' => ' <div class="chip bg-danger">
                                            <div class="chip-body">
                                                <div class="chip-text">ปฏิเสธ</div>
                                            </div>
                                        </div>'
                            ),
                        );
                        ?>
                        <table class="table">
                            <tr>
                                <th style="width: 1px">#</th>
                                <th style="width: 100px;">หลักฐาน</th>
                                <th>รายการ</th>
                                <th class="text-center" style="width: auto;" nowrap>เมื่อ</th>
                                <th class="text-right" style="width: auto;" nowrap>จำนวนเงิน</th>
                                <th style="width: 1px" nowrap>สถานะ</th>
                            </tr>
                            @foreach ($transactions as $index => $transaction)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td class="product-name">
                                    @if($transaction->proof_image)
                                    <a target="_blank" href="{{url($transaction->proof_image)}}"><img src="{{url($transaction->proof_image)}}" class="image_rules"></a>
                                    @endif
                                </td>
                                <td>{{$transaction->remark}}</td>
                                <td class="text-center">{{date('d/m/Y H:i:s',strtotime($transaction->created_at))}}</td>

                                <td class="text-right">{{number_format($transaction->amount, 2)}}</td>
                                <td nowrap class="text-center"><?php echo $status_list[$transaction->status]['html']; ?></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- jackpot end -->
@endsection