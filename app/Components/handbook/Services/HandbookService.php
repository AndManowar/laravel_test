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
        $handbook->additionalFields = $handbook->getDecodedFields();

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
        $handbook->encodeFields();

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
        $handbook->encodeFields();

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
     * @param array|null $values
     * @return array
     */
    public function getAdditionalFields($handbook, $index, array $values = null)
    {
        /** @var \stdClass[] $fields */
        $fields = $handbook->additionalFields;

        if (!$fields) {
            return [];
        }

        $result = [];

        foreach ($fields as $field) {

            $result[] = FieldTypeHelper::getFormField(
                $field,
                $index,
                isset($values[$field->name]) ? $values[$field->name] : null
            );
        }

        return $result;
    }

    /**
     * Create handbook data
     *
     * @param array $data
     * @return bool
     */
    public function addData(array $data)
    {
        foreach ($data['data'] as $id => $data_item) {

            $handbookData = new HandbookData();
            $handbookData->fill($data_item);

            if (isset($data['additionalData']) && isset($data['additionalData'][$id])) {
                $handbookData->additionalFieldsData = $data['additionalData'][$id];
                $handbookData->encodeData();
            }

//            if (!$handbookData->save()) {
//                return false;
//            }
        }

        return true;
    }
}