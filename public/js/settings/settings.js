$(document).ready(function () {

    // Получение поля для значения настройки
    $(document).on('change', '#fieldType', function (e) {
        e.preventDefault();
        $('.value_field').empty();
        $.ajax({
            url: $(this).data('url'),
            type: 'GET',
            data: {type: $(this).val()},
            success: function (data) {
                $(data).appendTo('.value_field');
            }
        });
    });

    // Валидация и сабмит формы
    $(document).on('submit', '#settings_form', function (e) {
        e.preventDefault();

        $('.help-block').empty();

        $.ajax({
            type: 'POST',
            url: $(this).data('route'),
            dataType: 'json',
            data: $("#settings_form").serialize(),
            success: function (response) {
                $(location).attr("href", response.url);
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                $.each(errors.errors, function (key, val) {
                    var input = $('#' + key);
                    input.parent().find('.help-block').html('<strong>' + val[0] + '</strong>');
                    input.parent().find('span').removeClass('hidden');
                });
            }
        });
    });
});