<div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <i class="bi bi-x fs-1"></i>
                    </span>
                </div>
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="editForm" class="form"action="{{ route($backUrl . '.update') }}">
                    <!--begin::Heading-->
                    @csrf
                    <input type="hidden" id="form-id-edit" value="" name="id">
                    <div class="mb-13 text-start">
                        <h1 class="mb-3">Edit Data</h1>
                    </div>
                    <!--end::Heading-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2" for="form-name-edit">
                            <span class="required">Username</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Harus diisi"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Username"
                            name="username" id="form-username-edit" />
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
                            name="email" id="form-email-edit" />
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
                                name="password" id="password" readonly/>
                            <button class="btn btn-secondary" type="button" onclick="show()" data-toggle="tooltip"
                                data-placement="top" title="Show/Hide Password">
                                <i class="bi bi-eye-fill" style="padding:initial;" id="show_icon"></i></button>
                            <button class="btn btn-secondary" type="button" onclick="copy()" data-toggle="tooltip"
                                data-placement="top" title="Copy Password">
                                <i class="bi bi-clipboard-fill" style="padding:initial;"></i></button>
                            <button class="btn btn-secondary" type="button" onclick="genPass();"
                                data-toggle="tooltip" data-placement="top" title="Generate Random Password"><i
                                    class="bi bi-key-fill" style="padding:initial;"></i></button>
                        </div>
                    </div>
                    
                    {{-- <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Role</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Harus diisi"></i>
                        </label>
                        <!--end::Label-->
                        <select name="role" id="form-role-edit"
                            class="form-control form-control-lg form-control-solid form-input select2" required>
                            <option class="d-none" disabled value="" selected>Select Your Role</option>
                            <option value="worker">Worker</option>
                            <option value="company">Company</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div> --}}
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
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
