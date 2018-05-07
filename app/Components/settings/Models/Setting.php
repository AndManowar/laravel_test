<?php

namespace App\Components\settings\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $description
 * @property string $systemName
 * @property int $fieldType
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 */
class Setting extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['description', 'systemName', 'fieldType', 'value', 'created_at', 'updated_at'];

}
