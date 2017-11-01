$(function () {
    $("#frm-foody-add").on("submit", function (e) {
        e.preventDefault();
        if ($("#name_foody").val() == "") {
            e.preventDefault();
            swal("Không được để trống", "", "warning");
        }
        else {
            var name = $("#name_foody").val();
            var status = $("#sltStatus").val();
            var slt = $("#sltFoody").val();
            var url = $(this).attr("action");
            var _token = $("#frm-foody-add").find("input[name='_token']").val();
            $.ajax({
                type: "post",
                url: url,
                data:{'_token': _token, 'name': name, 'parent_id': slt, 'status': status},
                error: function(data) {
                    alertify.notify('Thêm danh mục '+name+' thất bại', 'error', 5, function() {});
                },
                success: function (data) {
                    $("#dataTables-example tbody").append("<tr style='text-align:center;'><td>1</td><td>" + data.name + "</td><td>" + data.parent_id + "</td><td>" + data.status + "</td><td><button type='button' class='btn btn-warning btn-xs'><i class='fa fa-trash-o  fa-fw'></i></button></a></td><td><button type='button' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#EditCate'><i class='fa fa-pencil fa-fw'></i> </i></button></td></tr>");
                    alertify.notify('Thêm danh mục '+data['name']+' thành công', 'success', 5, function() {});
                    $(this).trigger("reset");
                    $("#addFoody").modal("hide");
                }
            });
        }
    });
    $(".btnEditFoody").on("click", function () {
        id = $("#editFoody #idFoody").val($(this).attr("data-id"));
        _token = $("#frm-foody-edit").find("input[name='_token']").val();
        newName = $("#editFoody #name_foody").val($(this).attr("data-name"));
        newParentID = $("#editFoody #sltFoody").val($(this).attr("data-parentID"));
        newStatus = $("#editFoody #sltStatus").val($(this).attr("data-status"));
    });
    $("#frm-foody-edit").on("submit", function (e) {
        e.preventDefault();
        data = $(this).serialize();
        url = $(this).attr("action");
        $.ajax({
            type: "post",
            url: url,
            data: data,
            error: function(data) {
                alertify.notify('Sửa danh mục '+name+' thất bại', 'error', 5, function() {});
            },
            success: function (data) {
                $("#dataTables-example tbody .rows" + data['id'] + " td:eq(1)").html(data['name_foody']);
                $("#dataTables-example tbody .rows" + data['id'] + " td:eq(2)").html(data['parent_id']);
                $("#dataTables-example tbody .rows" + data['id'] + " td:eq(3)").html(data['sltStatus']);

                alertify.notify('Sửa danh mục '+data['name_foody']+' thành công', 'success', 5, function() {});
                $("#editFoody").modal("hide");
            }
        });
    });
});
