<!-- Modal Add -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalDetail">
    <div class="modal-dialog modal-dialog-centered mw-650px" role="document">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-end"></div>
            <div class="modal-body scroll-y px-10 px-lg-15 pb-15">
                <div class="mb-5 d-flex justify-content-between">
                    <h1 class="mb-3">Detail {{ $backUrl }}</h1>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <i class="bi bi-x fs-1"></i>
                        </span>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="index-table" style="width: 100%">
                        <tbody>
                            <tr>
                                <td class="ps-5">Name</td>
                                <td>:</td>
                                <td id="detail-name"></td>
                            </tr>
                            <tr>
                                <td class="ps-5">Username</td>
                                <td>:</td>
                                <td id="detail-user-username"></td>
                            </tr>
                            <tr>
                                <td class="ps-5">Email</td>
                                <td>:</td>
                                <td id="detail-user-email"></td>
                            </tr>
                            <tr>
                                <td class="ps-5">Date Created</td>
                                <td>:</td>
                                <td id="detail-created_at"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
