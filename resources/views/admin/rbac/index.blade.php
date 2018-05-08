<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 08.05.18
 * Time: 16:41
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
                            <a class="nav-link" id="active-tab" data-toggle="tab" href="#active" aria-controls="active" aria-expanded="false">Роли</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="link-tab" data-toggle="tab" href="#link" aria-controls="link" aria-expanded="true">Разрешения</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="linkOpt-tab" data-toggle="tab" href="#linkOpt" aria-controls="linkOpt">Группы разрешений</a>
                        </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div role="tabpanel" class="tab-pane fade" id="active" aria-labelledby="active-tab" aria-expanded="false">
                            <a href="{{route('admin.rbac.role')}}" class="btn btn-success">Новая роль</a>
                        </div>
                        <div class="tab-pane fade active in" id="link" role="tabpanel" aria-labelledby="link-tab" aria-expanded="true">
                            <a href="{{route('admin.rbac.permission')}}" class="btn btn-success">Новое разрешение</a>
                        </div>
                        <div class="tab-pane fade" id="linkOpt" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                            <a href="{{route('admin.rbac.permission-group')}}" class="btn btn-success">Новая группа разрешений</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection