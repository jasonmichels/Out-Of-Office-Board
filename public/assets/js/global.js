/* ---------------------------------------------------------------------
 Inventory Targeting Category Display

 Target Browsers: IE8+, Chrome, Safari, FireFox
 Author: Jason Michels <jason@bikefree.tv>
 ------------------------------------------------------------------------ */

var OUTOFOFFICE = OUTOFOFFICE || {};

(function($) {

    $(function() {

        // Initialize!
        OUTOFOFFICE.Status.init();
    });

}(jQuery));


OUTOFOFFICE.Status = {
    init: function() {
        var self = this;
        self.bind();
    },

    bind: function() {

        $('.datepicker_status').pickadate({
            format: 'yyyy-mm-dd 00:00:00'
        });

        $('.timepicker_status').pickatime({
            //format: 'yyyy-mm-dd 00:00:00'
        });

    }
}
