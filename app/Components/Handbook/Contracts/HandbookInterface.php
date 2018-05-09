<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 12:20
 */

namespace App\Components\Handbook\Contracts;

use App\Components\Handbook\Models\Handbook;

/**
 * Interface HandbookInterface
 * @package App\Components\Handbook\Contracts
 */
interface HandbookInterface
{
    /**
     * Get handbooks list for dropdown
     *
     * @return array|\Illuminate\Support\Collection
     */
    public function getList();

    /**
     * Get handbook by name
     *
     * @param string $name
     * @return Handbook
     */
    public function get($name);

    /**
     * Set handbooks and data to cache
     *
     * @return void
     */
    public function setToCache();

    /**
     * Read handbooks and data from cache
     *
     * @return void
     */
    public function readFromCache();

    /**
     * Get data record by data_id fields and handbook name
     *
     * @param string $name
     * @param integer $data_id
     * @return HandbookData
     * @throws NotFoundHttpException
     */
    public function getRecord($name, $data_id);

    /**
     * Get child handbook data related to parent data data_id field
     *
     * @param string $childName
     * @param integer $parentDataId
     * @return array
     * @throws NotFoundHttpException
     */
    public function getChildData($childName, $parentDataId);

}