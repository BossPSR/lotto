<style>
.hide {
    display: none;
}

.input-auto-height {
    height: auto !important;
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

.digi2 {
    width: 100px;
}

.digi2:empty {
    background-color: red;
    -webkit-animation: 1s blink2 linear infinite;
    -moz-animation: 1s blink2 linear infinite;
    -ms-animation: 1s blink2 linear infinite;
    -o-animation: 1s blink2 linear infinite;
    animation: 1s blink2 linear infinite;
}

@keyframes "blink2" {
    from,
    to {
        background-color: transparent;
    }
    50% {
        background-color: #fa8900;
    }
}

@-moz-keyframes blink2 {
    from,
    to {
        background-color: transparent;
    }
    50% {
        background-color: #09afff;
    }
}

@-webkit-keyframes "blink2" {
    from,
    to {
        background-color: transparent;
    }
    50% {
        background-color: #09afff;
    }
}

@-ms-keyframes "blink2" {
    from,
    to {
        background-color: transparent;
    }
    50% {
        background-color: #09afff;
    }
}

@-o-keyframes "blink2" {
    from,
    to {
        background-color: transparent;
    }
    50% {
        background-color: #09afff;
    }
}

.yee-kee-first {
    background-color: #d9edf7;
}

.yee-kee-sixteen {
    background-color: #f2dede;
}
</style>

<template>
    <div v-if="huay_secret!=''">
        <div v-if="can_shoot && page_index <= 2" class="row mb-4">
            <a id="input-number-btn" v-on:click="change_page(1)" class="btn btn-sm btn-primary text-white col-md-6" style="border-radius:0px;">แทงเลข</a>
            <a id="shoot-number-btn" v-on:click="change_page(2)" class="btn btn-sm btn-outline-primary col-md-6" style="border-radius:0px;">ยิงเลข</a>
        </div>
        <div v-if="page_index==1">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-sm-6" v-if="price_tree_up != -1">
                    <div v-on:click="select_option('price_tree_up')" id="price_tree_up" class="single-jackpot disableSelection" style="padding:0; cursor: pointer;">
                        <div class="part-body" style="padding: 15px 15px">
                            สามตัวบน ({{price_tree_up}})
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6" v-if="price_tree_tod != -1">
                    <div v-on:click="select_option('price_tree_tod')" id="price_tree_tod" class="single-jackpot disableSelection" style="padding:0; cursor: pointer;">
                        <div class="part-body" style="padding: 15px 15px">
                            สามตัวโต๊ด ({{price_tree_tod}})
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6" v-if="price_tree_front != -1">
                    <div v-on:click="select_option('price_tree_front')" id="price_tree_front" class="single-jackpot disableSelection" style="padding:0; cursor: pointer;">
                        <div class="part-body" style="padding: 15px 15px">
                            สามตัวหน้า ({{price_tree_front}})
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6" v-if="price_tree_down != -1">
                    <div v-on:click="select_option('price_tree_down')" id="price_tree_down" class="single-jackpot disableSelection" style="padding:0; cursor: pointer;">
                        <div class="part-body" style="padding: 15px 15px">
                            สามตัวหลัง ({{price_tree_down}})
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6" v-if="price_two_up != -1">
                    <div v-on:click="select_option('price_two_up')" id="price_two_up" class="single-jackpot disableSelection" style="padding:0; cursor: pointer;">
                        <div class="part-body" style="padding: 15px 15px">
                            สองตัวบน ({{price_two_up}})
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6" v-if="price_two_down != -1">
                    <div v-on:click="select_option('price_two_down')" id="price_two_down" class="single-jackpot disableSelection" style="padding:0; cursor: pointer;">
                        <div class="part-body" style="padding: 15px 15px">
                            สองตัวล่าง ({{price_two_down}})
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6" v-if="price_run_up != -1">
                    <div v-on:click="select_option('price_run_up')" id="price_run_up" class="single-jackpot disableSelection" style="padding:0; cursor: pointer;">
                        <div class="part-body" style="padding: 15px 15px">
                            วิ่งบน ({{price_run_up}})
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6" v-if="price_run_down != -1">
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
        <div v-if="page_index==2">
            <div class="d-flex ">
                <div class="col-xl-12 col-lg-12 col-sm-12">
                    <div id="problem-div" class="single-jackpot ">
                        <div class="part-head text-center" style="flex-direction: column;">
                            <div class="form-group">
                                <h5>ผลรวมยี่กี</h5>
                                <h3>{{yee_kee_sum}}</h3>
                                <br> ใส่เลข (5 ตัวเท่านั้น)
                            </div>
                            <div class="d-flex inp_lottery " style="justify-content: center;">
                                <label id="input1" class="form-control text-center digi "></label>
                                <label id="input2" class="form-control text-center digi "></label>
                                <label id="input3" class="form-control text-center digi "></label>
                                <label id="input4" class="form-control text-center digi "></label>
                                <label id="input5" class="form-control text-center digi "></label>
                            </div>
                        </div>
                        <div class="part-body disableSelection">
                            <div class="d-flex">
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad_shoot(1)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            1
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad_shoot(2)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            2
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad_shoot(3)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            3
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div class="single-jackpot disableSelection button_number bg-warning" style="padding:0; color:#fff; cursor: pointer;">
                                        <div v-on:click="numpad_shoot(-1)" class="part-body text-center" style="padding: 15px 15px;">
                                            <i class="fa fa-reply" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad_shoot(4)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            4
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad_shoot(5)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            5
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad_shoot(6)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            6
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad_shoot(-2)" class="single-jackpot disableSelection button_number bg-info" style="padding:0; color:#fff; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px;">
                                            สุ่มเลข
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad_shoot(7)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            7
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad_shoot(8)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            8
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3">
                                    <div v-on:click="numpad_shoot(9)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            9
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3" v-if="can_add == 0">
                                    <div v-on:click="numpad_shoot(-3)" class="single-jackpot disableSelection button_number bg-success" style="padding:0; color:#fff; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px;">
                                            เพิ่มเลข
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-3" v-if="can_add != 0">
                                    <div class="single-jackpot disableSelection button_number bg-primary" style="padding:0; color:#fff; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px;">
                                            {{can_add}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-xl-9 col-lg-9 col-sm-9">
                                    <div v-on:click="numpad_shoot(0)" class="single-jackpot disableSelection button_number" style="padding:0; cursor: pointer;">
                                        <div class="part-body text-center" style="padding: 15px 15px; border: rgba(0, 0, 0, 0.08) 3px solid; border-radius: 5px;">
                                            0
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div v-for="(list, index) in yee_kee_list">
                            <div class="row border shadow rounded mb-3 p-2" v-bind:class="{ 'yee-kee-first': (index+1 == 1), 'yee-kee-sixteen': (index+1 == 16) }">
                                <div class="col-md-2">
                                    <p class="title">ลำดับ {{index+1}}</p>
                                    <p class="number">{{list.number}}</p>
                                </div>
                                <div class="col-md-6 text-center">
                                    <p class="title">ชื่อสมาชิกผู้ส่งเลข</p>
                                    <p>{{list.user_name_secret}}</p>
                                </div>
                                <div class="col-md-4 text-right">
                                    <p class="date">เวลาที่ส่ง {{list.datetime}}</p>
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
                            <input v-on:keyup=" change_multiple(huay_type, index, $event.target.value)" type="number" class="input-auto-height form-control bg-black text-gold border-right-gold" v-bind:min="item.min" v-bind:value="item.multiple" v-bind:data-duplicate="item.is_duplicate">
                            <div class="input-group-append input-group-append-price"><span class="input-group-text bg-black" v-bind:data-duplicate="item.is_duplicate">ชนะ :&nbsp;
                                <span >{{ (item.total_price) }} ฿ </span>
                                </span>
                            </div>
                            <div class="input-group-append">
                                <div class="btn btn-danger" v-on:click="remove_number(huay_type, index)">ลบ</div>
                            </div>
                        </div>
                        <div v-if="item.min > item.multiple" class="alert alert-danger p-1">ขั้นต่ำ {{item.min}} บาท</div>
                        <div v-if="item.is_un" class="alert alert-danger p-1">เลขนี้ถูกอั้น</div>
    
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
                    <div class="input-group mb-3"><input id="change_price_input" v-on:keyup="change_multiple_all($event.target.value)" type="tel" pattern="[0-9]*" placeholder="ใส่ราคา" class="form-control input-auto-height">
                        <div class="input-group-append"><button type="button" class="btn btn-primary">ตกลง</button></div>
                    </div>
                    <div class="row m-0">
                        <button class="btn btn-outline-warning mr-2" v-on:click="change_multiple_all(5, true)">5 ฿</button>
                        <button class="btn btn-outline-warning mr-2" v-on:click="change_multiple_all(10, true)">10 ฿</button>
                        <button class="btn btn-outline-warning mr-2" v-on:click="change_multiple_all(20, true)">20 ฿</button>
                        <button class="btn btn-outline-warning mr-2" v-on:click="change_multiple_all(50, true)">50 ฿</button>
                        <button class="btn btn-outline-warning" v-on:click="change_multiple_all(100, true)">100 ฿</button>
                    </div>
                    <div>
                        <br>
                        <label>เครดิตคงเหลือ : {{money_txt}} ฿</label>
                        <br>
                        <label>ยอดเดิมพันทั้งหมด : {{total_multiple_txt}} ฿</label>
                    </div>
                    <div class="row m-0 mt-4 ">
                        <div class="col-md-4 p-0">
                            <button class="btn btn-outline-danger w-100" v-on:click="numpad(-2)">ล้างข้อมูล</button>
                        </div>
                        <div class="col-md-8 pr-0">
                            <button class="btn btn-primary w-100" v-on:click="change_page(4)">แทงพนัน</button>
                        </div>
                    </div>
    
                </div>
            </section>
        </div>
        <div v-if="page_index==4">
            <div class="row">
                <a v-on:click="change_page(3)" class="btn btn-sm btn-outline-danger col-md-6">ยกเลิก</a>
                <a v-on:click="numpad(-3)" class="btn btn-sm btn-primary text-white col-md-6">ส่งโพย</a>
            </div>
            <legend class="text-center mt-4">ยืนยันการสั่งซื้อ</legend>
            <div v-for="(list, huay_type) in my_number">
                <div v-if="list.length">
                    <table class='table table-bordered w-100 mt-3'>
                        <tr class="bg-secondary text-white">
                            <th style="width:1px"> </th>
                            <th> {{type_name[huay_type]}}</th>
                            <th style="width:1px"> ราคา</th>
                        </tr>
                        <tr v-for="(item, index) in list">
                            <td><span style="min-width:45px;" align="center">{{  index+1}}.</span></td>
                            <td class='text-center'><span style="min-width:45px;" align="center">{{  item.number}}</span></td>
                            <td nowrap><span>{{ item.multiple_txt }} ฿</span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <a v-on:click="change_page(3)" class="btn btn-sm btn-outline-danger col-md-6">ยกเลิก</a>
                <a v-on:click="numpad(-3)" class="btn btn-sm btn-primary text-white col-md-6">ส่งโพย</a>
            </div>
        </div>
        <div v-if="page_index==5">
            <hr>
            <legend class='text-center'>เลือกเลขชุด</legend>
            <div class="alert alert-danger" v-if="poy_list.length == 0" style="display: flex; justify-content: space-between;">
                <label>ยังไม่มีเลขชุด</label>
            </div>
    
            <div v-for="(poy, index) in poy_list">
                <a v-on:click="load_number_list(poy.id)" style="cursor:pointer;">
                    <div class="row border shadow rounded mb-3 p-2">
                        <div class="col-md-2 mt-2">
                            <label class="title">ลำดับ {{index+1}}</label>
                        </div>
                        <div class="col-md-5 text-center mt-2">
                            <label>{{poy.name}}</label>
                        </div>
                        <div class="col-md-4 text-right">
                            <small class="date">สร้างเมื่อ<br> {{poy.datetime}}</small>
                        </div>
                        <div class="col-md-1 text-right pt-1">
                            <button class='btn btn-sm btn-success' v-on:click="choose_set(poy.id)">เลือก</button>
                        </div>
                    </div>
                </a>
                <div v-bind:id="'poy-'+poy.id" v-if="old_list[poy.id]">
                    <div v-for="(list, huay_type) in old_list[poy.id]">
                        <table class="table table-sm border">
                            <tr class="thead-dark">
                                <th style="width:1px"></th>
                                <th>{{type_name[huay_type]}}</th>
                                <th style="width:1px"></th>
                            </tr>
                            <tr v-for="(item, index) in list">
                                <td nowrap>{{ index+1}}.</td>
                                <td>{{ item.number }}</td>
                                <td nowrap>{{ item.multiple }} ฿</td>
                            </tr>
                        </table>
                    </div>
                    <div v-if="old_list[poy.id].length < 1">
                        <label>ไม่พบรายการ</label>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div v-if="page_index == 1" class="card_list_lottery" style="position:fixed; left:0px; right:0px;word-break: break-word; overflow:scroll">
            <div class="lottert_detail">
                <div>รายการแทง <span id="lotttery_num"></span></div>
                <div v-if="my_number_txt !==''">
                    <button class="btn btn-light mt-2" v-on:click="change_page(3)">แทงเลข</button>
                </div>
                <div v-if="my_number_txt ==''">
                    <button class="btn btn-light mt-2" v-on:click="change_page(5)">เลขชุด/ดึงโพย</button>
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
        huay_secret: String,
        huay_category_id: String,
    },
    data: function() {
        return {
            can_add: 0,

            total_price: 0,
            total_price_txt: "0",

            money: 0,
            money_txt: "0",

            input_digi: 0,
            page_index: 1,
            my_number_txt: "",
            yee_kee_list: null,
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

            //PAGE SET
            poy_list: [],
            old_list: [],
        }
    },
    mounted() {
        //console.log('Component mounted.')
    },
    created: function() {
        window.addEventListener('keyup', this.keymonitor)
        setInterval(function() {
            if (this.page_index == 2)
                this.pull_yee_kee_list();
        }.bind(this), 1000);
        this.pull_yee_kee_list();
    },
    methods: {
        pull_yee_kee_list() {
            var app = this
            this.axios.post('/lottery_government', {
                    huay_secret: this.huay_secret,
                    shoot_list: true
                })
                .then(function(response) {
                    app.yee_kee_list = response.data.list;
                    app.yee_kee_sum = response.data.total;
                })
                .catch(function(error) {
                    //console.log(error)
                });
        },
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
            this.cal_total_price();

        },
        show_duplicate(set = null) {
            var result = $("*[data-duplicate='true']");
            for (var i = 0; i < result.length; i++) {
                if (set == null) {
                    if ($(result[i]).hasClass("bg-danger"))
                        $(result[i]).removeClass("bg-danger text-white");
                    else
                        $(result[i]).addClass("bg-danger text-white");
                } else {
                    if (set)
                        $(result[i]).addClass("bg-danger text-white");
                    else
                        $(result[i]).removeClass("bg-danger text-white");

                }
            }
        },
        remove_number(type_name, index) {
            this.my_number[type_name].splice(index, 1);
            this.refesh_my_number();
            this.cal_duplicate();
            this.cal_total_price();
            var count = 0;
            for (const [huay_type, list] of Object.entries(this.my_number)) {
                count += list.length;
            }
            if (count == 0)
                this.change_page(1)

        },
        change_multiple(type_name, index, multiple) {
            this.my_number[type_name][index].multiple = multiple
            this.my_number[type_name][index].multiple_txt = numeral(multiple).format('0,0.00');
            this.my_number[type_name][index].total_price = numeral((multiple * this.my_number[type_name][index].price)).format('0,0.00');
            this.cal_total_price();

        },
        change_multiple_all(multiple, change_input = false) {
            if (multiple > 0) {
                for (const [huay_type, list] of Object.entries(this.my_number)) {
                    if (list.length) {
                        for (var i = 0; i < list.length; i++) {
                            this.my_number[huay_type][i].multiple = multiple;
                            this.my_number[huay_type][i].multiple_txt = numeral(multiple).format('0,0.00');
                            this.my_number[huay_type][i].total_price = numeral((multiple * list[i].price)).format('0,0.00');
                        }
                    }
                }
                //console.log(this.my_number)
            }
            this.cal_total_price();

            if (change_input)
                $('#change_price_input').val(multiple)
        },
        change_page(index) {

            if (index == 1) {
                this.page_index = index;
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
                this.page_index = index;
                $("#shoot-number-btn").addClass("btn-primary text-white").removeClass("btn-outline-primary")
                $("#input-number-btn").removeClass("btn-primary text-white").addClass("btn-outline-primary")
            } else if (index == 3) {
                this.page_index = index;
                var app = this
                this.axios.post('/lottery_government', {
                        get_user_pocket: true
                    })
                    .then(function(response) {
                        app.money = response.data.money;
                        app.money_txt = numeral(response.data.money).format('0,0.00');
                    })
                    .catch(function(error) {
                        //console.log(error)
                    });

                this.cal_total_price();
            } else if (index == 4) {
                var app = this;
                //เช็ค Min
                var error = '';
                for (const [huay_type, list] of Object.entries(app.my_number)) {
                    if (list.length) {
                        for (var i = 0; i < list.length; i++) {
                            var row = list[i];

                            if (row.min > row.multiple)
                                error += row.number + ' แทง > ' + row.min + " เท่านั้น, "
                        }
                    }
                }
                //console.log(error)
                if (error) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: error,
                        showConfirmButton: true,
                        backdrop: true,
                        width: 400,
                    });
                    return false;
                }
                var app = this;
                this.axios.post('/lottery_government', {
                        total_price: this.total_multiple,
                        check_money: true
                    })
                    .then(function(response) {
                        app.money = response.data.money;
                        app.money_txt = numeral(response.data.money).format('0,0.00');
                        if (response.data.pass) {
                            app.page_index = index;
                        } else
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: "<small class='text-center'>ขออภัยเครดิตของคุณไม่พอ</small>",
                                showConfirmButton: true,
                                backdrop: true,
                                width: 400,
                            });
                    })
                    .catch(function(error) {

                    });

            } else if (index == 5) {
                var app = this;
                this.axios.post('/lottery_number_set', {
                        get_poy_list: true,
                    })
                    .then(function(response) {
                        //console.log(response.data)
                        app.poy_list = response.data;
                        app.page_index = 5;
                    })
                    .catch(function(error) {
                        //console.log(error)
                    });
            }

            //console.log(index)
        },
        select_option(key) {
            // หากเป็น วิ่ง จะ ปิดอันอื่นหมด
            var is_run_operator = false;
            var has_two = false;

            if (key == 'price_run_up')
                is_run_operator = true;
            else if (key == 'price_run_down')
                is_run_operator = true;

            if (is_run_operator) {

                if (this.option_huay[key] == false) {
                    this.option_huay[key] = true;
                    $('#' + key).addClass("bg-success text-white")
                } else {
                    this.option_huay[key] = false;
                    $('#' + key).removeClass("bg-success text-white")
                }
                this.input_digi = 1;

                for (const [key_obj, value] of Object.entries(this.option_huay)) {
                    if (key_obj != "price_run_up" && key_obj != 'price_run_down') {
                        this.option_huay[key_obj] = false;
                        var element = $('#' + key_obj);
                        element.removeClass("bg-success text-white");
                    }
                }

            } else {
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

                if (this.option_huay['price_two_up'])
                    has_two = true;
                if (this.option_huay['price_two_down'])
                    has_two = true;


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
                input1.removeClass('digi2').addClass('digi');
                input2.removeClass('digi2').addClass('digi');
                input3.removeClass('digi2').addClass('digi');

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

                if (this.input_digi == 3 && has_two) {
                    input2.addClass("digi2").remove('digi');
                    input3.addClass("digi2").remove('digi');
                } else if (this.input_digi == 2 && has_two) {
                    input1.addClass("digi2").remove('digi');
                    input2.addClass("digi2").remove('digi');
                }


                $('#main-input').removeClass("hide");
            } else
                $('#main-input').addClass("hide");

            //console.log(this.input_digi)


        },
        cal_total_price() {

            var app = this

            var total_price = 0
            var total_multiple = 0
            for (const [huay_type, list] of Object.entries(app.my_number)) {
                if (list.length) {
                    for (var i = 0; i < list.length; i++) {
                        total_price += parseFloat(list[i].price * list[i].multiple);
                        total_multiple += parseInt(list[i].multiple);
                    }
                }
            }
            app.total_price = total_price;
            app.total_price_txt = numeral((total_price)).format('0,0.00')

            app.total_multiple = total_multiple;
            app.total_multiple_txt = numeral((total_multiple)).format('0,0.00')

            var uns = {};
            this.axios.post('/lottery_government', {
                    get_uns: true,
                    huay_category_id: app.huay_category_id,
                    huay_secret: app.huay_secret
                })
                .then(function(response) {
                    uns = response.data
                    console.log(uns)
                    if (uns) {
                        for (const [huay_type, list] of Object.entries(app.my_number)) {
                            if (list.length) {
                                for (var i = 0; i < list.length; i++) {

                                    try {
                                        if (uns[huay_type][list[i].number] !== undefined)
                                            app.my_number[huay_type][i].is_un = true;
                                        else
                                            app.my_number[huay_type][i].is_un = false;
                                    } catch {
                                        app.my_number[huay_type][i].is_un = false;

                                    }
                                }
                            }
                        }
                        app.$forceUpdate();
                    }
                })
                .catch(function(error) {
                    console.log(error)
                });
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
        },
        clear_last() {
            var input1 = $("#input1");
            var input2 = $("#input2");
            var input3 = $("#input3");
            var input4 = $("#input4");
            var input5 = $("#input5");

            if (input5.text() != "")
                input5.text("")
            else if (input4.text() != "")
                input4.text("")
            else if (input3.text() != "")
                input3.text("")
            else if (input2.text() != "")
                input2.text("")
            else if (input1.text() != "")
                input1.text("")
        },
        keymonitor: function(event) {
            if (this.page_index == 1) {
                if (event.keyCode >= 48 && event.keyCode <= 57) {
                    this.numpad(event.key);
                } else if (event.keyCode == 8)
                    this.clear_last();
            } else if (this.page_index == 2) {
                if (event.keyCode >= 48 && event.keyCode <= 57) {
                    this.numpad_shoot(event.key);
                    this.pull_yee_kee_list();
                } else if (event.keyCode == 8)
                    this.clear_last();
            }
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
                    var total_number = '';
                    for (const [key_obj, value] of Object.entries(this.option_huay)) {
                        if (value == true) {
                            if (key_obj != 'price_two_up' && key_obj != 'price_two_down')
                                var number = input1.text() + input2.text() + input3.text();
                            else if (key_obj == 'price_two_up' && this.input_digi == 3)
                                var number = input2.text() + input3.text();
                            else if (key_obj == 'price_two_down' && this.input_digi == 3)
                                var number = input2.text() + input3.text();
                            else if (key_obj == 'price_two_up' && this.input_digi == 2)
                                var number = input1.text() + input2.text();
                            else if (key_obj == 'price_two_down' && this.input_digi == 2)
                                var number = input1.text() + input2.text();
                            else
                                var number = input1.text() + input2.text();

                            //ฟิกค่าขั้นต่ำ

                            if (this.huay_category_id == '3')
                                var min = 10;
                            else
                                var min = 0;

                            var multiple = 1;
                            if (min)
                                multiple = min;
                            total_number += number + ",";
                            this.my_number[key_obj].push({
                                number: number,
                                number_type: key_obj,
                                is_duplicate: false,
                                multiple: multiple,
                                min: min,
                                multiple_txt: numeral(multiple).format('0,0.00'),
                                total_price: numeral((this[key_obj] * multiple)).format('0,0.00'),
                                price: this[key_obj],
                                date: new Date(),
                            });
                            this.cal_total_price();
                        }
                    }
                    var app = this;
                    setTimeout(function() {
                        Swal.fire({
                            position: 'top',
                            icon: 'success',
                            title: '<small class="text-center">เพิ่ม</small>&nbsp;<small class="text-center">' + total_number + "</small>",
                            showConfirmButton: false,
                            timer: 1000,
                            backdrop: true,
                        })
                        // //console.log(app.my_number)
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
                        this.my_number = {
                            price_tree_up: [],
                            price_tree_tod: [],
                            price_tree_front: [],
                            price_tree_down: [],
                            price_two_up: [],
                            price_two_down: [],
                            price_run_up: [],
                            price_run_down: [],
                        };
                        input1.text("");
                        input2.text("");
                        input3.text("");
                        this.refesh_my_number();

                        if (this.page_index == 3)
                            this.change_page(1);
                    }
                })
            } else if (number == -3) {
                var app = this;
                this.axios.post('/lottery_government', {
                        huay_secret: app.huay_secret,
                        number: app.my_number,
                        send_poy: true
                    })
                    .then(function(response) {
                        //console.log(response.data)
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '<small class="text-center">ส่งโพยสำเร็จ</small>&nbsp;<small class="text-center"></small>',
                            showConfirmButton: false,
                            timer: 1000,
                            backdrop: true,
                            width: 500,
                        });

                        app.my_number = {
                            price_tree_up: [],
                            price_tree_tod: [],
                            price_tree_front: [],
                            price_tree_down: [],
                            price_two_up: [],
                            price_two_down: [],
                            price_run_up: [],
                            price_run_down: [],
                        };
                        input1.text("");
                        input2.text("");
                        input3.text("");
                        app.refesh_my_number();
                        app.change_page(1);

                    })
                    .catch(function(error) {
                        var error_txt = '';
                        try {
                            error_txt = error.response.data.error
                        } catch {
                            error_txt = '?'
                        }
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: "<small class='text-center'>ส่งโพยไม่สำเร็จ</small>",
                            showConfirmButton: true,
                            backdrop: true,
                            width: 300,
                            html: "<small class='text-center'>" + error_txt + "</small>"
                        });
                    });
            }
        },
        numpad_shoot(number) {
            var input1 = $("#input1");
            var input2 = $("#input2");
            var input3 = $("#input3");
            var input4 = $("#input4");
            var input5 = $("#input5");

            if (number >= 0 && number <= 9) {
                var input_full = false;
                if (input1.text() == "") {
                    input1.text(number.toString());
                } else if (input2.text() == "") {
                    input2.text(number.toString());
                } else if (input3.text() == "") {
                    input3.text(number.toString());
                } else if (input4.text() == "") {
                    input4.text(number.toString());
                } else if (input5.text() == "") {
                    input5.text(number.toString());
                    input_full = true;
                }
            } else if (number == -1)
                this.clear_last()
            else if (number == -2) {
                function getRndInteger(min, max) {
                    return Math.floor(Math.random() * (max - min + 1)) + min;
                }
                input1.text(getRndInteger(0, 9));
                input2.text(getRndInteger(0, 9));
                input3.text(getRndInteger(0, 9));
                input4.text(getRndInteger(0, 9));
                input5.text(getRndInteger(0, 9));
            } else if (number == -3) {
                if (input5.text() != "") {
                    var number = input1.text() + input2.text() + input3.text() + input4.text() + input5.text();

                    var app = this;
                    this.axios.post('/lottery_government', {
                            huay_secret: this.huay_secret,
                            number: number,
                            shoot_number: true
                        })
                        .then(function(response) {
                            //console.log(response)

                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: '<small class="text-center">ยิงสำเร็จ</small>&nbsp;<small class="text-center">' + number + "</small>",
                                showConfirmButton: false,
                                timer: 1000,
                                backdrop: true,
                                width: 500,
                            });
                            app.pull_yee_kee_list();

                            input1.text('');
                            input2.text('');
                            input3.text('');
                            input4.text('');
                            input5.text('');

                            var intervalHandle = null;

                            function makeTimer() {
                                var endTime = new Date(response.data.next_time + " GMT+07:00");
                                endTime = (Date.parse(endTime) / 1000);

                                var now = new Date();
                                now = (Date.parse(now) / 1000);

                                var timeLeft = endTime - now;

                                var days = Math.floor(timeLeft / 86400);
                                var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                                var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
                                var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

                                if (now < endTime) {
                                    app.can_add = seconds;
                                } else {
                                    app.can_add = 0;
                                    clearInterval(intervalHandle)
                                    intervalHandle = null;
                                }


                            }
                            intervalHandle = setInterval(function() { makeTimer(); }, 1000);
                        })
                        .catch(function(error) {
                            //console.log(error)

                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: "<small class='text-center'>ไม่สามารถดำเนินการได้</small>",
                                showConfirmButton: true,
                                backdrop: true,
                                width: 300,
                            });
                        });



                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: "<small class='text-center'>กรุณาป้อน 5 ตัวเลข</small>",
                        showConfirmButton: true,
                        backdrop: true,
                        width: 300,
                    });
                }
            }
        },
        //PAGE 5
        load_number_list(id) {
            var app = this

            if (app.old_list[id] == undefined) {
                this.axios.post('/lottery_transaction', {
                        get_number_list: true,
                        huay_round_poy_id: id
                    })
                    .then(function(response) {
                        app.old_list[id] = response.data;
                        app.$forceUpdate();
                    })
                    .catch(function(error) {
                        //console.log(error)
                    });
            }
        },
        choose_set(id) {
            var app = this;
            if (app.old_list[id] == undefined) {
                this.axios.post('/lottery_transaction', {
                        get_number_list: true,
                        huay_round_poy_id: id
                    })
                    .then(function(response) {
                        app.set_to_variable(response.data)
                        // app.old_list[id] = response.data;
                        // app.$forceUpdate();
                    })
                    .catch(function(error) {
                        // //console.log(error)
                    });
            } else {
                //console.log(app.old_list)
                app.set_to_variable(app.old_list[id])
            }
        },
        // เอาเลข จาก Set มาใส่ Array แทง
        set_to_variable(datas) {

            //console.log("LOGGG")
            //console.log(datas)
            for (const [huay_type, list] of Object.entries(datas)) {


                if (list.length) {
                    for (var i = 0; i < list.length; i++) {
                        var info = list[i];
                        //console.log('-------')
                        //console.log(info);
                        //console.log('-------')

                        //ฟิกค่าขั้นต่ำ

                        if (this.huay_category_id == '3')
                            var min = 10;
                        else
                            var min = 0;

                        var multiple = 1;
                        if (min)
                            multiple = min;
                        this.my_number[huay_type].push({
                            number: info.number,
                            number_type: length,
                            is_duplicate: false,
                            multiple: multiple,
                            min: min,
                            multiple_txt: numeral(multiple).format('0,0.00'),
                            total_price: numeral((this[huay_type] * multiple)).format('0,0.00'),
                            price: this[huay_type],
                            date: new Date(),
                        });
                    }
                }
            }
            this.change_page(1);
            this.cal_duplicate();
            this.cal_total_price();
            this.refesh_my_number();
        }
    }

}
</script>
