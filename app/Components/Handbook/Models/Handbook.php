<?php

namespace App\Components\Handbook\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $systemName
 * @property string $description
 * @property string $additionalFields
 * @property int $relation
 * @property string $created_at
 * @property string $updated_at
 * @property HandbookData[] $handbookData
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
        return $this->hasMany(HandbookData::class);
    }

    /**
     * Json Encoding fields
     *
     * @return void
     */
    public function encodeFields()
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
        return $this->additionalFields ? json_decode($this->additionalFields) : [];
    }

    /**
     * Get parent handbook
     *
     * @return string
     */
    public function getParent()
    {
        if ($this->relation) {

            /** @var Handbook $handbook */
            $handbook = Handbook::query()->findOrFail($this->relation);

            return $handbook->systemName;
        }

        return 'Not Set';
    }
}
