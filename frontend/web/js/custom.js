$(document).on("click", ".ticket-action-button-deeplink", function() {
    //console.log($(this).attr('href'));
    return true;
});
$(document).ready(function () {
    $(".fly-types-switcher-tab").click(function () {
        if (!$(this).hasClass("active")) {
            $(".fly-types-switcher-tab").each(function () {
                $(this).removeClass("active");
            });
            $(this).addClass("active");
            if ($(this).attr("data-type") == "oneway") {
                $(".twidget-return-date").hide();
                $('.twidget-icon-delete').hide();
                $('.twidget-return-date .twidget-icon-cal').show();
                $('input[name="return_date"]').val('').css('font-size', '14px');
                $('.twidget-date-return').text('');
                $('input[name="oneway"]').val(1);
                $('input[name="oneway"]').removeAttr('disabled');;
            } else if ($(this).attr("data-type") == "return") {
                $(".twidget-return-date").show();
            }
        }
    });
});