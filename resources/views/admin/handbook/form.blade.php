<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 9:31
 */

/**
 * @var \App\Components\Handbook\Models\Handbook $handbook
 * @var array $handbooksList
 * @var array $fieldTypes
 */

$route = $handbook->exists ? route('admin.handbook.update', ['id' => $handbook->id]) : route('admin.handbook.create');
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
                    <form class="form" method="post" id="handbook_form"
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
                                               value="{{old('systemName') ? old('systemName') : $handbook->systemName}}">
                                        <span class="help-block">
                                            </span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <input type="text" id="description" class="form-control"
                                               placeholder="Описание" name="description"
                                               value="{{old('description') ? old('description') : $handbook->description}}">
                                        <span class="help-block">
                                                </span>
                                    </div>
                                </div>
                                @if($handbooksList)
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="relation">Родительский
                                                справочник</label>
                                            <select id="relation" name="relation" class="form-control"
                                                    title="">
                                                <option value="" selected>-Родительский справочник-</option>
                                                @foreach($handbooksList as $id => $item)
                                                    <option value="{{$id}}" {{ old("relation") ? old("relation") : $handbook->relation == $id ? 'selected' : ''}}>{{$item}}</option>
                                                @endforeach
                                            </select>
                                            <span class="help-block">
                                                </span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Сохранить
                                </button>
                                <a href="" class="btn btn-success pull-right add_additional_field"><i
                                            class="icon-plus4"></i></a>
                            </div>
                            <div class="row additional_handbook_fields_div">
                                @if($handbook->additionalFields)
                                    @foreach($handbook->additionalFields as $index => $additionalField){
                                    @php echo view('admin.handbook.additional-field-form', [
                                    'index' => $index,
                                     'fieldTypes' => $fieldTypes,
                                     'additionalField' => $additionalField
                                     ])
                                    @endphp
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/handbook/handbook.js') }}" type="text/javascript"></script>
@stop
