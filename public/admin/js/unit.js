$(document).ready(function () {
    $("#addUnit").on("click", function () {
        name = $("#nameUnit").val();
        _token = $("input[type='hidden']").val()
        $.post("add", {'name': name, '_token': _token}, function (data) {
            $("#dataTables-example tbody").append('<tr class="odd gradeX" align="center"><td style="width:10%;">1</td><td>' + data.name + '</td><td class="center" style="width:10%;"><button id="delete" type="button" class="btn btn-warning btn-xs"><i class="fa fa-trash-o  fa-fw"></i></button></td></tr>');
        });
        $("#nameUnit").val("");
        $("#myModal").modal("hide");
    });
});