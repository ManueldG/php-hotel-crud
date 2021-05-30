//menubar=yes,location=yes,resizable=yes,scrollbars=yes,status=yes
    function openWin(desc) {
        window.open("details.php?desc="+desc, "_blank", "status=no,location=no, menubar=no, toolbar=no, scrollbars=yes, resizable=yes, top=100, left=100, width=100, height=400");
    }

(function($) {

	"use strict";

	$('[data-toggle="tooltip"]').tooltip()

})(jQuery);
