$(function () {
    $('#descIngre').ckeditor({
        toolbar: 'Full',
        enterMode: CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
    });
});
$(function () {
    $("#frm-ingre-add").on("submit", function (e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        if ($("#name_ingre").val() == "") {
            e.preventDefault();
            swal("Không được để trống", "", "warning");
        }
        else {
            var name = $("#name_ingre").val();
            var status = $("#sltStatus").val();
            var cate_id = $("#sltCateIngre").val();
            var url = $(this).attr("action");
            var image = $("#ckfinder-input").val();
            var _token = $("#frm-ingre-add").find("input[name='_token']").val();
            var description = $("#descIngre").val();
            $.post(url, {
                '_token': _token,
                'description': description,
                'image': image,
                'status': status,
                'name': name,
                'category_id': cate_id
            }, function (data) {
                $("#dataTables-example tbody").append("<tr style='text-align:center;'><td>1</td><td>" + data.image + "</td><td>" + data.name + "</td><td>" + data.description + "</td><td>" + data.category_id + "</td><td>" + data.status + "</td><td><button type='button' class='btn btn-warning btn-xs'><i class='fa fa-trash-o  fa-fw'></i></button></a></td><td><button type='button' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#EditCate'><i class='fa fa-pencil fa-fw'></i> </i></button></td></tr>");

            });
            $(this).trigger("reset");
            $("#addIngre").modal("hide");
        }
    });

    $(".btnEditIngre").on("click", function () {
        id = $("#editIngre #idIngre").val($(this).attr("data-id"));
        oldDesc = CKEDITOR.instances.descIngre2.setData($(this).attr("data-desc"));
        oldImage = $("#editIngre #ckfinder-input2").val($(this).attr("data-image"));
        oldName = $("#editIngre #name_ingre").val($(this).attr("data-name"));
        oldCategoryID = $("#editIngre #sltCateIngre").val($(this).attr("data-categoryID"));
        oldStatus = $("#editIngre #sltStatus").val($(this).attr("data-status"));
    });
    $("#frm-ingre-edit").on("submit", function (e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        if (oldName == "" || oldDesc == "") {
            alert($("#name_ingre").val() + $("#ckfinder-input").val())
            e.preventDefault();
            swal("Không được để trống", "", "warning");
        }
        else {
            newImage = $("#editIngre #ckfinder-input2").val();
            newDesc = $("#editIngre #descIngre2").val();
            id = $("#editIngre #idIngre").val();
            newCategoryID = $("#editIngre #sltCateIngre").val();
            newName = $("#editIngre #name_ingre").val();
            newStatus = $("#editIngre #sltStatus").val();
            url = $(this).attr("action");
            var _token = $("#frm-ingre-add").find("input[name='_token']").val();
            $.post(url, {
                '_token': _token,
                'id': id,
                'description': newDesc,
                'category_id': newCategoryID,
                'name': newName,
                'status': newStatus,
                'image': newImage
            }, function (data) {
                $("#dataTables-example tbody .rows" + data.id + " td:eq(1)").html(data.image);
                $("#dataTables-example tbody .rows" + data.id + " td:eq(2)").html(data.name);
                $("#dataTables-example tbody .rows" + data.id + " td:eq(3)").html(data.description);
                $("#dataTables-example tbody .rows" + data.id + " td:eq(4)").html(data.category_id);
                $("#dataTables-example tbody .rows" + data.id + " td:eq(5)").html(data.status);
            });
            $("#editIngre").modal("hide");
        }
    });
});
