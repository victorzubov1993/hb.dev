/**
 * Created by Olexandr on 14.12.2015.
 */
(function ($) {
    $(function () {
        $(".btn").click(function(){
            $("#toggleSample2").collapse('toggle');
        });
        $('#date').datepicker({
            format: 'yyyy/mm/dd',
            language: "ru",
            autoclose: true,
            todayBtn: "linked"
        });
    })
})(jQuery);