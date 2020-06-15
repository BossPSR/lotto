@extends('frontend/option/layout')
@section('content')
<!-- jackpot begin -->
<div class="jackpot" style="background:#FFF; min-height:100vh">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                <a href="/index" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">ย้อนกลับ</button></a>
            </div>
        </div>
    </div>
    <div class="container shape-container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                <div class="single-jackpot">
                    <div class="part-head">

                        <div class="text" style="margin-left:25px;">
                            <span class="amount">ติดต่อเอเย่นต์</span>
                            <span class="draw-date"></span>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        if ($contacts) {
                            foreach ($contacts as $contact) {
                        ?>
                                <div class="col-md-2">
                                    <img src="{{$contact->image}}" data-filename="M.png" style="width: 180px;">
                                    <label>{{nl2br($contact->description)}}</label>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jackpot end -->

@endsection