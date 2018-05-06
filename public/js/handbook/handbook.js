$(document).ready(function () {

    // Добавить допонительное поле структуры справочника
    $(document).on('click', '.add_additional_field', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/admin/handbook/additional-handbook-field',
            type: 'GET',
            data: {index: $('.additional_body').size()},
            success: function (data) {
                $(data).appendTo('.additional_handbook_fields_div');
                // $("#handbook_form").load();
            }
        });
    });

    // Валидация и сабмит формы
    $(document).on('submit', '#handbook_form', function (e) {
        e.preventDefault();

        $('.help-block').empty();

        $.ajax({
            type: 'POST',
            url: $(this).data('route'),
            dataType: 'json',
            data: $("#handbook_form").serialize(),
            success: function (response) {
                $(location).attr("href", response.url);
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                $.each(errors.errors, function (key, val) {
                    var input = $('#' + key.replace(/\./g, "-"));
                    input.parent().find('.help-block').html('<strong>' + val[0] + '</strong>');
                    input.parent().find('span').removeClass('hidden');
                });
            }
        });
    });

    // Удалить допонительное поле структуры справочника
    $(document).on('click', '.remove_additional_field', function (e) {
        e.preventDefault();
        $(this).closest('.additional_body').remove();
    });

    // Удалить значение справочника
    $(document).on('click', '.remove_data-item', function (e) {
        e.preventDefault();

        var input = $(this);

        if (input.data('id')) {

            if (confirm(input.data('confirm').toString())) {
                $.ajax({
                    url: input.data('url'),
                    type: 'GET',
                    data: {id: input.data('id')},
                    success: function () {
                        input.closest('.data-item').remove();
                    },
                    error: function (response) {
                        alert($.parseJSON(response.responseText).message.join(' '));
                    }
                });
            }
        } else {
            input.closest('.data-item').remove();
        }


        if (parseInt($('.data_fields').children('div').length) === 0) {
            $('.submit_data_btn').addClass('hidden');
        }
    });

    // Добавить допонительное поле значения справочника
    $(document).on('click', '.add_new_data_field', function (e) {
        e.preventDefault();

        $('.submit_data_btn').removeClass('hidden');

        $.ajax({
            url: '/admin/handbook/add-new-data-field',
            type: 'GET',
            data: {index: $('.data_fields').children('div').length, id: $("#handbook_data_form").data('id')},
            success: function (data) {
                $(data).appendTo('.data_fields');
            },
            error: function (response) {
                alert($.parseJSON(response.responseText).message.join(' '));
            }
        });
    });

    // Валидация и сабмит данных справочника
    $(document).on('submit', '#handbook_data_form', function (e) {
        e.preventDefault();

        $('.help-block').empty();

        $.ajax({
            type: 'POST',
            url: $(this).data('action'),
            dataType: 'json',
            data: $("#handbook_data_form").serialize(),
            success: function (response) {
                $(location).attr("href", response.url);
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                $.each(errors.errors, function (key, val) {
                    var input = $('#' + key.replace(/\./g, "-"));
                    console.log(key.replace(/\./g, "-"));
                    input.parent().find('.help-block').html('<strong>' + val[0] + '</strong>');
                    input.parent().find('span').removeClass('hidden');
                });
            }
        });
    });

});