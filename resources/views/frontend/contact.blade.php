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
                                <span class="amount" style="color:#6f39d5">ติดต่อเอเย่นต์</span>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/index_member" style="display: inline-block; font-size: 20px; background-color: #6f39d5;color:#FFF" class="btn btn-warning">ย้อนกลับ</a>

                            </div>


                        </div>
                    </div>
                    <br>
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
<script>
    var csrf_token = '{{ csrf_token() }}';

</script>
@endsection
