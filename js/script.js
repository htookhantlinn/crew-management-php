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
    $('#profile_photo_input').on('change', function () {
        const [file] = profile_photo_input.files;
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
        console.log(file);
        console.log('changing in selection files ');
    });
    $('#profile_photo_update').on('change', function () {
        const [file] = profile_photo_update.files;
        if (file) {
            profile_photo_update_img.src = URL.createObjectURL(file)
        }
        console.log(file);
        console.log('changing in selection files ');
    });

    $('.delete').on('click', () => {
        console.log('delete button click ');
        $result = confirm('Are you sure want to delete ? ');
        if($result){
            console.log($(this).parents.attr('city_id'));
        }
    });


});
console.log('this is script js');
