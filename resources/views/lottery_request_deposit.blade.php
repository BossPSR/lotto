@extends('option/layout_member')
@section('lottery_request_deposit')

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
                                <img src="assets/img/svg/euro-million.png" alt="">
                            </div>
                            <div class="text">
                                <span class="amount">แจ้งเติมเครดิต</span>
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
                                                <div>เลือกธนาคาร</div>
                                                <div class="d-flex" style="padding: 15px; border: 1px solid rgba(0, 0, 0, 0.125);">
                                                    <div style="margin-right: 15px;"><img src="https://i.pinimg.com/474x/00/24/29/002429e4b28532ce5273cafa10be61c2.jpg" alt=""></div>
                                                    <div style="margin-right: 15px;"><img src="https://i.pinimg.com/474x/00/24/29/002429e4b28532ce5273cafa10be61c2.jpg" alt=""></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <form action="">
                                                    <div>จำนวนเงินที่ต้องการเติม</div>
                                                    <input type="number" class="form-control form-group">
                    
                                                    <button type="submit" class="btn btn-warning new_story">เพิ่มจำนวนเงิน</button>
                                                    <button type="reset" class="btn btn-danger ">ยกเลิก</button>
                                                </form>
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
@endsection