@extends('backend/option/layout_admin_after')
@section('contact_admin')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Dashboard</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-users text-primary font-medium-5"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="text-bold-700 mt-1 mb-25">ทั้งหมด {{ number_format($count_user)}} คน</h2>
                                    <span class="mb-0 text-warning">รอยืนยัน {{ number_format($count_user_pending)}} คน</span>
                                    <span class="mb-0 text-success">อนุมัติ {{ number_format($count_user_approved)}} คน,</span>
                                    <span class="mb-0 text-danger">ไม่อนุมัติ {{ number_format($count_user_reject)}} คน,</span>
                                    <span class="mb-0 text-secodary">แบนสมาชิก {{ number_format($count_user_ban)}} คน,</span>
                                    <span class="mb-0 text-danger">บัญชีดำ {{ number_format($count_user_blacklist)}} คน</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <div id="subscribe-gain-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-dollar-sign text-warning font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1 mb-25">กำไร</h2>
                                <h2 class="text-bold-700 mt-1 mb-25">
                                    <span class="text-success">{{number_format($total_play, 2)}}</span> - <span class="text-danger">{{number_format($total_won+$total_won_shoot, 2)}}</span> = 
                                    @if ($total_play - ($total_won+$total_won_shoot) > 0)
                                    <span class="text-success">{{number_format($total_play - ($total_won+$total_won_shoot), 2)}}</span>
                                    @endif
                                    @if ($total_play - ($total_won+$total_won_shoot) <= 0)
                                    <span class="text-success">{{number_format($total_play - ($total_won+$total_won_shoot), 2)}}</span>
                                    @endif
                            </h2>
                            </div>
                            <div class="card-content">
                                <div id="orders-received-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0">User List</h4>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive mt-1">
                                    <table class="table table-hover-animation mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Tel</th>
                                                <th>PLAY</th>
                                                <th>WON</th>
                                                <th>REGISTER DATE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i = 0;
                                            ?>
                                            @foreach ($user_approved as  $user)
                                            <?php 
                                            $i++;
                                            ?>
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$user->username}}</td>
                                                <td>{{$user->tel}}</td>
                                                <td>{{number_format($user->play, 2)}}</td>
                                                <td>{{number_format($user->won, 2)}}</td>
                                                <td>{{date('d/m/Y H:i:s', strtotime($user->created_at))}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: none;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0">สถิติการแทงเลข</h4>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive mt-1">
                                    <table class="table table-hover-animation mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%;" nowrap>#</th>
                                                <th class="text-center">เลข</th>
                                                <th style="width: 1%;" nowrap>จำนวนการแทง</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i = 0;
                                            ?>
                                            @foreach ($stat_by_number as  $number => $count)
                                            <?php 
                                            $i++;
                                            ?>
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td class="text-center" nowrap>{{$number}}</td>
                                                <td class="text-center" nowrap>{{$count}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0">สถิติการแทงเลขราย User</h4>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive mt-1">
                                    <table class="table table-hover-animation mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%;" nowrap>#</th>
                                                <th>User</th>
                                                <th>เลข</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i = 0;
                                            ?>
                                            @foreach ($stat_number_by_user_id as  $user_id => $number_list)
                                            <?php 
                                            $i++;
                                            ?>
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$user_by_id[$user_id]->username}}</td>
                                                <td>
                                                        @foreach ($number_list as  $number => $count)
                                                            <label class="text-center" nowrap>{{$number.'x'.$count}}</label>&nbsp;,
                                                        @endforeach
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="app">
                    <dashboard
                    :huay_categorys="{{json_encode($huay_category)}}"
                    :huay_by_category_id="{{json_encode($huay_by_category_id)}}"
                    ></dashboard>
                </div>
                <script src="../js/app.js"></script>
            </section>
            <!-- Dashboard Analytics end -->

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection