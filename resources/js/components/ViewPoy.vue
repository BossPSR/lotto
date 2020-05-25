<template>
    <div class="row">
        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table data-list-view">
                    <thead>
                        <tr>
                            <th style="display:none;"></th>
                            <th>CATEGORY</th>
                            <th>NAME</th>
                            <th>Code</th>
                            <th>ผู้ใช้งาน</th>
                            <th>เมื่อ</th>
                            <th class="thincell">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(poy, index) in poy_list">
                            <td style="display:none;"></td>
                            <td class="product-category">{{poy.category_name}}</td>
                            <td class="product-name">{{poy.round_info.name}}</td>
                            <td class="product-name">{{poy.code}}</td>
                            <td class="product-name">{{poy.user_info.username}}</td>
                            <td class="product-category">{{poy.datetime}}</td>
                            <td class="text-right">
                                <button v-if="poy.id == view_id" class="btn btn-info btn-sm"><i class="fa fa-search"></i></button>
                                <button v-if="poy.id != view_id" class="btn btn-default btn-sm" v-on:click="load_number_list(poy.id)"><i class="fa fa-search"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div v-for="(poy, index) in poy_list">
                <a v-if=" old_list[poy.id] && old_list[poy.id].show == true" style="cursor:pointer;">
                    <div class="row border shadow rounded mb-3 p-2">
                        <div class="col-md-6 text-left mt-2">
                            <h5>{{poy.round_info.name}} ({{poy.code}})</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <small class="date">สร้างเมื่อ<br> {{poy.datetime}}</small>
                        </div>
                    </div>
                </a>
                <div v-bind:id="'poy-'+poy.id" v-if="old_list[poy.id] && old_list[poy.id].show">
                    <div v-for="(list, huay_type) in old_list[poy.id]">
                        <table class="table table-sm border">
                            <tr class="thead-dark">
                                <th style="width:1px"></th>
                                <th>{{type_name[huay_type]}}</th>
                                <th style="width:1px"></th>
                                <th style="width:1px">เล่น</th>
                                <th style="width:1px" nowrap>ชนะ</th>
                            </tr>
                            <tr v-for="(item, index) in list">
                                <td nowrap>{{ index+1}}.</td>
                                <td>{{ item.number }}</td>
                                <td v-if="item.is_won == -1" class='text-warning'>รอผล</td>
                                <td v-if="item.is_won == 1" class='text-success'>ชนะ</td>
                                <td v-if="item.is_won == 0" class='text-danger'>แพ้</td>
                                <td class='text-right' nowrap>{{ item.multiple_txt }} ฿</td>
                                <td class='text-right'>{{ item.total_price_txt }}</td>
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
    </div>
</template>

<script>
export default {
    props: {
        poy_list: {
            type: Array,
            default: []
        }
    },
    data: function() {
        return {
            view_id : 0,
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
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods: {
        load_number_list(id) {
            this.view_id = id
            var app = this
            console.log(this.old_list)
            for (const [poy_id, list] of Object.entries(this.old_list)) {
                this.old_list[poy_id].show = false;
            }

            if (app.old_list[id] == undefined) {
                this.axios.post('/admin/chit_huay', {
                        get_number_list: true,
                        huay_round_poy_id: id
                    })
                    .then(function(response) {
                        response.data.show = true;
                        app.old_list[id] = response.data;
                        app.$forceUpdate();
                    })
                    .catch(function(error) {
                        console.log(error)
                    });
            }
            else
                this.old_list[id].show = true;

            console.log(app.old_list)
        },
    }
}
</script>
