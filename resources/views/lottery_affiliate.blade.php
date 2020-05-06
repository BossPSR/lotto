@extends('option/layout_member')
@section('contact_member')

       <!-- jackpot begin -->
       <div class="jackpot">
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
                            <div class="icon">
                                <img src="assets/img/svg/euro-jackpot.png" alt="">
                            </div>
                            <div class="text">
                                <span class="amount">ระบบแนะนำ</span>
                            </div>
                        </div>
                        <div class="part-body">
                            <div class="d-flex">
                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                    <div class="single-jackpot">
                                        <div class="part-head">
                                           <button type="button" class="btn btn-warning new_affiliate" onClick="affiliate();" value="allList">ภาพรวม</button>
                                           <button type="button" class="btn btn-warning new_affiliate" onClick="affiliate();" value="allMember">สมาชิก</button>
                                           <button type="button" class="btn btn-warning new_affiliate" onClick="affiliate();" value="allIncome">รายได้</button>
                                           <button type="button" class="btn btn-warning new_affiliate" onClick="affiliate();" value="allWithdraw">แจ้งถอนรายได้</button>
                                        </div>
                                        {{-- ภาพรวม --}}
                                        <div id="allList">
                                            <div class="part-body">
                                                <div class="d-flex">
                                                    <div class="col-xl-6 col-lg-6 col-sm-12">
                                                        <div class="single-jackpot">
                                                            <div class="part-head">
                                                                <div class="icon">
                                                                    <img src="assets/img/svg/euro-jackpot.png" alt="">
                                                                </div>
                                                                <div class="text">
                                                                    <span class="amount">ส่วนแบ่งรายได้</span>
                                                                </div>
                                                            </div>
                                                            <div class="part-body">


                                                                4 %



                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="col-xl-6 col-lg-6 col-sm-12">
                                                        <div class="single-jackpot">
                                                            <div class="part-head">
                                                                <div class="icon">
                                                                    <img src="assets/img/svg/euro-jackpot.png" alt="">
                                                                </div>
                                                                <div class="text">
                                                                    <span class="amount">จำนวนคลิกทั้งหมด</span>
                                                                </div>
                                                            </div>
                                                            <div class="part-body">



                                                                0


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex">
                                                    <div class="col-xl-6 col-lg-6 col-sm-12">
                                                        <div class="single-jackpot">
                                                            <div class="part-head">
                                                                <div class="icon">
                                                                    <img src="assets/img/svg/euro-jackpot.png" alt="">
                                                                </div>
                                                                <div class="text">
                                                                    <span class="amount">สมาชิกที่แนะนำได้</span>
                                                                </div>
                                                            </div>
                                                            <div class="part-body">


                                                                0



                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="col-xl-6 col-lg-6 col-sm-12">
                                                        <div class="single-jackpot">
                                                            <div class="part-head">
                                                                <div class="icon">
                                                                    <img src="assets/img/svg/euro-jackpot.png" alt="">
                                                                </div>
                                                                <div class="text">
                                                                    <span class="amount">จำนวนแทงทั้งหมด</span>
                                                                </div>
                                                            </div>
                                                            <div class="part-body">



                                                                0


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex">
                                                    <div class="col-xl-6 col-lg-6 col-sm-12">
                                                        <div class="single-jackpot">
                                                            <div class="part-head">
                                                                <div class="icon">
                                                                    <img src="assets/img/svg/euro-jackpot.png" alt="">
                                                                </div>
                                                                <div class="text">
                                                                    <span class="amount">รายได้ทั้งหมด</span>
                                                                </div>
                                                            </div>
                                                            <div class="part-body">


                                                                0



                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="col-xl-6 col-lg-6 col-sm-12">
                                                        <div class="single-jackpot">
                                                            <div class="part-head">
                                                                <div class="icon">
                                                                    <img src="assets/img/svg/euro-jackpot.png" alt="">
                                                                </div>
                                                                <div class="text">
                                                                    <span class="amount">รายได้ปัจจุบัน</span>
                                                                </div>
                                                            </div>
                                                            <div class="part-body">



                                                                0


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- ลิ้งค์ช่วยแชร์ ช่วยแนะนำ --}}
                                                <div class="d-flex">
                                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                                        <div class="single-jackpot">
                                                            <div class="part-head">
                                                                <div class="icon">
                                                                    <img src="assets/img/svg/euro-jackpot.png" alt="">
                                                                </div>
                                                                <div class="text">
                                                                    <span class="amount">ลิ้งค์ช่วยแชร์ ช่วยแนะนำ</span>
                                                                </div>
                                                            </div>
                                                            <div class="part-body">


                                                                ลิ้งค์ช่วยแชร์รับ 4% ฟรี (แค่ก๊อปปี้ลิ้งค์ไปแชร์ก็ได้เงินแล้ว) ยิ่งแชร์มากยิ่งได้มาก

                                                                ท่านสามารถนำลิ้งค์ด้านล่างนี้หรือนำป้ายแบนเนอร์ ไปแชร์ในช่องทางต่างๆ ไม่ว่าจะเป็น เว็บไชต์ส่วนตัว, Blog, Facebook หรือ Social Network อื่นๆ หากมีการสมัครสมาชิกโดยคลิกผ่านลิ้งค์ของท่านเข้ามา ลูกค้าที่สมัครเข้ามาก็จะอยู่ภายให้เครือข่ายของท่านทันที และหากลูกค้าภายใต้เครือข่ายของท่านมีการเดิมพันเข้ามา ทุกยอดการเดิมพัน ท่านจะได้รับส่วนแบ่งในการแนะนำ 4% ทันทีโดยไม่มีเงื่อนไข

                                                                ตัวอย่างเช่น...

                                                                ลูกค้าท่าน 1 คน แทง 1,000 บาท ท่านจะได้ 40 บาท
                                                                ลูกค้าท่าน 10 คน แทง 1,000 บาท ท่านจะได้รับ 400 บาท
                                                                ลูกค้าท่าน 100 คน แทง 1,000 บาท ท่านจะได้รับ 4,000 บาท
                                                                สามารถทำรายได้เดือน 100,000 บาทง่ายๆเลยทีเดียว เพราะทางเรามีหวยเปิดรับทายผลทุกวัน มีมากกว่าวันละ 200 รอบ เปิดรับแทงออนไลน์ตลอด 24 ชม. และรายได้ทุกบาททุกสตางค์ของท่านสามารถตรวจสอบได้ทุกขั้นตอน งานนี้แจกจริง จริงจ่าย ที่นี้ที่เดียวที่ให้คุณมากกว่าใคร ก๊อปปี้ลิ้งค์และข้อความด้านล่างนี้ นำไปแชร์ได้เลย

                                                                หมายเหตุ: รายได้การช่วยแชร์ช่วยแนะนำของท่านสามารถแจ้งถอนได้ทุกเวลา หากมียอดรายได้มากกว่า 500 บาทขึ้นไป



                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                {{-- ข้อความโปรโมทและลิงค์ --}}
                                                <div class="d-flex">
                                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                                        <div class="single-jackpot">
                                                            <div class="part-head">
                                                                <div class="icon">
                                                                    <img src="assets/img/svg/euro-jackpot.png" alt="">
                                                                </div>
                                                                <div class="text">
                                                                    <span class="amount">ข้อความโปรโมทและลิงค์</span>
                                                                </div>
                                                            </div>
                                                            <div class="part-body">


                                                                <div class="text-center">ลิ้งสำหรับโปรโมท</div>
                                                                <textarea class="form-control form-group" id="" cols="30" rows="2" disabled>http://www.test.com/af/a/17bcf204d12acc354875988e0449d1b1</textarea>
                                                                <button type="button" class="btn btn-warning new_affiliate" onClick="story();" value="story">คัดลอกลิงค์แนะนำ</button>



                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>



                                            </div>
                                        </div>

                                         {{-- สมาชิก --}}
                                         <div id="allMember" style="display:none;">
                                            <div class="part-body">


                                                <div class="d-flex">
                                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                                        <div class="single-jackpot">
                                                            <div class="part-head">

                                                            </div>
                                                            <div class="part-body">


                                                                ไม่มีข้อมูล



                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>


                                            </div>
                                        </div>

                                        {{-- รายได้ --}}
                                        <div id="allIncome" style="display:none;">
                                            <div class="part-body">

                                                <div class="d-flex">
                                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                                        <div class="single-jackpot">
                                                            <div class="part-head">

                                                                รายได้ ระบบแนะนำ จะถอนเข้าเป็นเงินเครดิต หากสงสัยโปรดติดต่อเอเย่นต์ที่ท่านสมัครสมาชิก


                                                            </div>
                                                            <div class="part-body">

                                                                <div class="d-flex">

                                                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                <button type="button" class="btn btn-warning new_affiliate" onClick="allIncome_month();" value="02-2563">กุมภาพันธ์ 2563</button>
                                                                                <button type="button" class="btn btn-warning new_affiliate" onClick="allIncome_month();" value="03-2563">มีนาคม 2563</button>
                                                                                <button type="button" class="btn btn-warning new_affiliate" onClick="allIncome_month();" value="04-2563">เมษายน 2563</button>
                                                                            </div>
                                                                            <div class="part-body">


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex">
                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                01 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                02 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                03 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                04 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="d-flex">
                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                01 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                02 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                03 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                04 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="d-flex">
                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                01 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                02 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                03 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                04 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="d-flex">
                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                01 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                02 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                03 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">
                                                                                04 กุมภาพันธ์ 2563
                                                                            </div>
                                                                            <div class="part-body">


                                                                                0



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

                                         {{-- แจ้งถอนรายได้ --}}
                                         <div id="allWithdraw" style="display:none;">
                                            <div class="part-body">

                                                <div class="d-flex">
                                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                                        <div class="single-jackpot">
                                                            <div class="part-head">
                                                                รายได้ ระบบแนะนำ จะถอนเข้าเป็นเงินเครดิต หากสงสัยโปรดติดต่อเอเย่นต์ที่ท่านสมัครสมาชิก
                                                            </div>
                                                            <div class="part-body">

                                                                <div class="d-flex">
                                                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                                                        <div class="single-jackpot">
                                                                            <div class="part-head">

                                                                            </div>
                                                                            <div class="part-body">


                                                                                รายได้ปัจจุบัน : 0 ฿



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



                                </div>

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
        function affiliate(){
            $('#allList').css('display','none');
            $('#allMember').css('display','none');
            $('#allIncome').css('display','none');
            $('#allWithdraw').css('display','none');

            if (event.target.value == "allList") {
                $('#allList').css('display','block');
            }else if(event.target.value == "allMember"){
                $('#allMember').css('display','block');
            }else if(event.target.value == "allIncome"){
                $('#allIncome').css('display','block');
            }else if(event.target.value == "allWithdraw"){
                $('#allWithdraw').css('display','block');
            }else{
                alert('ไม่มีรายการนี้อยู่ในระบบ');
            }
        }


    </script>
@endsection
