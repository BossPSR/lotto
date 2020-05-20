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
        <div v-if="can_shoot && page_index <= 2" class="row mb-4">
            <a id="input-number-btn" v-on:click="change_page(1)" class="btn btn-sm btn-primary text-white col-md-6" style="border-radius:0px;">แทงเลข</a>
            <a id="shoot-number-btn" v-on:click="change_page(2)" class="btn btn-sm btn-outline-primary col-md-6" style="border-radius:0px;">ยิงเลข</a>
        </div>
        <div v-if="page_index==1">
            <div class="d-flex">
                <div class="col-xl-6 col-lg-6 col-sm-6">
                    <div v-on:click="select_option('price_tree_up')" id="price_tree_up" class="single-jackpot disableSelection" style="padding:0; cursor: pointer;">
                        <div class="part-body" style="padding: 15px 15px">
                            สามตัวบบน ({{price_tree_up}})
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6">
                    <div v-on:click="select_option('price_tree_tod')" id="price_tree_tod" class="single-jackpot disableSelection" style="padding:0; cursor: pointer;">
                        <div class="part-body" style="padding: 15px 15px">
                            สามตัวโต๊ด ({{price_tree_tod}})
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="d-flex">
                <div class="col-xl-6 col-lg-6 col-sm-6">
                    <div v-on:click="select_option('price_tree_front')" id="price_tree_front" class="single-jackpot disableSelection" style="padding:0; cursor: pointer;">
                        <div class="part-body" style="padding: 15px 15px">
                            สามตัวหน้า ({{price_tree_front}})
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6">
                    <div v-on:click="select_option('price_tree_down')" id="price_tree_down" class="single-jackpot disableSelection" style="padding:0; cursor: pointer;">
                        <div class="part-body" style="padding: 15px 15px">
                            สามตัวหลัง ({{price_tree_down}})
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="d-flex">
                <div class="col-xl-6 col-lg-6 col-sm-6">
                    <div v-on:click="select_option('price_two_up')" id="price_two_up" class="single-jackpot disableSelection" style="padding:0; cursor: pointer;">
                        <div class="part-body" style="padding: 15px 15px">
                            สองตัวบน ({{price_two_up}})
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6">
                    <div v-on:click="select_option('price_two_down')" id="price_two_down" class="single-jackpot disableSelection" style="padding:0; cursor: pointer;">
                        <div class="part-body" style="padding: 15px 15px">
                            สองตัวล่าง ({{price_two_down}})
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="d-flex">
                <div class="col-xl-6 col-lg-6 col-sm-6">
                    <div v-on:click="select_option('price_run_up')" id="price_run_up" class="single-jackpot disableSelection" style="padding:0; cursor: pointer;">
                        <div class="part-body" style="padding: 15px 15px">
                            วิ่งบน ({{price_run_up}})
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6">
                    <div v-on:click="select_option('price_run_down')" id="price_run_down" class="single-jackpot disableSelection" style="padding:0; cursor: pointer;">
                        <div class="part-body" style="padding: 15px 15px">
                            วิ่งล่าง ({{price_run_down}})
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="d-flex ">
                <div class="col-xl-12 col-lg-12 col-sm-12 hide" id="main-input">
                    <div class="single-jackpot disableSelection">
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
                                    <div v-on:click="numpad(1)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            1
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad(2)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            2
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad(3)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            3
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div class="single-jackpot disableSelection button_number bg-warning" style="padding:0; color:#fff; cursor: pointer;">
                                        <div v-on:click="numpad(-1)" class="part-body text-center" style="padding: 15px 15px;">
                                            <i class="fa fa-reply" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad(4)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            4
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad(5)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            5
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad(6)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            6
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad(-2)" class="single-jackpot disableSelection button_number bg-danger" style="padding:0; color:#fff; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px;">
                                            ล้างข้อมูล
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad(7)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            7
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad(8)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            8
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad(9)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            9
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-xl-9 col-lg-9 col-sm-9">
                                    <div v-on:click="numpad(0)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
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
        </div>
        <div v-if="page_index==3">
            <a id="input-number-btn" v-on:click="change_page(1)" class="btn btn-sm btn-warning text-white col-md-2">กลับ</a>
            <div v-for="(list, huay_type) in my_number">
    
                <div v-if="list.length">
                    <label class="mt--2"> {{type_name[huay_type]}}</label>
                </div>
                <div v-for="(item, index) in list">
                    <div class="item mb-2">
                        <div class="input-group">
                            <div class="input-group-append"><span class="input-group-text bg-white" style="min-width:45px;" align="center">{{  index+1}}.</span></div>
                            <div class="input-group-append"><span class="input-group-text number bg-gold" style="min-width:50px;" v-bind:data-duplicate="item.is_duplicate">{{ item.number }}</span></div>
                            <input v-on:keyup="change_multiple(huay_type, index, $event.target.value)" type="tel" placeholder="ระบุจำนวนเงิน" minlength="6" maxlength="6" pattern="[0-9]*" class="form-control bg-black text-gold border-right-gold" v-bind:value="item.multiple" v-bind:data-duplicate="item.is_duplicate">
                            <div class="input-group-append input-group-append-price"><span class="input-group-text bg-black" v-bind:data-duplicate="item.is_duplicate">ชนะ : {{ item.total_price }} ฿</span></div>
                            <div class="input-group-append">
                                <div class="btn btn-danger" v-on:click="remove_number(huay_type, index)">ลบ</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section id="setting_price" class="setting">
                <div class="row mb-2">
                    <div class="col-6">
                        <button class="btn btn-block btn-info" v-on:click="show_duplicate()"><i class="fa fa-search text-white"></i> ดูเลขซ้ำ</button>
                    </div>
                    <div class="col-6"><button class="btn btn-block btn-warning" v-on:click="delete_duplicate()">ตัดเลขซ้ำออก</button></div>
                </div>
                <h3>เดิมพันราคาเท่ากัน</h3>
                <div class="form__price">
                    <div class="input-group mb-3"><input id="change_price_input" v-on:keyup="change_multiple_all($event.target.value)" type="tel" pattern="[0-9]*" placeholder="ใส่ราคา" class="form-control">
                        <div class="input-group-append"><button type="button" class="btn btn-primary">ตกลง</button></div>
                    </div>
                    <div class="row">
                        <button class="btn btn-outline-warning" v-on:click="change_multiple_all(5, true)">5 ฿</button>
                        <button class="btn btn-outline-warning" v-on:click="change_multiple_all(10, true)">10 ฿</button>
                        <button class="btn btn-outline-warning" v-on:click="change_multiple_all(20, true)">20 ฿</button>
                        <button class="btn btn-outline-warning" v-on:click="change_multiple_all(50, true)">50 ฿</button>
                        <button class="btn btn-outline-warning" v-on:click="change_multiple_all(100, true)">100 ฿</button>
                    </div>
                </div>
            </section>
        </div>
        <div v-if="page_index == 1" class="card_list_lottery" style="position:fixed; left:0px; right:0px;word-break: break-word; overflow:scroll">
            <div class="lottert_detail">
                <div>รายการแทง <span id="lotttery_num"></span></div>
                <div v-if="my_number_txt !==''">
                    <button class="btn btn-light mt-2" v-on:click="change_page(3)">แทงเลข</button>
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
        can_shoot: {
            type: Number,
            default: 0
        },
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
            counter_list: 0,
            input_digi: 0,
            page_index: 1,
            my_number_txt: "",
            my_number: {
                price_tree_up: [],
                price_tree_tod: [],
                price_tree_front: [],
                price_tree_down: [],
                price_two_up: [],
                price_two_down: [],
                price_run_up: [],
                price_run_down: [],
            },
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
            type_name: {
                price_tree_up: 'สามตัวบน',
                price_tree_tod: 'สามตัวโต๊ด',
                price_tree_front: 'สามตัวหน้า',
                price_tree_down: 'สามตัวหลัง',
                price_two_up: 'สองตัวบน',
                price_two_down: 'สองตัวล่าง',
                price_run_up: 'วิ่งบน',
                price_run_down: 'วิ่งล่าง',
            },
        }
    },
    mounted() {
        console.log('Component mounted.')
        this.counter_list = 0;
    },
    created: function() {
        window.addEventListener('keyup', this.keymonitor)
    },
    methods: {
        delete_duplicate() {
            this.show_duplicate(false)
            for (const [huay_type, list] of Object.entries(this.my_number)) {
                if (list.length) {
                    for (var i = 0; i < list.length; i++) {
                        if (list[i].is_duplicate)
                            this.remove_number(huay_type, i);
                    }
                }
            }
            this.cal_duplicate();

        },
        show_duplicate(set = null) {
            var result = $("*[data-duplicate='true']");
            for (var i = 0; i < result.length; i++) {
                if (set == null) {
                    if ($(result[i]).hasClass("bg-danger"))
                        $(result[i]).removeClass("bg-danger text-white");
                    else
                        $(result[i]).addClass("bg-danger text-white");
                }
                else
                {
                    if(set)
                        $(result[i]).addClass("bg-danger text-white");
                    else
                        $(result[i]).removeClass("bg-danger text-white");

                }
            }
        },
        remove_number(type_name, index) {
            this.my_number[type_name].splice(index, 1);
            this.refesh_my_number()
            this.cal_duplicate();
        },
        change_multiple(type_name, index, multiple) {
            this.my_number[type_name][index].multiple = multiple
            this.my_number[type_name][index].total_price = numeral((multiple * this.my_number[type_name][index].price)).format('0,0');

        },
        change_multiple_all(multiple, change_input = false) {
            if (multiple > 0) {
                for (const [huay_type, list] of Object.entries(this.my_number)) {
                    if (list.length) {
                        for (var i = 0; i < list.length; i++) {
                            this.my_number[huay_type][i].multiple = multiple;
                            this.my_number[huay_type][i].total_price = numeral((multiple * list[i].price)).format('0,0');
                        }
                    }
                }
                console.log(this.my_number)
            }
            if (change_input)
                $('#change_price_input').val(multiple)
        },
        change_page(index) {
            this.page_index = index;
            if (index == 1) {
                $("#shoot-number-btn").removeClass("btn-primary text-white").addClass("btn-outline-primary")
                $("#input-number-btn").addClass("btn-primary text-white").removeClass("btn-outline-primary")

                this.option_huay = {
                    price_tree_up: false,
                    price_tree_tod: false,
                    price_tree_front: false,
                    price_tree_down: false,
                    price_two_up: false,
                    price_two_down: false,
                    price_run_up: false,
                    price_run_down: false,
                };

            } else if (index == 2) {
                $("#shoot-number-btn").addClass("btn-primary text-white").removeClass("btn-outline-primary")
                $("#input-number-btn").removeClass("btn-primary text-white").addClass("btn-outline-primary")
            } else if (index == 3) {
                $("#list").append('<div class="item mb-2"><div class="input-group"><div class="input-group-append"><span class="input-group-text border-0 ranking-number text-center px-1">1 .</span></div> <div class="input-group-append"><span class="input-group-text number bg-gold">11</span></div> <input type="tel" placeholder="ระบุจำนวนเงิน" minlength="6" maxlength="6" pattern="[0-9]*" class="form-control bg-black text-gold border-right-gold"> <div class="input-group-append input-group-append-price"><span class="input-group-text bg-black">ชนะ : 90 ฿</span></div> <div class="input-group-append"><div class="btn btn-danger">ลบ</div></div></div></div>')
            }
            console.log(index)
        },
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
        cal_duplicate() {
            var pass = {
                price_tree_up: {},
                price_tree_tod: {},
                price_tree_front: {},
                price_tree_down: {},
                price_two_up: {},
                price_two_down: {},
                price_run_up: {},
                price_run_down: {},
            }
            for (const [huay_type, list] of Object.entries(this.my_number)) {
                if (list.length) {
                    for (var i = 0; i < list.length; i++) {
                        if (pass[huay_type][list[i]['number']] == undefined)
                            pass[huay_type][list[i]['number']] = 0;
                        pass[huay_type][list[i]['number']]++;
                    }
                }
            }
            for (const [huay_type, list] of Object.entries(this.my_number)) {
                if (list.length) {
                    for (var i = 0; i < list.length; i++) {
                        if (pass[huay_type][list[i]['number']] == undefined)
                            pass[huay_type][list[i]['number']] = 0;
                        pass[huay_type][list[i]['number']]++;

                        if (pass[huay_type][list[i]['number']] > 2)
                            this.my_number[huay_type][i].is_duplicate = true;
                        else
                            this.my_number[huay_type][i].is_duplicate = false;


                    }
                }
            }
        },
        refesh_my_number() {
            this.my_number_txt = "";
            for (const [huay_type, list] of Object.entries(this.my_number)) {
                if (list.length) {
                    for (var i = 1; i <= list.length; i++) {
                        this.my_number_txt += list[list.length - i]['number'] + ", ";
                    }
                }
            }
            console.log(this.my_number)
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

                            this.my_number[key_obj].push({
                                number: number,
                                number_type: key_obj,
                                is_duplicate: false,
                                multiple: 1,
                                total_price: numeral((this[key_obj] * 1)).format('0,0'),
                                price: this[key_obj],
                            });

                        }
                    }
                    var app = this;
                    setTimeout(function() {
                        Swal.fire({
                            position: 'top',
                            icon: 'success',
                            title: '<small class="text-center">เพิ่ม</small>&nbsp;<small class="text-center">' + number + "</small>",
                            showConfirmButton: false,
                            timer: 1000,
                            backdrop: true,
                            width: 200,
                        })
                        console.log(app.my_number)
                        app.refesh_my_number();
                        app.cal_duplicate();
                        input1.text("");
                        input2.text("");
                        input3.text("");
                    }, 200);
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
                        input1.text("");
                        input2.text("");
                        input3.text("");
                        this.refesh_my_number();
                    }
                })
            }
        }
    }

}
</script>