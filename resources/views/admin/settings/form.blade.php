<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 9:31
 */

/**
 * @var \App\Components\settings\Models\Setting $setting
 * @var array $fieldsTypes
 */

$route = $setting->exists ? route('admin.setting.update', ['id' => $setting->id]) : route('admin.setting.create');
?>
@extends('layouts.admin.main')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Структура справочника</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form" method="post" id="settings_form"
                          action="<?= $route ?>"
                          data-route="<?= $route ?>">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <h4 class="form-section"><i class="icon-align-center2"></i> Основные поля</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="systemName">Системное название</label>
                                        <input type="text" id="systemName" class="form-control"
                                               placeholder="Системное название" name="systemName"
                                               value="{{old('systemName') ? old('systemName') : $setting->systemName}}">
                                        <span class="help-block">
                                            </span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <input type="text" id="description" class="form-control"
                                               placeholder="Описание" name="description"
                                               value="{{old('description') ? old('description') : $setting->description}}">
                                        <span class="help-block">
                                                </span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fieldType">Тип поля</label>
                                        <select id="fieldType" name="fieldType" class="form-control"
                                                title="" data-url="{{route('admin.setting.get-value-field')}}">
                                            <option value="" selected>-Тип поля-</option>
                                            @foreach($fieldsTypes as $id => $item)
                                                <option value="{{$id}}" {{ old("fieldType") ? old("fieldType") : $setting->fieldType == $id ? 'selected' : ''}}>{{$item}}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 value_field">
                                    @if($setting->value)
                                        @php echo \App\Components\settings\Helpers\FieldsTypeHelper::getFormField($setting->fieldType, $setting->value) @endphp
                                    @endif
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
