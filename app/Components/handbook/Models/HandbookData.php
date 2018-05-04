<?php

namespace App\Components\handbook\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $handbook_id
 * @property int $data_id
 * @property string $value
 * @property string $title
 * @property int $relation
 * @property string $additionalFieldsData
 * @property string $created_at
 * @property string $updated_at
 * @property Handbook $handbook
 */
class HandbookData extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'handbook_data';

    /**
     * @var array
     */
    protected $fillable = ['handbook_id', 'data_id', 'value', 'title', 'relation', 'additionalFieldsData', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function handbook()
    {
        return $this->belongsTo(Handbook::class);
    }

    /**
     * Encode Data
     * @return void
     */
    public function encodeData()
    {
        if ($this->additionalFieldsData) {
            $this->additionalFieldsData = json_encode($this->additionalFieldsData);
        }
    }

    /**
     * Get decoded fields
     *
     * @return array
     */
    public function getDecodedData()
    {
        if ($this->additionalFieldsData) {
            return json_decode($this->additionalFieldsData);
        }

        return [];
    }
}
