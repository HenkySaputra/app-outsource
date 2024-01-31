<div class="modal fade" id="modalEditExp" tabindex="-1" aria-hidden="true">
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
                <form id="editFormExp" class="form" action="{{ route('Experience.update') }}">
                    <!--begin::Heading-->
                    @csrf
                    <input type="hidden" id="form-experience-worker_id-edit" value="" name="worker_id">
                    <input type="hidden" id="form-experience-id-edit" value="" name="id">
                    <div class="mb-13 d-flex justify-content-between">
                        <h1 class="mb-3">Edit Education</h1>
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <i class="bi bi-x fs-1"></i>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2" for="form-company_name-edit">
                            <span class="required">Company Name</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Harus diisi"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid"
                            id="form-experience-company_name-edit" placeholder="Enter Your Company Name"
                            name="company_name" />
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2" for="form-position-edit">
                            <span class="required">Positon</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Harus diisi"></i>
                        </label>
                        <input type="text" class="form-control form-control-solid" id="form-experience-position-edit"
                            placeholder="Enter Your Position" name="position" />
                    </div>
                    <div class="d-flex flex-row">
                        <div class="d-flex flex-column mb-8 fv-row w-50 pe-5">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2" for="form-year_start-edit">
                                <span class="required">Year Start</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Harus diisi"></i>
                            </label>
                            <select name="year_start_experience" id="form-experience-year_start-edit"
                                class="form-control form-control-lg form-control-solid form-input select2v2" required>
                                <option class="d-none" disabled value="" selected>Select Year Start</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row w-50">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2" for="form-year_end-edit">
                                <span class="required">Year End</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Harus diisi"></i>
                            </label>
                            <select name="year_end_experience" id="form-experience-year_end-edit"
                                class="form-control form-control-lg form-control-solid form-input select2v2" required>
                                <option class="d-none" disabled value="" selected>Select Year End</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
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
