<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 03.05.18
 * Time: 16:31
 */

namespace App\Components\Handbook\Requests;

use App\Http\Requests\Request;
use App\Components\Handbook\Models\Handbook;
use App\Components\Handbook\Helpers\FieldTypeHelper;

/**
 * Class DataRequest
 * @package App\Components\Handbook\Requests
 */
class DataRequest extends Request
{
    /**
     * @var Handbook
     */
    private $handbook;

    /**
     * @var array
     */
    private $data;

    /**
     * Init current handbook to validate additional fields
     */
    protected function before()
    {
        if ($this->data = $this->get('data')) {

            $this->handbook = Handbook::query()->findOrFail(array_pop($this->data)['handbook_id']);
        }
    }

    /**
     * @return array
     */
    public function rules()
    {
        $rules = [
            'data.*.title'   => 'required',
            'data.*.data_id' => 'required|integer|unique_id:' . $this->getDataIdValues(),
            'data.*.value'   => 'required',
        ];

        return array_merge($rules, FieldTypeHelper::getValidationRules($this->handbook));
    }

    /**
     * @return array
     */
    public function messages()
    {
        $messages = [
            'data.*.data_id.required'  => 'Поле обязательно к заполнению.',
            'data.*.data_id.unique_id' => 'Поле должно быть уникальным.',
            'data.*.data_id.integer'   => 'Поле должно быть целым числом.',
            'data.*.title.required'    => 'Поле обязательно к заполнению.',
            'data.*.value.required'    => 'Поле обязательно к заполнению.',
            'data.*.title.min'         => 'Длина не может быть меньше :min.',
            'data.*.value.min'         => 'Длина не может быть меньше :min.',
        ];

        return array_merge($messages, FieldTypeHelper::getValidationMessages($this->handbook));
    }

    /**
     * Get current data_id form values for custom validation
     *
     * @return string
     */
    private function getDataIdValues()
    {
        return implode(' ', collect($this->data)->map(function ($data) {
            return $data['data_id'];
        })->all());
    }
}