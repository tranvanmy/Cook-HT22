$(document).ready(function(){
	$(".editStatus").on("click", function () {
        $("#update").val($(this).attr("data-id"));
    });
	$("#update").on("click", function () {
        id = $(this).val();
        status = $("#sltStatus").val();
        _token = $("input[type='hidden']").val();
        $.post("edit", {'id': id, 'status': status, '_token': _token}, function (data) {
            if (data.status == 0) {
                $("#dataTables-example tbody .rows" + data.id + " td:eq(3)").html("<i class='fa fa-cog' aria-hidden='true' title='Chưa duyệt'></i>");
            }
            else {
                $("#dataTables-example tbody .rows" + data.id + " td:eq(3)").html("<i class='fa fa-check' aria-hidden='true' title='Đã duyệt'></i>");
            }
        });
        $("#myModal").modal("hide");
    })
});