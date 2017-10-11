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
            url: "/detail/" + id + "/" + number,
            type: "post",
            data: {'number': number, 'arrData': arrData},
            success: function (data) {
                $('.ingredient-quality').each(function (i, v) {
                    $(this).text(data[i]);
                });
            }
        });
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