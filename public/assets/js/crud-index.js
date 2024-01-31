function clearForm(selector, image = null, summer = null, imageUrl = null) {
    $(":input", selector)
        .not(":button, :submit, :reset, :hidden")
        .val("")
        .prop("checked", false)
        .prop("selected", false)
        .css({
            "border-color": "",
        });
    if (image != null) {
        $(image).attr("src", imageUrl);
    }
    if (summer != null) {
        $(summer).summernote("reset");
    }
    if (selector == "#editForm") {
        var check = $(".extraCategoryColEdit").length;
        for (let index = check; index > 0; index--) {
            // console.log("cleared " + index);
            $("#form-category-edit-" + index)
                .closest(".row")
                .remove();
        }
    }
    if (selector == "#createForm") {
        $(".extraCategoryCol").closest(".row").remove();
    }
}

function isArray(what) {
    return Object.prototype.toString.call(what) === "[object Array]";
}

function toastSuccess(message, timeout = 5000) {
    iziToast.success({
        title: "Success!",
        message: message,
        timeout: timeout,
        position: "topRight",
    });
}

function toastError(msg = null) {
    iziToast.error({
        title: "Error!",
        message: msg != null ? msg : "Silahkan cek kembali input anda",
        position: "topRight",
    });
}

function formValidateSuccess(selector) {
    $(selector).each(function (i, obj) {
        $(obj).css({
            "border-color": "#28a745",
        });
    });
}

function formValidateError(error, selector = "") {
    jQuery.each(error, function (key, val) {
        $("#form-" + key + selector).css({
            "border-color": "#dc3545",
        });
        $("#error-" + key + selector).html(val);
        $("#error-" + key + selector).show();
    });
}

function initializeSummer(selector, placeholder) {
    $(selector).summernote({
        placeholder: placeholder,
        tabsize: 2,
        height: 300,
        resize: true,
    });
}

function imagePreview(inputSelector, imageSelector) {
    $(inputSelector).change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            $(imageSelector).attr("src", e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
    });
}

function modalTrigger(button, selector, special = null) {
    $(button).click(function (e) {
        e.preventDefault();
        $(selector).modal("show");
        if (special == "Project") clearForm("#createForm");
    });
}

function htmlDecode(data) {
    var txt = document.createElement("textarea");
    txt.innerHTML = data;
    return txt.value;
}

function formatState(opt) {
    if (!opt.id) {
        return opt.text.toUpperCase();
    }

    var optimage = $(opt.element).attr("data-image");
    if (!optimage) {
        return opt.text.toUpperCase();
    } else {
        var $opt = $(
            '<span><img src="' +
                optimage +
                '" width="60px" /> ' +
                opt.text.toUpperCase() +
                "</span>"
        );
        return $opt;
    }
}

function formatStateIcon(opt) {
    if (!opt.id) {
        return opt.text.toUpperCase();
    }

    var optimage = $(opt.element).attr("data-icon");
    var $opt = $(
        '<span><i class="flag-icon flag-icon-' +
            optimage.toLowerCase() +
            ' flag-icon-squared" style="margin-left:10px;height:10px;"></i>' +
            opt.text.toUpperCase() +
            "</span>"
    );
    return $opt;
}

function formatStateBrand(opt) {
    if (!opt.id) {
        return opt.text.toUpperCase();
    }

    var optimage = $(opt.element).attr("data-icon");
    var $opt = $(
        '<span><i class="fab fa-' +
            optimage.toLowerCase() +
            ' flag-icon-squared" style="margin-right:5px;height:10px;"></i></span>'
    );
    return $opt;
}

function getEditData(
    url,
    imageUrl = null,
    modal,
    defaultUrl = null,
    button = ".edit"
) {
    $(document).on("click", button, function (e) {
        e.preventDefault();
        clearForm("#editForm");
        var id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: url + "/" + id,
            dataType: "JSON",
            success: function (response) {
                // console.log(response.data);
                if (response.hasOwnProperty("name")) {
                    var name = response.name;
                    jQuery.each(response.data, function (key, val) {
                        if (key == "img" && !!val) {
                            $("#form-" + name + "-" + key + "-edit").attr(
                                "src",
                                imageUrl + "/" + val
                            );
                        } else if (
                            $("#form-" + name + "-" + key + "-edit").hasClass(
                                "select2v2"
                            )
                        ) {
                            $("#form-" + name + "-" + key + "-edit")
                                .val(val)
                                .trigger("change");
                        } else if (
                            $("#form-" + name + "-" + key + "-edit").hasClass(
                                "select2"
                            )
                        ) {
                            $("#form-" + name + "-" + key + "-edit")
                                .val(val.id)
                                .trigger("change");
                        } else {
                            $("#form-" + name + "-" + key + "-edit").val(val);
                        }
                    });
                } else
                    jQuery.each(response.data, function (key, val) {
                        if (key == "img" && !!val) {
                            $("#form-" + key + "-edit").attr(
                                "src",
                                imageUrl + "/" + val
                            );
                        } else if (
                            $("#form-" + key + "-edit").hasClass("select2v2")
                        ) {
                            $("#form-" + key + "-edit")
                                .val(val)
                                .trigger("change");
                        } else if (
                            $("#form-" + key + "-edit").hasClass("select2")
                        ) {
                            $("#form-" + key + "-edit")
                                .val(val.id)
                                .trigger("change");
                        } else {
                            $("#form-" + key + "-edit").val(val);
                        }
                    });
            },
        });
        $(modal).modal("show");
    });
}
function newRowSkill(valArray) {
    var row = '<tr class="align-middle">';

    row += '<td class="ps-5">' + valArray.name + "</td>";
    row += "<td>" + valArray.level + "</td>";
    row +=
        '<td class="text-end min-w-100px pe-5">' +
        '   <div id="skill-action" class="text-end">' +
        '       <a href="javascript:void(0);" class="btn btn-sm btn-icon btn-active-danger deleteRowSkill" data-id="' +
        valArray.id +
        '">' +
        '           <span class="svg-icon svg-icon-1">' +
        '               <i class="bi bi-trash fs-6"></i>' +
        "           </span>" +
        "       </a>" +
        "   </div>" +
        "</td>";

    row += "</tr>";
    $("#skill-table > tbody").append(row);
}

function detailData(
    url,
    imageUrl = null,
    modal,
    defaultUrl = null,
    button = ".view",
    isDashboard = false
) {
    $(document).on("click", button, function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: url + "/" + id,
            dataType: "JSON",
            success: function (response) {
                // console.log(response);
                if (response.hasOwnProperty("name")) {
                    var name = response.name;
                    jQuery.each(response.data, function (key, val) {
                        // console.log([key, val]);
                        if (typeof val == "object") {
                            jQuery.each(val, function (keyArray, valArray) {
                                if (keyArray == "created_at") {
                                    $(
                                        "#detail-" +
                                            name +
                                            "-" +
                                            key +
                                            "-" +
                                            keyArray
                                    ).html(new Date(valArray));
                                } else $("#detail-" + name + "-" + key + "-" + keyArray).html(valArray);
                            });
                        } else {
                            if (key == "id") {
                                $("#detail-" + name + "-" + key).val(val);
                            } else if (key == "created_at") {
                                $("#detail-" + name + "-" + key).html(
                                    new Date(val).toISOString().split("T")[0]
                                );
                            } else {
                                $("#detail-" + name + "-" + key).html(val);
                            }
                        }
                    });
                } else
                    jQuery.each(response.data, function (key, val) {
                        // console.log([key, val]);
                        if (typeof val == "object") {
                            jQuery.each(val, function (keyArray, valArray) {
                                if (keyArray == "created_at") {
                                    $("#detail-" + key + "-" + keyArray).html(
                                        new Date(valArray)
                                    );
                                } else $("#detail-" + key + "-" + keyArray).html(valArray);
                            });
                        } else {
                            if (key == "id") {
                                $("#detail-" + key).val(val);
                            } else if (key == "created_at") {
                                $("#detail-" + key).html(
                                    new Date(val).toISOString().split("T")[0]
                                );
                            } else {
                                $("#detail-" + key).html(val);
                            }
                        }
                    });
            },
        });
        $(modal).modal("show");
    });
}

function deleteData(
    button = ".delete",
    modal = "#modalDelete",
    form_id = "#form-id-delete",
    delete_form = "#deleteForm",
    index_table = "#index-table"
) {
    $(document).on("click", button, function (e) {
        // console.log([button, modal, form_id]);
        e.preventDefault();
        var id = $(this).data("id");
        $(form_id).val(id);
        $(modal).modal("show");
    });

    $(delete_form).submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "DELETE",
            url: $(delete_form).attr("action"),
            data: $(delete_form).serialize(),
            success: function (response) {
                if (response.hasOwnProperty("success")) {
                    $(modal).modal("hide");
                    $("#modalDetail").modal("hide");
                    toastSuccess(response.success);
                    $(index_table).DataTable().ajax.reload();
                } else {
                    toastError();
                }
            },
            error: function (response) {
                $(modal).modal("hide");
                if (response.responseJSON.hasOwnProperty("errors")) {
                    toastError(response.responseJSON.errors);
                } else {
                    toastError(response.responseJSON.message.split(" ")[0]);
                }
            },
        });
    });
}

function counter(form = null, counter = null, text_max = 100) {
    $(counter).html("0 / " + text_max);
    $(form).keyup(function () {
        var text_length = $(form).val().length;

        $(counter).html(text_length + " / " + text_max);
    });
}

//kebutuhan career
$("#form-kebutuhan").on("change", function (e) {
    var value = e.target.value;
    if (value < 0) {
        $("#form-kebutuhan").val(0);
        disabledForm("#form-status", true);
    } else if (value == 0) {
        disabledForm("#form-status", true);
    } else {
        disabledForm("#form-status", false);
    }
});
$("#form-kebutuhan-edit").on("change", function (e) {
    var value = e.target.value;
    if (value < 0) {
        $("#form-kebutuhan-edit").val(0);
        disabledForm("#form-status-edit", true);
    } else if (value == 0) {
        disabledForm("#form-status-edit", true);
    } else {
        disabledForm("#form-status-edit", false);
    }
});

function disabledForm(id, val) {
    if (val) {
        $(id).val(0);
    }
    $(id).attr("disabled", val);
}

// generate password
function genPass() {
    // define result variable
    var password = "";
    // define allowed characters
    var characters =
        "0123456789@#$%!&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

    // define length of password character
    var long = "15";
    for (var i = 0; i < long; i++) {
        // generate password
        gen = characters.charAt(Math.floor(Math.random() * characters.length));
        password += gen;
    }
    // send the output to the input
    document.getElementById("password").value = password;
}
// Copy password button
function copy() {
    // get password from input text field
    var copyText = document.getElementById("password");
    // Set selection range to copy longer text on mobile devices
    copyText.setSelectionRange(0, 9999);
    //Copy the text from the text field
    navigator.clipboard.writeText(copyText.value);
    if (copyText.value) {
        // toast
        toastSuccess("Password Copied Successully!");
    }
}

function show() {
    var password = document.getElementById("password");
    var type = password.getAttribute("type");
    var icon = document.getElementById("show_icon");
    if (type == "password") {
        password.type = "text";
        icon.classList.remove("bi-eye-fill");
        icon.classList.add("bi-eye-slash-fill");
    } else {
        password.type = "password";
        icon.classList.add("bi-eye-fill");
        icon.classList.remove("bi-eye-slash-fill");
    }
}

if (document.getElementById("btnPrint")) {
    document.getElementById("btnPrint").onclick = function () {
        printElement(document.getElementById("printElement"));
    };
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }

    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
    document.body.removeChild($printSection);
}

function afterRegistered(data) {
    jQuery.each(data, function (key, val) {
        // console.log([key, val]);
        if (typeof val == "object") {
            jQuery.each(val, function (keyArray, valArray) {
                $("#data-regis-" + key + "-" + keyArray).html(valArray);
            });
        } else {
            $("#data-regis-" + key).html(val);

            // $("#data-regis-created_at").html(
            //     new Date().toISOString().split("T")[0]
            // );
        }
    });
    $("#modalDataRegistered").modal("show");
}

$("#closefirstmodal").click(function () {
    //Close Button on Form Modal to trigger Warning Modal
    $("#Warning")
        .on("show.bs.modal", function () {
            //Register `show` event listener before showing modal
            $("#confirmclosed").click(function () {
                //Waring Modal Confirm Close Button
                $("#Warning").modal("hide"); //Hide Warning Modal
                $("#Form").modal("hide"); //Hide Form Modal
            });
        })
        .modal("show"); //Show Warning Modal
});
