<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 09.05.2018
 * Time: 12:02
 */
use YaroslavMolchan\Rbac\Models\Permission;
use YaroslavMolchan\Rbac\Models\PermissionGroup;
use YaroslavMolchan\Rbac\Models\Role;

/**
 * @var Role|Permission|Permission[] $permissions
 * @var PermissionGroup $permissionGroup
 */
?>
@extends('layouts.admin.main')
@section('content')
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">"{{$permissionGroup->name}}" - Permissions</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Название</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr class="rowItem">
                                <td>{{$permission->name}}</td>
                                <td>
                                    <a href="" class="btn btn-danger btn-group remove_permission_from_group"
                                       data-route="{{route('admin.rbac.permission-group.remove-permission')}}"
                                       data-id="{{$permission->getKey()}}"
                                    data-message="Вы уверены что хотите удалить разрешение?"><i
                                                class="icon-cross2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/rbac/rbac.js') }}" type="text/javascript"></script>
@stop
