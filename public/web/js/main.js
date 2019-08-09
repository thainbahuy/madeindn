/*
 *   Template: MADEINDANANG
 *   Author: Team
 */

let MADEINDANANG = {};

(function ($) {
    /************************************************************
     * Predefined letiables
     *************************************************************/
    let $window = $(window),
        $document = $(document),
        $body = $('body');

    /**
     * exists - TuanNA
     * @return true
     */
    $.fn.exists = function () {
        return this.length > 0;
    };

    /**
     * isMobile - Check mobile screen - TuanNA
     * @return void
     */
    $.fn.isMobile = function () {
        let screen = $window.outerWidth();
        return !!(screen < 601);
    };

    /**
     * uaSetting - TuanNA
     * @return void
     */
    MADEINDANANG.uaSetting = function () {
        let _ua = (function (u) {
            return {
                Tablet: (u.indexOf('windows') !== -1 && u.indexOf('touch') !== -1 && u.indexOf('tablet pc') === -1)
                    || u.indexOf('ipad') !== -1
                    || (u.indexOf('android') !== -1 && u.indexOf('mobile') === -1)
                    || (u.indexOf('firefox') !== -1 && u.indexOf('tablet') !== -1)
                    || u.indexOf('kindle') !== -1
                    || u.indexOf('silk') !== -1
                    || u.indexOf('playbook') !== -1,
                Mobile: (u.indexOf('windows') !== -1 && u.indexOf('phone') !== -1)
                    || u.indexOf('iphone') !== -1
                    || u.indexOf('ipod') !== -1
                    || (u.indexOf('android') !== -1 && u.indexOf('mobile') !== -1)
                    || (u.indexOf('firefox') !== -1 && u.indexOf('mobile') !== -1)
                    || u.indexOf('blackberry') !== -1,
                IE: u.indexOf('Trident') !== -1
            }
        })(window.navigator.userAgent.toLowerCase());
        if (_ua.Tablet || _ua.Mobile) {
            $body.addClass('sp');
        }
        if (_ua.IE) {
            $body.addClass('ie');
        }
    }
    /**
     * [common description]
     * @return {[type]} [description]
     */
    MADEINDANANG.common = function () {
        let elGoTop = $('#go-top');
        if (elGoTop.exists()) {
            checkOffsetEL($window);
            $window.scroll(function () {
                checkOffsetEL($(this));
            });
            elGoTop.click(function () {
                $('body, html').animate({scrollTop: 0}, 500);
            });

            function checkOffsetEL($obj) {
                if ($obj.scrollTop() > $body.height() / 3) {
                    elGoTop.fadeIn(300);
                } else {
                    elGoTop.fadeOut(300);
                }
            }
        }
    }
    /**
     * [initAnimationScroll description]
     * @return {[type]} [description]
     */
    MADEINDANANG.initAnimationScroll = function () {
        let scrollOff = $('.scrollToggle'),
            windowsTop = $window.scrollTop(),
            wh = $window.height();
        if (scrollOff.exists()) {
            scrollOff.each(function () {
                let scrollOffTop = $(this).offset().top;
                $(this).addClass('o-animation__scroll--off');
                if (windowsTop + wh - 20 > scrollOffTop && $(this).hasClass('o-animation__scroll--off')) {
                    $(this).removeClass('o-animation__scroll--off').addClass('o-animation__scroll--on');
                } else {
                    $(this).removeClass('o-animation__scroll--on').addClass('o-animation__scroll--off');
                }
            });
        }
    }

    /**
     * [handelMenuClick description]
     * @return {[type]} [description]
     */
    MADEINDANANG.handelMenuClick = function () {
        let el = $('#menu-button'),
            elMenu = '.c-header__menu';
        if (el.exists()) {
            el.bind('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                if ($(this).hasClass('open')) {
                    $(this).removeClass('open').parent().find(elMenu).slideUp(300).removeClass('open');
                    $body.removeClass('u-noscroll');
                } else {
                    $(this).addClass('open').parent().find(elMenu).slideDown(300).addClass('open');
                    $body.addClass('u-noscroll');
                }
            }).closest('body').bind('click', function () {
                if (el.hasClass('open')) {
                    el.removeClass('open');
                    el.parent().find(elMenu).slideUp(300);
                    el.parent().find(elMenu).removeClass('open');
                    $body.removeClass('u-noscroll');
                }
            });
        }
    }

    /**
     * [handelHeaderFix description]
     * @return {[type]} [description]
     */
    MADEINDANANG.handelHeaderFix = function () {
        let header = $('.c-header');
        if (header.isMobile() && header.exists()) {
            header.removeClass('c-header--fixed');
            if ($window.scrollTop() > 100) {
                header.addClass('c-header--fixed');
            } else {
                header.removeClass('c-header--fixed');
            }
        }
    }

    /**
     * handelDeviceResize
     * @return {[type]}
     */
    MADEINDANANG.handelDeviceResize = function () {
        let el = $('.c-header'),
            elBtn = $('#menu-button'),
            elContent = $('.c-header__menu');
        if (!$body.isMobile()) {
            $body.removeClass('u-noscroll sp');
            el.removeClass('c-header--fixed');
            elContent.removeAttr('style');
            elBtn.removeClass('open');
            elContent.removeClass('open');
        }
    }
    /**
     * customScrollbar
     * @return {[void]}
     */
    MADEINDANANG.customScrollbar = function () {
        let el = $('.scrollbar-chrome');
        if (el.exists()) {
            el.scrollbar();
        }
    }
    /**
     * menuCategoryClick
     * @return {[void]}
     */
    MADEINDANANG.menuCategoryClick = function () {
        let el = $('.c-widget__archive__link');
        if (el.exists()) {
            el.click(function (e) {
                e.stopPropagation();
                let $this = $(this);
                if ($this.parent().hasClass('active')) {
                    $this.next().slideUp('fast', function () {
                        $this.parent().removeClass('active');
                    });
                } else {
                    $this.next().slideDown('fast', function () {
                        $this.parent().addClass('active');
                    });
                }
            });
        }
    }

    MADEINDANANG.handelFixImgIE = function (el) {
        let userAgent,
            ieReg,
            ie;
        userAgent = window.navigator.userAgent;
        ieReg = /msie|Trident.*rv[ :]*11\./gi;
        ie = ieReg.test(userAgent);
        if (ie) {
            $(el).each(function () {
                let $container = $(this),
                    imgUrl = $container.find('img').prop('src');
                $container.find('img').hide();
                if (imgUrl) {
                    $container.css('background', 'url(' + imgUrl + ') no-repeat center / cover;');
                }
            });
        }
    }

    /**
     * clickQuickLink
     * @return {[void]}
     */
    MADEINDANANG.clickQuickLink = function () {
        let el = $('.c-link__item'),
            topSpac = $('.c-header').outerHeight() * 2 + 10;
        if (el.exists()) {
            el.click(function (e) {
                e.preventDefault();
                let el_val = $(this).attr('href');
                if ($(el_val).exists()) {
                    $('body, html').animate({
                        scrollTop: $(el_val).offset().top - topSpac
                    }, 500);
                }
            });
        }
        if (window.location.hash) {
            let hash = window.location.hash.split("#")[1];
            setTimeout(function () {
                $('body, html').animate({
                    scrollTop: $('#' + hash + '').offset().top - topSpac
                }, 500);
            }, 500);
        }
        ;
    }


    /************************************************************
     * MADEINDANANG Window load, ready, scroll, resize and functions
     *************************************************************/
    //Window load functions
    $window.on('load', function () {
        MADEINDANANG.uaSetting();
    });
    //Document ready functions
    $document.ready(function () {
        MADEINDANANG.common();
        MADEINDANANG.handelMenuClick();
        MADEINDANANG.handelHeaderFix();
        MADEINDANANG.initAnimationScroll();
        MADEINDANANG.handelDeviceResize();
        MADEINDANANG.customScrollbar();
        MADEINDANANG.menuCategoryClick();
        MADEINDANANG.handelFixImgIE('.c-thumbnail');
        MADEINDANANG.clickQuickLink();
    });

    //Window scroll functions
    $window.on('scroll', function () {
        MADEINDANANG.handelHeaderFix();
        MADEINDANANG.initAnimationScroll();
    });

    //Window resize functions
    $window.on('resize', function () {
        MADEINDANANG.uaSetting();
        MADEINDANANG.handelDeviceResize();
    });

})(jQuery);


// -------------------jQuery--------------------------
//select
$('select').each(function () {
    var $this = $(this), numberOfOptions = $(this).children('option').length;

    $this.addClass('select-hidden');
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());

    var $list = $('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);

    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
    }

    var $listItems = $list.children('li');

    $styledSelect.click(function (e) {
        e.stopPropagation();
        $('div.select-styled.active').not(this).each(function () {
            $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle();
    });

    $listItems.click(function (e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
        //console.log($this.val());
    });

    $(document).click(function () {
        $styledSelect.removeClass('active');
        $list.hide();
    });

});


//tabs
$(".tabs-list li a").click(function (e) {
    e.preventDefault();
});

$(".tabs-list li").click(function () {
    var tabid = $(this).find("a").attr("href");
    $(".tabs-list li,.tabs div.tab").removeClass("active");   // removing active class from tab

    $(".tab").hide();   // hiding open tab
    $(tabid).show();    // show tab
    $(this).addClass("active"); //  adding active class to clicked tab$
    $(".alert-danger").empty(); //  adding active class to clicked tab$
});


// Slider
var slider = function (object) {
    if ($(object).find('.item').length > 1) {
        $(object).slick({
            infinite: true,
            dots: true,
            arrows: false,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            dotsClass: 'custom-dots',
            customPaging: function (slider, i) {
                console.log(slider);
                var slideNumber = (i + 1),
                    totalSlides = slider.slideCount;
                return '<a class="dot" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '/' + totalSlides + '</span></a>';
            },
            responsive: [
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                }
            ]
        });
    } else {
        $('.main-banner').addClass('onlyOne');
    }
};
var slider2 = function (object) {
    if ($(object).find('.item').length > 1) {
        $(object).slick({
            infinite: true,
            dots: true,
            arrows: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dotsClass: 'custom-dots',
            customPaging: function (slider, i) {
                console.log(slider);
                var slideNumber = (i + 1),
                    totalSlides = slider.slideCount;
                return '<a class="dot" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '/' + totalSlides + '</span></a>';
            },
            responsive: [
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                }
            ]
        });
    } else {
        $('.main-banner').addClass('onlyOne');
    }
};

//select li to select
var windowsize = $(window).width();
$(window).resize(function () {
    var windowsize = $(window).width();
    var allOptions = $("ul").children('li:not(.active)');
});

if (windowsize < 600) {
    $(".tabs-list").on("click", ".active", function () {
        $(this).closest(".tabs-list").children('li:not(.active)').toggle();
    });

    $(".tabs-list").on("click", "li:not(.active)", function () {
        allOptions.removeClass('selected');
        $(this).addClass('selected');
        $(".tabs-list").children('.active').html($(this).html());
        allOptions.toggle();
    });
}
$(document).ready(function () {
    slider('.main-banner__slick');
    slider2('.main-banner__slick2');
});
