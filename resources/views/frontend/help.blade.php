@extends('frontend/option/layout_member')
@section('contact_member')
<!-- jackpot begin -->
<div class="jackpot" style="background:#FED63E;">
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

                                            <div class="form-control" id="help_list2" style="height: auto; display:none;">
                                                Why do we use it?
                                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
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

</div>
<!-- jackpot end -->
<script>
    function toggle(id) {
        $('.player-info').css('display', 'none');
        $('#' + id).css('display', 'block');
    }
</script>

@endsection