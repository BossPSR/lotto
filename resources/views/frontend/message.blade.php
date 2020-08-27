@extends('frontend/option/layout_member')
@section('contact_member')
<!-- jackpot begin -->
<div class="jackpot" style="background:#FFF; min-height:100vh">
    <div class="container">
        <div class="row">
            {{-- <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                <a href="/index_member" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">ย้อนกลับ</button></a>
            </div> --}}
        </div>
    </div>
    <div class="container shape-container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                <div class="single-jackpot">
                    <div class="part-head"style="display: block;">

                        <div class="text row" style="margin-left:25px;">
                            <div class="col-6">
                                <span class="amount" style="color:#6f39d5">กล่องจดหมาย</span>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/index_member" style="display: inline-block; font-size: 20px; background-color: #6f39d5;color:#FFF" class="btn btn-warning">ย้อนกลับ</a>

                            </div>

                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-12 mb-2 pr-1">
                            <div id="app" style="height: 517px;z-index:99; background : -webkit-linear-gradient(473deg, #6f39d5 20%, #6f39d5 100%); font-size:25px; padding-top:15px;" class="col-md-12 col-sm-12 col-lg-12 col-xl-12 mr-2 ml-3  border text-white rounded">
                                <chat></chat>
                            </div>
                            <script src="js/app.js"></script>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jackpot end -->
<script>
    var csrf_token = '{{ csrf_token() }}';

</script>
@endsection
