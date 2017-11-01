$(document).ready(function () {
    $("#searchimput").on("keyup", function () {
        keyword = $("#searchimput").val();
        $.post("headerSearchAjax", {'keyword': keyword}, function (data) {
            if ($("#searchimput").val() == "") {
                $(".search-suggest-panel").css("display", "none");
            }
            else {
                $(".suggest-recipe .textname").text(keyword);
                $(".suggest-recipe .result").each(function(i,e){
                    $(this).html('<li><a href="' + document.location.origin + '/detail/' + data[i].id + '"><div><img title="' + data[i].name + '" alt="' + data[i].name + '" src="/upload/images/' + data[i].image + '"> <span class="textname title-suggest">' + data[i].name + '</span></div></a></li>');
                });
                $(".search-suggest-panel").css("display", "block");
                
            }
        });
    });
    $(document).click(function () {
        $(".search-suggest-panel").css("display", "none");
    });
});
