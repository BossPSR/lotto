@extends('frontend/option/layout_member')
@section('contact_member')
       <!-- jackpot begin -->
       <div class="jackpot" style="background:#7A58BF;">
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
                            <div class="text">
                                <span class="amount">หวยยี่กี</span>
                                <span class="draw-date"></span>
                            </div>
                        </div>
                        <div class="part-body">
                            <div class="d-flex">
                                <div class="col-xl-6 col-lg-6 col-sm-6">
                                    <div class="single-jackpot" id="page1" style="padding:0; cursor: pointer; background: -webkit-linear-gradient(473deg, #fa8900 20%, #ffce4f 100%); color:#fff;" onclick="change_page('page1');">
                                        <div class="part-body" style="padding: 15px 15px">
                                            แทงเลข

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-sm-6">
                                    <div class="single-jackpot" id="page2" style="padding:0; cursor: pointer;" onclick="change_page('page2');">

                                        <div class="part-body" style="padding: 15px 15px">
                                            ยิงเลข

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="page_list1">



                                <div class="d-flex">
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="single-jackpot" style="padding:0; cursor: pointer;" onclick="lottery('สามตัวบน');">
                                            <div class="part-body" style="padding: 15px 15px">
                                                สามตัวบน (900)

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="single-jackpot" style="padding:0; cursor: pointer;" onclick="lottery('สามตัวโต้ด');">

                                            <div class="part-body" style="padding: 15px 15px">
                                                สามตัวโต้ด (150)

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="single-jackpot" style="padding:0; cursor: pointer;" onclick="lottery('สามตัวหน้า');">

                                            <div class="part-body" style="padding: 15px 15px">
                                                สามตัวหน้า (450)

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="single-jackpot" style="padding:0; cursor: pointer;" onclick="lottery('สามตัวล่าง');">

                                            <div class="part-body" style="padding: 15px 15px">
                                                สามตัวล่าง (250)

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="single-jackpot bg-success" style="padding:0; color:#fff; cursor: pointer;" onclick="lottery('สองตัวบน');">

                                            <div class="part-body" style="padding: 15px 15px">
                                                <i class="fa fa-plus" aria-hidden="true"></i> สองตัวบน (45)

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="single-jackpot bg-success" style="padding:0; color:#fff; cursor: pointer;" onclick="lottery('สองตัวล่าง');">

                                            <div class="part-body" style="padding: 15px 15px">
                                                <i class="fa fa-plus" aria-hidden="true"></i> สองตัวล่าง (25)

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="single-jackpot bg-success" style="padding:0; color:#fff; cursor: pointer;" onclick="lottery('กลับสามตัว');">

                                            <div class="part-body" style="padding: 15px 15px">
                                                <i class="fa fa-plus" aria-hidden="true"></i> กลับสามตัว (45)

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="single-jackpot bg-success" style="padding:0; color:#fff; cursor: pointer;" onclick="lottery('กลับสองตัว');">

                                            <div class="part-body" style="padding: 15px 15px">
                                                <i class="fa fa-plus" aria-hidden="true"></i> กลับสองตัว (25)

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="single-jackpot" style="padding:0;" onclick="lottery('วิ่งบน');">

                                            <div class="part-body" style="padding: 15px 15px">
                                                วิ่งบน (4.5)

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="single-jackpot" style="padding:0;" onclick="lottery('วิ่งล่าง');">

                                            <div class="part-body" style="padding: 15px 15px">
                                                วิ่งล่าง (2.5)

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                        <div class="single-jackpot" >
                                            <div class="part-head" style="flex-direction: column;">
                                                <div class="form-group">ใส่เลข</div>
                                                <div class="d-flex inp_lottery" style="justify-content: center;">

                                                    <input type="text" style="width: 10%;" id="intLimitTextBox_1" class="form-control text-center" autofocus="autofocus" maxlength="1" required>
                                                    <input type="text" style="width: 10%; margin:0 15px;" id="intLimitTextBox_2" class="form-control text-center" maxlength="1" required>
                                                    <input type="text" style="width: 10%;" id="intLimitTextBox_3" class="form-control text-center" maxlength="1" required>

                                                </div>

                                            </div>
                                            <div class="part-body">
                                                <div class="d-flex">
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(1);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                1
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(2);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                2
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(3);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                3
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number bg-danger" style="padding:0; color:#fff; cursor: pointer;" onclick="delect_number();">
                                                            <div class="part-body text-center" style="padding: 15px 15px;">
                                                                <i class="fa fa-reply" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(4);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                4
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(5);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                5
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(6);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                6
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number bg-warning" style="padding:0; color:#fff; cursor: pointer;" onclick="delect_number_column();">
                                                            <div class="part-body text-center" style="padding: 15px 15px;">
                                                                <i class="fa fa-retweet" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(7);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                7
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(8);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                8
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(9);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                9
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number bg-danger" style="padding:0; color:#fff; cursor: pointer;" onclick="delect_number_all();">
                                                            <div class="part-body text-center" style="padding: 15px 15px;">
                                                                ล้างข้อมูล
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-xl-9 col-lg-9 col-sm-9">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(0);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                0
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number bg-success" style="padding:0; color:#fff; cursor: pointer;" onclick="send_number();">
                                                            <div class="part-body text-center" style="padding: 15px 15px;">
                                                                <i class="fa fa-share" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div id="page_list2" style="display: none;">

                                <div class="d-flex">
                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                        <div class="single-jackpot" >
                                            <div class="part-head" style="flex-direction: column;">
                                                <div class="form-group">ใส่เลข</div>
                                                <div class="d-flex inp_lottery" style="justify-content: center;">

                                                    <input type="text" style="width: 10%;" id="intLimitTextBox_1" class="form-control text-center" autofocus="autofocus" maxlength="1" required>
                                                    <input type="text" style="width: 10%; margin:0 15px;" id="intLimitTextBox_2" class="form-control text-center" maxlength="1" required>
                                                    <input type="text" style="width: 10%;" id="intLimitTextBox_3" class="form-control text-center" maxlength="1" required>

                                                </div>

                                            </div>
                                            <div class="part-body">
                                                <div class="d-flex">
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(1);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                1
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(2);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                2
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(3);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                3
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number bg-danger" style="padding:0; color:#fff; cursor: pointer;" onclick="delect_number();">
                                                            <div class="part-body text-center" style="padding: 15px 15px;">
                                                                <i class="fa fa-reply" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(4);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                4
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(5);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                5
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(6);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                6
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number bg-warning" style="padding:0; color:#fff; cursor: pointer;" onclick="delect_number_column();">
                                                            <div class="part-body text-center" style="padding: 15px 15px;">
                                                                <i class="fa fa-retweet" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(7);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                7
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(8);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                8
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(9);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                9
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number bg-danger" style="padding:0; color:#fff; cursor: pointer;" onclick="delect_number_all();">
                                                            <div class="part-body text-center" style="padding: 15px 15px;">
                                                                ล้างข้อมูล
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-xl-9 col-lg-9 col-sm-9">
                                                        <div class="single-jackpot button_number" style="padding:0; cursor: pointer;" onclick="add_number(0);">
                                                            <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                                                0
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-3">
                                                        <div class="single-jackpot button_number bg-success" style="padding:0; color:#fff; cursor: pointer;" onclick="send_number();">
                                                            <div class="part-body text-center" style="padding: 15px 15px;">
                                                                <i class="fa fa-share" aria-hidden="true"></i>
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

    <div class="card_list_lottery">
        <div class="lottert_detail">
            <div>รายการแทง <span id="lotttery_num"></span></div>
            <div id="lottery_price" style="display: none;">
                <button class="btn btn-warning">
                    <i class="fa fa-table" aria-hidden="true"></i> ใส่ราคาแทง
                </button>

            </div>
        </div>

        <div id="lottery_all">

        </div>
    </div>

    <script>
        let arrNum = [];

        function change_page(type){

            $('#page_list1').css('display','none');
            $('#page_list2').css('display','none');

            $('#page1').css('background','#fff');
            $('#page1').css('color','#3d5169');
            $('#page2').css('background','#fff');
            $('#page2').css('color','#3d5169');

            if (type == 'page1') {
                $('#page1').css('background','-webkit-linear-gradient(473deg, #fa8900 20%, #ffce4f 100%)');
                $('#page1').css('color','#fff');
                $('#page_list1').css('display','block');
            }

            if(type == 'page2'){
                $('#page2').css('background','-webkit-linear-gradient(473deg, #fa8900 20%, #ffce4f 100%)');
                $('#page2').css('color','#fff');
                $('#page_list2').css('display','block');
            }
        }

        function lottery(type) {
            console.log(type)
        }

        // Restricts input for the given textbox to the given inputFilter.
        function setInputFilter(textbox, inputFilter) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
                textbox.addEventListener(event, function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
                });
            });
        }
        setInputFilter(document.getElementById("intLimitTextBox_1"), function(value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 9);
        });
        setInputFilter(document.getElementById("intLimitTextBox_2"), function(value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 9);
        });
        setInputFilter(document.getElementById("intLimitTextBox_3"), function(value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 9);
        });

        let container = document.getElementsByClassName("inp_lottery")[0];
        container.onkeyup = function(e) {
            let target = e.srcElement;
            let maxLength = parseInt(target.attributes["maxlength"].value, 10);
            let myLength = target.value.length;
            if (myLength >= maxLength) {
                let next = target;
                while (next = next.nextElementSibling) {
                    if (next == null)
                        break;
                    if (next.tagName.toLowerCase() == "input") {
                        next.focus();
                        break;
                    }
                }
            }
        }

        function add_number(number) {
            let textBox1 = $('#intLimitTextBox_1');
            let textBox2 = $('#intLimitTextBox_2');
            let textBox3 = $('#intLimitTextBox_3');

            if (textBox1.val() == '') {
                $('#intLimitTextBox_1').val(number);
                $('#intLimitTextBox_2').focus();
            }else if(textBox2.val() == ''){
                $('#intLimitTextBox_2').val(number);
                $('#intLimitTextBox_3').focus();
            }else if(textBox3.val() == ''){
                $('#intLimitTextBox_3').val(number);
            }
        }

        function delect_number(){
            let textBox1 = $('#intLimitTextBox_1');
            let textBox2 = $('#intLimitTextBox_2');
            let textBox3 = $('#intLimitTextBox_3');

            if (textBox3.val() != '') {
                $('#intLimitTextBox_3').val(null);
                $('#intLimitTextBox_2').focus();
            }else if(textBox2.val() != ''){
                $('#intLimitTextBox_2').val(null);
                $('#intLimitTextBox_1').focus();
            }else if(textBox1.val() != ''){
                $('#intLimitTextBox_1').val(null);
                $('#intLimitTextBox_1').focus();
            }
        }


        function send_number(){
            let textBox1 = $('#intLimitTextBox_1').val();
            let textBox2 = $('#intLimitTextBox_2').val();
            let textBox3 = $('#intLimitTextBox_3').val();

            arrNum.push(textBox1+textBox2+textBox3);
            $("#lottery_all").append('<span class="text_box">'+textBox1+textBox2+textBox3+',</span>');

            $('#intLimitTextBox_1').val(null);
            $('#intLimitTextBox_2').val(null);
            $('#intLimitTextBox_3').val(null);
            $('#intLimitTextBox_1').focus();
            $('#lottery_price').css('display','block');
        }

        function delect_number_column() {
            arrNum.pop();
            $(".text_box").last().remove();
            if (arrNum.length == 0) {
                $('#lottery_price').css('display','none');
            }

        }

        function delect_number_all(){
            while(arrNum.length > 0) {
                arrNum.pop();
            }
            $("#lottery_all").html('');
            $('#lottery_price').css('display','none');

        }

        console.log(arrNum)



    </script>

@endsection
