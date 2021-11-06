$(document).ready(function () {
    $('.repeater').repeater({
        hide: function (deleteElement) {
            if (confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
            }
        },
    });


    // $(function () {
    //     $('.date').datepicker({
    //         format: 'dd/mm/yyyy'
    //     });
    // });


});
