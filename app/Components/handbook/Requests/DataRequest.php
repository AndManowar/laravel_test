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
use App\Rules\UniqueHandbookDataId;

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
     * @var array
     */
    private $data;


    /**
     * Init current handbook to validate additional fields
     */
    protected function before()
    {
        if (isset($this->all()['data'])) {

            $this->handbook = Handbook::findOrFail(array_pop($this->all()['data'])['handbook_id']);
            $this->data = $this->all()['data'];
        }
    }

    /**
     * @return array
     */
    public function rules()
    {
        $rules = [
            'data.*.title' => 'required',
            'data.*.data_id' => ['required', 'integer', new UniqueHandbookDataId($this->handbook->id, $this->data)],
            'data.*.value' => 'required',
        ];

//        if ($this->data) {
//            foreach ($this->data as $id => $datum) {
//
//                $rules['data.' . $id . '.data_id'] = [
//                    'required',
//                    Rule::unique('handbook_data')->ignore(isset($datum['id']) ? $datum['id'] : null)->where(function ($query) {
//                        /** @var Builder $query */
//                        $query->where('handbook_id', $this->handbook->id);
//                    })
//                ];
//            }
//        }

        return array_merge($rules, FieldTypeHelper::getValidationRules($this->handbook));
    }

    /**
     * @return array
     */
    public function messages()
    {
        $messages = [
            'data.*.data_id.required' => 'Поле обязательно к заполнению.',
            'data.*.data_id.unique'   => 'Поле должно быть уникальным.',
            'data.*.title.required'   => 'Поле обязательно к заполнению.',
            'data.*.value.required'   => 'Поле обязательно к заполнению.',
            'data.*.title.min'        => 'Длина не может быть меньше :min.',
            'data.*.value.min'        => 'Длина не может быть меньше :min.',
        ];

        return array_merge($messages, FieldTypeHelper::getValidationMessages($this->handbook));
    }
}