<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 03.05.18
 * Time: 16:31
 */

namespace App\Components\handbook\Requests;

use App\Components\handbook\Helpers\FieldTypeHelper;
use App\Components\handbook\Models\Handbook;
use App\Http\Requests\Request;

/**
 * Class DataRequest
 * @package App\Components\handbook\Requests
 */
class DataRequest extends Request
{
    /**
     * @return array
     */
    public function rules()
    {
        $attributes = $this->all();

        $handbook = Handbook::findOrFail($attributes['data'][0]['handbook_id']);

        $rules = [
            'data.*.title' => 'required|min:2',
            'data.*.value' => 'required|min:2'
        ];

        $rules = array_merge($rules, FieldTypeHelper::getValidationRules($handbook, $attributes['additionalData']));

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'data.*.title.required' => 'Поле обязательно к заполнению.',
            'data.*.value.required' => 'Поле обязательно к заполнению.',
            'data.*.title.min'      => 'Длина не может быть меньше :min.',
            'data.*.value.min'      => 'Длина не может быть меньше :min.',
        ];
    }
}