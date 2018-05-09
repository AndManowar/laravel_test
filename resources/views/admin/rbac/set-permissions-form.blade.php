<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 09.05.2018
 * Time: 15:01
 */

/**
 * @var array $routes
 * @var array $permissionGroups
 */
?>
@extends('layouts.admin.main')
@section('content')
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Setting permissions to permission groups</h4>
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
                            <th>#</th>
                            <th>Route</th>
                            <th>Group</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($routes as $id => $route)
                            <tr class="rowItem">
                                <th scope="row">{{$id + 1}}</th>
                                <td>{{$route}}</td>
                                <td><select name="permission" id="permissionGroup" title="">
                                        @foreach($permissionGroups as $id => $permissionGroup)
                                            <option value="{{$id}}">{{$permissionGroup}}</option>
                                        @endforeach
                                    </select></td>
                                <td><a href="" class="btn btn-success add_permission_to_group"
                                       data-route="{{route('admin.rbac.set-permissions')}}"
                                       data-permission="{{$route}}">Add</a></td>
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