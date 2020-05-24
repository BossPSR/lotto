<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12" v-if="page == 1">
                <div class="text-right mb-2">
                    <button v-if="poy_list.length > 0" class="btn btn-sm btn-success " v-on:click="change_page(2)">สร้างเลขชุด</button>
                </div>
                <div class="alert alert-danger" v-if="poy_list.length == 0" style="display: flex; justify-content: space-between;">
                    <label>ยังไม่มีเลขชุด</label>
                    <button class="btn btn-sm btn-success" v-on:click="change_page(2)">สร้างเลขชุด</button>
                </div>
    
                <div v-for="(poy, index) in poy_list">
                    <a v-on:click="load_number_list(poy.id)" style="cursor:pointer;">
                        <div class="row border shadow rounded mb-3 p-2">
                            <div class="col-md-2 mt-2">
                                <label class="title">ลำดับ {{index+1}}</label>
                            </div>
                            <div class="col-md-6 text-center mt-2">
                                <label>{{poy.name}}</label>
                            </div>
                            <div class="col-md-3 text-right">
                                <small class="date">สร้างเมื่อ<br> {{poy.datetime}}</small>
                            </div>
                            <div class="col-md-1 text-right">
                                <button v-on:click="delete_set(index)" class='btn btn-danger btn-sm mt-1 w-100'>ลบ</button>
                            </div>
                        </div>
                    </a>
                    <div v-bind:id="'poy-'+poy.id" v-if="old_list[poy.id]">
                        <div v-for="(list, huay_type) in old_list[poy.id]">
                            <table class="table table-sm border">
                                <tr class="thead-dark">
                                    <th style="width:1px"></th>
                                    <th>{{type_name[huay_type]}}</th>
                                </tr>
                                <tr v-for="(item, index) in list">
                                    <td nowrap>{{ index+1}}.</td>
                                    <td>{{ item.number }}</td>
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
            <div class="col-md-12" v-if="page == 2">
                <button class="btn btn-sm btn-warning mb-2" v-on:click="change_page(1)">ย้อนกลับ</button>
                <form methods="POST" class='border p-2 rounded' v-on:submit="add_custom_poy()">
                    <label>ชื่อเลขชุด</label>
                    <input type='text' name='name' id="name" class='form-control' required>
                    <label>ชุดตัวเลข</label>
                    <div id="number-add-list">
                        <div class='row mb-2' v-for="(data, index) in my_number">
                            <div class='col-md-2'>
                                <select class='form-control' v-on:change="change_huay_type(index, $event.target.value)" required>
                                                                            <option v-for="(name, huay_type) in type_name"  v-bind:value="huay_type">{{name}}</option>
                                                                        </select>
                            </div>
                            <div class='col-md-5'>
                                <input type='text' name='number[]' v-on:keypress="check_input($event)" v-on:keyup="change_number($event, index)" v-bind:value="data.number" class='form-control' placeholder='ใส่ตัวเลขเท่านั้น' v-bind:maxlength="data.number_length" v-bind:minlength="data.number_length"
                                    required>
                            </div>
                            <div class='col-md-1' v-if="data.can_delete">
                                <a type='text' v-on:click="delete_row(index)" class='btn-sm btn btn-danger text-white mt-1'>ลบ</a>
                            </div>
                        </div>
                        <a class='btn btn-info btn-sm text-white' v-on:click="add_row()">เพิ่มรายการ</a>
                    </div>
                    <div class='row m-0 mt-2'>
                        <a class='btn btn-outline-danger btn-sm col-md-6' v-on:click="change_page(1)">ยกเลิก</a>
                        <button class='btn btn-primary btn-sm text-white col-md-6'>บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {},
    data: function() {
        return {
            poy_list: {},
            page: 1,
            old_list: [],
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
                can_delete: false,
            }],
        }
    },
    mounted() {
        console.log('Component mounted.')
        this.pull_list();
    },
    methods: {
        pull_list() {
            var app = this;
            this.axios.post('/lottery_number_set', {
                    get_poy_list: true,
                })
                .then(function(response) {
                    console.log(response.data)
                    app.poy_list = response.data;
                })
                .catch(function(error) {
                    console.log(error)
                });
        },
        load_number_list(id) {
            var app = this

            if (app.old_list[id] == undefined) {
                this.axios.post('/lottery_transaction', {
                        get_number_list: true,
                        huay_round_poy_id: id
                    })
                    .then(function(response) {
                        console.log(response.data)
                        app.old_list[id] = response.data;
                        app.$forceUpdate();
                    })
                    .catch(function(error) {
                        console.log(error)
                    });
            }
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
        add_row() {
            var temp = {
                number: "",
                huay_type: "price_tree_up",
                number_length: 3,
                can_delete: true
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
        add_custom_poy() {
            var app = this;
            this.axios.post('/lottery_number_set', {
                    add_custom_poy: true,
                    name: $('#name').val(),
                    number_array: this.my_number,
                })
                .then(function(response) {
                    console.log(response.data)
                    app.change_page(1)
                    app.pull_list()
                })
                .catch(function(error) {
                    console.log(error)
                });

        },
        delete_row(index) {
            this.my_number.splice(index, 1);
        },
        delete_set(index) {
            var app = this;
            Swal.fire({
                title: 'แน่ใจที่จะลบ?',
                text: "โพยนี้จะหายไป!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ลบมัน!',
                cancelButtonText: 'ยกเลิก!'
            }).then((result) => {
                if (result.value) {

                    this.axios.post('/lottery_transaction', {
                            delete_poy: true,
                            huay_round_poy_id: app.poy_list[index].id
                        })
                        .then(function(response) {
                            app.poy_list.splice(index, 1);
                            Swal.fire(
                                'ลบ!',
                                'สำเร็จแล้ว.',
                                'success'
                            )
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
