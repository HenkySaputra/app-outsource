<div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pb-15">
                <!--begin:Form-->
                <form id="createForm" class="form" action="{{ route($backUrl . '.store') }}"
                    enctype="multipart/form-data">
                    <!--begin::Heading-->
                    @csrf
                    <div class="mb-13 d-flex justify-content-between">
                        <h1 class="mb-3">Add New {{ $backUrl }}</h1>
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <i class="bi bi-x fs-1"></i>
                            </span>
                        </div>
                    </div>
                    <!--end::Heading-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Name</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Harus diisi"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Name"
                            name="name" />
                    </div>
                    {{-- ACCOUNT --}}

                    <p class="fs-2 fw-bold my-5">Account</p>
                    <hr>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Username</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Harus diisi"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Username"
                            name="username" />
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Email</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Harus diisi"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Enter email"
                            name="email" />
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Password</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Harus diisi"></i>
                        </label>
                        <!--end::Label-->
                        <div class="d-flex input-group">

                            <input type="password" class="form-control form-control-solid" placeholder="Enter Password"
                                name="password" id="password" readonly />
                            <button class="btn btn-secondary" type="button" onclick="show()" data-toggle="tooltip"
                                data-placement="top" title="Show/Hide Password">
                                <i class="bi bi-eye-fill" style="padding:initial;" id="show_icon"></i></button>
                            <button class="btn btn-secondary" type="button" onclick="copy()" data-toggle="tooltip"
                                data-placement="top" title="Copy Password">
                                <i class="bi bi-clipboard-fill" style="padding:initial;"></i></button>
                            <button class="btn btn-secondary" type="button" onclick="genPass();" data-toggle="tooltip"
                                data-placement="top" title="Generate Random Password"><i class="bi bi-key-fill"
                                    style="padding:initial;"></i></button>
                        </div>
                    </div>
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="btn-tambah" class="btn btn-primary">
                            <span class="" id="btn-submit">Submit</span>
                            <span class="d-none" id="btn-submitted">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
