@extends('backend/option/layout_admin')
@section('contact_admin')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-xl-8 col-11 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img src="{{ asset('backend/app-assets/images/pages/login.png')}}" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">Login</h4>
                                        </div>
                                    </div>
                                    <p class="px-2">Welcome back, please login to your account.</p>
                                    <div class="card-content">
                                        <div class="card-body pt-1">
                                            <form action="{{ route('admin.login_process') }}" method="POST">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control" name="username" id="user-name" placeholder="Username" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    <label for="user-name">Username</label>
                                                </fieldset>

                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                    <input type="password" class="form-control" name="password" id="user-password" placeholder="Password" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-lock"></i>
                                                    </div>
                                                    <label for="user-password">Password</label>
                                                </fieldset>
                                                <div class="form-group d-flex justify-content-between align-items-center">
                                                    <div class="text-left">

                                                    </div>

                                                </div>

                                                <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="login-footer">
                                        <div class="divider">

                                        </div>
                                        <div class="footer-btn d-inline">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
