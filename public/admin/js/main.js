$("div.alert").delay(3000).slideUp();
$('.delete').on('click', function () {
    swal({
            title: "Bạn có chắc chắn xóa không?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Đồng ý!",
            cancelButtonText: "Hủy",
            closeOnConfirm: false
        },
        function () {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
        });
})
$(document).ready(function () {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
