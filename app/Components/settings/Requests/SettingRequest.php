<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 07.05.18
 * Time: 13:56
 */

namespace App\Components\settings\Requests;

use App\Components\settings\Helpers\FieldsTypeHelper;
use App\Http\Requests\Request;

/**
 * Class SettingRequest
 * @package App\Components\settings\Requests
 */
class SettingRequest extends Request
{

    /**
     * @return array
     */
    public function rules()
    {
        $rules = [
            'systemName'  => 'required|min:4|unique',
            'description' => 'required|min:4',
            'fieldType'   => 'required|integer',
            'value'       => 'required|' . FieldsTypeHelper::getValidationRules($this->get('fieldType'))
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        $messages = [
            'systemName.required'  => 'Поле обязательно к заполнению',
            'systemName.unique'    => 'Такое название уже есть',
            'description.required' => 'Поле обязательно к заполнению',
            'fieldType.required'   => 'Необходимо выбрать тип поля',
            'value.required'       => 'Поле обязательно к заполнению',
            'systemName.min'       => 'Длина не может быть меньше :min',
            'description.min'      => 'Длина не может быть меньше :min',
        ];

        return array_merge($messages, FieldsTypeHelper::getValidationMessages($this->get('fieldType')));
    }
}