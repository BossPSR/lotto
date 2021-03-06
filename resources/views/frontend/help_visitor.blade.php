@extends('frontend/option/layout')
@section('content')
<!-- jackpot begin -->
<div class="jackpot" style="background:#FFF; min-height:100vh">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                <a href="/index" style="display: inline-block;"><button type="button" style="display: inline-block;font-size: 20px; background-color: #6f39d5;color:#FFF" class="btn btn-warning">ย้อนกลับ</button></a>
            </div>
        </div>
    </div>
    <div class="container shape-container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                <div class="single-jackpot">
                    <div class="part-head">
                        <div class="text" style="margin-left:25px;">
                            <span class="amount">วิธีการใช้งาน</span>
                            <span class="draw-date"></span>
                        </div>
                    </div>
                    <div class="part-body">
                        <div class="d-flex">
                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                <div class="single-jackpot">
                                    <div class="row">
                                        <?php
                                        if ($player_rules) {
                                            foreach ($player_rules as $rule) {
                                                echo '<button type="button" class="btn btn-warning new_story mr-2 mb-2" onClick="toggle(\'info-' . $rule->id . '\');" value="help_list1">' . $rule->title . '</button>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="part-body">
                                        <div id="help_list">
                                            <?php
                                            if ($player_rules) {
                                                foreach ($player_rules as $rule) {
                                            ?>
                                                    <div class="text-center player-info" id="info-{{$rule->id}}" style="height: auto; display:none;">
                                                        @if($rule->image != '')
                                                        <img src="{{url($rule->image)}}" >
                                                        <br>
                                                        @endif
                                                        {{nl2br($rule->description)}}
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
                </div>
            </div>
        </div>
    </div>

</div>
<!-- jackpot end -->
<script>
    function toggle(id) {
        $('.player-info').css('display', 'none');
        $('#' + id).css('display', 'block');
    }
</script>

@endsection
