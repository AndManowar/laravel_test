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
use Exception;

/**
 * Class HandbookService
 * @package App\Components\handbook\Services
 */
class HandbookService
{
    /**
     * Id of newly created handbook object
     *
     * @var integer
     */
    private $id;

    /**
     * Array with errors
     *
     * @var array
     */
    private $errors;

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

        if (!$handbook->save()) {
            return false;
        }

        $this->id = $handbook->id;

        return true;
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

        if (!$handbook->save()) {
            return false;
        }

        return true;
    }

    /**
     * Delete handbook
     *
     * @param integer $id
     * @return bool|null
     * @throws Exception
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
     * Get additional form fields for form rendering
     *
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
     * Save handbook data
     *
     * @param array $data
     * @return bool
     */
    public function saveData(array $data)
    {
        foreach ($data['data'] as $id => $data_item) {

            $handbookData = $this->getDataObject($data_item['handbook_id'], $data_item['data_id']);

            $handbookData->fill($data_item);

            if (isset($data['additionalData']) && isset($data['additionalData'][$id])) {
                $handbookData->additionalFieldsData = $data['additionalData'][$id];
                $handbookData->encodeData();
            }

            if (!$handbookData->save()) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get handbookData object on update or create new one on create
     *
     * @param integer $handbook_id
     * @param integer $data_id
     * @return HandbookData|\Illuminate\Database\Eloquent\Collection|static[]
     */
    private function getDataObject($handbook_id, $data_id)
    {
        if ($handbookData = HandbookData::query()
            ->where('data_id', $data_id)
            ->where('handbook_id', $handbook_id)->get()->first()
        ) {
            return $handbookData;
        }

        return new HandbookData();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Delete handbookData object
     *
     * @param integer $id
     * @return bool|null
     */
    public function deleteDataRecord($id)
    {
        /** @var HandbookData $dataItem */
        $dataItem = HandbookData::findOrFail($id);

        // Если данное значение справочника указано где-то как родительское - нельзя удалять
        if (HandbookData::query()
            ->join('handbooks', 'handbook_data.handbook_id', '=', 'handbooks.id')
            ->where('handbook_data.relation', $dataItem->data_id)
            ->where('handbooks.relation', $dataItem->handbook_id)
            ->exists()
        ) {
            $this->addError('Данное значение является родительским для одного из справочников и не может быть удалено');

            return false;
        }

        return $dataItem->delete();
    }

    /**
     * Add errors
     *
     * @param string $errorMessage
     * @return void
     */
    private function addError($errorMessage)
    {
        $this->errors = [];
        array_push($this->errors, $errorMessage);
    }

    /**
     * Get errors
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}