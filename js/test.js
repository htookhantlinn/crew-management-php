$(document).ready(function () {
    const root_url =
        "https://script.google.com/macros/s/AKfycbzfBfs4p67GNOts_PIR48JrV1LKlB6pE6pn-R1aR1-xzJ_F6-a-oIv5_8FmQh1KTrMTyw/exec";
    $.ajax({
        type: "GET",
        url: root_url + "?callback=?",
        crossDomain: true,
        dataType: "json",
        success: function (response) {
            const { data, status, success } = response;
            if (success) {
                $select = $('#division');
                // $($select).addClass('form-select w-25 mt-5');
                for (const x in data) {
                    const element = data[x];
                    $option = $('<option/>').html(element['slug']).attr('value', element['slug'])
                    $($select).append($option);
                }
                $('body').append($select);
                $state_select_box = $('<select/>').addClass(' form-select w-25 mt-5');
                $($state_select_box).attr('id', 'state_select_box');
                $($state_select_box).append($('<option/>').html('Select Your State'));
                $('body').append($state_select_box)
            }
        }
    });

    // var stateSelect = document.getElementById('division')

    $('#division').on('change', function () {
        const selectedValue = this.value;
        $state_select_box = $('#state_select_box')
        $($state_select_box).html(' ');
        $.ajax({
            url: root_url + "/get/" + selectedValue + "?callback=?",
            type: "GET",
            crossDomain: true,
            dataType: "json",
            success: function (result) {
                const { data, success } = result;
                if (success) {
                    for (const x in data) {
                        const element = data[x];
                        console.log(element['name']);
                        $option = $('<option/>').html(element['name']);
                        $($option).attr('value', element['name']);
                        $($state_select_box).append($option);
                    }
                    $('body').append($state_select_box);
                } else {
                    alert('Api Call Fail');
                }
            },
        });
    });


});