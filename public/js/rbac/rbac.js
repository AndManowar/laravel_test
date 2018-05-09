$(document).ready(function () {

    // Изменения доступов ролей к группам разрешений
    $(document).on('change', '.change_role_group', function () {
        $.ajax({
            url: $(this).data('route'),
            type: 'GET',
            data: {
                checked: $(this).is(':checked') === true ? 1 : 0,
                roleId: $(this).data('role'),
                groupId: $(this).data('group')
            }
        });
    });

    // Добавление разрешения к группе разрешений
    $(document).on('click', '.add_permission_to_group', function (e) {
        e.preventDefault();

        var input = $(this);

        $.ajax({
            url: input.data('route'),
            type: 'GET',
            data: {
                permissionName: input.data('permission'),
                groupId: input.closest('.rowItem').find('#permissionGroup').val()
            },
            success: function () {
                input.closest('.rowItem').empty();
            },
            error: function () {
                alert('Error');
            }
        });
    });

    // Удаление разрешения из группы
    $(document).on('click', '.remove_permission_from_group', function (e) {
        e.preventDefault();

        var input = $(this);
        if (confirm(input.data('message'))) {
            $.ajax({
                url: input.data('route'),
                type: 'GET',
                data: {
                    id: input.data('id')
                },
                success: function () {
                    input.closest('.rowItem').empty();
                },
                error: function () {
                    alert('Error');
                }
            });
        }
    });


});