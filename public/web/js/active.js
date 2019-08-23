$(function($) {
    let url  = location.origin+"/"+location.pathname.split("/")[1];
    $('#list-menu li a').each(function() {
        if (this.href === url) {
            $(this).closest('li').addClass('active');
        }
    });

    let url_chil  = window.location.href;
    $('.c-navbar__dropdown__content li a').each(function() {
        if (this.href === url_chil) {
            $(this).closest('li').addClass('active');
            $('.c-navbar__dropdown__content').find('li.active a').css("color", "#FF3220");
        }
    });
});

$(document).ready(function () {
    $("#gg-search").submit(function (e) {
        $('#___gcse_0').show();
        e.preventDefault(e);
        console.log($("#gg-search").find('#search').val());
        let searchText = $("#gg-search").find('#search').val();
        $('#gsc-i-id1').val(searchText);
        $('.gsc-search-button').click();
    });
    $(document).on("click", ".gsc-modal-background-image", function () {
        $('#___gcse_0').hide();
    });
    $(document).on("click", ".gsc-results-close-btn", function () {
        $('#___gcse_0').hide();
    });

});