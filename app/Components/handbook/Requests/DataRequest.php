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
     * @var Handbook
     */
    private $handbook;

    /**
     *
     */
    protected function before()
    {
        $this->handbook = Handbook::findOrFail($this->all()['data'][0]['handbook_id']);
    }

    /**
     * @return array
     */
    public function rules()
    {
        $rules = [
            'data.*.title' => 'required|min:2',
            'data.*.value' => 'required|min:2',
        ];

        return array_merge($rules, FieldTypeHelper::getValidationRules($this->handbook));
    }

    /**
     * @return array
     */
    public function messages()
    {
        $messages = [
            'data.*.title.required' => 'Поле обязательно к заполнению.',
            'data.*.value.required' => 'Поле обязательно к заполнению.',
            'data.*.title.min'      => 'Длина не может быть меньше :min.',
            'data.*.value.min'      => 'Длина не может быть меньше :min.',
        ];

        return array_merge($messages, FieldTypeHelper::getValidationMessages($this->handbook));
    }
}