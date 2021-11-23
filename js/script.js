$(document).ready(function () {
    $('#repeater').createRepeater();

    $('#repeater_form').on('submit', function (event) {
        event.preventDefault();
        console.log('hi');
        $.ajax({
            url: "insert_service.php",
            method: "POST",
            data: $(this).serialize(),
            success: (data) => {
                // console.log(data);
                // console.log(data);
                $('#repeater_form')[0].reset();
                // $('#repeater').createRepeater();
                // $('body').html(' ');
                $('body').html('');
                $('body').html(data);
            }
        })
    });
   

    $('.repeater-add-btn').on('click', () => {
        console.log('clicking');
        $(".datepicker").datepicker();

    });
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

    $('body').on('click', '.delete', (event) => {

        // console.log('delete button click ');
        $result = confirm('Are you sure want to delete ? ');
        if ($result) {
            // console.log('hi');
            event.preventDefault();
            var city_id = $('.delete').parents('.selected').attr('city_id');
            console.log(city_id);
            $.ajax({
                type: "post",
                url: "delete_city.php",
                data: { id: city_id },
                error: () => {
                    alert('failed to delete');
                },
                success: function (returnResult) {
                    console.log(returnResult);
                    $('tbody').html(returnResult);
                }
            });
        }
    });

    $('body').on('change', '#crew_input', () => {
        var val = $('#crew_input').val();
        // console.log(val);

        var sbook = $('#crew_list_personal_info option').filter(function () {
            return this.value == val;
        }).data('sbook');

        var id = $('#crew_list_personal_info option').filter(function () {
            return this.value == val;
        }).data('id');

        $('#sb_perinfo').val(sbook);
        $('#hidden_input').val(id);
        // console.log(id);
    });


    $('body').on('change', '#crew_service_list', () => {
        // console.log($('#crew_service_list'));
        var val = $('#crew_service_list').val();
        // console.log('crew list changing');
        var sbook = $('#crew_service_list option').filter(function () {
            return this.value == val;
        }).data('sbook');
        console.log(val);
        console.log(sbook);

        $('#sbookNo_service').val(sbook);
        // $('#hidden_crew_id').val(val);
        $('#hidden_crew_id').val(val);
        $.ajax({
            url: "reload_service_create.php?cid="+val,
            method: "POST",
            data: $(this).serialize(),
            success: (data) => {
                
                // $('#repeater_form')[0].reset();
                // $('#repeater').createRepeater();
                console.log(data);
                $('#select_vessel_service').html(data);
                // $('body').html(data);
            }
        })
        // console.log(sbook);

        // var id = $('#crew_list_personal_info option').filter(function () {
        //     return this.value == val;
        // }).data('id');

        // $('#sb_perinfo').val(sbook);
        // $('#hidden_input').val(id);
        // console.log(id);
    });
    $('body').on('change', '#certificate', () => {
        console.log('certificate is changing');
        var val = $('#certificate').val();
        // // console.log(val);

        // var sbook = $('#certificate_list option').filter(function () {
        //     return this.value == val;
        // }).data('sbook');

        var id = $('#certificate_list option').filter(function () {
            return this.value == val;
        }).data('id');
        $('#hidden_certificate_id').val(id);

        console.log(id);
    });


    $('body').on('dblclick', '#certificate', () => {
        $('#certificate').val(' ');

    });

    $('body').on('dblclick', '#crew_input', () => {
        console.log('crew focus');
        $('#crew_input').val(' ');
        $('#sb_perinfo').val(' ');
    });
    $('body').on('dblclick', '#crew', () => {
        // console.log('crew focus');
        $('#crew').val(' ');
    });


});
console.log('this is script js');
