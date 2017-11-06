$(document).ready(function(){
    $('.editStatus').on('click', function () {
        $('#update').val($(this).attr('data-id'));
    });
    $('#update').on('click', function () {
        id = $(this).val();
        status = $('#sltStatus').val();
        _token = $('input[type="hidden"]').val();
        $.post('edit', {'id': id, 'status': status, '_token': _token}, function (data) {
            if (data.status == 0) {
                $('#dataTables-example tbody .rows' + data.id + 'td:eq(6)').html("<i class='fa fa-cog' aria-hidden='true' title='Không hoạt động'></i>");
                alertify.notify('Không hoạt động', 'error', 5, function() {});
            }
            else {
                $('#dataTables-example tbody .rows' + data.id + ' td:eq(6)').html("<i class='fa fa-check' aria-hidden='true' title='Hoạt động'></i>");
                alertify.notify('Hoạt động', 'error', 5, function() {});
            }
        });
        $('#myModal').modal('hide');
    });
});
