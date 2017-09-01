/* Start Menu */
(function ($) {
    var index = 0;
    $.fn.menumaker = function (options) {
        var cssmenu = jQuery(this),
            settings = jQuery.extend({
                title: "",
                breakpoint: 767,
                format: "dropdown",
                sticky: false
            }, options);
        return this.each(function () {
        cssmenu.find('.menu-item-has-children').addClass('sub-menus');
	    cssmenu.find('.page_item_has_children').addClass('sub-menus');
        cssmenu.find('.children').addClass('sub-menu');
            multiTg = function () {
                cssmenu.find(".sub-menus").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function () {
                    jQuery(this).toggleClass('submenu-opened');
                    if (jQuery(this).siblings('ul').hasClass('open')) {
                        jQuery(this).siblings('ul').toggle().removeClass('open');
                    } else {
                        jQuery(this).siblings('ul').toggle().addClass('open');
                    }
                });
            };
            if (settings.format === 'multitoggle') multiTg();
            else cssmenu.addClass('dropdown');
            if (settings.sticky === true) cssmenu.css('position', 'fixed');
            resizeFix = function () {
                if (jQuery(window).width() > 767) {
                    cssmenu.find('ul').show();
                }
            };
            resizeFix();
            return jQuery(window).on('resize', resizeFix);
        });
    };
})(jQuery);
(function ($) {
    jQuery(document).ready(function () {
        jQuery(document).ready(function () {
            jQuery("#menubar").menumaker({
                title: "<span></span><span></span><span></span>",
                format: "multitoggle"
            });
            jQuery("#menubar > ul > li").hover(function () {
                    activeElement = $(this);
                    lineWidth = activeElement.width();
                    linePosition = activeElement.position().left;
                    menuLine.css("width", lineWidth);
                    menuLine.css("left", linePosition);
                },
                function () {
                    menuLine.css("left", defaultPosition);
                    menuLine.css("width", defaultWidth);
                });
        });
        /** Set Position of Sub-Menu **/
        var wapoMainWindowWidth = jQuery(window).width();
        jQuery('#menubar ul ul li').mouseenter(function () {
            var subMenuExist = jQuery(this).find('.sub-menu').length;
            if (subMenuExist > 0) {
                var subMenuWidth = jQuery(this).find('.sub-menu').width();
                var subMenuOffset = jQuery(this).find('.sub-menu').parent().offset().left + subMenuWidth;
                if ((subMenuWidth + subMenuOffset) > wapoMainWindowWidth) {
                    jQuery(this).find('ul.sub-menu').removeClass('submenu-left');
                    jQuery(this).find('ul.sub-menu').addClass('submenu-right');
                } else {
                    jQuery(this).find('ul.sub-menu').removeClass('submenu-right');
                    jQuery(this).find('ul.sub-menu').addClass('submenu-left');
                }
            }
        });
    });
})(jQuery);