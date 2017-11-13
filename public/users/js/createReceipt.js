$(document).ready(function () {
    var url = window.location.pathname;
    var idEditReceipt = url.substring(url.lastIndexOf('/') + 1);
    var forkReceiptId = url.substring(url.indexOf("/"), url.indexOf("/edit-fork/")).slice(16);
    //get id edit
    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        var $target = $(e.target);
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    if(idEditReceipt != '' && forkReceiptId != ''){
        $("#nameReceipt").attr('disabled',true);
        $("#timeReceipt").attr('disabled',true);
        $("#rationReceipt").attr('disabled',true);
        $("#sltComplexReceipt").attr('disabled',true);
        $("#descReceipt").attr('disabled',true);
        $("#imageReceipt").attr('disabled',true);
    }


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
            if(idEditReceipt != '' && forkReceiptId != ''){
                url = "/addReceipt/" + forkReceiptId + '/edit-fork/' +  idEditReceipt;
            }
            else if (idEditReceipt != '') {
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
                    if(data == '') {
                        alertify.notify('thành công', 'success', 5, function() {});
                        $("#addIngredient").attr("data-id", idEditReceipt);
                        $("#addStep").attr('data-id', idEditReceipt);
                        $(".next-step").attr('data-id', idEditReceipt);
                        $("#create").attr("data-id", idEditReceipt);
                        $("#cancel").attr("data-id", idEditReceipt);
                    }
                    else {
                        alertify.notify('Tạo bước 1 thành công', 'success', 5, function() {});
                        $("#addIngredient").attr("data-id", data.id);
                        $("#addStep").attr('data-id', data.id);
                        $(".next-step").attr('data-id', data.id);
                        $(".avatarReceipt img").attr('src', 'upload/images/' + data.image);
                        $("#create").attr("data-id", data.id);
                        $("#cancel").attr("data-id", data.id);
                    }
                },

                error: function(data) {
                    alertify.notify('Tạo bước 1 thất bại', 'error', 5, function() {});
                }
            });
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }
        else {
            swal('Không tốt rồi!', 'Bạn hãy nhập đầy đủ thông tin nha', 'warning')
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

    $("#nameIngredient").on("keyup",function(){
        value = $(this).val();
    });

    $("#addIngredient").on("click", function () {
        name = $("#nameIngredient").val();
        qty = $("#qtyIngredient").val();
        unit = $("#unitIngredient").val();
        note = $("#noteIngredient").val();
        idReceipt = $(this).attr("data-id")
        if(idEditReceipt != '' && forkReceiptId != ''){
                url = "/addIngredient/" + forkReceiptId + '/edit-fork/' +  idEditReceipt;
        }
        else if (idEditReceipt != '') {
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
            if(data.fork == 'fork'){
                alertify.notify('thêm thành công nguyên liệu fork', 'success', 5, function() {});
            }
            else{
                alertify.notify('Tạo nguyên liệu thành công', 'success', 5, function() {});
            }
            $(".resultIngre").append('<div class="col-md-4 ingre' + data.idIngre + data.idRecIngre + '"><button type="button" class="btn btn-default editIngre" data-idIngre="' + data.idIngre + '" data-idRecIngre ="' + data.idRecIngre + '" data-idReceipt="' + data.receipt_id + '">Sửa</button><button type="button" class="btn btn-primary delIngre" data-idIngre="' + data.idIngre + '" data-idRecIngre ="' + data.idRecIngre + '">Xóa</button><br><label>Tên:</label><label id="name">' + data.name + '</label><br><label>Số lượng:</label><label id="qty">' + data.qty + '</label><br><label>Đơn vị:</label><label id="unit">' + data.unit + '</label><br><label>Ghi chú:</label><label id="note">' + data.note + '</label></div>');
            
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
        if(idEditReceipt != '' && forkReceiptId != ''){
            url = "/editIngredient/" + forkReceiptId + '/edit-fork/' +  idEditReceipt;
        }
        else if (idEditReceipt != '') {
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
            alertify.notify('Sửa nguyên liệu thành công', 'success', 5, function() {});
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

        if(idEditReceipt != '' && forkReceiptId != ''){
            url = "/delIngredient/" + forkReceiptId + '/edit-fork/' +  idEditReceipt;
        }

        else if (idEditReceipt != '') {
            url = "/delIngredient/" + idEditReceipt;
        }
        else url = "/delIngredient";
        $.post(url, {
            'idIngre': idIngre,
            'idRecIngre': idRecIngre
        }, function (data) {
            alertify.notify('Xóa nguyên liệu thành công', 'success', 5, function() {});
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
        if(idEditReceipt != '' && forkReceiptId != ''){
                url = "/addStep/" + forkReceiptId + '/edit-fork/' +  idEditReceipt;
        }
        else if (idEditReceipt != '') {
            url = "/addStep/" + idEditReceipt;
        }
        else url = "/addStep";
        $.ajax({
            url: url,
            type: "post",
            processData: false,
            contentType: false,
            data: form_data,
            success: function (data) 
            {
                if(data.fork == 'fork')
                {
                    alertify.notify('thêm bước nấu ăn fork thành công', 'success', 5, function() {});

                }
                else {
                    alertify.notify('thêm bước nấu ăn thành công', 'success', 5, function() {});
                }
                $(".resultStep").append('<div class="col-md-6 step' + data.id + '"><button type="button" class="btn btn-default editStep" data-idStep="' + data.id + '">Sửa</button><button type="button" class="btn btn-primary delStep" data-id="' + data.id + '">Xóa</button><br><label>' + data.step + '.</label><label>Nội dung:</label><label id="content">' + data.content + '</label><br><img style="width:100%;" src="/upload/images/' + data.image + '"/></div>');
                
            },

            error: function(data)
            {
                alertify.notify('thêm bước nấu ăn thất bại', 'error', 5, function() {});
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

        if(idEditReceipt != '' && forkReceiptId != ''){
            url = "/editStep/" + forkReceiptId + '/edit-fork/' +  idEditReceipt;
        }

        else if (idEditReceipt != '') {
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
                alertify.notify('Sửa bước nấu ăn thành công', 'success', 5, function() {});
                $(".resultStep").append('<div class="col-md-6 step' + data.id + '"><button type="button" class="btn btn-default editStep" data-idStep="' + data.id + '">Sửa</button><button type="button" class="btn btn-primary delStep" data-id="' + data.id + '">Xóa</button><br><label>' + data.step + '.</label><label>Nội dung:</label><label id="name">' + data.content + '</label><br><img style="width:100%;" src="upload/images/' + data.image + '"/></div>');
                console.log(data);
            },
            
            error: function(data) {
                alertify.notify('Sửa bước nấu ăn thất bại', 'error', 5, function() {});
            }
        });
        $("#contentStep").val("");
        $("#imageStep").val("");
        $("#updateStep").hide();
        $("#addStep").show();
    });

    $(".resultStep").on("click", '.delStep', function () {
        idRecStep = $(this).parent().find(".editStep").attr("data-idStep");

        if(idEditReceipt != '' && forkReceiptId != ''){
            url = "/delStep/" + forkReceiptId + '/edit-fork/' +  idEditReceipt;
        }

        else if (idEditReceipt != '') {
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
            if(idEditReceipt != '' && forkReceiptId != ''){
                url = "/addReceiptCate/" + forkReceiptId + '/edit-fork/' +  idEditReceipt;
            }
            else if (idEditReceipt != '') {
                url = "/addReceiptCate/" + idEditReceipt;
            }
            else url = "/addReceiptCate";
            $.post(url, {'data': data, 'idReceipt': idReceipt}, function (data) {
                console.log(data);
            });
            alertify.notify('Chọn danh mục thành công', 'success', 5, function() {});
            swal("Thành công");
        }
        else {
            alertify.notify('Chọn danh mục thất bại', 'error', 5, function() {});
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
        if(idEditReceipt != '' && forkReceiptId != ''){
            url = "/createReceipt/" + forkReceiptId + '/edit-fork/' +  idEditReceipt;
        }
        else if (idEditReceipt != '') {
            url = "/createReceipt/" + idEditReceipt;
        }
        else url = "/createReceipt";
        $.post(url, {'id': id}, function (data) {
            if(data == ''){
                swal('Cập thành công thức fork thành công');
                window.location.href = document.location.origin + '/detail/' + forkReceiptId + '/fork/' + idEditReceipt;
            }
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
        if(idEditReceipt != '' && forkReceiptId != ''){
            url = "/cancelReceipt/" + forkReceiptId + '/edit-fork/' +  idEditReceipt;
        }
        else if (idEditReceipt != '') {
            url = "/cancelReceipt/" + idEditReceipt;
        }
        else url = "/cancelReceipt";
        $.post(url, {'id': id}, function (data) {
            if(data == 'Xóa fork thành công'){
                window.location.href="/create-receipt";
                swal('Xóa fork thành công');
            }
            if (data == "Xóa thành công") {
                window.location.href="/create-receipt";
                alertify.notify(data, 'success', 5, function() {});
                swal(data);
            }
            else if (data == "Chưa có công thức nào khởi tạo"){
                alertify.notify(data, 'error', 5, function() {});
                swal(data);
            }
        });
    })

    $(".prev-step").on("click", function (e) {
        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);
    });

    $("#showCartButton").click(function() {
      $("#showCartResult").slideToggle("slow");
    });

    $(".item").on("click",function(){
        valueInCart =  $(this).text();
        $("#nameIngredient").val(valueInCart);
        $("#showCartResult").hide(1000);
    });
    
    $("#nameIngredient").keyup(function(){
        var val = $(this).val().toLowerCase();
        $('#showCartResult .item').hide();
        $('#showCartResult .item').each(function(){
            var text = $(this).text().toLowerCase();
            if(text.indexOf(val) != -1){
                $(this).show();
            }
        });
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
