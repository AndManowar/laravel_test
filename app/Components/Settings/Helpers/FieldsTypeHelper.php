<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 07.05.18
 * Time: 14:03
 */

namespace App\Components\Settings\Helpers;

/**
 * Class FieldsTypeHelper
 * @package App\Components\Settings\Helpers
 */
class FieldsTypeHelper
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
     * @param integer $type
     * @param null|mixed $value
     * @return string
     */
    public static function getFormField($type, $value = null)
    {
        switch ($type) {
            case self::TYPE_TEXT_FIELD:
                return '<label for="value">Значение</label>
                        <input 
                        type="text" 
                        id="value" 
                        class="form-control" 
                        placeholder="Значение" 
                        name="value" 
                        value="' . $value . '">';
                break;
            case self::TYPE_TEXT_AREA:
                return '<label for="value">Значение</label>
                        <textarea 
                        id="value" 
                        class="form-control" placeholder="Значение" 
                        name="value" 
                        >' . $value . '</textarea>';
                break;
            case self::TYPE_CHECKBOX:
                return '<input 
                        type="hidden" 
                        name="value" 
                        value="0">
                        <input 
                        type="checkbox" 
                        id="value" 
                        name="value" 
                        value="1" 
                        title="">
                        <label for="value">Значение</label>';
                break;
            case self::TYPE_NUMBER:
                return '<label for="value">Значение</label>
                        <input 
                        type="text" 
                        id="value" 
                        class="form-control" 
                        placeholder="Значение" 
                        name="value" 
                        value="' . $value . '">';
                break;
            case self::TYPE_DATE:
                return '<label for="value">Значение</label>
                        <input 
                        type="date" 
                        id="value" 
                        class="form-control" 
                        placeholder="Значение" 
                        name="value" 
                        value="' . $value . '">';
                break;
            case self::TYPE_DATETIME:
                return '<label for="value">Значение</label>
                        <input 
                        type="datetime-local" 
                        id="value" 
                        class="form-control" 
                        placeholder="Значение" 
                        name="value" 
                        value="' . $value . '">';
                break;
            case self::TYPE_TIME:
                return '<label for="value">Значение</label>
                        <input 
                        type="time" 
                        id="value" 
                        class="form-control" 
                        placeholder="Значение" 
                        name="value" 
                        value="' . $value . '">';
                break;
        }
        throw new InvalidArgumentException();
    }

    /**
     * Get field validation rules
     *
     * @param integer $type
     * @return mixed
     */
    public static function getValidationRules($type)
    {
        if ($type) {
            return self::$typesList[$type]['validationRules'];
        }

        return '';
    }

    /**
     * Get field validation messages
     *
     * @param integer $type
     * @return mixed
     */
    public static function getValidationMessages($type)
    {
        if ($type) {
            return self::$typesList[$type]['validationMessages'];
        }

        return [];
    }
}