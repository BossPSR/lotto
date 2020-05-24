@extends('frontend/option/layout_member')
@section('contact_member')

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

            <div class="container-fluid content__af">
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="card rounded-0 mb-2">
                            <div class="card-body">
                                <div class=" text-center mb-2">
                                    <div style="display: inline-flex;">
                                        <a href="#/lottery/affiliate" class="nav-link active  active"><i class="fa fa-globe-asia"></i> ภาพรวม</a>
                                        <a href="#/lottery/affiliate-members" class="nav-link"><i class="fa fa-users"></i> สมาชิก</a>
                                        <a href="#/lottery/affiliate-revenue" class="nav-link"><i class="fa fa-money-bill"></i> รายได้</a>
                                        <a href="#/lottery/affiliate-withdraw" class="nav-link"><i class="fa fa-bell"></i> แจ้งถอนรายได้</a>
                                    </div>
                                </div>
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
                                            <p class="text-center number">0</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-2 pr-1">
                                        <div class="border pt-3 pb-3 rounded">
                                            <p class="text-center title">รายได้ปัจจุบัน</p>
                                            <p class="text-center number">0</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card rounded-0 mb-2">
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
                        </div>
                        <div class="card rounded-0 mb-2">
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
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
<!-- jackpot end -->
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

    function affiliate() {
        $('#allList').css('display', 'none');
        $('#allMember').css('display', 'none');
        $('#allIncome').css('display', 'none');
        $('#allWithdraw').css('display', 'none');

        if (event.target.value == "allList") {
            $('#allList').css('display', 'block');
        } else if (event.target.value == "allMember") {
            $('#allMember').css('display', 'block');
        } else if (event.target.value == "allIncome") {
            $('#allIncome').css('display', 'block');
        } else if (event.target.value == "allWithdraw") {
            $('#allWithdraw').css('display', 'block');
        } else {
            alert('ไม่มีรายการนี้อยู่ในระบบ');
        }
    }
</script>
@endsection