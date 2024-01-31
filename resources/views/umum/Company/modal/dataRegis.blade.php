<!-- Modal Add -->
<div id="printElement">

    <div class="modal fade" tabindex="-1" role="dialog" id="modalDataRegistered">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen" role="document">
            <div class="modal-content rounded px-md-20">
                <div class="modal-header pb-0 border-0 justify-content-end"></div>
                <div class="modal-body scroll-y px-10 px-lg-15 pb-15">
                    <div class="mb-5 d-flex justify-content-between">
                        <h1 class="mb-3">New Data {{ $backUrl }}</h1>
                        {{-- <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <i class="bi bi-x fs-1"></i>
                            </span>
                        </div> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="index-table" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td class="ps-5">Name</td>
                                    <td>:</td>
                                    <td id="data-regis-name"></td>
                                </tr>
                                <tr>
                                    <td class="ps-5">Phone</td>
                                    <td>:</td>
                                    <td id="data-regis-phone"></td>
                                </tr>
                                <tr>
                                    <td class="ps-5">Employee</td>
                                    <td>:</td>
                                    <td id="data-regis-employee_count"></td>
                                </tr>
                                <tr>
                                    <td class="ps-5">Industry</td>
                                    <td>:</td>
                                    <td id="data-regis-industry"></td>
                                </tr>
                                <tr>
                                    <td class="ps-5">Username</td>
                                    <td>:</td>
                                    <td id="data-regis-username"></td>
                                </tr>
                                <tr>
                                    <td class="ps-5">Email</td>
                                    <td>:</td>
                                    <td id="data-regis-email"></td>
                                </tr>
                                <tr>
                                    <td class="ps-5">Password</td>
                                    <td>:</td>
                                    <td id="data-regis-password"></td>
                                </tr>
                                <tr>
                                    <td class="ps-5">Date Created</td>
                                    <td>:</td>
                                    <td id="data-regis-created_at"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="py-5">
                            <p>Please save the document before leave.</p>
                        </div>
                        <div class="text-center my-15" id="btnPrintDiv">
                            <button type="reset" class="btn btn-light me-5" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btnPrint">
                                Print/Save
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
