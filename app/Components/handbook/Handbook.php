<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 12:23
 */

namespace App\Components\handbook;

use App\Components\handbook\Models\HandbookData;
use Cache;
use App\Components\handbook\Contracts\HandbookInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use \App\Components\handbook\Models\Handbook as HandbookModel;

/**
 * Class Handbook
 * @package App\Components\handbook
 */
class Handbook implements HandbookInterface
{
    /**
     * Cache unique name
     *
     * @const
     */
    const CACHE_NAME = 'handbook_cache';

    /**
     * Cache duration 1 day
     *
     * @const
     */
    const CACHE_DURATION = 86400;

    /**
     * @var array
     */
    private $cachedHandbooks;

    /**
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function __construct()
    {
        $this->readFromCache();
    }

    /**
     * Get handbook by name
     *
     * @param string $name
     * @return \App\Components\handbook\Models\Handbook
     * @throws NotFoundHttpException
     */
    public function get($name)
    {
        if (isset($this->cachedHandbooks[$name])) {
            return $this->cachedHandbooks[$name];
        }

        throw new NotFoundHttpException();
    }

    /**
     * Get handbooks list for dropdown
     *
     * @param null|integer $id
     * @return array|\Illuminate\Support\Collection
     */
    public function getList($id = null)
    {
        if ($id == null) {

            return HandbookModel::all()->pluck('systemName', 'id')->all();
        }

        return HandbookModel::all()->where('id', '!=', $id)->pluck('systemName', 'id')->all();
    }

    /**
     * Get data record by data_id fields and handbook name
     *
     * @param string $name
     * @param integer $data_id
     * @return HandbookData
     * @throws NotFoundHttpException
     */
    public function getRecord($name, $data_id)
    {
        return collect($this->get($name)->handbookData)->firstWhere('data_id', '=', $data_id)->first();
    }

    /**
     * Get child handbook data related to parent data data_id field
     *
     * @param string $childName
     * @param integer $parentDataId
     * @return array
     * @throws NotFoundHttpException
     */
    public function getChildData($childName, $parentDataId)
    {
        return collect($this->get($childName)->handbookData)->where('relation', '=', $parentDataId)->all();
    }

    /**
     * Set handbooks and data to cache
     *
     * @return void
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function setToCache()
    {
        foreach (HandbookModel::all() as $handbook) {
            $this->cachedHandbooks[$handbook->systemName] = $handbook;
        }

        Cache::set(self::CACHE_NAME, $this->cachedHandbooks, self::CACHE_DURATION);
    }

    /**
     * Read handbooks and data from cache
     *
     * @return void
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function readFromCache()
    {
        $this->cachedHandbooks = Cache::get(self::CACHE_NAME);

        if (!$this->cachedHandbooks) {
            $this->setToCache();
        }
    }
}