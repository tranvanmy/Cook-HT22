$(document).ready(function () {
    $("#addUnit").on("click", function () {
        name = $("#nameUnit").val();
        _token = $("input[type='hidden']").val()
        $.ajax({
            type: "post",
            url: "add",
            data:{'name': name, '_token': _token},
            error: function(data) {
                alertify.notify('Thêm đơn vị '+name+' thất bại', 'error', 5, function() {});
            },

            success: function (data) {
            	$("#dataTables-example tbody").append('<tr class="odd gradeX" align="center"><td style="width:10%;">1</td><td>' + data.name + '</td><td class="center" style="width:10%;"><button id="delete" type="button" class="btn btn-warning btn-xs"><i class="fa fa-trash-o  fa-fw"></i></button></td></tr>');
                alertify.notify('Thêm đơn vị '+data['name']+' thành công', 'success', 5, function() {});
                $("#nameUnit").val("");
                $("#myModal").modal("hide");
            }
        });
    });
});
