$(document).ready(function () {
    $('#tabs').tabs().addClass('ui-tabs-vertical ui-helper-clearfix');
    $(".btn-pref .btn").click(function () {
        $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
        // $(".tab").addClass("active"); // instead of this do the below 
        $(this).removeClass("btn-default").addClass("btn-primary");
    });


    $("#updateInfo").on("click",function(){
    	var form_data = new FormData();
    	id = $(this).attr("data-id");
    	form_data.append("name", $("#name").val());
        form_data.append("phone", $("#phone").val());
        form_data.append("address", $("#address").val());
        form_data.append("id", $(this).attr("data-id"));
        form_data.append("avatar", $('#avatar')[0].files[0]);
        $.ajax({
                url: "/myprofile/"+id+"/updateProfile",
                type: "post",
                processData: false,
                contentType: false,
                data: form_data,
                success: function (data) {
                    $("#name").val(data.name);
                    $("#phone").val(data.phone);
                    $("#address").val(data.address);
                    $(".profile-userpic img").attr("src","/upload/images/"+data.avatar);
                    $(".useravatar img").attr("src",'/upload/images/'+data.avatar);
                }
            });
    });

    $(".follow").on("click",function(){
        id_following = $(this).attr("data-idFollowing");
        id_follower = $(this).attr("data-idFollower");
        $.post("/myprofile/" + id_following + "/follow", {
            'id_following': id_following,
            'id_follower': id_follower
        }, function (data) {
            if (data.status == 1) {
                $(".profile-userbuttons button:eq(0)").text("Đã quan tâm");
                swal("Theo dõi");
            }
            else {
                $(".profile-userbuttons button:eq(0)").text("Quan tâm");
                swal("Hủy theo dõi");
            }
        });
    });

});
