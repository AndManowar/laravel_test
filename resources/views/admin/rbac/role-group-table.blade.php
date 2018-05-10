<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 09.05.2018
 * Time: 12:32
 */

/**
 * @var \App\Components\Rbac\Models\Role[] $roles
 * @var \App\Components\Rbac\Models\PermissionGroup[] $permissionGroups
 */
?>

<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Permission Groups/Roles</th>
        @foreach($roles as $role)
            <th>{{$role->name}}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($permissionGroups as $permissionGroup)
        <tr>
            <td>{{$permissionGroup->name}}</td>
            @foreach($roles as $role)
                @if(\App\Components\Rbac\Facades\RbacFacade::isRoleInPermissionGroup($role, $permissionGroup))
                    <td><input type="checkbox" class="change_role_group" title="" checked
                               data-route="{{route('admin.rbac.change-role-group')}}"
                               data-group="{{$permissionGroup->getKey()}}"
                               data-role="{{$role->getKey()}}"></td>
                @else
                    <td><input type="checkbox" class="change_role_group" title=""
                               data-route="{{route('admin.rbac.change-role-group')}}"
                               data-group="{{$permissionGroup->getKey()}}"
                               data-role="{{$role->getKey()}}"></td>
                @endif

            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
@section('scripts')
    <script src="{{ asset('js/rbac/rbac.js') }}" type="text/javascript"></script>
@stop