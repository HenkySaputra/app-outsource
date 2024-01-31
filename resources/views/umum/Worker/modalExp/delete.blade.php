<!-- Modal delete -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalDeleteExp">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-end"></div>
            <div class="modal-body scroll-y px-10 px-lg-15 pb-5">
                <form id="deleteFormExp" novalidate method="DELETE" action="{{ route('Experience.delete') }}"
                    method="post">
                    @csrf
                    <input type="hidden" id="form-exp_id-delete" value="" name="id">
                    <div class="mb-5 d-flex justify-content-between">
                        <h1 class="mb-3">Delete Experience</h1>
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <i class="bi bi-x fs-1"></i>
                            </span>
                        </div>
                    </div>
                    <div class="py-7">
                        <p>You can't restore data after deleted</p>
                    </div>
                    <div class="text-center py-6">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="btn-tambah">
                            <span class="indicator-label">Delete</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
