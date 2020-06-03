@extends('frontend/option/layout_member')
@section('contact_member')
<?php
$_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 'index';

if (session()->has('page'))
    $_GET['page'] = session()->get('page');

$banks_array = array(
    'ธนาคารกรุงเทพ',
    'ธนาคารกสิกรไทย',
    'ธนาคารกรุงไทย',
    'ธนาคารทหารไทย',
    'ธนาคารไทยพาณิชย์',
    'ธนาคารกรุงศรีอยุธยา',
    'ธนาคารเกียรตินาคิน',
    'ธนาคารซีไอเอ็มบีไทย',
    'ธนาคารทิสโก้',
    'ธนาคารธนชาต',
    'ธนาคารยูโอบี',
    'ธนาคารแลนด์ แอนด์ เฮาส์',
    'ธนาคารไอซีบีซี (ไทย)',
    'ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร',
    'ธนาคารออมสิน',
    'ธนาคารอาคารสงเคราะห์',
    'ธนาคารอิสลามแห่งประเทศไทย',
    'ธนาคารซิตี้แบงค์',
);
?>
<!-- jackpot begin -->
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

    td {
        padding: 0px;
    }

    .image_rules {
        width: 80px;
        height: 60px;
        object-fit: contain;
    }
</style>
<div class="jackpot" style="background:#FED63E; min-height:100vh">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                <a href="/index_member" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">ย้อนกลับ</button></a>
            </div>
        </div>
    </div>
    <div class="container shape-container">
        <div class="row">
            <div class="container-fluid content__af">
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="card rounded-0 mb-2">
                            <div class="card-body">
                                <div class=" text-center mb-2">
                                    <div style="display: inline-flex;">
                                        <a href="?page=index" class="nav-link {{($_GET['page'] == 'index' ? 'text-warning' : 'text-secondary')}}"><i class="fa fa-globe-asia"></i> ภาพรวม</a>
                                        <a href="?page=members" class="nav-link {{($_GET['page'] == 'members' ? 'text-warning' : 'text-secondary')}}"><i class="fa fa-users"></i> สมาชิก</a>
                                        <a href="?page=revenue" class="nav-link {{($_GET['page'] == 'revenue' ? 'text-warning' : 'text-secondary')}}"><i class="fa fa-money-bill"></i> รายได้</a>
                                        <a href="?page=withdraw" class="nav-link {{($_GET['page'] == 'withdraw' ? 'text-warning' : 'text-secondary')}}"><i class="fa fa-bell"></i> แจ้งถอนรายได้</a>
                                    </div>
                                </div>
                                @if($_GET['page'] == 'index')
                                @csrf
                                <div class="row">
                                    <div class="col-6 mb-2 pr-1">
                                        <div class="border pt-3 pb-3 rounded">
                                            <p class="text-center title">ส่วนแบ่งรายได้</p>
                                            <p class="text-center number">{{$commission_setting->commission_percent}}
                                                %
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2 pl-1">
                                        <div class="border pt-3 pb-3 rounded">
                                            <p class="text-center title">สมาชิกที่แนะนำได้</p>
                                            <p class="text-center number">{{count($downlines)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-2 pr-1">
                                        <div class="border pt-3 pb-3 rounded">
                                            <p class="text-center title">จำนวนแทงทั้งหมด</p>
                                            <p class="text-center number">{{number_format($downline_poy_count)}}</p>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2 pl-1">
                                        <div class="border pt-3 pb-3 rounded">
                                            <p class="text-center title">รายได้ทั้งหมด</p>
                                            <p class="text-center number">{{number_format($total_income, 2)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-2 pr-1">
                                        <div class="border pt-3 pb-3 rounded">
                                            <p class="text-center title">รายได้ปัจจุบัน</p>
                                            <p class="text-center number">{{number_format($user_info->credit, 2)}}</p>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="card-body">
                                    <h1>ลิ้งค์ช่วยแชร์ ช่วยแนะนำ</h1>
                                    <p>ลิ้งค์ช่วยแชร์รับ 4% ฟรี (แค่ก๊อปปี้ลิ้งค์ไปแชร์ก็ได้เงินแล้ว) ยิ่งแชร์มากยิ่งได้มาก</p>
                                    <p>ท่านสามารถนำลิ้งค์ด้านล่างนี้หรือนำป้ายแบนเนอร์ ไปแชร์ในช่องทางต่างๆ ไม่ว่าจะเป็น เว็บไชต์ส่วนตัว, Blog, Facebook หรือ Social Network อื่นๆ หากมีการสมัครสมาชิกโดยคลิกผ่านลิ้งค์ของท่านเข้ามา ลูกค้าที่สมัครเข้ามาก็จะอยู่ภายให้เครือข่ายของท่านทันที
                                        และหากลูกค้าภายใต้เครือข่ายของท่านมีการเดิมพันเข้ามา ทุกยอดการเดิมพัน ท่านจะได้รับส่วนแบ่งในการแนะนำ 4% ทันทีโดยไม่มีเงื่อนไข</p>
                                    <p>ตัวอย่างเช่น...</p>
                                    <ul>
                                        ลูกค้าท่าน 1 คน แทง 1,000 บาท ท่านจะได้ 40 บาท
                                        ลูกค้าท่าน 10 คน แทง 1,000 บาท ท่านจะได้รับ 400 บาท
                                        ลูกค้าท่าน 100 คน แทง 1,000 บาท ท่านจะได้รับ 4,000 บาท
                                    </ul>
                                    <p>สามารถทำรายได้เดือน 100,000 บาทง่ายๆเลยทีเดียว เพราะทางเรามีหวยเปิดรับทายผลทุกวัน มีมากกว่าวันละ 200 รอบ เปิดรับแทงออนไลน์ตลอด 24 ชม. และรายได้ทุกบาททุกสตางค์ของท่านสามารถตรวจสอบได้ทุกขั้นตอน งานนี้แจกจริง จริงจ่าย
                                        ที่นี้ที่เดียวที่ให้คุณมากกว่าใคร ก๊อปปี้ลิ้งค์และข้อความด้านล่างนี้ นำไปแชร์ได้เลย</p>
                                    <p><strong>หมายเหตุ:</strong>&nbsp;รายได้การช่วยแชร์ช่วยแนะนำของท่านสามารถแจ้งถอนได้ทุกเวลา หากมียอดรายได้มากกว่า 500 บาทขึ้นไป</p>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <h1>Code แนะนำ</h1>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ลิ้งสำหรับโปรโมท</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><textarea id="target-copy" class="form-control copylink text-center">{{route('register').'?ref_code='.$user_info->affiliate_code}}</textarea>
                                                    <button onclick="copy('target-copy')" type="button" class="mt-2 btn btn-danger btn-block"><i class="text-white fa fa-copy"></i> คัดลอกลิงค์แนะนำ!</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @endif

                                @if($_GET['page'] == 'members')
                                @csrf

                                <hr>
                                <h1 class="text-center"><i class="fa fa-users"></i> สมาชิก</h1>
                                @if(count($downlines) == 0)
                                <div class="alert alert-danger">
                                    คุณยังไม่มีสมาชิก
                                </div>
                                @endif
                                <div class="row">
                                    @foreach ($downlines as $user)
                                    <div class="text-center m-2" style="width: 100px;">
                                        <img class="shadow" style="width:100%; height:100px; object-fit:cover; border-radius:100vh;" src="{{$user->path_cover}}">
                                        <label class="mt-2" style="word-break: break-all">{{$user->username}}</label>
                                    </div>
                                    @endforeach
                                </div>
                                @endif

                                @if($_GET['page'] == 'revenue')
                                @csrf

                                <hr>
                                <h1 class="text-center"><i class="fa fa-money-bill"></i> รายได้</h1>
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
                                @endif

                                @if($_GET['page'] == 'withdraw')
                                <hr>
                                <h1 class="text-center"><i class="fa fa-bell"></i> แจ้งถอนรายได้</h1>
                                @if($user_info->credit == 0)
                                @csrf

                                <div class="alert alert-danger">
                                    รายได้คุณไม่เพียงพอ
                                </div>
                                @endif
                                @if($commission_setting->min_withdraws >= $user_info->credit)
                                @csrf

                                <div class="alert alert-danger">
                                    รายได้ของคุณยังไม่ถึงเกณฑ์ที่จะถอนได้ ({{number_format($commission_setting->min_withdraws, 2)}} ขึ้นไป)
                                </div>
                                @endif
                                @if($commission_setting->min_withdraws <= $user_info->credit)

                                    @if($user_info->bank_name && $user_info->credit > 0)
                                    <div class="part-body">
                                        <div class="d-flex">

                                            <div class="col-xl-12 col-lg-12 col-sm-12">

                                                <div class="single-jackpot">
                                                    <div class="part-body">
                                                        <div class="form-group">
                                                            <div>ธนาคาร</div>
                                                            <div class="d-flex" style="padding: 15px; border: 1px solid rgba(0, 0, 0, 0.125);">
                                                                <div style="margin-right: 15px;"><img src="{{url('assets/img/banks/'.$user_info->bank_name.'.png')}}" style="max-height: 200px; max-width:200px; object-fit:contain" alt=""></div>
                                                                <div>
                                                                    <div><b>{{$user_info->bank_name}}</b></div>
                                                                    <div><b>ชื่อบัญชี:</b></div>
                                                                    <div>{{$user_info->account_no}}</div>
                                                                    <div><b>เลขที่บัญชี:</b></div>
                                                                    <div>{{$user_info->account_name}}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <form action="" method="POST">
                                                                @csrf
                                                                <div>จำนวนเงินที่ต้องการถอน</div>
                                                                <input type="number" name="amount" step="0.01" min="{{$commission_setting->min_withdraws}}" class="form-control form-group">
                                                                <div>หมายเหตุ</div>
                                                                <textarea class="form-control form-group" name="remark" id="" cols="30" rows="5"></textarea>
                                                                <button type="submit" name="addWithdraw" class="btn btn-warning new_story">แจ้งถอน</button>
                                                                <button type="reset" class="btn btn-danger ">ยกเลิก</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @elseif(!$user_info->bank_name)
                                    
                                    <div class="part-head">

                                        <div class="text" style="margin-left:25px;">
                                            <span class="amount">ตั้งค่าธนาคาร</span>
                                            <span class="draw-date"></span>
                                        </div>
                                    </div>
                                    <div class="part-body">
                                        <div class="d-flex">

                                            <div class="col-xl-12 col-lg-12 col-sm-12">

                                                <div class="single-jackpot">
                                                    <div class="part-head">

                                                    </div>
                                                    <div class="part-body">

                                                        <div class="form-group">
                                                            <div>*กรุณาตั้งค่าธนาคารก่อนจะทำการถอนได้ </div>

                                                        </div>

                                                        <div class="form-group">
                                                            <form action="" method="POST">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label>ธนาคาร</label>
                                                                    <select class="form-control" name="bank_name">
                                                                        <?php
                                                                        foreach ($banks_array as $bank)
                                                                            echo '<option>' . $bank . '</option>';
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>เลขที่บัญชี</label>
                                                                    <input pattern="[0-9, -]+" maxlength="255" type="text" name="account_no" class="form-control" id="" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>ชื่อบัญชี</label>
                                                                    <input maxlength="255" type="text" name="account_name" class="form-control" id="" required>
                                                                </div>
                                                                <span class="text-danger">หากทำการบันทึกแล้วจะไม่สามารถเปลี่ยนแปลงได้ภายหลัง</span>
                                                                <br>
                                                                <button type="submit" name="updateUserBank" class="btn btn-success">บันทึกข้อมูล</button>
                                                                <button type="reset" class="btn btn-danger ">ยกเลิก</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- jackpot end -->
<script src="{{url('backend/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script>
    var csrf_token = document.getElementsByName('_token')[0].value;
    @if(session()-> has('message'))
    Swal.fire({
        type: '{{ session()->get("status") }}',
        title: '<small> {{ session()->get("message") }} </small>',
        showConfirmButton: false,
        timer: 5000
    });
    console.log('has')
    @endif
</script>
<script>
    function copy(id) {
        /* Get the text field */
        var copyText = document.getElementById(id);

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
    }
</script>
@endsection