<!-- Modal delete -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalDelete">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Data {{ $backUrl }} ?</h5>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <i class="bi bi-x fs-1"></i>
                    </span>
                </div>
            </div>
            <form id="deleteForm" novalidate method="DELETE" action="{{ route($backUrl . '.delete') }}" method="post">
                @csrf
                <input type="hidden" id="form-id-delete" value="" name="id">
                <div class="modal-body px-0">
                    <p>You can't restore data after deleted</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" id="btn-tambah">Delete</button>
                </div>
            </form>

        </div>
    </div>
</div>
