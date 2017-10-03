$(document).ready(function () {
    $('#tabs').tabs().addClass('ui-tabs-vertical ui-helper-clearfix');
});
$(document).ready(function () {
    $(".btn-pref .btn").click(function () {
        $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
        // $(".tab").addClass("active"); // instead of this do the below 
        $(this).removeClass("btn-default").addClass("btn-primary");
    });
});
