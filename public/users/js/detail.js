$(document).ready(function () {
    var documentHeight = $(document).height();
    if (documentHeight > 600) {
        var bottomHeight = 1000;
        var msie6 = $.browser == 'msie' && $.browser.version < 7;
        if (!msie6) {
            var top = $('#floatDiv').offset().top - parseFloat($('#floatDiv').css('margin-top').replace(/auto/, 0));
            $(window).scroll(function (event) {
                var y = $(this).scrollTop();
                if (y >= top && y <= (documentHeight - bottomHeight)) {
                    $('#floatDiv').addClass('fixed')
                } else {
                    $('#floatDiv').removeClass('fixed')
                }
            })
        }
    }

    $("#calRation").on("click", function () {
        number = $("#chooseServing").val();
        id = $(this).attr("data-id");
        $(".text-highlight strong").html(number);
        arrData = [];
        $(".ingredient input[type='hidden']").each(function () {
            data = $(this).val();
            arrData.push(data);
        });
        $.ajax({
            url: "/detail/" + id + "/ration",
            type: "post",
            data: {'number': number, 'arrData': arrData},
            success: function (data) {
                $('.ingredient-quality').each(function (i, v) {
                    $(this).text(Math.round((data[i] * 1000) / 1000));
                });
            }
        });
    });

    $(".exit").on("click", function () {
        $(".form-box").hide();
        $(".fake-form").show();
    });

    $("#submitComment, #temp-review-content").on("click", function () {
        $(".form-box").show();
        $(".fake-form").hide();
    });

    rate = [];
    $("#demo1 .stars").on("click", function () {
        rate.push($(this).val());
        $(".rating-value #resultRate").text($(this).val() + ".0");
    });

    $("#submit-review").on("click", function () {
        if (rate == 0) {
            swal("Bạn chưa nhập lượt bình chọn");
        }
        else {
            var d = new Date();
            content = $("#review-content").val();
            idReceipt = $(this).attr("data-idReceipt");
            idUser = $(this).attr("data-idUser");
            $.ajax({
                url: "/detail/" + idReceipt,
                type: "post",
                data: {'point': rate, 'content': content, 'receipt_id': idReceipt, 'user_id': idUser},
                success: function (data) {
                    $(".rating-all ,recipe-reviews:eq(0)").before('<div class="recipe-reviews" id="reviewlist"><div><div class="review-item recipe-review-item"><div class="body"><div class="user-info"><div class="avt"><a href="#" target="_self"><img class="photo" src="/upload/images/user.jpg"/></a></div><div class="profile"><a href="#" target="_self"class="name cooky-user-link"><span> ' + data.user_id + '</span></a><div class="clearfix"></div></div></div><div class="title text-ellipsis"><a href="#"target="_self"><span class="text-bold">' + data.receipt_id + '</span></a></div><div class="content"><div class="review-content trusted-html-with-emotion">' + data.content + '</div></div><div class="photos-container"></div><div class="rating"><span class="rating-value">' + data.point + '.0</span><div class="clearfix"></div><span class="date-time rated-date">' + d + '</span></div><div class="reply-review"><a class="replyForm" href="javascript:void(0)"><i class="fa fa-comment-o"></i>Trả lời</a></div></div></div></div></div>');

                    swal("Đánh giá thành công");
                }
            });
            $("#review-content").val("");
        }
    });

    $(".reply").on("click", function () {
        var d = new Date();
        idRate = $(this).attr("data-rateid");
        replyContent = $(".reply-content" + idRate).val();
        idUser = $(this).attr("data-userID");
        idReceipt = $(this).attr("data-receiptID");

        $.post(
            '/detail/' + idReceipt + '/comment',
            {
                'idRate': idRate,
                'replyContent': replyContent,
                'idUser': idUser
            },
            function (data) {
                $("#reply-all .comments:eq(0)").before('<div class="comments" id="comment"><div class="cooky-comment-item-new"><div class="comment-item"><div class="comment-profile-img"><a class="user-avt" href="#" target="_self"><img src="/upload/images/user.jpg"/></a></div><div class="comment-content"><div class="comment-head"><a class="cooky-user-link" href="#">' + data.user_id + '</a><div class="date-time"><span>' + d + '</span></div></div><div class="comment-text to-trusted-html-with-emoticon">' + data.content + '</div><div class="clearfix"></div></div></div></div></div>');
                swal("Trả lời bình luận thành công");
            }
        );
        $(".reply-content" + idRate).val("");
    });

    $(".reset").on("click", function () {
        id = $(this).attr("data-rateid");
        $(".reply-content" + id).val("");
    });

    $(".replyForm").on("click", function () {
        id = $(this).attr("data-id");
        $(".review-comment-container" + id).slideToggle();
    });
});

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
