<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 13:52
 */

namespace App\Components\handbook\Helpers;

use App\Components\handbook\Models\Handbook;
use http\Exception\InvalidArgumentException;

/**
 * Class FieldTypeHelper
 * @package App\Components\handbook\Helpers
 */
class FieldTypeHelper
{
    /**
     * Типы дополнительных полей
     *
     * @const
     */
    const TYPE_TEXT_FIELD = 1;
    const TYPE_TEXT_AREA = 2;
    const TYPE_CHECKBOX = 3;
    const TYPE_NUMBER = 4;
    const TYPE_DATE = 5;
    const TYPE_DATETIME = 6;

    /**
     * Private construct to disable an opportunity to create object
     *
     * FieldTypeHelper constructor.
     */
    private function __construct()
    {
    }

    /**
     * @var array
     */
    public static $typesList = [
        self::TYPE_TEXT_FIELD => [
            'title'      => 'Текстовое поле',
            'validation' => 'min:3'
        ],
        self::TYPE_TEXT_AREA  => [
            'title'      => 'Большое текстовое поле',
            'validation' => 'min:3'
        ],
        self::TYPE_CHECKBOX   => [
            'title'      => 'Чекбокс',
            'validation' => 'boolean'
        ],
        self::TYPE_NUMBER     => [
            'title'      => 'Целое число',
            'validation' => 'integer'
        ],
        self::TYPE_DATE       => [
            'title'      => 'Дата',
            'validation' => 'date'
        ],
        self::TYPE_DATETIME   => [
            'title'      => 'Время и дата',
            'validation' => 'date'
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
     * @return string
     */
    public static function getFormField($field, $index)
    {
        switch ($field->type) {
            case self::TYPE_TEXT_FIELD:
                return '<label for="additionalData-' . $index . '-' . $field->name . '">' . $field->description . '</label>
                <input type="text" id="additionalData-' . $index . '-' . $field->name . '" class="form-control" placeholder="' . $field->description . '" name="additionalData[' . $index . ']' . '[' . $field->name . ']' . '" value="">';
                break;
            case self::TYPE_TEXT_AREA:
                return '<label for="additionalData-' . $index . '-' . $field->name . '">' . $field->description . '</label>
                <textarea id="additionalData-' . $index . '-' . $field->name . '" class="form-control" placeholder="' . $field->description . '" name="additionalData[' . $index . ']' . '[' . $field->name . ']' . '" value=""></textarea>';
                break;
            case self::TYPE_CHECKBOX:
                break;
            case self::TYPE_NUMBER:
                break;
            case self::TYPE_DATE:
                break;
            case self::TYPE_DATETIME:
                break;
        }
        throw new InvalidArgumentException();
    }

    /**
     * TODO validate values
     *
     * Get validation rules
     *
     * @param Handbook $handbook
     * @param array $fields
     * @return array
     */
    public static function getValidationRules($handbook, $fields)
    {

        $additionalFields = $handbook->getFields();

        $rules = [];

        foreach ($additionalFields as $id => $field) {
            if ($field->is_required) {
                $rules['additionalData.*.' . $field->name] .= 'required';
            }
            $rules['additionalData.*.' . $field->name] = '|'.self::$typesList[$field->type]['validation'];

        }

        return $rules;
    }
}