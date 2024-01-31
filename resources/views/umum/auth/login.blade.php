@extends('layouts.Auth.main')

@section('container')
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url({{ asset('assets/media/illustrations/sketchy-1/14.png') }})">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="javascript:void(0)" class="mb-12">
                    <img alt="Logo" src="{{ asset('assets/media/logos/logo-1.svg') }}" class="h-40px" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate method="POST" id="loginForm"
                        action="{{ route('Login.authenticate') }}">
                        <!--begin::Heading-->
                        @csrf
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Sign In to Metronic</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-4">New Here?
                                <a href="sign_up" class="link-primary fw-bolder">Create an Account</a>
                            </div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->
                        @if (session()->has('loginError'))
                            <div class="alert alert-danger align-items-center fade show d-flex justify-content-between p-2"
                                role="alert">
                                <p class="my-1">{{ session('loginError') }}</p>
                                <div class="btn btn-sm btn-icon" class="close" data-bs-dismiss="alert" aria-label="Close">
                                    <span class="svg-icon svg-icon-1">
                                        <i class="bi bi-x fs-1"></i>
                                    </span>
                                </div>
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success align-items-center fade show d-flex justify-content-between p-2"
                                role="alert">
                                <p class="my-1">{{ session('success') }}</p>
                                <div class="btn btn-sm btn-icon" class="close" data-bs-dismiss="alert" aria-label="Close">
                                    <span class="svg-icon svg-icon-1">
                                        <i class="bi bi-x fs-1"></i>
                                    </span>
                                </div>
                            </div>
                        @endif
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">Username</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input
                                class="form-control form-control-lg form-control-solid @error('username') border-danger @enderror"
                                value="{{ old('username') }}" id="form-username" type="text" name="username"
                                autocomplete="off" />
                            <!--end::Input-->
                            @error('username')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                <!--end::Label-->
                                <!--begin::Link-->
                                <a href="javascript:void(0)" tabindex="-1" class="link-primary fs-6 fw-bolder">Forgot
                                    Password ?</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input-->
                            <input
                                class="form-control form-control-lg form-control-solid @error('username') border-danger @enderror"
                                type="password" name="password" id="form-password" autocomplete="off" />
                            <!--end::Input-->
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button type="submit" id="btn-login" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Continue</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Submit button-->
                            <!--begin::Separator-->
                            <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
                            <!--end::Separator-->
                            <!--begin::Google link-->
                            <a href="javascript:void(0)" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                <img alt="Logo" src="{{ asset('assets/media/svg/brand-logos/google-icon.svg') }}"
                                    class="h-20px me-3" />Continue with Google</a>
                            <!--end::Google link-->
                            <!--begin::Google link-->
                            <a href="javascript:void(0)" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                <img alt="Logo" src="{{ asset('assets/media/svg/brand-logos/facebook-4.svg') }}"
                                    class="h-20px me-3" />Continue with Facebook</a>
                            <!--end::Google link-->
                            <!--begin::Google link-->
                            <a href="javascript:void(0)" class="btn btn-flex flex-center btn-light btn-lg w-100">
                                <img alt="Logo" src="{{ asset('assets/media/svg/brand-logos/apple-black.svg') }}"
                                    class="h-20px me-3" />Continue with Apple</a>
                            <!--end::Google link-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="javascript:void(0)" class="text-muted text-hover-primary px-2">About</a>
                    <a href="javascript:void(0)" class="text-muted text-hover-primary px-2">Contact</a>
                    <a href="javascript:void(0)" class="text-muted text-hover-primary px-2">Contact Us</a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
@endsection
