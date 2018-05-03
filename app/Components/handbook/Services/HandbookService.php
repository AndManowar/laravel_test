<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 01.05.18
 * Time: 13:29
 */

namespace App\Components\handbook\Services;

use App\Components\handbook\Helpers\FieldTypeHelper;
use App\Components\handbook\Models\Handbook;
use App\Components\handbook\Models\HandbookData;

/**
 * Class HandbookService
 * @package App\Components\handbook\Services
 */
class HandbookService
{
    /**
     * Get handbook by id or create new
     *
     * @param integer|null $id
     * @return Handbook|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function getHandbook($id)
    {
        if ($id == null) {
            return new Handbook();
        }
        /** @var Handbook $handbook */
        $handbook = Handbook::findOrFail($id);
        $handbook->additionalFields = $handbook->getFields();

        return $handbook;
    }

    /**
     * Create new handbook
     *
     * @param array $attributes
     * @return bool
     */
    public function create($attributes)
    {
        $handbook = $this->getHandbook(null);

        $handbook->fill($attributes);
        $handbook->setFields();

        return $handbook->save();
    }

    /**
     * Update handbook method
     *
     * @param integer $id
     * @param array $attributes
     * @return bool
     */
    public function update($id, $attributes)
    {
        $handbook = $this->getHandbook($id);
        $handbook->fill($attributes);
        $handbook->setFields();

        return $handbook->save();
    }

    /**
     * Delete handbook
     *
     * @param integer $id
     * @return bool|null
     * @throws \Exception
     */
    public function delete($id)
    {
        /** @var Handbook $handbook */
        $handbook = Handbook::findOrFail($id);

        if (Handbook::query()->where(['relation' => $handbook->id])->exists()) {
            return false;
        }

        return $handbook->delete();
    }

    /**
     * Get related items for dropdown
     *
     * @param Handbook $handbook
     * @return array
     */
    public function getRelatedData($handbook)
    {
        if (!$handbook->relation) {
            return [];
        }

        return HandbookData::query()
            ->where(['handbook_id' => $handbook->relation])
            ->pluck('title', 'data_id')
            ->all();
    }

    /**
     * @param Handbook $handbook
     * @param integer $index
     * @return array
     */
    public function getAdditionalFields($handbook, $index)
    {
        /** @var \stdClass[] $fields */
        $fields = $handbook->additionalFields;

        if (!$fields) {
            return [];
        }

        $result = [];

        foreach ($fields as $field) {
            $result[] = FieldTypeHelper::getFormField($field, $index);
        }

        return $result;
    }
}