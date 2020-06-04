@extends('frontend/option/layout_member')
@extends('frontend.option.layout_chat')

@section('contact_member')

       <!-- jackpot begin -->
       <div class="jackpot" style="background:#FED63E;  min-height: calc(100vh - 100px);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 form-group">
                    <!-- <a href="" style="display: inline-block;"><button type="button" class="btn btn-warning button_plus_story">เพิ่มบทความใหม่</button></a> -->
                </div>
            </div>
        </div>
        <div class="container shape-container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                    <div class="single-jackpot">
                        <div class="part-head">
                            <div class="text"  style="margin-left:25px;">
                                <span class="amount">ยอดเงิน</span>
                                <span class="draw-date"></span>
                            </div>
                        </div>
                        <div class="part-body">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                    <div class="single-jackpot p-2">
                                        <div class="part-head">
                                            <h1 class="text-center w-100 mt-4">{{number_format($user_info->money, 2)}} ฿ </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-sm-12">
                                    <a href="{{ route('lottery_request_deposit') }}" style="display:block; color:#fff;">
                                        <div class="single-jackpot bg-primary">
                                            <div class="part-head">
                                               ฝากเครดิต
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-sm-12">
                                    <a href="{{ route('lottery_withdraw') }}" style="display:block; color:#fff;">
                                        <div class="single-jackpot bg-success">
                                            <div class="part-head">
                                                ถอนเครดิต
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container shape-container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 single_jackpot_all form-group">
                    <div class="single-jackpot">
                        <div class="part-head">

                        </div>
                        <div class="part-body">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_play') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot " >
                                            <div class="part-head">
                                                <svg class="bi bi-card-list" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 00-.5.5v9a.5.5 0 00.5.5h13a.5.5 0 00.5-.5v-9a.5.5 0 00-.5-.5zm-13-1A1.5 1.5 0 000 3.5v9A1.5 1.5 0 001.5 14h13a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0014.5 2h-13z" clip-rule="evenodd"/>
                                                    <path fill-rule="evenodd" d="M5 8a.5.5 0 01.5-.5h7a.5.5 0 010 1h-7A.5.5 0 015 8zm0-2.5a.5.5 0 01.5-.5h7a.5.5 0 010 1h-7a.5.5 0 01-.5-.5zm0 5a.5.5 0 01.5-.5h7a.5.5 0 010 1h-7a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                                                    <circle cx="3.5" cy="5.5" r=".5"/>
                                                    <circle cx="3.5" cy="8" r=".5"/>
                                                    <circle cx="3.5" cy="10.5" r=".5"/>
                                                </svg>&nbsp;แทงหวย
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_transaction') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot ">
                                            <div class="part-head">
                                                <svg class="bi bi-card-checklist" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 00-.5.5v9a.5.5 0 00.5.5h13a.5.5 0 00.5-.5v-9a.5.5 0 00-.5-.5zm-13-1A1.5 1.5 0 000 3.5v9A1.5 1.5 0 001.5 14h13a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0014.5 2h-13z" clip-rule="evenodd"/>
                                                    <path fill-rule="evenodd" d="M7 5.5a.5.5 0 01.5-.5h5a.5.5 0 010 1h-5a.5.5 0 01-.5-.5zm-1.496-.854a.5.5 0 010 .708l-1.5 1.5a.5.5 0 01-.708 0l-.5-.5a.5.5 0 11.708-.708l.146.147 1.146-1.147a.5.5 0 01.708 0zM7 9.5a.5.5 0 01.5-.5h5a.5.5 0 010 1h-5a.5.5 0 01-.5-.5zm-1.496-.854a.5.5 0 010 .708l-1.5 1.5a.5.5 0 01-.708 0l-.5-.5a.5.5 0 01.708-.708l.146.147 1.146-1.147a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                                                  </svg>&nbsp;รายการโพย
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_result') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot">
                                            <div class="part-head">
                                                <svg class="bi bi-trophy" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 1h10c-.495 3.467-.5 10-5 10S3.495 4.467 3 1zm0 15a1 1 0 011-1h8a1 1 0 011 1H3zm2-1a1 1 0 011-1h4a1 1 0 011 1H5z"/>
                                                    <path fill-rule="evenodd" d="M12.5 3a2 2 0 100 4 2 2 0 000-4zm-3 2a3 3 0 116 0 3 3 0 01-6 0zm-6-2a2 2 0 100 4 2 2 0 000-4zm-3 2a3 3 0 116 0 3 3 0 01-6 0z" clip-rule="evenodd"/>
                                                    <path d="M7 10h2v4H7v-4z"/>
                                                    <path d="M10 11c0 .552-.895 1-2 1s-2-.448-2-1 .895-1 2-1 2 .448 2 1z"/>
                                                  </svg>&nbsp;ผลรางวัล
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_credit') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot ">
                                            <div class="part-head">
                                                <svg class="bi bi-list-ol" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9a.5.5 0 01-.5-.5zm0-4a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9a.5.5 0 01-.5-.5zm0-4a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                                                    <path d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 01-.492.594v.033a.615.615 0 01.569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 00-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z"/>
                                                  </svg>&nbsp;รายงานเครดิต
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_affiliate') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot ">
                                            <div class="part-head">
                                                <svg class="bi bi-people-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 015 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 005 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd"/>
                                                  </svg>&nbsp;ระบบแนะนำ
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_number_set') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot ">
                                            <div class="part-head">
                                                <svg class="bi bi-calendar-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 2a2 2 0 012-2h12a2 2 0 012 2H0z"/>
                                                    <path fill-rule="evenodd" d="M0 3h16v11a2 2 0 01-2 2H2a2 2 0 01-2-2V3zm6.5 4a1 1 0 100-2 1 1 0 000 2zm4-1a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm-8 2a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm4-1a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm-8 2a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm4-1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"/>
                                                </svg>&nbsp;สร้างเลขชุด
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>

                            <div class="row">


                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_news') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot">
                                            <div class="part-head ">
                                                <svg class="bi bi-newspaper" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M0 2A1.5 1.5 0 011.5.5h11A1.5 1.5 0 0114 2v12a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 010 14V2zm1.5-.5A.5.5 0 001 2v12a.5.5 0 00.5.5h11a.5.5 0 00.5-.5V2a.5.5 0 00-.5-.5h-11z" clip-rule="evenodd"/>
                                                    <path fill-rule="evenodd" d="M15.5 3a.5.5 0 01.5.5V14a1.5 1.5 0 01-1.5 1.5h-3v-1h3a.5.5 0 00.5-.5V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                                                    <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                                                  </svg>&nbsp;ข่าวสารประชาสัมพันธ์
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('lottery_bonus') }}" style="display:block; color:#3d5169;">
                                        <div class="single-jackpot ">
                                            <div class="part-head">
                                                <svg class="bi bi-award-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 0l1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
                                                    <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                                                  </svg>&nbsp;ระบบโบนัสทั้งหมด
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('help') }}" style="display: block; color:#3d5169;">
                                        <div class="single-jackpot">
                                            <div class="part-head ">
                                                <svg class="bi bi-book-half" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 018.5 2.5v11a.5.5 0 01-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 010 13.5v-11a.5.5 0 01.276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 01.22-.103 12.958 12.958 0 012.7-.869zM1 2.82v9.908c.846-.343 1.944-.672 3.074-.788 1.143-.118 2.387-.023 3.426.56V2.718c-1.063-.929-2.631-.956-4.09-.664A11.958 11.958 0 001 2.82z" clip-rule="evenodd"/>
                                                    <path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 007.5 2.5v11a.5.5 0 00.854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0016 13.5v-11a.5.5 0 00-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 00-.799-.34 12.96 12.96 0 00-2.073-.609z" clip-rule="evenodd"/>
                                                  </svg>&nbsp;วิธีการใช้งาน
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <a href="{{ route('contact') }}" style="display: block; color:#3d5169;">
                                        <div class="single-jackpot">
                                            <div class="part-head ">
                                                <svg class="bi bi-chat-dots-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 01-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm3 1a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                                  </svg>&nbsp;ติดต่อเอเย่นต์
                                            </div>
                                            <div class="part-body">


                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jackpot end -->
<script src="{{url('backend/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script>
    var csrf_token = '{{ csrf_token() }}';
    @if(session()->has('message'))
    Swal.fire({
        type: '{{ session()->get("status") }}',
        title: '<small> {{ session()->get("message") }} </small>',
        showConfirmButton: false,
        timer: 5000
    });
    console.log('has')
    @endif
</script>
@endsection
