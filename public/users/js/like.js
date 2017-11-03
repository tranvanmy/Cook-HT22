$(document).ready(function () {
    $('#like').on('click', function () {
        idReceipt = $(this).attr("data-idReceipt");
        idUser = $(this).attr("data-idUser");
        totalLike = $('#totalLike').text() + 1;
        totalLike2 = $('#totalLike').text() - 1;
        $.post('/detail/' + idReceipt + '/like', {
            'receipt_id': idReceipt,
            'user_id': idUser,
            'totalLike': totalLike
        }, function (data) {
            if (data.status == 1) {
                $('#like').html('<i class="fa fa-heart"></i><p id="totalLike">' + totalLike + '</p>');
                alertify.notify('Like thành công', 'success', 5, function() {});
                swal('Like thành công');
            }
            else {
                $('#like').html('<i class="fa fa-heart-o"></i><p id="totalLike">' + totalLike2 + "</p>");
                alertify.notify('Hủy like', 'success', 5, function() {});
                swal('Hủy like');
            }
        });
    });
});
