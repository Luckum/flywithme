$(document).on("click", ".generate-buttons a", function() {
    var type = $(this).attr('data-type');
    $.ajax({
        url: "generate",
        type: "POST",
        data: {type: type},
        success: function(data) {
            $("#promocode-value").val(data.code);
        }
    });
});