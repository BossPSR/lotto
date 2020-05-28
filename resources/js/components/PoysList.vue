<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div v-for="(poy, index) in poy_list">
                    <a v-on:click="load_number_list(poy.id)" style="cursor:pointer;">
                        <div class="row border shadow rounded mb-3 p-2">
                            <div class="col-md-2 mt-2">
                                <label class="title">ลำดับ {{index+1}}</label>
                            </div>
                            <div class="col-md-6 text-center mt-2">
                                <label>{{poy.round_info.name}} ({{poy.code}})</label>
                            </div>
                            <div class="col-md-4 text-right">
                                <small class="date">สร้างเมื่อ<br> {{poy.datetime}}</small>
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
                                    <th style="width:1px">เล่น</th>
                                    <th style="width:1px" nowrap>ชนะ</th>
                                </tr>
                                <tr v-for="(item, index) in list">
                                    <td nowrap>{{ index+1}}.</td>
                                    <td>
                                    {{ item.number }}
                                    <label v-if="item.is_un == 1" class='text-danger'>(เลขอั้น)</label>
                                    </td>
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
    }
}
</script>
