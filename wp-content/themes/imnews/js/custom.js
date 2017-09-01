(function($) {
"use strict";
 jQuery(".dropdown").mouseenter(            
    function() {
      jQuery('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
      jQuery(this).toggleClass('open');
    },
    function() {
      jQuery('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
      jQuery(this).toggleClass('open');
    });
})(jQuery);