<?php

namespace App\Components\handbook\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $systemName
 * @property string $description
 * @property string $additionalFields
 * @property int $relation
 * @property string $created_at
 * @property string $updated_at
 * @property HandbookDatum[] $handbookData
 * @property mixed $handbook_data
 */
class Handbook extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['systemName', 'description', 'additionalFields', 'relation', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function handbookData()
    {
        return $this->hasMany('App\HandbookDatum');
    }

    /**
     * Json Encoding fields
     *
     * @return void
     */
    public function EncodeFields()
    {
        if ($this->additionalFields) {
            $this->additionalFields = json_encode($this->additionalFields);
        }
    }

    /**
     * Get decoded fields
     *
     * @return \stdClass[]
     */
    public function getDecodedFields()
    {
        if ($this->additionalFields) {
            return json_decode($this->additionalFields);
        }

        return [];
    }
}
