<div class="modal fade" id="modalCreateEdu" tabindex="-1" aria-hidden="true">
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
                <form id="createFormEdu" class="form" action="{{ route('Education.store') }}"
                    enctype="multipart/form-data">
                    <!--begin::Heading-->
                    @csrf
                    <input type="hidden" id="form-id" value="{{ $data->id }}" name="worker_id">
                    <div class="mb-13 d-flex justify-content-between">
                        <h1 class="mb-3">New Education</h1>
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
                            <span class="required">Grade</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Harus diisi"></i>
                        </label>
                        <select name="grade" id="form-grade"
                            class="form-control form-control-lg form-control-solid form-input select2" required>
                            <option class="d-none" disabled value="" selected>Select Your Grade</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                            <option value="D3">D3</option>
                            <option value="D2">D2</option>
                            <option value="D1">D1</option>
                            <option value="S20" disabled>S20 ULTRA BTS</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">School Name</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Harus diisi"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" required
                            placeholder="Enter Your School Name" name="school_name" />
                    </div>
                    <div class="d-flex flex-row">
                        <div class="d-flex flex-column mb-8 fv-row w-50 pe-5">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Year Start</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Harus diisi"></i>
                            </label>
                            <select name="year_start_education" id="form-year_start"
                                class="form-control form-control-lg form-control-solid form-input select2" required>
                                <option class="d-none" disabled value="" selected>Select Year Start</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row w-50">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Year End</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Harus diisi"></i>
                            </label>
                            <select name="year_end_education" id="form-year_end"
                                class="form-control form-control-lg form-control-solid form-input select2" required>
                                <option class="d-none" disabled value="" selected>Select Year End</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
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
