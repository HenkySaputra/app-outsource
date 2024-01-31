<div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
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
                <form id="editForm" class="form"action="{{ route($backUrl . '.update') }}">
                    <!--begin::Heading-->
                    @csrf
                    <input type="hidden" id="form-id-edit" value="" name="id">
                    <div class="mb-13 d-flex justify-content-between">
                        <h1 class="mb-3">Edit {{ $backUrl }}</h1>
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <i class="bi bi-x fs-1"></i>
                            </span>
                        </div>
                    </div>
                    <!--end::Heading-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2" for="form-name-edit">
                            <span class="required">Name</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Harus diisi angka saja"></i>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Name"
                            name="name" id="form-name-edit" />
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2" for="form-phone-edit">
                            <span class="required">Phone</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Harus diisi angka saja"></i>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Phone"
                            name="phone" id="form-phone-edit" maxlength="15"
                            oninput='this.value = this.value.replace(/[^0-9.]/g, "").replace(/(\..*?)\..*/g, "$1");' />
                    </div>
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
