
<style>
td {
    padding: 10px !important;
}

input {
    height: 30px !important;
}
</style>

<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">สถิติการแทงแต่ละรอบ</h4>
                    </div>
                    <div class="card-content row p-2">
                        <div class="col-md-4" v-if="page == 0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="display:none;"></th>
                                            <th style="width:1%">#</th>
                                            <th>หวย</th>
                                            <th style="width:1%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(huay_category, index) in huay_categorys">
                                            <td style="display:none;"></td>
                                            <td class="product-name">{{index+1}}.</td>
                                            <td class="product-name">{{huay_category.name}}</td>
                                            <td class="text-right">
                                                <button v-if="huay_category.id == view_id" class="btn btn-info btn-md">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                <button v-if="huay_category.id != view_id" class="btn btn-default btn-md" v-on:click="change_page(huay_category.id)">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4" v-if="page != 0 && page != 'view_poy'">
                            <a class="btn btn-warning btn-md text-white" v-on:click="change_page(0)">ย้อนกลับ</a>
                            <div class="table-responsive">
                                <table class="table data-list-view">
                                    <thead>
                                        <tr>
                                            <th style="display:none;"></th>
                                            <th style="width:1%">#</th>
                                            <th>หวย</th>
                                            <th style="width:1%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(huay, index) in huay_by_category_id[page]">
                                            <td style="display:none;"></td>
                                            <td class="product-name">{{index+1}}.</td>
                                            <td class="product-name">{{huay.name}}</td>
                                            <td class="text-right">
                                                <button v-if="huay.id == view_id" class="btn btn-info btn-md">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                <button v-if="huay.id != view_id" v-on:click="change_huay_id(huay.id)" class="btn btn-default btn-md">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-8" v-if="view_id != 0  && page != 'view_poy'">
                            <form methods="POST">
                                <select id="select_round" class="form-control mb-2" v-on:change="change_round($event.target.value)" required>
                                    <option value disabled selected>เลือกรอบหวย</option>
                                    <option v-for="(data, index) in huay_rounds" v-bind:value="data.id">{{data.name + " "+data.end_datetime}}</option>
                                </select>
                            </form>
                            <form methods="POST">
                                <select id="select_type" class="form-control mb-2" v-on:change="change_round(null ,$event.target.value)" required>
                                    <option value  selected>แสดงประเภทเลขตัวเลขทั้งหมด</option>
                                    <option v-for="(name, huay_type) in type_name" v-bind:value="huay_type">{{name}}</option>
                                </select>
                            </form>
    
                            <div class="border p-2 rounded bg-white">
                                <div id="number-add-list">
                                    <div class="row mb-1" v-for="(data, index) in my_number" style="font-size:25px;">
                                        <div class="col-md-6 col-md-6 col-6 text-center rounded border">
                                            <b class=""> {{data.number}} </b>
                                        </div>
                                        <div class="col-md-6 col-md-6 col-6  text-center">
                                            <b class="text-success">แทง {{data.count}} ครั้ง</b>
                                            <br>
                                            <a v-if="data.count > 0" class="btn btn-warning text-white border" style="font-size:16px; padding:5px;"  v-on:click="view_poy(data.poy_list)">ดูโพย</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" v-if="page != 0 && page == 'view_poy'">
                            <a class="btn btn-warning btn-md text-white" v-on:click="change_page(old_page)">ย้อนกลับ</a>
                            <div class="table-responsive">
                                <table class="table data-list-view">
                                    <thead>
                                        <tr>
                                            <th style="display:none;"></th>
                                            <th style="width:1%">#</th>
                                            <th>เลข</th>
                                            <th>เลขโพย</th>
                                            <th style="width:1%">ราคา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(number_info, index) in view_poy_data">
                                            <td style="display:none;"></td>
                                            <td class="product-name">{{index+1}}.</td>
                                            <td class="product-name">{{number_info.number}}</td>
                                            <td class="product-name">{{number_info.poy_code}}</td>
                                            <td class="product-name text-center">{{number_info.multiple}}</td>
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
</template>

<script>
export default {
    props: {
        huay_categorys: {
            type: Array,
            default: []
        },
        huay_by_category_id: {
            type: Object,
            default: []
        }
    },
    data: function() {
        return {
            view_id: 0,
            huay_category_list: {},
            page: 0,
            huay_id: 0,
            huay_round_id: 0,
            type_name: {
                price_tree_up: "สามตัวบน",
                price_tree_tod: "สามตัวโต๊ด",
                price_tree_front: "สามตัวหน้า",
                price_tree_down: "สามตัวหลัง",
                price_two_up: "สองตัวบน",
                price_two_down: "สองตัวล่าง",
                price_run_up: "วิ่งบน",
                price_run_down: "วิ่งล่าง"
            },
            type_no: {
                price_tree_up: 3,
                price_tree_tod: 3,
                price_tree_front: 3,
                price_tree_down: 3,
                price_two_up: 2,
                price_two_down: 2,
                price_run_up: 1,
                price_run_down: 1
            },
            my_number: [],
            huay_rounds: [],
            view_poy_data: [],
            huay_type: "",
            old_page: ""
        };
    },
    mounted() {
        // console.log('Component mounted.')
    },
    methods: {
        change_huay_id(id) {
            this.huay_id = id;
            this.view_id = id;
            const app = this;

            this.axios
                .post("/admin/index_admin", {
                    get_huay_rounds: true,
                    huay_id: this.huay_id
                })
                .then(function(response) {
                    app.huay_rounds = response.data
                    app.$forceUpdate()
                })
                .catch(function(error) {
                    // console.log(error)
                });

            $("#select_round option").each(function() {
                if (this.defaultSelected) {
                    this.selected = true;
                    return false;
                }
            });
            this.my_number = []
        },
        change_round(id = null, huay_type = null) {
            if (id)
                this.huay_round_id = id;
            const app = this;

            if (id) {
                $("#select_type option").each(function() {
                    if (this.defaultSelected) {
                        this.selected = true;
                        return false;
                    }
                });
            }

            this.axios
                .post("/admin/index_admin", {
                    get_stat_number_by_round_id: true,
                    huay_round_id: this.huay_round_id,
                    huay_type: huay_type
                })
                .then(function(response) {
                    app.my_number = response.data
                    console.log(response.data)


                    app.$forceUpdate()
                })
                .catch(function(error) {
                    // console.log(error)
                });
        },
        clear_view_id() {
            this.view_id = 0;
            this.my_number = [];
        },
        load_number_list(huay_type) {
            var app = this;
            // console.log(this.huay_id)
            // console.log(huay_type)

            this.axios
                .post("/admin/un_huay", {
                    get_number_list: true,
                    huay_category_id: this.page,
                    huay_id: this.huay_id,
                    huay_type: huay_type
                })
                .then(function(response) {
                    // console.log(response.data)
                    if (response.data.length) app.my_number = response.data;
                    app.$forceUpdate();
                })
                .catch(function(error) {
                    // console.log(error)
                });
            // console.log(app.old_list)
        },
        view_poy(poy_number_list)
        {
            console.log(poy_number_list)
            this.view_poy_data = poy_number_list
            this.old_page = this.page
            this.change_page('view_poy')
        },
        change_page(page) {
            this.page = page;
        },
        change_number_all(amount) {
            for (var i = 0; i < this.my_number.length; i++) {
                this.my_number[i].max_price = amount;
            }
        },

        change_max_price(evt, index) {
            this.my_number[index].max_price = evt.target.value;
        },
        change_over_percent(evt, index) {
            this.my_number[index].over_percent = evt.target.value;
        },
        change_is_enable(evt, index) {
            console.log(evt);
            this.my_number[index].is_enable = evt;
        },
        change_huay_type(huay_type) {
            this.my_number = [];
            this.huay_type = huay_type;
            $("#change_all").val("");

            if (this.type_no[huay_type] == 3) {
                for (var i = 0; i < 1000; i++) {
                    var str = "" + i;
                    var pad = "000";
                    var ans = pad.substring(0, pad.length - str.length) + str;
                    this.add_row(huay_type, ans, 3);
                }
            } else if (this.type_no[huay_type] == 2) {
                for (var i = 0; i < 100; i++) {
                    var str = "" + i;
                    var pad = "00";
                    var ans = pad.substring(0, pad.length - str.length) + str;
                    this.add_row(huay_type, ans, 2);
                }
            } else if (this.type_no[huay_type] == 1) {
                for (var i = 0; i < 10; i++) {
                    var str = "" + i;
                    var pad = "0";
                    var ans = pad.substring(0, pad.length - str.length) + str;
                    this.add_row(huay_type, ans, 1);
                }
            }

            this.load_number_list(huay_type);
        },
        add_huay_category_un() {
            var app = this;
            this.axios
                .post("/admin/un_huay", {
                    add_huay_category_un: true,
                    huay_category_id: this.view_id,
                    huay_id: this.huay_id,
                    number_array: this.my_number,
                    huay_type: this.huay_type
                })
                .then(function(response) {
                    // console.log(response.data)
                    Swal.fire("เลขอั้น!", "บันทึกสำเร็จแล้ว.", "success");
                })
                .catch(function(error) {
                    // console.log(error)
                });

            event.preventDefault();
        }
    }
};
</script>
