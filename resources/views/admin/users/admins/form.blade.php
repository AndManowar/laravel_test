<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 9:31
 */

/**
 * @var \App\Components\Admin\Models\Admin $admin
 */

$route = $admin->exists ? route('admin.admin.edit', ['id' => $admin->id]) : route('admin.admin.create');
?>
@extends('layouts.admin.main')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"
                    id="basic-layout-form">{{$admin->exists ? 'Администратор - '.$admin->email : 'Новый администратор'}}</h4>
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
                                        <label for="name">Email</label>
                                        <input type="email" id="email" class="form-control"
                                               placeholder="Email" name="email"
                                               value="{{old('email') ? old('email') : $admin->email}}">
                                        <span class="help-block">
                                            <strong>
                                                @php
                                                    if ($errors->has('email')) {
                                                        echo $errors->first('email');
                                                    }
                                                @endphp
                                            </strong>
                                            </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">New Password</label>
                                        <input type="text" id="newPassword" class="form-control"
                                               placeholder="newPassword" name="newPassword">
                                        <span class="help-block">
                                        <strong>
                                                @php
                                                    if ($errors->has('newPassword')) {
                                                        echo $errors->first('newPassword');
                                                    }
                                                @endphp
                                        </strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="slug">Surname</label>
                                        <input type="text" id="surname" class="form-control"
                                               placeholder="surname" name="surname"
                                               value="{{old('surname') ? old('surname') : $admin->profile->surname}}">
                                        <span class="help-block">
                                        <strong>
                                                @php
                                                    if ($errors->has('surname')) {
                                                        echo $errors->first('surname');
                                                    }
                                                @endphp
                                        </strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="slug">Name</label>
                                        <input type="text" id="name" class="form-control"
                                               placeholder="Name" name="name"
                                               value="{{old('name') ? old('name') : $admin->profile->name}}">
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

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="slug">Last Name</label>
                                        <input type="text" id="last_name" class="form-control"
                                               placeholder="Last Name" name="last_name"
                                               value="{{old('last_name') ? old('last_name') : $admin->profile->last_name}}">
                                        <span class="help-block">
                                        <strong>
                                                @php
                                                    if ($errors->has('last_name')) {
                                                        echo $errors->first('last_name');
                                                    }
                                                @endphp
                                        </strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="slug">Birthday</label>
                                        <input type="date" id="birthday" class="form-control"
                                               placeholder="Birthday" name="birthday"
                                               value="{{old('birthday') ? old('birthday') : $admin->profile->birthday}}">
                                        <span class="help-block">
                                        <strong>
                                                @php
                                                    if ($errors->has('birthday')) {
                                                        echo $errors->first('birthday');
                                                    }
                                                @endphp
                                        </strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="slug">New Avatar</label>
                                        <input type="file" id="avatar" class="form-control"
                                               placeholder="Avatar" name="avatar"
                                               value="{{old('avatar') ? old('avatar') : $admin->profile->avatar}}">
                                        <span class="help-block">
                                        <strong>
                                                @php
                                                    if ($errors->has('avatar')) {
                                                        echo $errors->first('avatar');
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
