@extends('frontend/option/layout_member')
@section('contact_member')

<!-- jackpot begin -->
<div class="jackpot" style="background:#7A58BF; min-height:100vh">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                <a href="/index_member" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">ย้อนกลับ</button></a>
            </div>
        </div>
    </div>
    <div class="container shape-container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                <div class="single-jackpot">
                    <div class="part-head">
                        <div class="text" style="margin-left:25px;">
                            <span class="amount">รายการโพย</span>
                        </div>
                    </div>
                    
                    <div id="app">
                        <poy-list
                        :poy_list="{{json_encode($poy_list)}}"></poy-list>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/app.js"></script>
<script>
    var csrf_token = '{{ csrf_token() }}';
</script>
<!-- jackpot end -->
@endsection