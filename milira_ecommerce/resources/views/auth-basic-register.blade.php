@extends('layouts.guest', ['bodyClass' => 'bg-register'])
@section('title')
    Register
@endsection
@section('content')

    <!--authentication-->
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-5 mx-auto">
                <div class="card rounded-4 mb-0 border-top border-4 border-primary border-gradient-1">
                    <div class="card-body p-5">
                        <img src="{{ URL::asset('build/images/logo1.png') }}" class="mb-4" width="145" alt="">
                        <h4 class="fw-bold">Get Started Now</h4>
                        <p class="mb-0">Enter your credentials to create your account</p>

                        <div class="form-body my-4">
                            <form class="row g-3">
                                <div class="col-12">
                                    <label for="inputUsername" class="form-label">Username</label>
                                    <input type="email" class="form-control" id="inputUsername" placeholder="Jhon">
                                </div>
                                <div class="col-12">
                                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="inputEmailAddress"
                                        placeholder="example@user.com">
                                </div>
                                <div class="col-12">
                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" class="form-control border-end-0" id="inputChoosePassword"
                                            value="12345678" placeholder="Enter Password">
                                        <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                class="bi bi-eye-slash-fill"></i></a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="inputSelectCountry" class="form-label">Country</label>
                                    <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                        <option selected="">India</option>
                                        <option value="1">United Kingdom</option>
                                        <option value="2">America</option>
                                        <option value="3">Dubai</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to
                                            Terms &amp; Conditions</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-grd-danger">Register</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-start">
                                        <p class="mb-0">Already have an account? <a href="{{ url('/auth-basic-login') }}">Sign in
                                                here</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="separator section-padding">
                            <div class="line"></div>
                            <p class="mb-0 fw-bold">OR</p>
                            <div class="line"></div>
                        </div>

                        <div class="d-flex gap-3 justify-content-center mt-4">
                            <a href="javascript:;"
                                class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-grd-danger">
                                <i class="bi bi-google fs-5 text-white"></i>
                            </a>
                            <a href="javascript:;"
                                class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-grd-deep-blue">
                                <i class="bi bi-facebook fs-5 text-white"></i>
                            </a>
                            <a href="javascript:;"
                                class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-grd-info">
                                <i class="bi bi-linkedin fs-5 text-white"></i>
                            </a>
                            <a href="javascript:;"
                                class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-grd-royal">
                                <i class="bi bi-github fs-5 text-white"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
    <!--authentication-->

@endsection
@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/js/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash-fill");
                    $('#show_hide_password i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_password i').addClass("bi-eye-fill");
                }
            });
        });
    </script>
@endpush