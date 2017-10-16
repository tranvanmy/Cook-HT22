$(document).ready(function () {
    $(".update").on("click", function () {
        rowId = $(this).attr("rowId");
        qty = $(this).parent().parent().find(".qty").val();
        $.post("update/" + rowId + "/" + qty, {'rowId': rowId, 'qty': qty}, function (data) {
                window.location = "/cart/detail";
                return false;
        });
    });
    $(".popupCheckout").on("click", function () {
        $('body').css('overflow', 'hidden');
    });
    $(".close").on("click", function () {
        $('body').css('overflow', 'auto');
    });
    $("#submitCheckOut").on("click", function () {
        if ($("#nameCheckOut").val() == "" || $("#addressCheckOut").val() == "" || $("#phoneCheckOut").val() == "") {
            swal("Không được để trống");
        }
        name = $("#nameCheckOut").val();
        address = $("#addressCheckOut").val();
        phone = $("#phoneCheckOut").val();
        note = $("#noteCheckOut").val();
        idUser = $(this).attr("data-iduser");
        total = $(this).attr("data-totalprice");
        $.post("detail/checkout",
            {
                'name': name,
                'address': address,
                'phone': phone,
                'note': note,
                'user_id': idUser,
                'totalPrice': total
            },
            function (data) {
                window.location.href = "/";
                if(data) swal("Mua hàng thành công");
            });
    });
});