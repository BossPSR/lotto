<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6" v-if="page == 1">
                <div class="text-right mb-2">
                    <button v-if="huay_category_list.length > 0" class="btn btn-sm btn-success " v-on:click="change_page(2)">สร้างเลขชุด</button>
                </div>
                <div class="alert alert-danger" v-if="huay_category_list.length == 0" style="display: flex; justify-content: space-between;">
                    <label>ยังไม่มีเลขชุด</label>
                    <button class="btn btn-sm btn-success" v-on:click="change_page(2)">สร้างเลขชุด</button>
                </div>
    
                <div class="table-responsive">
                    <table class="table data-list-view">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th style='width:1%'>#</th>
                                <th>หวย</th>
                                <th style='width:1%'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(huay_category, index) in huay_categorys">
                                <td style="display:none;"></td>
                                <td class="product-name">{{index+1}}.</td>
                                <td class="product-name">{{huay_category.name}}</td>
                                <td class="text-right">
                                    <button v-if="huay_category.id == view_id" class="btn btn-info btn-sm"><i class="fa fa-search"></i></button>
                                    <button v-if="huay_category.id != view_id" class="btn btn-default btn-sm" v-on:click="load_number_list(huay_category.id)"><i class="fa fa-search"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6" v-if="view_id != 0">
                <form methods="POST" class='border p-2 rounded bg-white' v-on:submit="add_huay_category_un()">
                    <a v-if="my_number.length > 0 && my_number[0].number != ''" class='btn btn-danger text-white btn-sm col-md-4' v-on:click="clear_huay_uns()">ล้างเลขอั้น</a>
                    <div class="row">
                        <div class='col-md-3 col-sm-3 col-3'>
                            <label>เลขอั้น</label>
                        </div>
                        <div class='col-md-3 col-sm-3 col-3'>
                            <label>เลข</label>
                        </div>
                        <div class='col-md-3 col-sm-3 col-3'>
                            <label>ยอดรวมการแทงต่องวด <small class="text-danger"> (0 คือไม่จำกัด)</small></label>
                        </div>
                    </div>
                    <div id="number-add-list">
                        <div class='row mb-2' v-for="(data, index) in my_number">
                            <div class='col-md-3 col-sm-3 col-3'>
                                <select class='form-control' v-on:change="change_huay_type(index, $event.target.value)" required>
                                                <option v-for="(name, huay_type) in type_name"  v-bind:value="huay_type">{{name}}</option>
                                            </select>
                            </div>
                            <div class='col-md-3 col-sm-3 col-3'>
                                <input type='text' name='number[]' v-on:keypress="check_input($event)" v-on:keyup="change_number($event, index)" v-bind:value="data.number" class='form-control' placeholder='ใส่ตัวเลขเท่านั้น' v-bind:maxlength="data.number_length" v-bind:minlength="data.number_length"
                                    required>
                            </div>
                            <div class='col-md-3 col-sm-3 col-3'>
                                <input v-if="data.max_price > 0" type='number' name='max_price[]' v-on:keyup="change_max_price($event, index)" v-bind:value="data.max_price" min="0" step="0.01" class='form-control' placeholder='ยอดรวมการแทงต่องวด'>
                                <input v-if="data.max_price == 0" type='number' name='max_price[]' v-on:keyup="change_max_price($event, index)" min="0" step="0.01" class='form-control' placeholder='ยอดรวมการแทงต่องวด'>
                            </div>
                            <div class='col-md-2' v-if="data.can_delete">
                                <a type='text' v-on:click="delete_row(index)" class='btn-sm btn btn-danger text-white mt-1'>ลบ</a>
                            </div>
                        </div>
                        <a class='btn btn-info btn-sm text-white' v-on:click="add_row()">เพิ่มรายการ</a>
                    </div>
                    <div class='row m-0 mt-2'>
                        <a class='btn btn-warning text-white btn-sm col-md-6' v-on:click="clear_view_id()">ย้อนกลับ</a>
                        <button class='btn btn-primary btn-sm text-white col-md-6 float-right'>บันทึก</button>
                    </div>
                </form>
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
        }
    },
    data: function() {
        return {
            view_id: 0,
            huay_category_list: {},
            page: 1,
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
            type_no: {
                price_tree_up: 3,
                price_tree_tod: 3,
                price_tree_front: 3,
                price_tree_down: 3,
                price_two_up: 2,
                price_two_down: 2,
                price_run_up: 1,
                price_run_down: 1,
            },
            my_number: [{
                number: "",
                huay_type: "price_tree_up",
                number_length: 3,
                max_price: 0,
                can_delete: false,
            }],
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods: {
        clear_view_id() {
            this.view_id = 0;
        },
        load_number_list(id) {
            var app = this

            app.my_number =  [{
                number: "",
                huay_type: "price_tree_up",
                number_length: 3,
                max_price: 0,
                can_delete: false,
            }];
            app.view_id = id;

            this.axios.post('/admin/un_huay', {
                    get_number_list: true,
                    huay_category_id: id
                })
                .then(function(response) {
                    console.log(response.data)
                    if(response.data.length)
                        app.my_number = response.data;
                    app.$forceUpdate();
                })
                .catch(function(error) {
                    console.log(error)
                });
            console.log(app.old_list)
        },
        change_page(page) {
            this.page = page;
        },
        check_input(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                event.preventDefault()
                return false;
            }
            return true;
        },
        change_number(evt, index) {
            this.my_number[index].number = evt.target.value;

        },
        change_max_price(evt, index) {
            this.my_number[index].max_price = evt.target.value;
        },
        add_row() {
            var temp = {
                number: "",
                huay_type: "price_tree_up",
                number_length: 3,
                can_delete: true,
                max_price: 0
            };
            this.my_number.push(temp)
        },
        change_huay_type(index, huay_type) {
            this.my_number[index].huay_type = huay_type;

            var old_length = this.my_number[index].number_length;
            this.my_number[index].number_length = this.type_no[huay_type];

            console.log(this.my_number[index].number.length)
            if (old_length > this.type_no[huay_type]) {
                var new_number = '';
                if (this.my_number[index].number.length > 0) {
                    for (var i = 0; i < this.type_no[huay_type]; i++) {
                        new_number += this.my_number[index].number[i];
                        console.log(new_number)
                    }
                }
                this.my_number[index].number = new_number;
            }


        },
        add_huay_category_un() {
            var app = this;
            this.axios.post('/admin/un_huay', {
                    add_huay_category_un: true,
                    huay_category_id: this.view_id,
                    number_array: this.my_number,
                })
                .then(function(response) {
                    console.log(response.data)
                    Swal.fire(
                        'เลขอั้น!',
                        'บันทึกสำเร็จแล้ว.',
                        'success'
                    )
                })
                .catch(function(error) {
                    console.log(error)
                });

            event.preventDefault();


        },
        delete_row(index) {
            this.my_number.splice(index, 1);
        },
        clear_huay_uns(index) {
            var app = this;
            Swal.fire({
                title: 'แน่ใจที่จะล้าง?',
                text: "เลขอั้นประเภทนี้ทั้งหมดจะหายไป!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ลบมัน!',
                cancelButtonText: 'ยกเลิก!'
            }).then((result) => {
                if (result.value) {

                    this.axios.post('/admin/un_huay', {
                            clear_huay_uns: true,
                            huay_category_id: app.view_id
                        })
                        .then(function(response) {
                            Swal.fire(
                                'ล้าง!',
                                'สำเร็จแล้ว.',
                                'success'
                            )
                            app.view_id = 0;
                        })
                        .catch(function(error) {
                            console.log(error)
                        });


                }
            })
        }
    }
}
</script>
