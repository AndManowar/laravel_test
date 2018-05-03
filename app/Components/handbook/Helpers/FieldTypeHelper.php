<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 13:52
 */

namespace App\Components\handbook\Helpers;

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
     * @var array
     */
    public static $typesList = [
        self::TYPE_TEXT_FIELD => [
            'title' => 'Текстовое поле'
        ],
        self::TYPE_TEXT_AREA  => [
            'title' => 'Большое текстовое поле'
        ],
        self::TYPE_CHECKBOX   => [
            'title' => 'Чекбокс'
        ],
        self::TYPE_NUMBER     => [
            'title' => 'Целое число'
        ],
        self::TYPE_DATE       => [
            'title' => 'Дата'
        ],
        self::TYPE_DATETIME   => [
            'title' => 'Время и дата'
        ],
    ];

    public static function getTitlesForDropdown()
    {
        return collect(self::$typesList)->map(function ($item) {
            return $item['title'];
        })->all();
    }
}