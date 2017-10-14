$(document).ready(function () {
    $(".follow").on("click", function () {
        idReceipt = $(this).attr("data-idReceipt");
        id_following = $(this).attr("data-idFollowing");
        id_follower = $(this).attr("data-idFollower");
        $.post("/detail/" + idReceipt + "/follow", {
            'id_following': id_following,
            'id_follower': id_follower
        }, function (data) {
            if (data.status == 1) {
                $(".follow span:eq(0)").text("Đã quan tâm");
                swal("Theo dõi");
            }
            else {
                $(".follow a > span").text("Quan tâm");
                swal("Hủy theo dõi");
            }
        });
    });
});
