@extends('frontend/option/layout_member')
@section('contact_member')
<!-- jackpot begin -->
<div class="jackpot" style="background:#FED63E;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 form-group" id="test">
                <a href="/lottery_play" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">ย้อนกลับ</button></a>
            </div>
        </div>
    </div>
    <div class="container shape-container">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                <div class="single-jackpot">
                    <div class="part-head">
                        <div class="text">
                            <span class="amount">{{$huay_round->name}}</span>
                            <span class="draw-date"></span>
                        </div>
                    </div>
                    <div id="app">
                        <input-number
                        :price_tree_up="{{$huay_round->price_tree_up}}"
                        :price_tree_tod="{{$huay_round->price_tree_tod}}"
                        :price_tree_front="{{$huay_round->price_tree_front}}"
                        :price_tree_down="{{$huay_round->price_tree_down}}"
                        :price_two_up="{{$huay_round->price_two_up}}"
                        :price_two_down="{{$huay_round->price_two_down}}"
                        :price_run_up="{{$huay_round->price_run_up}}"
                        :price_run_down="{{$huay_round->price_run_down}}"
                        ></input-number>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- jackpot end -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="js/app.js"></script>
<!--
<script>
    let arrNum = [];

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
        } else if (textBox2.val() == '') {
            $('#intLimitTextBox_2').val(number);
            $('#intLimitTextBox_3').focus();
        } else if (textBox3.val() == '') {
            $('#intLimitTextBox_3').val(number);
        }
    }

    function delect_number() {
        let textBox1 = $('#intLimitTextBox_1');
        let textBox2 = $('#intLimitTextBox_2');
        let textBox3 = $('#intLimitTextBox_3');

        if (textBox3.val() != '') {
            $('#intLimitTextBox_3').val(null);
            $('#intLimitTextBox_2').focus();
        } else if (textBox2.val() != '') {
            $('#intLimitTextBox_2').val(null);
            $('#intLimitTextBox_1').focus();
        } else if (textBox1.val() != '') {
            $('#intLimitTextBox_1').val(null);
            $('#intLimitTextBox_1').focus();
        }
    }


    function send_number() {
        let textBox1 = $('#intLimitTextBox_1').val();
        let textBox2 = $('#intLimitTextBox_2').val();
        let textBox3 = $('#intLimitTextBox_3').val();

        arrNum.push(textBox1 + textBox2 + textBox3);
        $("#lottery_all").append('<span class="text_box">' + textBox1 + textBox2 + textBox3 + ',</span>');

        $('#intLimitTextBox_1').val(null);
        $('#intLimitTextBox_2').val(null);
        $('#intLimitTextBox_3').val(null);
        $('#intLimitTextBox_1').focus();
        $('#lottery_price').css('display', 'block');
    }

    function delect_number_column() {
        arrNum.pop();
        $(".text_box").last().remove();
        if (arrNum.length == 0) {
            $('#lottery_price').css('display', 'none');
        }

    }

    function delect_number_all() {
        while (arrNum.length > 0) {
            arrNum.pop();
        }
        $("#lottery_all").html('');
        $('#lottery_price').css('display', 'none');

    }

    console.log(arrNum)
</script> -->

@endsection
