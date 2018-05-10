<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 08.05.18
 * Time: 16:41
 */

/**
 * @var \App\Components\Rbac\Models\Role[] $roles
 * @var \App\Components\Rbac\Models\Permission[] $permissions
 * @var \App\Components\Rbac\Models\PermissionGroup[] $permissionGroup
 */
?>
@extends('layouts.admin.main')
@section('content')
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Управление ролями/разрешениями</h4>
            </div>
            <div class="card-body">
                <div class="card-block">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" id="active-tab" data-toggle="tab" href="#roles"
                               aria-controls="active"
                               aria-expanded="false">Роли</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link-tab" data-toggle="tab" href="#permissions" aria-controls="link"
                               aria-expanded="true">Группы разрешений</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="linkOpt-tab" data-toggle="tab" href="#permissionGroups"
                               aria-controls="linkOpt">Роли/Группы разрешений</a>
                        </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div role="tabpanel" class="tab-pane fade active in" id="roles" aria-labelledby="roles-tab"
                             aria-expanded="true">
                            <a href="{{route('admin.rbac.role')}}" class="btn btn-success">Новая роль</a>
                            <hr>
                            @foreach($roles as $role)
                                @php echo view('admin.rbac.table', [
                                            'model' => $role,
                                            'editRoute' => route('admin.rbac.role', ['id' => $role->id]),
                                            'deleteRoute' => route('admin.rbac.role.delete', ['id' => $role->id])
                                ]) @endphp
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="permissions" role="tabpanel" aria-labelledby="permissions-tab"
                             aria-expanded="false">
                            <a href="{{route('admin.rbac.permission-group')}}" class="btn btn-success">Новая группа
                                разрешений</a>
                            <hr>
                            @foreach($permissionGroups as $permissionGroup)
                                @php echo view('admin.rbac.table', [
                                            'model' => $permissionGroup,
                                            'editRoute' => route('admin.rbac.permission-group', ['id' => $permissionGroup->id]),
                                            'deleteRoute' => route('admin.rbac.permission-group.delete', ['id' => $permissionGroup->id])
                                ]) @endphp
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="permissionGroups" role="tabpanel"
                             aria-labelledby="permissionGroups-tab"
                             aria-expanded="false">
                            @php echo view('admin.rbac.role-group-table', [
                                            'roles' => $roles,
                                            'permissionGroups' => $permissionGroups
                                ]) @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection