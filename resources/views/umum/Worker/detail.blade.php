@extends('layouts.Dashboard.main')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
        integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('container')
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            @include('components.sidebar')
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                {{-- error --}}
                @if (session()->has('error'))
                    <div class="toast-container top-0 end-0 p-3">
                        <div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive"
                            aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                    {{ session('error') }}
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                @endif
                <!--begin::Header-->
                @include('components.header')
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Toolbar-->
                    <div class="toolbar" id="kt_toolbar">
                        <!--begin::Container-->
                        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                            <!--begin::Page title-->
                            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                <!--begin::Title-->
                                <a href="{{ route($backUrl . '') }}"
                                    class="btn btn-sm btn-active-light-dark ps-3 pe-2 me-3">
                                    <span class="svg-icon svg-icon-1 m-0">
                                        <i class="bi bi-arrow-left fs-1"></i>
                                    </span>
                                </a>
                                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
                                    Detail Worker
                                </h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <!--end::Actions-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Post-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <div class="post d-flex flex-column-fluid" id="kt_post">
                            <!--begin::Container-->
                            <div id="kt_content_container" class="container-xxl">
                                <!--begin::Card-->
                                <div class="card card-flush p-sm-10 p-5">
                                    <div>
                                        <h3 class="card-title pb-5">Data Worker</h3>
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="index-table" style="width: 100%">
                                                <tbody>
                                                    <tr>
                                                        <td class="ps-5">Name</td>
                                                        <td>:</td>
                                                        <td>{{ $data->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-5">Phone</td>
                                                        <td>:</td>
                                                        <td>{{ $data->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-5">Username</td>
                                                        <td>:</td>
                                                        <td>{{ $data->user->username }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-5">Email</td>
                                                        <td>:</td>
                                                        <td>{{ $data->user->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-5">Date Created</td>
                                                        <td>:</td>
                                                        <td>
                                                            {{ date('d F Y', strtotime($data->created_at)) }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    {{-- worker skill --}}
                                    <div class="mt-5">
                                        <h3 class="card-title">Skill</h3>
                                        <table id="skill-table"
                                            class="table table-striped table-bordered gs-7 table-row-dashed fs-6 gy-5 mb-0">
                                            <thead>
                                                <tr class="fs-6 text-gray-800 fw-bolder text-uppercase">
                                                    <th class="">#</th>
                                                    <th class="min-w-125px">Name</th>
                                                    <th class="">Level</th>
                                                    <th class="text-end min-w-100px ">
                                                        <button type="button" id="btnCreateSkill"
                                                            class="btn btn-sm btn-icon btn-primary">
                                                            <span class="svg-icon svg-icon-1">
                                                                <i class="bi bi-plus fs-6"></i>
                                                            </span>
                                                        </button>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                        {{-- <div>
                                            <form id="createSkillForm" class="form" action="{{ route('Skill.store') }}"
                                                autocomplete="off" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <input type="hidden" id="worker-id" value="{{ $data->id }}"
                                                    name="workerId">
                                                <div class="form-group">
                                                    <table class="table table-striped table-bordered" id="skill-table"
                                                        style="width: 100%">
                                                        <thead>
                                                            <tr class="fs-6 text-gray-800 fw-bolder text-uppercase">
                                                                <th class="ps-5">Name</th>
                                                                <th class="">Level</th>
                                                                <th class="text-end min-w-100px pe-5">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm btn-icon btn-primary insertRowSkill">
                                                                        <span class="svg-icon svg-icon-1">
                                                                            <i class="bi bi-plus fs-6"></i>
                                                                        </span>
                                                                    </a>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data->skill as $skill)
                                                                <tr class="align-middle">
                                                                    <td class="ps-5">{{ $skill->name }}</td>
                                                                    <td>{{ $skill->level }}</td>
                                                                    <td class="text-end min-w-100px pe-5">
                                                                        <div id="skill-action" class="text-end">
                                                                            <a href="javascript:void(0);"
                                                                                class="btn btn-sm btn-icon btn-active-danger deleteRowSkill"
                                                                                data-id="{{ $skill->id }}">
                                                                                <span class="svg-icon svg-icon-1">
                                                                                    <i class="bi bi-trash fs-6"></i>
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </form>
                                        </div> --}}
                                    </div>
                                    <hr>
                                    {{-- worker edu --}}
                                    <div class="mt-5">
                                        <h3 class="card-title">Education</h3>
                                        <table id="edu-table"
                                            class="table table-striped table-bordered gs-7 table-row-dashed fs-6 gy-5 mb-0">
                                            <thead>
                                                <tr class="fs-6 text-gray-800 fw-bolder text-uppercase">
                                                    <th class="">#</th>
                                                    <th class="min-w-125px">School Name</th>
                                                    <th class="">Grade</th>
                                                    <th class="text-end min-w-100px ">
                                                        <button type="button" id="btnCreateEdu"
                                                            class="btn btn-sm btn-icon btn-primary">
                                                            <span class="svg-icon svg-icon-1">
                                                                <i class="bi bi-plus fs-6"></i>
                                                            </span>
                                                        </button>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <hr>
                                    {{-- worker exp --}}
                                    <div class="mt-5">
                                        <h3 class="card-title">Experience</h3>
                                        <table id="exp-table"
                                            class="table table-striped table-bordered gs-7 table-row-dashed fs-6 gy-5 mb-0">
                                            <thead>
                                                <tr class="fs-6 text-gray-800 fw-bolder text-uppercase">
                                                    <th class="">#</th>
                                                    <th class="min-w-125px">Company Name</th>
                                                    <th class="">Position</th>
                                                    <th class="text-end min-w-100px ">
                                                        <button type="button" id="btnCreateExp"
                                                            class="btn btn-sm btn-icon btn-primary">
                                                            <span class="svg-icon svg-icon-1">
                                                                <i class="bi bi-plus fs-6"></i>
                                                            </span>
                                                        </button>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <hr>
                                    {{-- worker license --}}
                                    <div class="mt-5">
                                        <h3 class="card-title">License</h3>
                                        <table id="license-table"
                                            class="table table-striped table-bordered gs-7 table-row-dashed fs-6 gy-5 mb-0">
                                            <thead>
                                                <tr class="fs-6 text-gray-800 fw-bolder text-uppercase">
                                                    <th class="">#</th>
                                                    <th class="min-w-125px">Name</th>
                                                    <th class="text-end min-w-100px ">
                                                        <button type="button" id="btnCreateLicense"
                                                            class="btn btn-sm btn-icon btn-primary">
                                                            <span class="svg-icon svg-icon-1">
                                                                <i class="bi bi-plus fs-6"></i>
                                                            </span>
                                                        </button>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>

                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Post-->
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">2022©</span>
                            <a href="#" class="text-gray-800 text-hover-primary">Keenthemes</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                            <li class="menu-item">
                                <a href="#"class="menu-link px-2">About</a>
                            </li>
                            <li class="menu-item">
                                <a href="#"class="menu-link px-2">Support</a>
                            </li>
                            <li class="menu-item">
                                <a href="#"class="menu-link px-2">Purchase</a>
                            </li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--begin::Drawers-->
    <!--begin::Chat drawer-->
    @include('components.chat_drawer')
    <!--end::Chat drawer-->
    <!--begin::Exolore drawer toggle-->
    <button id="kt_explore_toggle"
        class="explore-toggle btn btn-sm bg-body btn-color-gray-700 btn-active-primary shadow-sm position-fixed px-5 fw-bolder zindex-2 top-50 mt-10 end-0 transform-90 fs-6 rounded-top-0"
        title="Explore Metronic" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
        <span id="kt_explore_toggle_label">Explore</span>
    </button>
    <!--end::Exolore drawer toggle-->
    <!--end::Drawers-->
    <!--begin::Modals-->
    <!--begin::Modal - Invite Friends-->
    @include('umum.dashboard.modal.invite_friends')
    <!--end::Modal - Invite Friend-->
    <!--begin::Modal - Create App-->
    @include('umum.dashboard.modal.create_app')
    <!--end::Modal - Create App-->
    <!--end::Modals-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--end::Main-->

    <!-- modal -->

    @include('umum.' . $backUrl . '.modalEdu.create')
    @include('umum.' . $backUrl . '.modalEdu.update')
    @include('umum.' . $backUrl . '.modalEdu.delete')
    @include('umum.' . $backUrl . '.modalEdu.detail')
    
    @include('umum.' . $backUrl . '.modalSkill.create')
    @include('umum.' . $backUrl . '.modalSkill.update')
    @include('umum.' . $backUrl . '.modalSkill.delete')
    
    @include('umum.' . $backUrl . '.modalExp.create')
    @include('umum.' . $backUrl . '.modalExp.update')
    @include('umum.' . $backUrl . '.modalExp.delete')
    @include('umum.' . $backUrl . '.modalExp.detail')

    @include('umum.' . $backUrl . '.modalLicense.create')
    @include('umum.' . $backUrl . '.modalLicense.update')
    @include('umum.' . $backUrl . '.modalLicense.delete')
@endsection

@section('script')
    @include('umum.' . $backUrl . '.script')
@endsection
