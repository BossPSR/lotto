<style>
.hide {
    display: none;
}

.disableSelection {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    outline: 0;
}

.digi {
    width: 100px;
}

.digi:empty {
    background-color: red;
    -webkit-animation: 1s blink linear infinite;
    -moz-animation: 1s blink linear infinite;
    -ms-animation: 1s blink linear infinite;
    -o-animation: 1s blink linear infinite;
    animation: 1s blink linear infinite;
}

@keyframes "blink" {
    from,
    to {
        background-color: transparent;
    }
    50% {
        background-color: #fa8900;
    }
}

@-moz-keyframes blink {
    from,
    to {
        background-color: transparent;
    }
    50% {
        background-color: #fa8900;
    }
}

@-webkit-keyframes "blink" {
    from,
    to {
        background-color: transparent;
    }
    50% {
        background-color: #fa8900;
    }
}

@-ms-keyframes "blink" {
    from,
    to {
        background-color: transparent;
    }
    50% {
        background-color: #fa8900;
    }
}

@-o-keyframes "blink" {
    from,
    to {
        background-color: transparent;
    }
    50% {
        background-color: #fa8900;
    }
}
</style>

<template>
    <div>
        <div class="d-flex">
            <div class="col-xl-6 col-lg-6 col-sm-6">
                <div v-on:click="select_option('price_tree_up')" id="price_tree_up" class="single-jackpot" style="padding:0; cursor: pointer;">
                    <div class="part-body" style="padding: 15px 15px">
                        สามตัวบบน ({{price_tree_up}})
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-sm-6">
                <div v-on:click="select_option('price_tree_tod')" id="price_tree_tod" class="single-jackpot" style="padding:0; cursor: pointer;">
                    <div class="part-body" style="padding: 15px 15px">
                        สามตัวโต๊ด ({{price_tree_tod}})
                    </div>
                </div>
            </div>
        </div>
    
        <div class="d-flex">
            <div class="col-xl-6 col-lg-6 col-sm-6">
                <div v-on:click="select_option('price_tree_front')" id="price_tree_front" class="single-jackpot" style="padding:0; cursor: pointer;">
                    <div class="part-body" style="padding: 15px 15px">
                        สามตัวหน้า ({{price_tree_front}})
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-sm-6">
                <div v-on:click="select_option('price_tree_down')" id="price_tree_down" class="single-jackpot" style="padding:0; cursor: pointer;">
                    <div class="part-body" style="padding: 15px 15px">
                        สามตัวหลัง ({{price_tree_down}})
                    </div>
                </div>
            </div>
        </div>
    
        <div class="d-flex">
            <div class="col-xl-6 col-lg-6 col-sm-6">
                <div v-on:click="select_option('price_two_up')" id="price_two_up" class="single-jackpot" style="padding:0; cursor: pointer;">
                    <div class="part-body" style="padding: 15px 15px">
                        สองตัวบน ({{price_two_up}})
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-sm-6">
                <div v-on:click="select_option('price_two_down')" id="price_two_down" class="single-jackpot" style="padding:0; cursor: pointer;">
                    <div class="part-body" style="padding: 15px 15px">
                        สองตัวล่าง ({{price_two_down}})
                    </div>
                </div>
            </div>
        </div>
    
        <div class="d-flex">
            <div class="col-xl-6 col-lg-6 col-sm-6">
                <div v-on:click="select_option('price_run_up')" id="price_run_up" class="single-jackpot" style="padding:0; cursor: pointer;">
                    <div class="part-body" style="padding: 15px 15px">
                        วิ่งบน ({{price_run_up}})
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-sm-6">
                <div v-on:click="select_option('price_run_down')" id="price_run_down" class="single-jackpot" style="padding:0; cursor: pointer;">
                    <div class="part-body" style="padding: 15px 15px">
                        วิ่งล่าง ({{price_run_down}})
                    </div>
                </div>
            </div>
        </div>
    
        <div class="d-flex ">
            <div class="col-xl-12 col-lg-12 col-sm-12 hide" id="main-input">
                <div class="single-jackpot">
                    <div class="part-head" style="flex-direction: column;">
                        <div class="form-group">ใส่เลข</div>
                        <div class="d-flex inp_lottery" style="justify-content: center;">
                            <label id="input1" class="form-control text-center digi hide"></label>
                            <label id="input2" class="form-control text-center digi hide"></label>
                            <label id="input3" class="form-control text-center digi hide"></label>
                        </div>
                    </div>
                    <div class="part-body disableSelection">
                        <div class="d-flex">
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <div v-on:click="numpad(1)" class="single-jackpot button_number" style="padding:0; cursor: pointer;">
                                    <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                        1
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <div v-on:click="numpad(2)" class="single-jackpot button_number" style="padding:0; cursor: pointer;">
                                    <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                        2
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <div v-on:click="numpad(3)" class="single-jackpot button_number" style="padding:0; cursor: pointer;">
                                    <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                        3
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <div class="single-jackpot button_number bg-warning" style="padding:0; color:#fff; cursor: pointer;">
                                    <div v-on:click="numpad(-1)" class="part-body text-center" style="padding: 15px 15px;">
                                        <i class="fa fa-reply" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <div v-on:click="numpad(4)" class="single-jackpot button_number" style="padding:0; cursor: pointer;">
                                    <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                        4
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <div v-on:click="numpad(5)" class="single-jackpot button_number" style="padding:0; cursor: pointer;">
                                    <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                        5
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <div v-on:click="numpad(6)" class="single-jackpot button_number" style="padding:0; cursor: pointer;">
                                    <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                        6
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <div v-on:click="numpad(-2)" class="single-jackpot button_number bg-danger" style="padding:0; color:#fff; cursor: pointer;">
                                    <div class="part-body text-center" style="padding: 15px 15px;">
                                        ล้างข้อมูล
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <div v-on:click="numpad(7)" class="single-jackpot button_number" style="padding:0; cursor: pointer;">
                                    <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                        7
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <div v-on:click="numpad(8)" class="single-jackpot button_number" style="padding:0; cursor: pointer;">
                                    <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                        8
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <div v-on:click="numpad(9)" class="single-jackpot button_number" style="padding:0; cursor: pointer;">
                                    <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                        9
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-xl-9 col-lg-9 col-sm-9">
                                <div v-on:click="numpad(0)" class="single-jackpot button_number" style="padding:0; cursor: pointer;">
                                    <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card_list_lottery" style="position:fixed; left:0px; right:0px;word-break: break-word; overflow:scroll">
            <div class="lottert_detail">
                <div>รายการแทง <span id="lotttery_num"></span></div>
                <div id="lottery_price" style="display: none;">
                    <button class="btn btn-warning">
                                                                                                            <i class="fa fa-table" aria-hidden="true"></i> ใส่ราคาแทง
                                                                                                        </button>
    
                </div>
            </div>
    
            <div id="lottery_all">
                {{my_number_txt}}
            </div>
        </div>
    </div>
</template>



<script>
export default {
    props: {
        price_tree_up: {
            type: Number,
            default: 0
        },
        price_tree_tod: {
            type: Number,
            default: 0
        },
        price_tree_front: {
            type: Number,
            default: 0
        },
        price_tree_down: {
            type: Number,
            default: 0
        },
        price_two_up: {
            type: Number,
            default: 0
        },
        price_two_down: {
            type: Number,
            default: 0
        },
        price_run_up: {
            type: Number,
            default: 0
        },
        price_run_down: {
            type: Number,
            default: 0
        },
    },
    data: function() {
        return {
            input_digi: 0,

            my_number_txt: "",
            my_number: [],
            option_huay: {
                price_tree_up: false,
                price_tree_tod: false,
                price_tree_front: false,
                price_tree_down: false,
                price_two_up: false,
                price_two_down: false,
                price_run_up: false,
                price_run_down: false,
            },
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    created: function() {
        window.addEventListener('keyup', this.keymonitor)
    },
    methods: {
        select_option(key) {
            // หากเป็น วิ่ง จะ ปิดอันอื่นหมด
            if (key == 'price_run_up' || key == 'price_run_down') {

                for (const [key_obj, value] of Object.entries(this.option_huay)) {
                    if (key_obj != "price_run_up" && key_obj != 'price_run_down') {
                        this.option_huay[key_obj] = false;
                        $('#' + key_obj).removeClass("bg-success text-white")
                    }
                }
                var is_two_operator = false;
                if (key == 'price_run_up')
                    is_two_operator = true;
                else if (key == 'price_run_down')
                    is_two_operator = true;

                if (is_two_operator) {
                    if (this.option_huay[key] == false) {
                        this.option_huay[key] = true;
                        $('#' + key).addClass("bg-success text-white")
                    } else {
                        this.option_huay[key] = false;
                        $('#' + key).removeClass("bg-success text-white")
                    }
                    this.input_digi = 1;
                }
            } else if (key != "price_run_up" && key != 'price_run_down') {
                //ไม่ใช่วิง จะล้างวิ่งทิ้ง
                $('#price_run_up').removeClass("bg-success text-white")
                $('#price_run_down').removeClass("bg-success text-white")
                this.option_huay['price_run_up'] = false;
                this.option_huay['price_run_down'] = false;

                if (this.option_huay[key] == false) {
                    this.option_huay[key] = true;
                    $('#' + key).addClass("bg-success text-white")
                } else {
                    this.option_huay[key] = false;
                    $('#' + key).removeClass("bg-success text-white")
                }

                // เช็คหากมีแค่ 2 ตัวก็จะ input แค่ 2
                this.input_digi = 2;

                for (const [key_obj, value] of Object.entries(this.option_huay)) {
                    if (key_obj !== "price_two_up" && key_obj !== 'price_two_down' && value == true)
                        this.input_digi = 3;
                }

            }

            // เช็คว่ามีค่า
            var check = false;
            for (const [key_obj, value] of Object.entries(this.option_huay)) {
                if (value == true) {
                    check = true;
                    break;
                }
            }
            if (check == false)
                this.input_digi = 0;

            if (this.input_digi > 0) {
                var input1 = $("#input1");
                var input2 = $("#input2");
                var input3 = $("#input3");

                if (this.input_digi == 3) {
                    input1.removeClass("hide");
                    input2.removeClass("hide");
                    input3.removeClass("hide");
                } else if (this.input_digi == 2) {
                    input1.removeClass("hide");
                    input2.removeClass("hide");
                    input3.addClass("hide");
                } else if (this.input_digi == 1) {
                    input1.removeClass("hide");
                    input2.addClass("hide");
                    input3.addClass("hide");
                }

                $('#main-input').removeClass("hide");
            } else
                $('#main-input').addClass("hide");

            console.log(this.input_digi)


        },
        refesh_my_number() {
            this.my_number_txt = "";
            if (this.my_number.length) {
                for (var i = 1; i <= this.my_number.length; i++) {
                    this.my_number_txt += this.my_number[this.my_number.length - i]['number'] + ", ";
                }
            }
        },
        clear_last() {
            var input1 = $("#input1");
            var input2 = $("#input2");
            var input3 = $("#input3");
            if (input3.text() != "")
                input3.text("")
            else if (input2.text() != "")
                input2.text("")
            else if (input1.text() != "")
                input1.text("")
        },
        keymonitor: function(event) {
            if (event.keyCode >= 49 && event.keyCode <= 57) {
                this.numpad(event.key)
            } else if (event.keyCode == 8)
                this.clear_last()
        },
        numpad(number) {
            var input1 = $("#input1");
            var input2 = $("#input2");
            var input3 = $("#input3");

            if (number >= 0 && number <= 9) {
                var input_full = false;
                if (input1.text() == "") {
                    input1.text(number.toString());
                    if (this.input_digi == 1)
                        input_full = true;
                } else if (input2.text() == "") {
                    input2.text(number.toString());
                    if (this.input_digi == 2)
                        input_full = true;
                } else if (input3.text() == "") {
                    input3.text(number.toString());
                    if (this.input_digi == 3)
                        input_full = true;
                }

                if (input_full) {
                    for (const [key_obj, value] of Object.entries(this.option_huay)) {
                        if (value == true) {
                            if (key_obj != 'price_two_up' && key_obj != 'price_two_down')
                                var number = input1.text() + input2.text() + input3.text();
                            else
                                var number = input1.text() + input2.text();


                            this.my_number.push({
                                number: number,
                                number_type: key_obj,
                                multiple: 1,
                                price: this[key_obj],
                            });
                        }
                    }

                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: '<small class="text-center">เพิ่ม</small>&nbsp;<small class="text-center">' + input1.text() + input2.text() + input3.text() + "</small>",
                        showConfirmButton: false,
                        timer: 1000,
                        backdrop: true,
                        width: 200,
                    })
                    console.log(this.my_number)
                    this.refesh_my_number();
                    input1.text("");
                    input2.text("");
                    input3.text("");
                }
            } else if (number == -1)
                this.clear_last()
            else if (number == -2) {
                Swal.fire({
                    title: 'แน่ใจใช่ไหม?',
                    text: "คุณกำลังจะลบรายการแทง",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'ยกเลิก',
                    confirmButtonText: 'ใช่, ลบมัน!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'ลบสำเร็จ!',
                            'รายการแทงถูกลบแล้ว.',
                            'success'
                        );
                        this.my_number = [];
                        this.refesh_my_number();
                    }
                })
            }
        }
    }

}
</script>