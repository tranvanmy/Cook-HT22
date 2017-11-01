$(document).ready(function () {
    $(".editStatus").one("click", function () {
        id = $(this).attr("data-id");
        $("#update").attr("data-id", id);
        _token = $("input[type='hidden']").val();
        $(".a").text($(this).attr("data-total"));
        $.post("edit", {'id': id, '_token': _token}, function (data) {
            location.reload();
            for (var i = 0; i < data.length; i++) {
                $("#cart tbody").append('<tr><td data-th="Product"><div class="row"><div class="col-sm-4 hidden-xs"><img src="/upload/images/' + data[i].image + '" alt="..." class="img-responsive"/></div><div class="col-sm-8"><h4 class="nomargin">' + data[i].name + '</h4></div></div></td><td data-th="Price">' + data[i].price + '</td><td data-th="Quantity"><input type="text" disabled class="form-control text-center qty" value="' + data[i]["pivot"]["quantity"] + '"></td><td data-th="Subtotal" class="text-center">' + data[i]["pivot"]["quantity"] * data[i].price + '</td></tr>');
            }
            // $("#cart tbody").each(function(i,v){
            //     $(this).append('<tr><td data-th="Product"><div class="row"><div class="col-sm-3 hidden-xs"><img src="/upload/images/' + data[i].image + '" alt="..." class="img-responsive"/></div><div class="col-sm-9"><h4 class="nomargin">' + data[i].name + '</h4></div></div></td><td data-th="Price">' + data[i].price + '</td><td data-th="Quantity"><input type="text" disabled class="form-control text-center qty" value="' + data[i]["pivot"]["quantity"] + '"></td><td data-th="Subtotal" class="text-center">' + data[i]["pivot"]["quantity"] * data[i].price + '</td></tr>');
            // });
        });
    });
    $("#update").on("click", function () {
        id = $(this).attr("data-id");
        status = $("#sltStatus").val();
        _token = $("input[type='hidden']").val();
        $.post("update", {'id': id, 'status': status, '_token': _token}, function (data) {
            if (data.status == 0) {
                $("#dataTables-example tbody .rows" + data.id + " td:eq(6)").html("<i class='fa fa-cog' aria-hidden='true' title='Chưa duyệt'></i>");
            }
            else {
                $("#dataTables-example tbody .rows" + data.id + " td:eq(6)").html("<i class='fa fa-check' aria-hidden='true' title='Đã duyệt'></i>");
            }
        });
        $("#myModal").modal("hide");
    })
});
