$(document).ready(function () {
    $('.editStatus').on('click', function () {
        a = $(this).attr('data-id');
        $('#update').attr('data-id', a);
    });
    $('#update').on('click', function () {
        status = $('#sltStatus').val();
        id = $(this).attr('data-id');
        _token = $('[name="_token"').attr('value');
        $.post('edit', {'status': status, 'id': id, '_token': _token}, function (data) {
            if (data.status == 0) {
                $('#dataTables-example tbody .rows' + data.id + " td:eq(5)").html('<i class="fa fa-cog" aria-hidden="true" title="Chưa duyệt"></i>');
                alertify.notify('Chưa duyệt', 'error', 5, function() {});
            }
            else {
                $('#dataTables-example tbody .rows' + data.id + " td:eq(5)").html('<i class="fa fa-cog" aria-hidden="true" title="Đã duyệt"></i>');            
                alertify.notify('Đã duyệt', 'success', 5, function() {});
            }
                
        });
        $('#myModal').modal('hide');
    });


    $('.popup').hide();
    $('.openpop').click(function (e) {
        e.preventDefault();
        $('iframe').attr('src', $(this).attr('href'));
    });
});
