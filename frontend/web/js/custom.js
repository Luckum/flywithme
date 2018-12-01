$(document).ready(function () {
    $(".passengers-detail-cnt").click(function () {
        $(".passengers-detail-options").toggle();
        if ($(".passengers-detail-options").is(":visible")) {
            check_passengers();
        }
    });
    $(".search-frm-close-btn").click(function () {
        $(this).parent().parent().hide();
    });
    $(".fly-types-switcher-tab").click(function () {
        if (!$(this).hasClass("active")) {
            $(".fly-types-switcher-tab").each(function () {
                $(this).removeClass("active");
            });
            $(this).addClass("active");
            if ($(this).attr("data-type") == "oneway") {
                $("#date-to-cnt").hide();
            } else if ($(this).attr("data-type") == "return") {
                $("#date-to-cnt").show();
            }
        }
    });
    $("#submit-search-frm-btn").click(function () {
        
    });
});

function check_passengers()
{
    var total = get_total_passengers();
    if (total == globals.maxPassengersCount) {
        hide_sign($("[data-age=adults]"), '+');
        hide_sign($("[data-age=children]"), '+');
        hide_sign($("[data-age=infants]"), '+');
    }
    check_adults();
    check_children();
    check_infants();
}

function passenger_remove(obj)
{
    set_passengers(obj, '-');
    var total = get_total_passengers();
    if (total != globals.maxPassengersCount) {
        show_sign($("[data-age=adults]"), '+');
        show_sign($("[data-age=children]"), '+');
        show_sign($("[data-age=infants]"), '+');
        hide_message();
    }
    check_adults();
    check_children();
    check_infants();
    check_relations();
}

function passenger_add(obj)
{
    set_passengers(obj, '+');
    var total = get_total_passengers();
    if (total == globals.maxPassengersCount) {
        hide_sign($("[data-age=adults]"), '+');
        hide_sign($("[data-age=children]"), '+');
        hide_sign($("[data-age=infants]"), '+');
        show_message(globals.maxPassengersCountStr);
        return;
    }
    show_sign($(obj).parent(), '-');
    check_relations();
}

function get_total_passengers()
{
    var total = 0;
    $(".age-value-val").each(function () {
        total += parseInt($(this).text());
    });
    return total;
}

function show_message(message)
{
    $(".passengers-detail-options .message").show();
    $(".passengers-detail-options .message span").text(message);
}

function hide_message()
{
    $(".passengers-detail-options .message").hide();
    $(".passengers-detail-options .message span").text('');
}

function hide_sign(obj, sign)
{
    var sign_cnt = sign == '-' ? $(obj).find(".age-value-dec") : $(obj).find(".age-value-inc");
    $(sign_cnt).css({visibility: "hidden"});
}

function show_sign(obj, sign)
{
    var sign_cnt = sign == '-' ? $(obj).find(".age-value-dec") : $(obj).find(".age-value-inc");
    $(sign_cnt).css({visibility: "visible"});
}

function check_adults()
{
    var adults = get_adults_cnt();
    if (adults == 1) {
        hide_sign($("[data-age=adults]"), '-');
    }
}

function check_children()
{
    var children = get_children_cnt();
    if (children == 0) {
        hide_sign($("[data-age=children]"), '-');
    }
}

function check_infants()
{
    var infants = get_infants_cnt();
    if (infants == 0) {
        hide_sign($("[data-age=infants]"), '-');
    }
}

function get_adults_cnt()
{
    var adults = $("[data-age=adults]").find(".age-value-val");
    return parseInt(adults.text());
}

function get_children_cnt()
{
    var children = $("[data-age=children]").find(".age-value-val");
    return parseInt(children.text());
}

function get_infants_cnt()
{
    var infants = $("[data-age=infants]").find(".age-value-val");
    return parseInt(infants.text());
}

function set_passengers(obj, sign)
{
    var set_to = $(obj).parent().find(".age-value-val"),
        set_to_total = $(".passengers-detail-cnt span");
    
    if (sign == '+') {
        $(set_to).text(parseInt(set_to.text()) + 1);
    } else {
        $(set_to).text(parseInt(set_to.text()) - 1);
    }
    var adults = get_adults_cnt(),
        children = get_children_cnt(),
        infants = get_infants_cnt(),
        total_str = '';
    
    if (adults == 1) {
        total_str += adults + ' ' + globals.adultStr;
    } else if (adults > 1) {
        total_str += adults + ' ' + globals.adultsStr;
    }
    if (children == 1) {
        total_str += ', ' + children + ' ' + globals.childStr;
    } else if (children > 1) {
       total_str += ', ' + children + ' ' + globals.childrenStr;
    }
    if (infants == 1) {
        total_str += ', ' + infants + ' ' + globals.infantStr;
    } else if (infants > 1) {
       total_str += ', ' + infants + ' ' + globals.infantsStr;
    }
    
    $(set_to_total).text(total_str);
}

function check_relations()
{
    var adults = get_adults_cnt(),
        children = get_children_cnt(),
        infants = get_infants_cnt();
        
    show_sign($("[data-age=adults]"), '+');
    show_sign($("[data-age=children]"), '+');
    show_sign($("[data-age=infants]"), '+');
    
    if ((children < parseInt(adults * 2) || parseInt(children + infants) < parseInt(adults * 2) || adults > infants) && adults != 1) {
        show_sign($("[data-age=adults]"), '-');
    }
    if (adults == infants) {
        hide_sign($("[data-age=infants]"), '+');
        hide_sign($("[data-age=adults]"), '-');
        show_message(globals.maxInfantsCountStr);
    }
    if (parseInt(children + infants) == parseInt(adults * 2)) {
        hide_sign($("[data-age=children]"), '+');
        hide_sign($("[data-age=infants]"), '+');
        hide_sign($("[data-age=adults]"), '-');
        show_message(globals.maxChildrenInfantsCountStr);
    }
    if (children == parseInt(adults * 2)) {
        hide_sign($("[data-age=children]"), '+');
        hide_sign($("[data-age=infants]"), '+');
        hide_sign($("[data-age=adults]"), '-');
        show_message(globals.maxChildrenCountStr);
    }
    if (parseFloat(children / adults) >= 1.5) {
        hide_sign($("[data-age=adults]"), '-');
    }
    if (parseFloat(parseInt(children + infants) / adults) >= 1.5) {
        hide_sign($("[data-age=adults]"), '-');
    }
}