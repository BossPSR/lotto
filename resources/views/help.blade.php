@extends('option/layout_member')
@section('contact_member')
       <!-- jackpot begin -->
       <div class="jackpot">
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
                            <div class="icon">
                                <img src="assets/img/svg/euro-million.png" alt="">
                            </div>
                            <div class="text">
                                <span class="amount">วิธีการใช้งาน</span>
                                <span class="draw-date"></span>
                            </div>
                        </div>
                        <div class="part-body">
                            <div class="d-flex">
                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                    <div class="single-jackpot">
                                        <div class="part-head">
                                            <button type="button" class="btn btn-warning new_story" onClick="help_list();" value="help_list1">การแชทเพื่อพูดคุยกับ Admin</button>
                                            <button type="button" class="btn btn-warning new_story" onClick="help_list();" value="help_list2">กฏและกติกาแข่งหวยออนไลน์</button>
                                        </div>
                                        <div class="part-body">
                                           <div id="help_list">
                                                <div class="form-control" id="help_list1" style="height: auto; display:none;">
                                                    What is Lorem Ipsum?
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                </div>
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
        function help_list() {
            $('#help_list1').css('display','none');
            $('#help_list2').css('display','none');
            if (event.target.value == "help_list1") {
                $('#help_list1').css('display','block');
            }else if(event.target.value == "help_list2"){
                $('#help_list2').css('display','block');
            }else{
                alert('ไม่มีรายการนี้อยู่ในระบบ');
            }
        }
    </script>

@endsection
