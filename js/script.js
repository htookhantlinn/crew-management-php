$(document).ready(function () {

    $(function () {
        // $('.date').datepicker();
        $(".datepicker").datepicker();
    });
    $('.repeater').repeater({
        hide: function (deleteElement) {
            if (confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
            }
        },
    });



});
