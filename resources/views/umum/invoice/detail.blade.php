@extends('layouts.' . $backUrl . '.main')

@section('container')
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            @include('components.sidebar')
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
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
                                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Invoice 1</h1>
                                <!--end::Title-->
                                <!--begin::Separator-->
                                <span class="h-20px border-gray-200 border-start mx-4"></span>
                                <!--end::Separator-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">Invoice Manager</li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">View Invoices</li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-dark">Invoice 1</li>
                                    <!--end::Item-->
                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center py-1">
                                <!--begin::Wrapper-->
                                <div class="me-4">
                                    <!--begin::Menu-->
                                    <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                        <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Filter
                                    </a>
                                    <!--begin::Menu 1-->
                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                                        id="kt_menu_613228578b3b7">
                                        <!--begin::Header-->
                                        <div class="px-7 py-5">
                                            <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Menu separator-->
                                        <div class="separator border-gray-200"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Form-->
                                        <div class="px-7 py-5">
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fw-bold">Status:</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div>
                                                    <select class="form-select form-select-solid" data-kt-select2="true"
                                                        data-placeholder="Select option"
                                                        data-dropdown-parent="#kt_menu_613228578b3b7"
                                                        data-allow-clear="true">
                                                        <option></option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                        <option value="2">In Process</option>
                                                        <option value="2">Rejected</option>
                                                    </select>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fw-bold">Member Type:</label>
                                                <!--end::Label-->
                                                <!--begin::Options-->
                                                <div class="d-flex">
                                                    <!--begin::Options-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                        <span class="form-check-label">Author</span>
                                                    </label>
                                                    <!--end::Options-->
                                                    <!--begin::Options-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="2"
                                                            checked="checked" />
                                                        <span class="form-check-label">Customer</span>
                                                    </label>
                                                    <!--end::Options-->
                                                </div>
                                                <!--end::Options-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fw-bold">Notifications:</label>
                                                <!--end::Label-->
                                                <!--begin::Switch-->
                                                <div
                                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        name="notifications" checked="checked" />
                                                    <label class="form-check-label">Enabled</label>
                                                </div>
                                                <!--end::Switch-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Actions-->
                                            <div class="d-flex justify-content-end">
                                                <button type="reset"
                                                    class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                    data-kt-menu-dismiss="true">Reset</button>
                                                <button type="submit" class="btn btn-sm btn-primary"
                                                    data-kt-menu-dismiss="true">Apply</button>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Menu 1-->
                                    <!--end::Menu-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Button-->
                                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">Create</a>
                                <!--end::Button-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container-xxl">
                            <!--begin::Invoice 2 main-->
                            <div class="card">
                                <!--begin::Body-->
                                <div class="card-body p-lg-20">
                                    <!--begin::Layout-->
                                    <div class="d-flex flex-column flex-xl-row">
                                        <!--begin::Content-->
                                        <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
                                            <!--begin::Invoice 2 content-->
                                            <div class="mt-n1">
                                                <!--begin::Top-->
                                                <div class="d-flex flex-stack pb-10">
                                                    <!--begin::Logo-->
                                                    <a href="#">
                                                        <img alt="Logo"
                                                            src="assets/media/svg/brand-logos/code-lab.svg" />
                                                    </a>
                                                    <!--end::Logo-->
                                                    <!--begin::Action-->
                                                    <a href="#" class="btn btn-sm btn-success">Pay Now</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Top-->
                                                <!--begin::Wrapper-->
                                                <div class="m-0">
                                                    <!--begin::Label-->
                                                    <div class="fw-bolder fs-3 text-gray-800 mb-8">Invoice #34782
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Row-->
                                                    <div class="row g-5 mb-11">
                                                        <!--end::Col-->
                                                        <div class="col-sm-6">
                                                            <!--end::Label-->
                                                            <div class="fw-bold fs-7 text-gray-600 mb-1">Issue Date:
                                                            </div>
                                                            <!--end::Label-->
                                                            <!--end::Col-->
                                                            <div class="fw-bolder fs-6 text-gray-800">12 Apr 2021
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--end::Col-->
                                                        <div class="col-sm-6">
                                                            <!--end::Label-->
                                                            <div class="fw-bold fs-7 text-gray-600 mb-1">Due Date:
                                                            </div>
                                                            <!--end::Label-->
                                                            <!--end::Info-->
                                                            <div
                                                                class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                                                <span class="pe-2">02 May 2021</span>
                                                                <span class="fs-7 text-danger d-flex align-items-center">
                                                                    <span
                                                                        class="bullet bullet-dot bg-danger me-2"></span>Due
                                                                    in 7 days</span>
                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Row-->
                                                    <!--begin::Row-->
                                                    <div class="row g-5 mb-12">
                                                        <!--end::Col-->
                                                        <div class="col-sm-6">
                                                            <!--end::Label-->
                                                            <div class="fw-bold fs-7 text-gray-600 mb-1">Issue For:
                                                            </div>
                                                            <!--end::Label-->
                                                            <!--end::Text-->
                                                            <div class="fw-bolder fs-6 text-gray-800">KeenThemes Inc.
                                                            </div>
                                                            <!--end::Text-->
                                                            <!--end::Description-->
                                                            <div class="fw-bold fs-7 text-gray-600">8692 Wild Rose
                                                                Drive
                                                                <br />Livonia, MI 48150
                                                            </div>
                                                            <!--end::Description-->
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--end::Col-->
                                                        <div class="col-sm-6">
                                                            <!--end::Label-->
                                                            <div class="fw-bold fs-7 text-gray-600 mb-1">Issued By:
                                                            </div>
                                                            <!--end::Label-->
                                                            <!--end::Text-->
                                                            <div class="fw-bolder fs-6 text-gray-800">CodeLab Inc.
                                                            </div>
                                                            <!--end::Text-->
                                                            <!--end::Description-->
                                                            <div class="fw-bold fs-7 text-gray-600">9858 South 53rd
                                                                Ave.
                                                                <br />Matthews, NC 28104
                                                            </div>
                                                            <!--end::Description-->
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Row-->
                                                    <!--begin::Content-->
                                                    <div class="flex-grow-1">
                                                        <!--begin::Table-->
                                                        <div class="table-responsive border-bottom mb-9">
                                                            <table class="table mb-3">
                                                                <thead>
                                                                    <tr class="border-bottom fs-6 fw-bolder text-muted">
                                                                        <th class="min-w-175px pb-2">Description</th>
                                                                        <th class="min-w-70px text-end pb-2">Hours
                                                                        </th>
                                                                        <th class="min-w-80px text-end pb-2">Rate</th>
                                                                        <th class="min-w-100px text-end pb-2">Amount
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                                        <td class="d-flex align-items-center pt-6">
                                                                            <i
                                                                                class="fa fa-genderless text-danger fs-2 me-2"></i>Creative
                                                                            Design
                                                                        </td>
                                                                        <td class="pt-6">80</td>
                                                                        <td class="pt-6">$40.00</td>
                                                                        <td class="pt-6 text-dark fw-boldest">$3200.00
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                                        <td class="d-flex align-items-center">
                                                                            <i
                                                                                class="fa fa-genderless text-success fs-2 me-2"></i>Logo
                                                                            Design
                                                                        </td>
                                                                        <td>120</td>
                                                                        <td>$40.00</td>
                                                                        <td class="fs-5 text-dark fw-boldest">$4800.00
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                                        <td class="d-flex align-items-center">
                                                                            <i
                                                                                class="fa fa-genderless text-primary fs-2 me-2"></i>Web
                                                                            Development
                                                                        </td>
                                                                        <td>210</td>
                                                                        <td>$60.00</td>
                                                                        <td class="fs-5 text-dark fw-boldest">
                                                                            $12600.00</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end::Table-->
                                                        <!--begin::Container-->
                                                        <div class="d-flex justify-content-end">
                                                            <!--begin::Section-->
                                                            <div class="mw-300px">
                                                                <!--begin::Item-->
                                                                <div class="d-flex flex-stack mb-3">
                                                                    <!--begin::Accountname-->
                                                                    <div class="fw-bold pe-10 text-gray-600 fs-7">
                                                                        Subtotal:</div>
                                                                    <!--end::Accountname-->
                                                                    <!--begin::Label-->
                                                                    <div class="text-end fw-bolder fs-6 text-gray-800">
                                                                        $ 20,600.00</div>
                                                                    <!--end::Label-->
                                                                </div>
                                                                <!--end::Item-->
                                                                <!--begin::Item-->
                                                                <div class="d-flex flex-stack mb-3">
                                                                    <!--begin::Accountname-->
                                                                    <div class="fw-bold pe-10 text-gray-600 fs-7">VAT
                                                                        0%</div>
                                                                    <!--end::Accountname-->
                                                                    <!--begin::Label-->
                                                                    <div class="text-end fw-bolder fs-6 text-gray-800">
                                                                        0.00</div>
                                                                    <!--end::Label-->
                                                                </div>
                                                                <!--end::Item-->
                                                                <!--begin::Item-->
                                                                <div class="d-flex flex-stack mb-3">
                                                                    <!--begin::Accountnumber-->
                                                                    <div class="fw-bold pe-10 text-gray-600 fs-7">
                                                                        Subtotal + VAT</div>
                                                                    <!--end::Accountnumber-->
                                                                    <!--begin::Number-->
                                                                    <div class="text-end fw-bolder fs-6 text-gray-800">
                                                                        $ 20,600.00</div>
                                                                    <!--end::Number-->
                                                                </div>
                                                                <!--end::Item-->
                                                                <!--begin::Item-->
                                                                <div class="d-flex flex-stack">
                                                                    <!--begin::Code-->
                                                                    <div class="fw-bold pe-10 text-gray-600 fs-7">
                                                                        Total</div>
                                                                    <!--end::Code-->
                                                                    <!--begin::Label-->
                                                                    <div class="text-end fw-bolder fs-6 text-gray-800">
                                                                        $ 20,600.00</div>
                                                                    <!--end::Label-->
                                                                </div>
                                                                <!--end::Item-->
                                                            </div>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Container-->
                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Invoice 2 content-->
                                        </div>
                                        <!--end::Content-->
                                        <!--begin::Sidebar-->
                                        <div class="m-0">
                                            <!--begin::Invoice 2 sidebar-->
                                            <div
                                                class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-350px p-9 bg-lighten">
                                                <!--begin::Labels-->
                                                <div class="mb-8">
                                                    <span class="badge badge-light-success me-2">Approved</span>
                                                    <span class="badge badge-light-warning">Pending Payment</span>
                                                </div>
                                                <!--end::Labels-->
                                                <!--begin::Title-->
                                                <h6 class="mb-8 fw-boldest text-gray-600 text-hover-primary">PAYMENT
                                                    DETAILS</h6>
                                                <!--end::Title-->
                                                <!--begin::Item-->
                                                <div class="mb-6">
                                                    <div class="fw-bold text-gray-600 fs-7">Paypal:</div>
                                                    <div class="fw-bolder text-gray-800 fs-6">codelabpay@codelab.co
                                                    </div>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="mb-6">
                                                    <div class="fw-bold text-gray-600 fs-7">Account:</div>
                                                    <div class="fw-bolder text-gray-800 fs-6">
                                                        Nl24IBAN34553477847370033
                                                        <br />AMB NLANBZTC
                                                    </div>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="mb-15">
                                                    <div class="fw-bold text-gray-600 fs-7">Payment Term:</div>
                                                    <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center">
                                                        14 days
                                                        <span class="fs-7 text-danger d-flex align-items-center">
                                                            <span class="bullet bullet-dot bg-danger mx-2"></span>Due
                                                            in 7 days</span>
                                                    </div>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Title-->
                                                <h6 class="mb-8 fw-boldest text-gray-600 text-hover-primary">PROJECT
                                                    OVERVIEW</h6>
                                                <!--end::Title-->
                                                <!--begin::Item-->
                                                <div class="mb-6">
                                                    <div class="fw-bold text-gray-600 fs-7">Project Name</div>
                                                    <div class="fw-bolder fs-6 text-gray-800">SaaS App Quickstarter
                                                        <a href="#" class="link-primary ps-1">View Project</a>
                                                    </div>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="mb-6">
                                                    <div class="fw-bold text-gray-600 fs-7">Completed By:</div>
                                                    <div class="fw-bolder text-gray-800 fs-6">Mr. Dewonte Paul</div>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="m-0">
                                                    <div class="fw-bold text-gray-600 fs-7">Time Spent:</div>
                                                    <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center">
                                                        230 Hours
                                                        <span class="fs-7 text-success d-flex align-items-center">
                                                            <span class="bullet bullet-dot bg-success mx-2"></span>35$/h
                                                            Rate</span>
                                                    </div>
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Invoice 2 sidebar-->
                                        </div>
                                        <!--end::Sidebar-->
                                    </div>
                                    <!--end::Layout-->
                                    <!-- begin::Footer-->
                                    <div class="d-flex flex-stack flex-wrap mt-lg-20 pt-13">
                                        <!-- begin::Actions-->
                                        <div class="my-1 me-5">
                                            <!-- begin::Pint-->
                                            <button type="button" class="btn btn-success my-1 me-12"
                                                onclick="window.print();">Print Invoice</button>
                                            <!-- end::Pint-->
                                            <!-- begin::Download-->
                                            {{-- <button type="button" class="btn btn-light-success my-1">Download</button> --}}
                                            <!-- end::Download-->
                                            <a type="button" class="btn btn-success my-1 me-12" target="_blank"
                                                href="/email/invoice">Email Template</a>
                                        </div>
                                        <!-- end::Actions-->
                                    </div>
                                    <!-- end::Footer-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Invoice 2 main-->
                        </div>
                        <!--end::Container-->
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
@endsection
