@extends('frontend/option/layout_member')
@section('contact_member')
<?php
// echo '<pre>';
// print_r($huay_round);
// echo '</pre>';
$_GET['huay_secret'] = isset($_GET['huay_secret']) ? $_GET['huay_secret'] : '';
?>
<!-- jackpot begin -->
<div class="jackpot" style="background:#6f39d5; min-height: calc(100vh - 50px);" >
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 form-group" id="test">
                <a href="/lottery_play" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">ย้อนกลับ</button></a>
            </div>
        </div>
    </div>
    <div class="container shape-container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                <div class="single-jackpot">
                    <div class="part-head">
                        <div class="text">
                            <span class="amount">{{$huay_round->name}}</span>
                            <span class="draw-date"></span>
                        </div>
                    </div>
                    <?php

                    ?>
                    <div id="app">
                        <input-number
                        :can_shoot="{{$huay_round->can_shoot}}"
                        :price_tree_up="{{$huay_round->price_tree_up}}"
                        :price_tree_tod="{{$huay_round->price_tree_tod}}"
                        :price_tree_front="{{$huay_round->price_tree_front}}"
                        :price_tree_down="{{$huay_round->price_tree_down}}"
                        :price_two_up="{{$huay_round->price_two_up}}"
                        :price_two_down="{{$huay_round->price_two_down}}"
                        :price_run_up="{{$huay_round->price_run_up}}"
                        :price_run_down="{{$huay_round->price_run_down}}"
                        :huay_secret="'{{$huay_round->secret}}'"
                        :huay_category_id="'{{$huay_round->huay_category_id}}'"
                        ></input-number>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- jackpot end -->
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="js/app.js"></script>
<script>
    var csrf_token = '{{ csrf_token() }}';
</script>
@endsection
