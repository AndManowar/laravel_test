$(document).ready(function () {
    // Добавить допонительное поле структуры справочника
    $(document).on('click', '.add_additional_field', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/ajax/additional-handbook-field',
            type: 'GET',
            data: {index: $('.additional_body').size()},
            success: function (data) {
                $(data).appendTo('.additional_handbook_fields_div');
                $("#handbook_form").load();
            }
        });
    });

    $(document).on('submit', '#handbook_form', function (e) {
        e.preventDefault();

        $('#handbook_form .help-block').empty();

        $.ajax({
            type: 'POST',
            url: $(this).data('route'),
            dataType: 'JSON',
            data: $("#handbook_form").serialize(),
            success: function (response) {

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

});