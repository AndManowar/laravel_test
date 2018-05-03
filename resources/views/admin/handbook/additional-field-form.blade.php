<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 10:36
 */

/**
 * @var integer $index
 * @var array $additionalField
 */
?>


<div class="col-md-12 additional_body">
    <hr>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Дополнительное поле</h4>
            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a href="" class="remove_additional_field"><i class="icon-cross2"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-body collapse in">
            <div class="card-block">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="additionalFields-<?=$index?>-name">Название</label>
                        <input type="text" id="additionalFields-<?=$index?>-name" class="form-control"
                               placeholder="Название" name="additionalFields[<?=$index?>][name]"
                               value="{{ $additionalField != null ? $additionalField->name : '' }}">
                        <span class="help-block">
                            </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="additionalFields-<?=$index?>-description">Описание</label>
                        <input type="text" id="additionalFields-<?=$index?>-description" class="form-control"
                               placeholder="Описание" name="additionalFields[<?=$index?>][description]"
                               value="{{ $additionalField != null ? $additionalField->description : '' }}">
                        <span class="help-block">
                            </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="additionalFields-<?=$index?>-type">Тип поля</label>
                        <select id="additionalFields-<?=$index?>-type" name="additionalFields[<?=$index?>][type]"
                                class="form-control"
                                title="">
                            <option value="" selected>-Тип поля-</option>
                            @foreach($fieldTypes as $id => $item)
                                <option value="{{$id}}" {{ ($additionalField != null ? $additionalField->type : '') == $id ? 'selected' : ''}}>{{$item}}</option>
                            @endforeach
                        </select>
                        <span class="help-block">
                            </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="hidden" name="additionalFields[<?=$index?>][is_required]" value="0">
                        <input type="checkbox" id="additionalFields-<?=$index?>-is_required"
                               @if(isset($additionalField->is_required) && $additionalField->is_required) checked
                               @endif name="additionalFields[<?=$index?>][is_required]" value="1" title="">
                        <label for="remember-me"> Обязательно к заполнению</label>
                        <span class="help-block">
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>