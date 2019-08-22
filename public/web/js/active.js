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
