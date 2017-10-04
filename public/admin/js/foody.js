$(function () {
    $("#frm-foody-add").on("submit", function (e) {
        e.preventDefault();
        if ($("#name_addFoody").val() == "") {
            e.preventDefault();
            alert("Phải nhập đầy đủ các trường");
        }
        else {
            var name = $("#name_foody").val();
            var status = $("#sltStatus").val();
            var slt = $("#sltFoody").val();
            var url = $(this).attr("action");
            var _token = $("#frm-foody-add").find("input[name='_token']").val();
            $.post(url, {'_token': _token, 'name': name, 'parent_id': slt, 'status': status}, function (data) {
                $("#dataTables-example tbody").append("<tr style='text-align:center;'><td>1</td><td>" + data.name + "</td><td>" + data.parent_id + "</td><td>" + data.status + "</td><td><button type='button' class='btn btn-warning btn-xs'><i class='fa fa-trash-o  fa-fw'></i></button></a></td><td><button type='button' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#EditCate'><i class='fa fa-pencil fa-fw'></i> </i></button></td></tr>");
            });
            $(this).trigger("reset");
            $("#addFoody").modal("hide");
        }
    });
    $(".btnEditFoody").on("click", function () {
        id = $(this).attr("data-id");
        name = $(this).attr("data-name");
        parentID = $(this).attr("data-parentID");
        status = $(this).attr("data-status");
        id = $("#editFoody #idFoody").val(id);
        _token = $("#frm-foody-edit").find("input[name='_token']").val();
        newName = $("#editFoody #name_foody").val(name);
        newParentID = $("#editFoody #sltFoody").val(parentID);
        newStatus = $("#editFoody #sltStatus").val(status);
    });
    $("#frm-foody-edit").on("submit", function (e) {
        e.preventDefault();
        data = $(this).serialize();
        url = $(this).attr("action");
        $.post(url, data, function (data) {
            $("#dataTables-example tbody .rows" + data.id + " td:eq(1)").html(data.name);
            $("#dataTables-example tbody .rows" + data.id + " td:eq(2)").html(data.parent_id);
            $("#dataTables-example tbody .rows" + data.id + " td:eq(3)").html(data.status);
        });
        $("#editFoody").modal("hide");
    });
});
