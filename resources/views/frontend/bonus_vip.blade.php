@extends('frontend/option/layout_member')
@section('contact_member')

<!-- jackpot begin -->
<div class="jackpot" style="background:#FFF; min-height:100vh">
    <div class="container">
        <div class="row">
            {{-- <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                <a href="/index_member" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">ย้อนกลับ</button></a>
            </div> --}}
        </div>
    </div>
    <div class="container shape-container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                <div class="single-jackpot">
                    <div class="part-head" style="display: block;">

                        <div class="text row" style="margin-left:25px;">
                            <div class="col-6">
                                <span class="amount"  style="color:#6f39d5">ระบบโบนัสทั้งหมด</span>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/index_member" style="display: inline-block; font-size: 20px; background-color: #6f39d5;color:#FFF" class="btn btn-warning">ย้อนกลับ</a>
                            </div>

                        </div>

                        <div class="text row" style="margin-left:25px;">
                            <div class=" text-left mb-2">
                                <div style="display: inline-flex;">
                                    <a href="/lottery_bonus" class="nav-link text-secondary"><i class="fa fa-birthday-cake"></i> โบนัสวันเกิด</a>
                                    <a href="/bonus_normal" class="nav-link text-secondary"><i class="far fa-money-bill-alt"></i> แทงหวยสะสมครบ 10 วัน รับ 200 เครดิต</a>
                                    <a href="/bonus_vip?page=index" class="nav-link text-warning"><i class="fa fa-star"></i> ระดับVIP แทงครบยอด รับเครดิตพิเศษ</a>
                                </div>
                            </div>
                        </div>

                        <div class="text row" style="justify-content:center;">
                            <div class="mb-2">
                                <div style="font-size:20px;">
                                    ระดับสมาชิกปัจจุบันของคุณ
                                </div>
                                <div class="text-center" style="background:#3b9854; font-size:25px; color:#fff;">VIP {{ $bonusVip }}</div>
                            </div>
                        </div>

                        <div class="text row" style="justify-content:center;">
                            <div class="mb-2">
                                <div class="text-center" style="font-size:20px;">
                                    ยอดแทงสะสมทั้งหมดของคุณ
                                </div>
                                <div class="text-center" style="font-size:25px;">{{ $numPrice_complete }} ฿</div>
                                <div class="text-center" style="font-size:20px;">
                                    แถบแสดงยอดแทงของคุณที่เริ่มนับจาก VIP ปัจจุบัน
                                </div>

                            </div>
                        </div>

                        <div class="mb-2" style="overflow:hidden;">
                            <div class="text-center" style="float: left; width:49%; border:#3b9854 1px solid; font-size:25px; color:#3b9854; padding:15px;">{{ $numPrice_complete }} ฿</div>
                            <div class="text-center" style="float: right; width:49%; border:#dd9117 1px solid; font-size:25px; color:#dd9117; padding:15px;">{{ $numPrice_pending }} ฿</div>
                        </div>

                        <div class="mb-2">
                            <div class="progress">
                                <?php
                                    if ($_GET['page'] == 'index_ten') {
                                        $result_percent = ($numPrice_complete/$checkVip_ten) * 100;
                                    }else{
                                        $result_percent = ($numPrice_complete/$priceVip) * 100;
                                    }

                                ?>
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $result_percent }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="text row" style="justify-content:space-between; padding: 0 15px;">
                                <div>
                                    VIP ปัจจุบัน
                                </div>
                                <div>
                                    VIP {{ $bonusVip }}
                                </div>
                            </div>
                        </div>

                        <div class="text row" style="justify-content:center;">
                            <div class="mb-2">
                                <div class="text-center" style="border:#3d5169 1px solid; font-size:20px; color:#3d5169; padding:15px;">
                                    <div>ยอดแทงเพื่อระดับถัดไป : {{ $bonusVip }}</div>
                                    <div style="color:#3b9854;">
                                        {{ $numPrice_complete }} ฿
                                    </div>

                                </div>
                                <div class="text-center" style="color:red;">
                                    ยอดแทงหวยที่นับในระบบโบนัสจะต้องเป็นยอดแทงที่ ”ออกผลแล้ว” จึงจะนับเป็นยอดแทง
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="text row" style="justify-content: center;">
                            <div class="text-center" >
                                เมื่อสมาชิกแทงถึงยอดที่กำหนดจะได้รับการเลื่อนลำดับ VIP และได้รับโบนัสเครดิตจากเรา โดยการกดรับด้านล่าง
                            </div>
                            <br>
                            <div class=" text-left mb-2">
                                <div style="display: inline-flex;">
                                    <a href="/bonus_vip?page=index" class="nav-link {{($_GET['page'] == 'index' ? 'text-warning' : 'text-secondary')}}"><i class="fa fa-list"></i> 0-9</a>
                                    <a href="/bonus_vip?page=index_two" class="nav-link {{($_GET['page'] == 'index_two' ? 'text-warning' : 'text-secondary')}}"><i class="fa fa-list"></i> 10-19</a>
                                    <a href="/bonus_vip?page=index_three" class="nav-link {{($_GET['page'] == 'index_three' ? 'text-warning' : 'text-secondary')}}"><i class="fa fa-list"></i> 20-29</a>
                                    <a href="/bonus_vip?page=index_four" class="nav-link {{($_GET['page'] == 'index_four' ? 'text-warning' : 'text-secondary')}}"><i class="fa fa-list"></i> 30-39</a>
                                    <a href="/bonus_vip?page=index_five" class="nav-link {{($_GET['page'] == 'index_five' ? 'text-warning' : 'text-secondary')}}"><i class="fa fa-list"></i> 40-49</a>
                                    <a href="/bonus_vip?page=index_six" class="nav-link {{($_GET['page'] == 'index_six' ? 'text-warning' : 'text-secondary')}}"><i class="fa fa-list"></i> 50-59</a>
                                    <a href="/bonus_vip?page=index_seven" class="nav-link {{($_GET['page'] == 'index_seven' ? 'text-warning' : 'text-secondary')}}"><i class="fa fa-list"></i> 60-69</a>
                                    <a href="/bonus_vip?page=index_eight" class="nav-link {{($_GET['page'] == 'index_eight' ? 'text-warning' : 'text-secondary')}}"><i class="fa fa-list"></i> 70-79</a>
                                    <a href="/bonus_vip?page=index_nine" class="nav-link {{($_GET['page'] == 'index_nine' ? 'text-warning' : 'text-secondary')}}"><i class="fa fa-list"></i> 80-89</a>
                                    <a href="/bonus_vip?page=index_ten" class="nav-link {{($_GET['page'] == 'index_ten' ? 'text-warning' : 'text-secondary')}}"><i class="fa fa-list"></i> 90-99</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>


                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP {{ $list[0] }}&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP {{ $list[1] }}</div>
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($priceVip[0]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($priceVip) }} ฿</div>
                                        <?php } ?>
                                        <div class="progress">
                                            <?php
                                            if ($_GET['page'] == 'index_ten') {
                                                $price = $checkVip_ten;
                                            }else{
                                                $price = $priceVip * 1;
                                            }

                                                $result_percent = ($numPrice_complete/$price) * 100;
                                            ?>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $result_percent }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($bonusVip_price[0]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($bonusVip_price) }} ฿</div>
                                        <?php } ?>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if ($bonusVip == $list[1] && $numPrice_complete >= $price) { ?>
                                            <form action="bonus_vip_process" method="post">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <?php if($_GET['page'] == 'index_ten'){ ?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price[0] }}">
                                                <?php }else{?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price }}">
                                                <?php } ?>
                                                <button type="submit" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                            </form>
                                        <?php }else{ ?>
                                            <div class="form-control text-center">รับโบนัส</div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP {{ $list[1] }}&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP {{ $list[2] }}</div>
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($priceVip[1]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($priceVip) }} ฿</div>
                                        <?php } ?>
                                        <div class="progress">
                                            <?php
                                                if ($_GET['page'] == 'index_ten') {
                                                    $price = $checkVip_ten;
                                                }else{
                                                    $price = $priceVip * 2;
                                                }

                                                $result_percent = ($numPrice_complete/$price) * 100;
                                            ?>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $result_percent }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($bonusVip_price[1]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($bonusVip_price) }} ฿</div>
                                        <?php } ?>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if ($bonusVip == $list[2] && $numPrice_complete >= $price) { ?>
                                            <form action="bonus_vip_process" method="post">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <?php if($_GET['page'] == 'index_ten'){ ?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price[1] }}">
                                                <?php }else{?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price }}">
                                                <?php } ?>
                                                <button type="submit" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                            </form>
                                        <?php }else{ ?>
                                            <div class="form-control text-center">รับโบนัส</div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP {{ $list[2] }}&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP {{ $list[3] }}</div>
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($priceVip[2]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($priceVip) }} ฿</div>
                                        <?php } ?>
                                        <div class="progress">
                                            <?php
                                                if ($_GET['page'] == 'index_ten') {
                                                    $price = $checkVip_ten;
                                                }else{
                                                    $price = $priceVip * 3;
                                                }
                                                $result_percent = ($numPrice_complete/$price) * 100;
                                            ?>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $result_percent }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($bonusVip_price[2]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($bonusVip_price) }} ฿</div>
                                        <?php } ?>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if ($bonusVip == $list[3] && $numPrice_complete >= $price) { ?>
                                            <form action="bonus_vip_process" method="post">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <?php if($_GET['page'] == 'index_ten'){ ?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price[2] }}">
                                                <?php }else{?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price }}">
                                                <?php } ?>
                                                <button type="submit" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                            </form>
                                        <?php }else{ ?>
                                            <div class="form-control text-center">รับโบนัส</div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP {{ $list[3] }}&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP {{ $list[4] }}</div>
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($priceVip[3]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($priceVip) }} ฿</div>
                                        <?php } ?>
                                        <div class="progress">
                                            <?php
                                                if ($_GET['page'] == 'index_ten') {
                                                    $price = $checkVip_ten;
                                                }else{
                                                    $price = $priceVip * 4;
                                                }
                                                $result_percent = ($numPrice_complete/$price) * 100;
                                            ?>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $result_percent }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($bonusVip_price[3]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($bonusVip_price) }} ฿</div>
                                        <?php } ?>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if ($bonusVip == $list[4] && $numPrice_complete >= $price) { ?>
                                            <form action="bonus_vip_process" method="post">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <?php if($_GET['page'] == 'index_ten'){ ?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price[3] }}">
                                                <?php }else{?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price }}">
                                                <?php } ?>
                                                <button type="submit" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                            </form>
                                        <?php }else{ ?>
                                            <div class="form-control text-center">รับโบนัส</div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP {{ $list[4] }}&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP {{ $list[5] }}</div>
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($priceVip[4]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($priceVip) }} ฿</div>
                                        <?php } ?>
                                        <div class="progress">
                                            <?php
                                                if ($_GET['page'] == 'index_ten') {
                                                    $price = $checkVip_ten;
                                                }else{
                                                    $price = $priceVip * 5;
                                                }
                                                $result_percent = ($numPrice_complete/$price) * 100;
                                            ?>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $result_percent }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($bonusVip_price[4]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($bonusVip_price) }} ฿</div>
                                        <?php } ?>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if ($bonusVip == $list[5] && $numPrice_complete >= $price) { ?>
                                            <form action="bonus_vip_process" method="post">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <?php if($_GET['page'] == 'index_ten'){ ?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price[4] }}">
                                                <?php }else{?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price }}">
                                                <?php } ?>
                                                <button type="submit" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                            </form>
                                        <?php }else{ ?>
                                            <div class="form-control text-center">รับโบนัส</div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP {{ $list[5] }}&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP {{ $list[6] }}</div>
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($priceVip[5]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($priceVip) }} ฿</div>
                                        <?php } ?>
                                        <div class="progress">
                                            <?php
                                                if ($_GET['page'] == 'index_ten') {
                                                    $price = $checkVip_ten;
                                                }else{
                                                    $price = $priceVip * 6;
                                                }
                                                $result_percent = ($numPrice_complete/$price) * 100;
                                            ?>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $result_percent }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($bonusVip_price[5]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($bonusVip_price) }} ฿</div>
                                        <?php } ?>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if ($bonusVip == $list[6] && $numPrice_complete >= $price) { ?>
                                            <form action="bonus_vip_process" method="post">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <?php if($_GET['page'] == 'index_ten'){ ?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price[5] }}">
                                                <?php }else{?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price }}">
                                                <?php } ?>
                                                <button type="submit" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                            </form>
                                        <?php }else{ ?>
                                            <div class="form-control text-center">รับโบนัส</div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP {{ $list[6] }}&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP {{ $list[7] }}</div>
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($priceVip[6]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($priceVip) }} ฿</div>
                                        <?php } ?>
                                        <div class="progress">
                                            <?php
                                                if ($_GET['page'] == 'index_ten') {
                                                    $price = $checkVip_ten;
                                                }else{
                                                    $price = $priceVip * 7;
                                                }
                                                $result_percent = ($numPrice_complete/$price) * 100;
                                            ?>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $result_percent }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($bonusVip_price[6]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($bonusVip_price) }} ฿</div>
                                        <?php } ?>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if ($bonusVip == $list[7] && $numPrice_complete >= $price) { ?>
                                            <form action="bonus_vip_process" method="post">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <?php if($_GET['page'] == 'index_ten'){ ?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price[6] }}">
                                                <?php }else{?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price }}">
                                                <?php } ?>
                                                <button type="submit" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                            </form>
                                        <?php }else{ ?>
                                            <div class="form-control text-center">รับโบนัส</div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP {{ $list[7] }}&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP {{ $list[8] }}</div>
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($priceVip[7]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($priceVip) }} ฿</div>
                                        <?php } ?>
                                        <div class="progress">
                                            <?php
                                                if ($_GET['page'] == 'index_ten') {
                                                    $price = $checkVip_ten;
                                                }else{
                                                    $price = $priceVip * 8;
                                                }
                                                $result_percent = ($numPrice_complete/$price) * 100;
                                            ?>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $result_percent }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($bonusVip_price[7]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($bonusVip_price) }} ฿</div>
                                        <?php } ?>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if ($bonusVip == $list[8] && $numPrice_complete >= $price) { ?>
                                            <form action="bonus_vip_process" method="post">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <?php if($_GET['page'] == 'index_ten'){ ?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price[7] }}">
                                                <?php }else{?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price }}">
                                                <?php } ?>
                                                <button type="submit" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                            </form>
                                        <?php }else{ ?>
                                            <div class="form-control text-center">รับโบนัส</div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div class="single-jackpot">
                                <div class="part-body d-flex" style="justify-content: space-between;">
                                    <div style="width:50%;">
                                        <div>VIP {{ $list[8] }}&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP {{ $list[9] }}</div>
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($priceVip[8]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($priceVip) }} ฿</div>
                                        <?php } ?>
                                        <div class="progress">
                                            <?php
                                                if ($_GET['page'] == 'index_ten') {
                                                    $price = $checkVip_ten;
                                                }else{
                                                    $price = $priceVip * 9;
                                                }
                                                $result_percent = ($numPrice_complete/$price) * 100;
                                            ?>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $result_percent }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if($_GET['page'] == 'index_ten'){ ?>
                                            <div>{{ number_format($bonusVip_price[8]) }} ฿</div>
                                        <?php }else{?>
                                            <div>{{ number_format($bonusVip_price) }} ฿</div>
                                        <?php } ?>
                                    </div>

                                    <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                        <?php if ($bonusVip == $list[9] && $numPrice_complete >= $price) { ?>
                                            <form action="bonus_vip_process" method="post">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <?php if($_GET['page'] == 'index_ten'){ ?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price[8] }}">
                                                <?php }else{?>
                                                    <input type="hidden" name="bonus" value="{{ $bonusVip_price }}">
                                                <?php } ?>
                                                <button type="submit" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                            </form>
                                        <?php }else{ ?>
                                            <div class="form-control text-center">รับโบนัส</div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if($_GET['page'] == 'index_ten'){ ?>

                    <?php }else{?>
                        <div class="d-flex">
                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                <div class="single-jackpot">
                                    <div class="part-body d-flex" style="justify-content: space-between;">
                                        <div style="width:50%;">
                                            <div>VIP {{ $list[9] }}&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;VIP {{ $list[10] }}</div>

                                                <div>{{ number_format($priceVip) }} ฿</div>

                                            <div class="progress">
                                                <?php
                                                if ($_GET['page'] == 'index_ten') {
                                                    $price = $checkVip_ten;
                                                }else{
                                                    $price = $priceVip * 10;
                                                }
                                                $result_percent = ($numPrice_complete/$price) * 100;

                                            ?>
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $result_percent }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <div style="width:25%; display: flex; justify-content: center; align-items: center">

                                            <div>{{ number_format($bonusVip_price) }} ฿</div>

                                        </div>

                                        <div style="width:25%; display: flex; justify-content: center; align-items: center">
                                            <?php if ($bonusVip == $list[10] && $numPrice_complete >= $price) { ?>
                                                <form action="bonus_vip_process" method="post">
                                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                    <?php if($_GET['page'] == 'index_ten'){ ?>
                                                        <input type="hidden" name="bonus" value="{{ $bonusVip_price[9] }}">
                                                    <?php }else{?>
                                                        <input type="hidden" name="bonus" value="{{ $bonusVip_price }}">
                                                    <?php } ?>
                                                    <button type="submit" class="btn btn-warning" style="display: inline-block; font-size: 15px; background-color: #6f39d5;color:#FFF">กดรับ Bonus</button>
                                                </form>
                                            <?php }else{ ?>
                                                <div class="form-control text-center">รับโบนัส</div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- jackpot end -->
<script>
    var csrf_token = '{{ csrf_token() }}';

</script>
@endsection
