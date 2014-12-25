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
    init: function () {
        var self = this;
        self.bind();
    },

    bind: function () {

        $('.datepicker_status').pickadate({
            format: 'yyyy-mm-dd'
        });

        $('.timepicker_status').pickatime({
            formatSubmit: 'HH:i',
            hiddenName: true,
            interval: 15
        });

    }
}
