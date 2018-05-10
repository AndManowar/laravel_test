<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 9:31
 */

/**
 * @var \App\Components\Rbac\Models\PermissionGroup $permissionGroup
 */

$route = $permissionGroup->exists ? route('admin.rbac.permission-group.update', ['id' => $permissionGroup->getKey()]) : route('admin.rbac.permission-group.create');
?>
@extends('layouts.admin.main')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Группа разрешений</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form" method="post" id="role_form"
                          action="<?= $route ?>"
                          data-route="<?= $route ?>">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Название</label>
                                        <input type="text" id="name" class="form-control"
                                               placeholder="Системное название" name="name"
                                               value="{{old('name') ? old('name') : $permissionGroup->name}}">
                                        <span class="help-block">
                                        <strong>
                                                @php
                                                    if ($errors->has('name')) {
                                                        echo $errors->first('name');
                                                    }
                                                @endphp
                                        </strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="module">Модуль</label>
                                        <input type="text" id="module" class="form-control"
                                               placeholder="Модуль" name="module"
                                               value="{{old('module') ? old('module') : $permissionGroup->module}}">
                                        <span class="help-block">
                                        <strong>
                                                @php
                                                    if ($errors->has('module')) {
                                                        echo $errors->first('module');
                                                    }
                                                @endphp
                                        </strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Сохранить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/settings/settings.js') }}" type="text/javascript"></script>
@stop
