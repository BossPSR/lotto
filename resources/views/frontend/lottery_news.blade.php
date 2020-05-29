@extends('frontend/option/layout_member')
@section('contact_member')

<!-- jackpot begin -->
<div class="jackpot" style="background:#FED63E; min-height:100vh">
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
                            <span class="amount">ข่าวประชาสัมพันธ์</span>
                            <span class="draw-date"></span>
                        </div>
                    </div>
                    <div class="part-body">
                        @if(count($contents))
                        @foreach($contents as $content)
                        <div class="d-flex">
                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                <div class="single-jackpot">
                                    <div class="part-head">
                                        <div class="icon">
                                            <img src="assets/img/svg/euro-jackpot.png" alt="">
                                        </div>
                                        <div class="text">
                                            <span class="amount">{{$content->title}}</span>
                                            <span class="draw-date">{{ date('d M Y', strtotime($content->created_at))}}</span>
                                        </div>
                                    </div>
                                    <div class="part-body">
                                    {{nl2br($content->description)}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- jackpot end -->
@endsection
