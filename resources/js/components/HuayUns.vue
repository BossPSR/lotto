
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
      <div class="col-md-4" v-if="page == 0">
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
              <tr v-for="(huay_category, index) in huay_categorys">
                <td style="display:none;"></td>
                <td class="product-name">{{index+1}}.</td>
                <td class="product-name">{{huay_category.name}}</td>
                <td class="text-right">
                  <button v-if="huay_category.id == view_id" class="btn btn-info btn-md">
                    <i class="fa fa-search"></i>
                  </button>
                  <button
                    v-if="huay_category.id != view_id"
                    class="btn btn-default btn-md"
                    v-on:click="change_page(huay_category.id)"
                  >
                    <i class="fa fa-search"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-4" v-if="page != 0">
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
                  <button
                    v-if="huay.id != view_id"
                    v-on:click="change_huay_id(huay.id)"
                    class="btn btn-default btn-md"
                  >
                    <i class="fa fa-search"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-8" v-if="view_id != 0">
        <form methods="POST" v-on:submit="add_huay_category_un()">
          <select
            id="select_type"
            class="form-control mb-2"
            v-on:change="change_huay_type($event.target.value)"
            required
          >
            <option value disabled selected>เลือกประเภทเลข</option>
            <option v-for="(name, huay_type) in type_name" v-bind:value="huay_type">{{name}}</option>
          </select>
          <div class="border p-2 rounded bg-white">
            <div class="row" v-if="my_number.length > 0">
              <div class="col-md-2 col-md-2 col-2">
                <label>เลข</label>
              </div>
              <div class="col-md-4 col-md-4 col-4 text-center">
                <label>
                  ยอดรวมต่องวด
                  <small class="text-danger">
                    <br />(0 คือไม่จำกัด)
                  </small>
                </label>
                <input
                  id="change_all"
                  class="form-control mb-1"
                  type="number"
                  min="0"
                  step="0.01"
                  v-on:keyup="change_number_all($event.target.value)"
                  placeholder="เปลี่ยนทั้งหมด"
                />
              </div>
              <div class="col-md-4 col-md-4 col-4">
                <label>อั้น</label>
              </div>
            </div>
            <div id="number-add-list">
              <div class="row mb-1" v-for="(data, index) in my_number">
                <div class="col-md-2 col-md-2 col-2">
                  <input
                    type="text"
                    class="text-center form-control"
                    name="number[]"
                    v-bind:value="data.number"
                    placeholder="ใส่ตัวเลขเท่านั้น"
                    v-bind:maxlength="data.number_length"
                    v-bind:minlength="data.number_length"
                    required
                    readonly
                  />
                </div>
                <div class="col-md-4 col-md-4 col-4">
                  <input
                    v-if="data.max_price > 0"
                    type="number"
                    name="max_price[]"
                    v-on:keyup="change_max_price($event, index)"
                    v-bind:value="data.max_price"
                    min="0"
                    step="0.01"
                    class="form-control"
                    placeholder="ยอดรวมการแทงต่องวด"
                  />
                  <input
                    v-if="data.max_price == 0"
                    type="number"
                    name="max_price[]"
                    v-on:keyup="change_max_price($event, index)"
                    min="0"
                    step="0.01"
                    class="form-control"
                    placeholder="ยอดรวมการแทงต่องวด"
                  />
                </div>
                <div class="col-md-4 col-md-4 col-4">
                  <input
                    v-if="data.over_percent > 0"
                    type="number"
                    name="over_percent[]"
                    v-on:keyup="change_over_percent($event, index)"
                    v-bind:value="data.over_percent"
                    min="0"
                    step="0.01"
                    class="form-control"
                    placeholder="ราคาเมื่อเกินยอดรวม"
                  />
                  <input
                    v-if="data.over_percent == 0"
                    type="number"
                    name="over_percent[]"
                    v-on:keyup="change_over_percent($event, index)"
                    min="0"
                    step="0.01"
                    value="0"
                    class="form-control"
                    placeholder="ราคาเมื่อเกินยอดรวม"
                  />
                </div>
                <div class="col-md-2 col-md-2 col-2">
                  <a
                    v-if="data.is_enable == 1"
                    type="checkbox"
                    class="btn btn-success btn-md"
                    name="is_enable[]"
                    v-on:click="change_is_enable(0, index)"
                  >
                    <i class="fa fa-check"></i>
                  </a>
                  <a
                    v-if="data.is_enable == 0"
                    type="checkbox"
                    class="btn btn-light btn-md"
                    name="is_enable[]"
                    v-on:click="change_is_enable(1, index)"
                  >
                    <i class="fa fa-check"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="row m-0 mt-2">
              <a
                class="btn btn-warning text-white btn-md col-md-6"
                v-on:click="clear_view_id()"
              >ย้อนกลับ</a>
              <button
                class="btn btn-primary btn-md text-white col-md-6 float-right"
                v-if="my_number.length > 0"
              >บันทึก</button>
            </div>
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
      huay_type: ""
    };
  },
  mounted() {
    // console.log('Component mounted.')
  },
  methods: {
    change_huay_id(id) {
      this.huay_id = id;
      this.view_id = id;

      $("#select_type option").each(function() {
        if (this.defaultSelected) {
          this.selected = true;
          return false;
        }
      });
      this.my_number = [];

      this.type_name = {
        price_tree_up: "สามตัวบน",
        price_tree_tod: "สามตัวโต๊ด",
        price_tree_front: "สามตัวหน้า",
        price_tree_down: "สามตัวหลัง",
        price_two_up: "สองตัวบน",
        price_two_down: "สองตัวล่าง",
        price_run_up: "วิ่งบน",
        price_run_down: "วิ่งล่าง"
      };

      const app = this;

      this.axios
        .post("/admin/un_huay", {
          get_huay_info: true,
          huay_id: this.huay_id
        })
        .then(function(response) {
          for (const k in app.type_name) {
            if (response.data[k] == -1.0) {
              delete app.type_name[k];
            }
          }
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
    change_page(page) {
      this.page = page;
    },
    change_number_all(amount) {
      for (var i = 0; i < this.my_number.length; i++) {
        this.my_number[i].max_price = amount;
      }
    },
    add_row(type_name, number, length) {
      var temp = {
        number: number,
        huay_type: type_name,
        number_length: length,
        can_delete: true,
        max_price: 0,
        over_percent: 0,
        is_enable: 0
      };
      this.my_number.push(temp);
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

      // this.my_number[index].huay_type = huay_type;

      // var old_length = this.my_number[index].number_length;
      // this.my_number[index].number_length = this.type_no[huay_type];

      //// console.log(this.my_number[index].number.length)
      // if (old_length > this.type_no[huay_type]) {
      //     var new_number = '';
      //     if (this.my_number[index].number.length > 0) {
      //         for (var i = 0; i < this.type_no[huay_type]; i++) {
      //             new_number += this.my_number[index].number[i];
      //            // console.log(new_number)
      //         }
      //     }
      //     this.my_number[index].number = new_number;
      // }
      // console.log(huay_type)
      // console.log(this.type_no[huay_type])
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
