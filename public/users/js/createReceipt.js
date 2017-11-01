$(document).ready(function () {
    var url = window.location.pathname;
    var idEditReceipt = url.substring(url.lastIndexOf('/') + 1);
    //get id edit
    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        var $target = $(e.target);
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    //AddReceipt
    $(".next-step1").on("click", function () {
        if ($("#nameReceipt").val() != '' && $("#timeReceipt").val() != '' && $("#rationReceipt").val() != '' && $("#sltComplexReceipt").val() != '' && $("#descReceipt").val() != '' && ($("#imageReceipt").val() != '' || $(".right img").attr("src") != '')) {
            var form_data = new FormData();
            form_data.append("name", $("#nameReceipt").val());
            form_data.append("time", $("#timeReceipt").val());
            form_data.append("ration", $("#rationReceipt").val());
            form_data.append("complex", $("#sltComplexReceipt").val());
            form_data.append("description", $("#descReceipt").val());
            form_data.append("image", $('#imageReceipt')[0].files[0]);
            form_data.append("id", $(this).attr("data-id"));
            if (idEditReceipt != '') {
                url = "/addReceipt/" + idEditReceipt;
            }
            else url = "/addReceipt";
            $.ajax({
                url: url,
                type: "post",
                processData: false,
                contentType: false,
                data: form_data,
                success: function (data) {
                    $("#addIngredient").attr("data-id", data.id);
                    $("#addStep").attr("data-id", data.id);
                    $(".next-step").attr("data-id", data.id);
                    $(".avatarReceipt img").attr("src", "upload/images/" + data.image);
                    $("#create").attr("data-id", data.id);
                    $("#cancel").attr("data-id", data.id);
                }
            });
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }
        else {
            swal("Không tốt rồi!", "Bạn hãy nhập đầy đủ thông tin nha", "warning")
        }
    });
    //--------------endAddReceipt

    //--------Ingredient
    $(".next-step2").on("click", function (e) {
        if (($("#nameIngredient").val() != '' && $("#qtyIngredient").val() != '' && $("#unitIngredient").val() != '') || $(".resultIngre .editIngre").attr("data-idIngre") != null) {
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }
        else {
            swal("Không tốt rồi!", "Bạn hãy nhập đầy đủ thông tin nha", "warning")
        }
    });

    $("#addIngredient").on("click", function () {
        name = $("#nameIngredient").val();
        qty = $("#qtyIngredient").val();
        unit = $("#unitIngredient").val();
        note = $("#noteIngredient").val();
        idReceipt = $(this).attr("data-id")
        if (idEditReceipt != '') {
            url = "/addIngredient/" + idEditReceipt;
        }
        else url = "/addIngredient";
        $.post(url, {
            'idReceipt': idReceipt,
            'name': name,
            'qty': qty,
            'unit': unit,
            'note': note
        }, function (data) {
            $(".resultIngre").append('<div class="col-md-4 ingre' + data.idIngre + data.idRecIngre + '"><button type="button" class="btn btn-default editIngre" data-idIngre="' + data.idIngre + '" data-idRecIngre ="' + data.idRecIngre + '" data-idReceipt="' + data.receipt_id + '">Sửa</button><button type="button" class="btn btn-primary delIngre" data-idIngre="' + data.idIngre + '" data-idRecIngre ="' + data.idRecIngre + '">Xóa</button><br><label>Tên:</label><label id="name">' + data.name + '</label><br><label>Số lượng:</label><label id="qty">' + data.qty + '</label><br><label>Đơn vị:</label><label id="unit">' + data.unit + '</label><br><label>Ghi chú:</label><label id="note">' + data.note + '</label></div>');
            console.log(data);
        });
        $("#nameIngredient").val("");
        $("#qtyIngredient").val("");
        $("#unitIngredient").val("0");
        $("#noteIngredient").val("");

    });

    $(".resultIngre").on("click", '.editIngre', function () {
        idIngre = $(this).parent().find(".editIngre").attr("data-idIngre");
        idRecIngre = $(this).parent().find(".editIngre").attr("data-idRecIngre");
        idReceipt = $(this).parent().find(".editIngre").attr("data-idReceipt");
        $("#nameIngredient").val($(this).parent().find("#name").text());
        $("#qtyIngredient").val($(this).parent().find("#qty").text());
        $("#unitIngredient").val($(this).parent().find("#unit").text());
        $("#noteIngredient").val($(this).parent().find("#note").text());
        $(".ingre" + idIngre + idRecIngre).hide();
        $("#addIngredient").hide();
        $("#informIngre").append("<button type='button' class='btn btn-default btn-ms' data-idIngre=" + idIngre + " data-idRecIngre=" + idRecIngre + " data-idReceipt=" + idReceipt + " id='updateIngre'><i class='fa fa-refresh'></i></button>");
    });

    $("#informIngre").on("click", "#updateIngre", function () {
        idIngre = $(this).attr("data-idIngre");
        idRecIngre = $(this).attr("data-idRecIngre");
        idReceipt = $(this).attr("data-idReceipt");
        name = $("#nameIngredient").val();
        qty = $("#qtyIngredient").val();
        unit = $("#unitIngredient").val();
        note = $("#noteIngredient").val();
        if (idEditReceipt != '') {
            url = "/editIngredient/" + idEditReceipt;
        }
        else url = "/editIngredient";
        $.post(url, {
            'idReceipt': idReceipt,
            'name': name,
            'qty': qty,
            'unit': unit,
            'note': note,
            'idIngre': idIngre,
            'idRecIngre': idRecIngre
        }, function (data) {
            $(".resultIngre").append('<div class="col-md-4 ingre' + data.idIngre + data.idRecIngre + '"><button type="button" class="btn btn-default editIngre" data-idIngre="' + data.idIngre + '" data-idRecIngre ="' + data.idRecIngre + '" data-idReceipt="' + data.receipt_id + '">Sửa</button><button type="button" class="btn btn-primary delIngre" data-idIngre="' + data.idIngre + '" data-idRecIngre ="' + data.idRecIngre + '">Xóa</button><br><label>Tên:</label><label id="name">' + data.name + '</label><br><label>Số lượng:</label><label id="qty">' + data.qty + '</label><br><label>Đơn vị:</label><label id="unit">' + data.unit + '</label><br><label>Ghi chú:</label><label id="note">' + data.note + '</label></div>');
        });
        $("#nameIngredient").val("");
        $("#qtyIngredient").val("");
        $("#unitIngredient").val("0");
        $("#noteIngredient").val("");
    });

    $(".resultIngre").on("click", '.delIngre', function () {
        idIngre = $(this).parent().find(".delIngre").attr("data-idIngre");
        idRecIngre = $(this).parent().find(".delIngre").attr("data-idRecIngre");

        if (idEditReceipt != '') {
            url = "/delIngredient/" + idEditReceipt;
        }
        else url = "/delIngredient";
        $.post(url, {
            'idIngre': idIngre,
            'idRecIngre': idRecIngre
        }, function (data) {
            $(".ingre" + data.idIngre + data.idRecIngre).hide();
            swal("Xóa thành công");
        });
    });
    //------------endIngredient

    // -------- Receipt Step
    $(".next-step3").on("click", function (e) {
        if (($("#contentStep").val() != '' && $("#imageStep").val() != '') || $(".resultStep .editStep").attr("data-idstep") != null) {
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }
        else {
            swal("Không tốt rồi!", "Bạn hãy nhập đầy đủ thông tin nha", "warning")
        }
    });

    $("#addStep").on("click", function () {
        var form_data = new FormData();
        form_data.append("content", $("#contentStep").val());
        form_data.append("image", $('#imageStep')[0].files[0]);
        var count = $(".resultStep div.col-md-6").length;
        form_data.append("step", ++count);
        form_data.append("idReceipt", $(this).attr("data-id"));
        if (idEditReceipt != '') {
            url = "/addStep/" + idEditReceipt;
        }
        else url = "/addStep";
        $.ajax({
            url: url,
            type: "post",
            processData: false,
            contentType: false,
            data: form_data,
            success: function (data) {
                $(".resultStep").append('<div class="col-md-6 step' + data.id + '"><button type="button" class="btn btn-default editStep" data-idStep="' + data.id + '">Sửa</button><button type="button" class="btn btn-primary delStep" data-id="' + data.id + '">Xóa</button><br><label>' + data.step + '.</label><label>Nội dung:</label><label id="content">' + data.content + '</label><br><img style="width:100%;" src="/upload/images/' + data.image + '"/></div>');
                console.log(data);
            }
        });
        $("#contentStep").val("");
        $("#imageStep").val("");
    });

    $(".resultStep").on("click", '.editStep', function () {
        idRecStep = $(this).parent().find(".editStep").attr("data-idStep");
        $("#contentStep").val($(this).parent().find("#content").text());
        $(".step" + idRecStep).hide();
        $("#informStep").append("<button type='button' class='btn btn-default btn-ms' data-idStep=" + idRecStep + " id='updateStep'><i class='fa fa-refresh'></i></button>");
        $("#addStep").hide();

    });

    $("#informStep").on("click", "#updateStep", function () {
        form_data = new FormData();
        form_data.append("content", $("#contentStep").val())
        form_data.append("image", $('#imageStep')[0].files[0]);
        var count = $(".resultStep div.col-md-6").length;
        form_data.append("step", ++count);
        form_data.append("idRecStep", $(this).attr("data-idStep"));
        if (idEditReceipt != '') {
            url = "/editStep/" + idEditReceipt;
        }
        else url = "/editStep";
        $.ajax({
            url: url,
            type: "post",
            processData: false,
            contentType: false,
            data: form_data,
            success: function (data) {
                $(".resultStep").append('<div class="col-md-6 step' + data.id + '"><button type="button" class="btn btn-default editStep" data-idStep="' + data.id + '">Sửa</button><button type="button" class="btn btn-primary delStep" data-id="' + data.id + '">Xóa</button><br><label>' + data.step + '.</label><label>Nội dung:</label><label id="name">' + data.content + '</label><br><img style="width:100%;" src="upload/images/' + data.image + '"/></div>');
                console.log(data);
            }
        });
        $("#contentStep").val("");
        $("#imageStep").val("");
        $("#updateStep").hide();
        $("#addStep").show();
    });

    $(".resultStep").on("click", '.delStep', function () {
        idRecStep = $(this).parent().find(".editStep").attr("data-idStep");

        if (idEditReceipt != '') {
            url = "/delStep/" + idEditReceipt;
        }
        else url = "/delStep";
        $.post(url, {
            'idRecStep': idRecStep
        }, function (data) {
            $(".step" + data.idRecStep).hide();
            swal("Xóa Thành Công");
        });
    });

    $(".next-step").on("click", function (e) {
        if ($('input[type="checkbox"]:checked').length > 0) {
            var data = $('.nameBox:checked').serialize();
            idReceipt = $(this).attr("data-id");
            if (idEditReceipt != '') {
                url = "/addReceiptCate/" + idEditReceipt;
            }
            else url = "/addReceiptCate";
            $.post(url, {'data': data, 'idReceipt': idReceipt}, function (data) {
                console.log(data);
            });
            swal("Thành công");
        }
        else {
            swal("Không tốt rồi!", "Bạn hãy nhập đầy đủ thông tin nha", "warning")
        }
    });


    // $("input:checkbox").click(function () {
    //     var ids = new Array();
    //     $("input[name='nameBox[]']:checked").each(function(){
    //         ids.push($(this).val());
    //     });

    //     idReceipt = $(this).attr("data-id");
    //     $.post("addReceiptCate",{'ids':ids.join(),'idReceipt':idReceipt}, function (data) {
    //         console.log(data);
    //     });
    // });

    $("#create").on("click", function (e) {

        id = $(this).attr("data-id");
        if (idEditReceipt != '') {
            url = "/createReceipt/" + idEditReceipt;
        }
        else url = "/createReceipt";
        $.post(url, {'id': id}, function (data) {
            if (data == "Tạo công thức thành công") {
                swal(data);
                window.location.href = document.location.origin + '/detail/' + id;
            }
            else if (data == "Tạo công thức thất bại")
                swal(data);
        });
    });

    $("#cancel").on("click", function (e) {
        id = $(this).attr("data-id");

        if (idEditReceipt != '') {
            url = "/cancelReceipt/" + idEditReceipt;
        }
        else url = "/cancelReceipt";
        $.post(url, {'id': id}, function (data) {
            if (data == "Xóa công thức thành công") {
                window.location.href="/create-receipt";
                swal(data);
            }
            else if (data == "Chưa có công thức nào khởi tạo")
                swal(data);
        });
    })

    $(".prev-step").on("click", function (e) {
        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);
    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
