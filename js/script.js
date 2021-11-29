
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
            url: "reload_service_create.php?cid=" + val,
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






    //Certificate Edit Button Test 
    $(".edit_button_test").on("click", function (event) {
        // console.log();
        $tr = $(this).parent().parent();
        $edit_td = $tr.find('.certificateName_td');

        console.log($($edit_td).attr('data-id'));
        $updated_certId = $($edit_td).attr('data-id');
        // console.log($edit_td.children());

        $edit_input = $edit_td.find('input[type=text].certificate_text');
        $edit_label = $edit_td.find('label.certificateName_label');

        $hasClass = $($tr).hasClass('editMode');
        console.log($hasClass);
        if ($hasClass) {
            $edit_label.html($edit_input.val().toUpperCase());
            $edited_certificate = $edit_input.val().toUpperCase();

            $.ajax({
                type: "POST",
                url: "updateCertificate.php",
                data: { id: $updated_certId, name: $edited_certificate },
                success: function (response) {
                    // no need to return 
                }
            });
        } else {
            $edit_input.val($($edit_label).text())
        }
        $($edit_input).toggleClass('editMode');
        $($edit_label).toggleClass('editMode');
        $($tr).toggleClass('editMode');

    });

    //Certificate Edit Button Test 
    $('body').on('keypress', '.certificate_text', function (e) {
        // console.log(e.key === 'Enter');
        if (e.key === 'Enter') {
            // console.log($(this).siblings());
            // console.log($(this).parent());
            $edit_td = $(this).parent();
            $tr = $edit_td.parent();
            $edit_label = $edit_td.find('label.certificateName_label');

            $hasClass = $($tr).hasClass('editMode');
            console.log($hasClass);

            if ($hasClass) {
                $edit_label.html($edit_input.val().toUpperCase());
                $edited_certificate = $edit_input.val().toUpperCase();

                $.ajax({
                    type: "POST",
                    url: "updateCertificate.php",
                    data: { id: $updated_certId, name: $edited_certificate },
                    success: function (response) {
                        // no need to return 
                    }
                });
            } else {
                $edit_input.val($($edit_label).text())
            }

            $($(this)).toggleClass('editMode');
            $($edit_label).toggleClass('editMode');
            $($tr).toggleClass('editMode');

        }
        // console.log('focus');
    });


    $(".edit-certificate-button").on("click", function (event) {
        // console.log();
        $tr = $(this).parent().parent();
        $date_issued_td = $tr.find('.date_issued_td');
        $number_td = $tr.find('.number_td');
        $date_expired_td = $tr.find('.date_expired_td');

        $date_issued_input = $date_issued_td.find('input[type=text].date_issued_text');
        $date_issued_label = $date_issued_td.find('label.date_issued_label');

        $number_input = $number_td.find('input[type=number].number_text');
        $number_label = $number_td.find('label.number_label');

        $date_expired_input = $date_expired_td.find('input[type=text].date_expired_text');
        $date_expired_label = $date_expired_td.find('label.date_expired_label');

        console.log($($date_issued_td).attr('data-cert-id'));
        console.log($($date_issued_td).attr('data-crew-id'));



        $updated_certificate_id = $($date_issued_td).attr('data-cert-id')
        $updated_crew_id = $($date_issued_td).attr('data-crew-id')
        $crew_cert_id = $($date_issued_td).attr('data-id')

        console.log($crew_cert_id);


        $hasClass = $($tr).hasClass('editMode');
        console.log($hasClass);

        if ($hasClass) {
            $date_issued_label.html($date_issued_input.val().toUpperCase());
            $number_label.html($number_input.val().toUpperCase());
            $date_expired_label.html($date_expired_input.val().toUpperCase());


            $updated_date_issued = $date_issued_input.val();
            $updated_number = $number_input.val();
            $updated_date_expired = $date_expired_input.val();

            $.ajax({
                type: "POST",
                url: "crewcertificate_update.php",
                data: {
                    id: $crew_cert_id,
                    cert_id: $updated_certificate_id, crew_id: $updated_crew_id,
                    date_issued: $updated_date_issued, number: $updated_number,
                    date_expired: $updated_date_expired

                },
                success: function (response) {
                    // no need to return
                    // $('body').html(response);
                }
            });


        } else {
            $date_issued_input.val($($date_issued_label).text())
            $number_input.val($($number_label).text())
            $date_expired_input.val($($date_expired_label).text())

        }

        $($date_issued_input).toggleClass('editMode');
        $($number_input).toggleClass('editMode');
        $($date_expired_input).toggleClass('editMode');

        $($date_issued_label).toggleClass('editMode');
        $($number_label).toggleClass('editMode');
        $($date_expired_label).toggleClass('editMode');


        $($tr).toggleClass('editMode');

    });

    $('.service_list_edit_btn').on('click', function () {
        $tr = $(this).parent().parent();

        $company_td = $tr.find('.company_td');
        $company_td_input = $company_td.find('input[type=text].company_text');
        $company_td_label = $company_td.find('label.company_label');

        $rank_td = $tr.find('.rank_td');
        $rank_td_input = $rank_td.find('input[type=text].rank_text');
        $rank_td_label = $rank_td.find('label.rank_label');

        $ship_td = $tr.find('.ship_td');
        $ship_td_input = $ship_td.find('input[type=text].ship_text');
        $ship_td_label = $ship_td.find('label.ship_label');

        $service_id = $($ship_td).attr('data-id');
        // console.log($service_id);
        $hasClass = $($tr).hasClass('editMode');

        if ($hasClass) {
            $company_td_label.html($company_td_input.val().toUpperCase());
            $rank_td_label.html($rank_td_input.val().toUpperCase());
            $ship_td_label.html($ship_td_input.val().toUpperCase());

            $edited_company = $company_td_input.val().toUpperCase();
            $edited_rank = $rank_td_input.val().toUpperCase();
            $edited_ship = $ship_td_input.val().toUpperCase();

            $.ajax({
                type: "POST",
                url: "edit_service.php",
                data: { id: $service_id, company: $edited_company, rank: $edited_rank, ship: $edited_ship },
                success: function (response) {
                    //no need to return 
                    // $('body').html(response);
                }
            });


        } else {

            $company_td_input.val($($company_td_label).text())
            $rank_td_input.val($($rank_td_label).text())
            $ship_td_input.val($($ship_td_label).text())
        }

        $($company_td_input).toggleClass('editMode');
        $($company_td_label).toggleClass('editMode');

        $($rank_td_input).toggleClass('editMode');
        $($rank_td_label).toggleClass('editMode');

        $($ship_td_input).toggleClass('editMode');
        $($ship_td_label).toggleClass('editMode');


        $($tr).toggleClass('editMode');
    });


});
console.log('this is script js');
