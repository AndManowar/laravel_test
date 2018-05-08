<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 9:27
 */

namespace App\Admin\Components\handbook\Requests;

use App\Http\Requests\Request;

/**
 * Class HandbookRequest
 * @package App\Admin\Http\Requests
 */
class HandbookRequest extends Request
{
    /**
     * @return array
     */
    public function rules()
    {
        $rules = [
            'systemName'  => 'required|string|min:5',
            'description' => 'required|string|min:5',
        ];

        if ($this->input('additionalFields')) {
            $rules['additionalFields.*.name'] = 'required|string|min:5';
            $rules['additionalFields.*.description'] = 'required|string|min:5';
            $rules['additionalFields.*.type'] = 'required|integer';
            $rules['additionalFields.*.is_required'] = 'boolean';
        }

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'systemName.required'                     => 'Поле обязательно к заполнению.',
            'description.required'                    => 'Поле обязательно к заполнению.',
            'systemName.min'                          => 'Длина не может быть меньше :min.',
            'description.min'                         => 'Длина не может быть меньше :min.',
            'additionalFields.*.name.required'        => 'Поле обязательно к заполнению.',
            'additionalFields.*.type.required'        => 'Поле обязательно к заполнению.',
            'additionalFields.*.description.required' => 'Поле обязательно к заполнению.',
            'additionalFields.*.name.min'             => 'Длина не может быть меньше :min.',
            'additionalFields.*.description.min'      => 'Длина не может быть меньше :min.',
        ];
    }
}