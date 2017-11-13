$(document).ready(function () {
    $('.follow').on('click', function () {
        idReceipt = $(this).attr('data-idReceipt');
        id_following = $(this).attr('data-idFollowing');
        id_follower = $(this).attr('data-idFollower');
        $.post('/detail/' + idReceipt + '/follow', {
            'id_following': id_following,
            'id_follower': id_follower
        }, function (data) {
            console.log(data)
            if (data.status == 1) {
                $('.follow span:eq(0)').text('Đã quan tâm');
                alertify.notify('Đã theo dõi', 'success', 5, function() {});
                swal('Theo dõi');
            }
            else {
                $('.follow a > span').text('Quan tâm');
                alertify.notify('Đã hủy theo dõi', 'success', 5, function() {});
                swal('Hủy theo dõi');
            }
        });
    });

    var pusher = new Pusher('31b9214bf8a1aae0c524', {
        cluster: 'ap1',
        encrypted: true
    });
     var chanel = pusher.subscribe('follow-chanel');
     chanel.bind('App\\Events\\Followed', function(data) {
         var follower_name = data.follower_name;
         $('.notify-widget').html(data.follower_name + ' theo dõi');
     });
});
