<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 13:52
 */

namespace App\Components\handbook\Helpers;

use App\Components\handbook\Models\Handbook;
use InvalidArgumentException;

/**
 * Class FieldTypeHelper
 * @package App\Components\handbook\Helpers
 */
class FieldTypeHelper
{
    /**
     * Additional fields types
     *
     * @const
     */
    const TYPE_TEXT_FIELD = 1;
    const TYPE_TEXT_AREA = 2;
    const TYPE_CHECKBOX = 3;
    const TYPE_NUMBER = 4;
    const TYPE_DATE = 5;
    const TYPE_DATETIME = 6;
    const TYPE_TIME = 7;

    /**
     * Required rule
     *
     * @const
     */
    const RULE_REQUIRED = 'required|';

    /**
     * Private construct to disable an opportunity to create object
     *
     * FieldTypeHelper constructor.
     */
    private function __construct()
    {
    }

    /**
     * Array of possible additional fields types, validation rules and messages
     *
     * @var array
     */
    public static $typesList = [
        self::TYPE_TEXT_FIELD => [
            'title'              => 'Текстовое поле (макс 30 знаков)',
            'validationRules'    => 'max:30',
            'validationMessages' => [
                'max'      => 'Значение не может быть длиннее :max символов',
                'required' => 'Поле обязательно к заполнению',
            ],
        ],
        self::TYPE_TEXT_AREA  => [
            'title'              => 'Большое текстовое поле',
            'validationRules'    => 'max:255',
            'validationMessages' => [
                'max'      => 'Значение не может быть длиннее :max символов',
                'required' => 'Поле обязательно к заполнению',
            ],
        ],
        self::TYPE_CHECKBOX   => [
            'title'              => 'Чекбокс',
            'validationRules'    => 'boolean',
            'validationMessages' => [
                'boolean'  => 'Может принимать значение только 0 либо 1',
                'required' => 'Поле обязательно к заполнению',
            ],
        ],
        self::TYPE_NUMBER     => [
            'title'              => 'Целое число',
            'validationRules'    => 'integer',
            'validationMessages' => [
                'integer'  => 'Значение должно быть целым числом',
                'required' => 'Поле обязательно к заполнению',
            ],
        ],
        self::TYPE_DATE       => [
            'title'              => 'Дата',
            'validationRules'    => 'date',
            'validationMessages' => [
                'date'     => 'Значение должно иметь формат даты',
                'required' => 'Поле обязательно к заполнению',
            ],
        ],
        self::TYPE_DATETIME   => [
            'title'              => 'Время и дата',
            'validationRules'    => 'date_format:Y-m-d\TH:i',
            'validationMessages' => [
                'date_format' => 'Неверный формат времени и даты',
                'required'    => 'Поле обязательно к заполнению',
            ],
        ],
        self::TYPE_TIME       => [
            'title'              => 'Время',
            'validationRules'    => 'date_format:H:i',
            'validationMessages' => [
                'date_format' => 'Значение должно иметь времени',
                'required'    => 'Поле обязательно к заполнению',
            ],
        ],
    ];

    /**
     * Fields Type list
     *
     * @return array
     */
    public static function getTitlesForDropdown()
    {
        return collect(self::$typesList)->map(function ($item) {
            return $item['title'];
        })->all();
    }

    /**
     * Get form field by type
     *
     * @param \stdClass $field
     * @param integer $index
     * @param null|mixed $value
     * @return string
     */
    public static function getFormField($field, $index, $value = null)
    {
        switch ($field->type) {
            case self::TYPE_TEXT_FIELD:
                return '<label for="additionalData-'.$index.'-'.$field->name.'">'.$field->description.'</label>
                        <input 
                        type="text" 
                        id="additionalData-'.$index.'-'.$field->name.'" 
                        class="form-control" 
                        placeholder="'.$field->description.'" 
                        name="additionalData['.$index.']'.'['.$field->name.']'.'" 
                        value="'.$value.'">';
                break;
            case self::TYPE_TEXT_AREA:
                return '<label for="additionalData-'.$index.'-'.$field->name.'">'.$field->description.'</label>
                        <textarea 
                        id="additionalData-'.$index.'-'.$field->name.'" 
                        class="form-control" placeholder="'.$field->description.'" 
                        name="additionalData['.$index.']'.'['.$field->name.']'.'" 
                        >'.$value.'</textarea>';
                break;
            case self::TYPE_CHECKBOX:
                return '<input 
                        type="hidden" 
                        name="additionalData['.$index.']'.'['.$field->name.']'.'" 
                        value="0">
                        <input 
                        type="checkbox" 
                        id="additionalData-'.$index.'-'.$field->name.'" 
                        name="additionalData['.$index.']'.'['.$field->name.']'.'" 
                        value="1" 
                        title="">
                        <label for="additionalData-'.$index.'-'.$field->name.'">'.$field->description.'</label>';
                break;
            case self::TYPE_NUMBER:
                return '<label for="additionalData-'.$index.'-'.$field->name.'">'.$field->description.'</label>
                        <input 
                        type="text" 
                        id="additionalData-'.$index.'-'.$field->name.'" 
                        class="form-control" 
                        placeholder="'.$field->description.'" 
                        name="additionalData['.$index.']'.'['.$field->name.']'.'" 
                        value="'.$value.'">';
                break;
            case self::TYPE_DATE:
                return '<label for="additionalData-'.$index.'-'.$field->name.'">'.$field->description.'</label>
                        <input 
                        type="date" 
                        id="additionalData-'.$index.'-'.$field->name.'" 
                        class="form-control" 
                        placeholder="'.$field->description.'" 
                        name="additionalData['.$index.']'.'['.$field->name.']'.'" 
                        value="'.$value.'">';
                break;
            case self::TYPE_DATETIME:
                return '<label for="additionalData-'.$index.'-'.$field->name.'">'.$field->description.'</label>
                        <input 
                        type="datetime-local" 
                        id="additionalData-'.$index.'-'.$field->name.'" 
                        class="form-control" 
                        placeholder="'.$field->description.'" 
                        name="additionalData['.$index.']'.'['.$field->name.']'.'" 
                        value="'.$value.'">';
                break;
            case self::TYPE_TIME:
                return '<label for="additionalData-'.$index.'-'.$field->name.'">'.$field->description.'</label>
                        <input 
                        type="time" 
                        id="additionalData-'.$index.'-'.$field->name.'" 
                        class="form-control" 
                        placeholder="'.$field->description.'" 
                        name="additionalData['.$index.']'.'['.$field->name.']'.'" 
                        value="'.$value.'">';
                break;
        }
        throw new InvalidArgumentException();
    }

    /**
     * Get additional fields validation rules
     *
     * @param Handbook $handbook
     * @return array
     */
    public static function getValidationRules($handbook)
    {
        $additionalFields = $handbook->getDecodedFields();

        $rules = [];

        foreach ($additionalFields as $id => $field) {

            if ($field->is_required) {
                $rules['additionalData.*.'.$field->name] = self::RULE_REQUIRED;
            }

            // Если правило валидации уже есть в массиве правил, то добавляем его через "."
            if (array_key_exists('additionalData.*.'.$field->name, $rules)) {
                $rules['additionalData.*.'.$field->name] .= self::$typesList[$field->type]['validationRules'];
            } else {
                $rules['additionalData.*.'.$field->name] = self::$typesList[$field->type]['validationRules'];
            }
        }

        return $rules;
    }

    /**
     * Get additional fields validation error messages
     *
     * @param Handbook $handbook
     * @return array
     */
    public static function getValidationMessages($handbook)
    {
        $additionalFields = $handbook->getDecodedFields();

        $messages = [];

        foreach ($additionalFields as $id => $field) {
            foreach (self::$typesList[$field->type]['validationMessages'] as $rule => $message) {
                $messages['additionalData.*.'.$field->name.'.'.$rule] = $message;
            }
        }

        return $messages;
    }
}