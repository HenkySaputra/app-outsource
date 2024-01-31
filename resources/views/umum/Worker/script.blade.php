<script src="{{ asset('assets/js/crud-index.js') }}"></script>
<script>
    $(document).ready(function() {
        // insertRowSkill();
        // deleteRowSkill("{{ route('Skill.delete', '') }}");

        $('#skill-table').DataTable({
            processing: true,
            // serverSide: true,
            responsive: true,
            ajax: {
                url: "{{ route('Skill.list') }}",
                type: "GET", //(untuk mendapatkan data)
                data: {
                    'worker_id': "{{ $data->id }}"
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false,
                },
                {
                    data: 'name',
                    name: 'Name',
                },
                {
                    data: 'level',
                    name: 'Level',
                    searchable: false,
                    className: 'text-capitalize'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'dt-body-right'
                },
            ]
        });

        $('#edu-table').DataTable({
            processing: true,
            // serverSide: true,
            responsive: true,
            ajax: {
                url: "{{ route('Education.list') }}",
                type: "GET", //(untuk mendapatkan data)
                data: {
                    'worker_id': "{{ $data->id }}"
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false,
                },
                {
                    data: 'school_name',
                    name: 'Name',
                },
                {
                    data: 'grade',
                    name: 'Grade',
                    searchable: false,
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'dt-body-right'
                },
            ]
        });

        $('#exp-table').DataTable({
            processing: true,
            // serverSide: true,
            responsive: true,
            ajax: {
                url: "{{ route('Experience.list') }}",
                type: "GET", //(untuk mendapatkan data)
                data: {
                    'worker_id': "{{ $data->id }}"
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false,
                },
                {
                    data: 'company_name',
                    name: 'Company Name',
                },
                {
                    data: 'position',
                    name: 'Position',
                    searchable: false,
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'dt-body-right'
                },
            ]
        });

        $('#license-table').DataTable({
            processing: true,
            // serverSide: true,
            responsive: true,
            ajax: {
                url: "{{ route('License.list') }}",
                type: "GET", //(untuk mendapatkan data)
                data: {
                    'worker_id': "{{ $data->id }}"
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false,
                },
                {
                    data: 'name',
                    name: 'Name',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'dt-body-right'
                },
            ]
        });

        createData();
        editData();

        detailData("{{ route('Education.detail', '') }}", "", '#modalDetailEdu', "", ".viewEdu");
        deleteData(".deleteEdu", "#modalDeleteEdu", "#form-edu_id-delete", "#deleteFormEdu", "#edu-table");

        detailData("{{ route('Experience.detail', '') }}", "", '#modalDetailExp', "", ".viewExp");
        deleteData(".deleteExp", "#modalDeleteExp", "#form-exp_id-delete", "#deleteFormExp",
            "#exp-table");

        deleteData(".deleteSkill", "#modalDeleteSkill", "#form-skill_id-delete", "#deleteFormSkill",
            "#skill-table");
        deleteData(".deleteLicense", "#modalDeleteLicense", "#form-license_id-delete", "#deleteFormLicense",
            "#license-table");
    });

    function createData() {
        // education
        modalTrigger('#btnCreateEdu', '#modalCreateEdu');
        $('#createFormEdu').submit(function(e) {
            e.preventDefault();
            $('.invalid-feedback').each(function(i, obj) {
                $(obj).hide();
            });
            $.ajax({
                type: 'POST',
                url: $('#createFormEdu').attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    formValidateSuccess('.form-input');
                    formValidateError(response.error);
                    if (response.hasOwnProperty('success')) {
                        afterRegistered(response.dataRegis);
                        $('#modalCreateEdu').modal('hide');
                        toastSuccess(response.success);
                        clearForm('#createFormEdu');
                        $('#edu-table').DataTable().ajax
                            .reload();
                    } else {
                        console.log(Object.values(response.error));
                        console.log(Object.values(response.error)[0]);
                        toastError(Object.values(response.error)[0]);
                    }
                },
            });
        });
        // skill
        modalTrigger('#btnCreateSkill', '#modalCreateSkill');
        $('#createFormSkill').submit(function(e) {
            e.preventDefault();
            $('.invalid-feedback').each(function(i, obj) {
                $(obj).hide();
            });
            $.ajax({
                type: 'POST',
                url: $('#createFormSkill').attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    formValidateSuccess('.form-input');
                    formValidateError(response.error);
                    if (response.hasOwnProperty('success')) {
                        afterRegistered(response.dataRegis);
                        $('#modalCreateSkill').modal('hide');
                        toastSuccess(response.success);
                        clearForm('#createFormSkill');
                        $('#skill-table').DataTable().ajax
                            .reload();
                    } else {
                        toastError(Object.values(response.error)[0]);
                    }
                },
            });
        });
        // experience
        modalTrigger('#btnCreateExp', '#modalCreateExp');
        $('#createFormExp').submit(function(e) {
            e.preventDefault();
            $('.invalid-feedback').each(function(i, obj) {
                $(obj).hide();
            });
            $.ajax({
                type: 'POST',
                url: $('#createFormExp').attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    formValidateSuccess('.form-input');
                    formValidateError(response.error);
                    if (response.hasOwnProperty('success')) {
                        afterRegistered(response.dataRegis);
                        $('#modalCreateExp').modal('hide');
                        toastSuccess(response.success);
                        clearForm('#createFormExp');
                        $('#exp-table').DataTable().ajax
                            .reload();
                    } else {
                        toastError(Object.values(response.error)[0]);
                    }
                },
            });
        });
        // license
        modalTrigger('#btnCreateLicense', '#modalCreateLicense');
        $('#createFormLicense').submit(function(e) {
            e.preventDefault();
            $('.invalid-feedback').each(function(i, obj) {
                $(obj).hide();
            });
            $.ajax({
                type: 'POST',
                url: $('#createFormLicense').attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    formValidateSuccess('.form-input');
                    formValidateError(response.error);
                    if (response.hasOwnProperty('success')) {
                        afterRegistered(response.dataRegis);
                        $('#modalCreateLicense').modal('hide');
                        toastSuccess(response.success);
                        clearForm('#createFormLicense');
                        $('#license-table').DataTable().ajax
                            .reload();
                    } else {
                        toastError(Object.values(response.error)[0]);
                    }
                },
            });
        });
    }

    function editData() {
        // edu
        getEditData("{{ route('Education.detail', '') }}", "{{ asset('img/' . $backUrl) }}", '#modalEditEdu', "",
            ".editEdu");
        $('#editFormEdu').submit(function(e) {
            e.preventDefault();
            $('.invalid-feedback').each(function(i, obj) {
                $(obj).hide();
            });
            $.ajax({
                type: 'POST',
                url: $('#editFormEdu').attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    formValidateSuccess('.form-input-edit');
                    formValidateError(response.error, '-edit');
                    if (response.hasOwnProperty('success')) {
                        $('#modalEditEdu').modal('hide');
                        toastSuccess(response.success);
                        clearForm('#editFormEdu');
                        $('#edu-table').DataTable().ajax
                            .reload();
                    } else {
                        toastError(Object.values(response.error)[0]);
                    }
                },
            });
        });
        //skill
        getEditData("{{ route('Skill.detail', '') }}", "{{ asset('img/' . $backUrl) }}", '#modalEditSkill', "",
            ".editSkill");
        $('#editFormSkill').submit(function(e) {
            e.preventDefault();
            $('.invalid-feedback').each(function(i, obj) {
                $(obj).hide();
            });
            $.ajax({
                type: 'POST',
                url: $('#editFormSkill').attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    formValidateSuccess('.form-input-edit');
                    formValidateError(response.error, '-edit');
                    if (response.hasOwnProperty('success')) {
                        $('#modalEditSkill').modal('hide');
                        toastSuccess(response.success);
                        clearForm('#editFormSkill');
                        $('#skill-table').DataTable().ajax
                            .reload();
                    } else {
                        toastError(Object.values(response.error)[0]);
                    }
                },
            });
        });
        //experience
        getEditData("{{ route('Experience.detail', '') }}", "{{ asset('img/' . $backUrl) }}", '#modalEditExp', "",
            ".editExp");
        $('#editFormExp').submit(function(e) {
            e.preventDefault();
            $('.invalid-feedback').each(function(i, obj) {
                $(obj).hide();
            });
            $.ajax({
                type: 'POST',
                url: $('#editFormExp').attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    formValidateSuccess('.form-input-edit');
                    formValidateError(response.error, '-edit');
                    if (response.hasOwnProperty('success')) {
                        $('#modalEditExp').modal('hide');
                        toastSuccess(response.success);
                        clearForm('#editFormExp');
                        $('#exp-table').DataTable().ajax
                            .reload();
                    } else {
                        toastError(Object.values(response.error)[0]);
                    }
                },
            });
        });
        //License
        getEditData("{{ route('License.detail', '') }}", "{{ asset('img/' . $backUrl) }}", '#modalEditLicense', "",
            ".editLicense");
        $('#editFormLicense').submit(function(e) {
            e.preventDefault();
            $('.invalid-feedback').each(function(i, obj) {
                $(obj).hide();
            });
            $.ajax({
                type: 'POST',
                url: $('#editFormLicense').attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    formValidateSuccess('.form-input-edit');
                    formValidateError(response.error, '-edit');
                    if (response.hasOwnProperty('success')) {
                        $('#modalEditLicense').modal('hide');
                        toastSuccess(response.success);
                        clearForm('#editFormLicense');
                        $('#license-table').DataTable().ajax
                            .reload();
                    } else {
                        toastError(Object.values(response.error)[0]);
                    }
                },
            });
        });
    }


    // function insertRowSkill() {
    //     $('#skill-table > thead').on('click', '.insertRowSkill', function(e) {
    //         if ($('.newRowSkill')[0]) {
    //             console.log('Masih ada row yg belum diisi');
    //             return;
    //         }
    //         var row = '<tr class="align-middle newRowSkill">' +
    //             '<td>' +
    //             '   <input type="text" required' +
    //             '   class = "border border-secondary form-control form-control-solid ps-5"' +
    //             '   id="skill-name" placeholder="Enter Skill" name="skillName" />' +
    //             '</td>' +
    //             '<td>' +
    //             '   <select name="skillLevel" id="skill-level"' +
    //             '   class="border border-secondary form-control form-control-lg form-control-solid form-input select2" required>' +
    //             '       <option class="d-none" disabled value="" selected>Select Level</option>' +
    //             '       <option value="beginner">Beginner</option>' +
    //             '       <option value="intermediate">Intermediate</option>' +
    //             '       <option value="expert">Expert</option>' +
    //             '  </select>' +
    //             '</td>' +
    //             '<td class="text-end min-w-100px pe-5">' +
    //             '   <div id="skill-action" class="text-end">' +
    //             '       <button type="submit" id="btn-tambah-skill" class="btn btn-sm btn-icon btn-active-success">' +
    //             '           <span class="svg-icon svg-icon-1">' +
    //             '               <i class="bi bi-upload fs-6"></i>' +
    //             '           </span>' +
    //             '        </button>' +
    //             '       <a href="javascript:void(0);" class="btn btn-sm btn-icon btn-active-danger deleteRowSkill">' +
    //             '           <span class="svg-icon svg-icon-1">' +
    //             '               <i class="bi bi-trash fs-6"></i>' +
    //             '           </span>' +
    //             '       </a>' +
    //             '   </div>' +
    //             '</td>' +
    //             '</tr>';

    //         $('#skill-table > tbody').append(row);
    //     });

    //     $('#createSkillForm').submit(function(e) {
    //         e.preventDefault();
    //         $.ajax({
    //             type: 'POST',
    //             url: $('#createSkillForm').attr('action'),
    //             data: new FormData(this),
    //             contentType: false,
    //             cache: false,
    //             processData: false,
    //             success: function(response) {
    //                 formValidateSuccess('.form-input');
    //                 formValidateError(response.error);
    //                 if (response.hasOwnProperty('success')) {
    //                     $('.newRowSkill').remove();
    //                     newRowSkill(response.data);
    //                     toastSuccess(response.success);
    //                 } else {
    //                     toastError(Object.values(response.error)[0]);
    //                 }
    //             },
    //         });
    //     });
    // }

    // function deleteRowSkill(url) {
    //     $('#skill-table > tbody').on('click', '.deleteRowSkill', function(e) {
    //         var row = $(this).closest('tr');
    //         var newRow = row.hasClass('newRowSkill');
    //         if (newRow) {
    //             row.remove();
    //             return;
    //         }

    //         var conf = confirm("Delete Skill ?");
    //         if (conf) {
    //             $.ajax({
    //                 type: "GET",
    //                 url: url + "/" + $(this).data('id'),
    //                 dataType: "JSON",
    //                 success: function(response) {
    //                     if (response.hasOwnProperty("success")) {
    //                         toastSuccess(response.success);
    //                         row.remove();
    //                     } else {
    //                         toastError();
    //                     }
    //                 },
    //             });
    //         }
    //     });
    // }
</script>
