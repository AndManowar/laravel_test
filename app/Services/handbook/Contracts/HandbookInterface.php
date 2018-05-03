<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 12:20
 */

namespace App\Services\handbook\Contracts;

use App\Components\handbook\Models\Handbook;

/**
 * Interface HandbookInterface
 * @package App\Services\handbook\Contracts
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

    public function getRecord($name, $data_id);

}