@extends('backend/option/layout_admin_after')
@section('contact_admin')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
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