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
                <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                    <div class="single-jackpot">
                        <div class="part-head">

                            <div class="text" style="margin-left:25px;">
                                <span class="amount">เพิ่มบทความใหม่</span>
                                <span class="draw-date">{{ date('Y-m-d') }}</span>
                            </div>
                        </div>
                        <div class="part-body">
                            <div class="d-flex">
                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                    <div class="single-jackpot">
                                        <div class="part-head">
                                           <button type="button" class="btn btn-warning new_story" onClick="story();" value="story">บทความของคุณ</button>
                                           <button type="button" class="btn btn-warning new_story" onClick="story();" value="lotto">เลือกรายการหวยที่คุณต้องการบอกใบ้</button>
                                        </div>
                                        <div class="part-body">
                                            <div class="form-group" id="new_story_lotto" style="display:none;">
                                                <form action="">
                                                    <div class="form-group">
                                                        <select name="" class="form-control" onChange="lotto();">
                                                            <option disabled selected>--เลือกประเภทหวย--</option>
                                                            <option value="1">หวยรัฐ หวยหุ้น</option>
                                                            <option value="2">จับยี่กี Huay</option>
                                                            <option value="3">จับยี่กีเจษฎาเบท</option>
                                                            <option value="4">จับยี่กีเจษฎา VIP</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="new_story_lotto2" style="display:none;">
                                                        <select name="" class="form-control">
                                                            <option disabled selected>--เลือกประเภทหวย--</option>
                                                            <option value="1">หวยรัฐ หวยหุ้น</option>
                                                            <option value="2">จับยี่กี Huay</option>
                                                            <option value="3">จับยี่กีเจษฎาเบท</option>
                                                            <option value="4">จับยี่กีเจษฎา VIP</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-warning new_story">เพิ่มบทความ</button>
                                                    <button type="reset" class="btn btn-warning new_story">ยกเลิก</button>
                                                </form>
                                            </div>
                                            <div class="form-group" id="new_story" style="display:none;">
                                                <form action="">
                                                    <textarea class="form-control form-group" name="" id="" cols="30" rows="10"></textarea>
                                                    <button type="submit" class="btn btn-warning new_story">เพิ่มบทความ</button>
                                                    <button type="reset" class="btn btn-warning new_story">ยกเลิก</button>
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

    <script>
        function story(){
            $('#new_story').css('display','none');
            $('#new_story_lotto').css('display','none');
            if (event.target.value == "story") {
                $('#new_story').css('display','block');
            }else if(event.target.value == "lotto"){
                $('#new_story_lotto').css('display','block');
            }else{
                alert('ไม่มีรายการนี้อยู่ในระบบ');
            }
        }

        function lotto(){
            console.log(event.target.value)
        }
    </script>

@endsection
