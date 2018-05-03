<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 12:23
 */

namespace App\Services\handbook;

use App\Services\handbook\Contracts\HandbookInterface;
use Cache;

/**
 * Class Handbook
 * @package App\Services\handbook
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
     * @return \App\Components\handbook\Models\Handbook|array
     */
    public function get($name)
    {
        if (isset($this->cachedHandbooks[$name])) {
            return $this->cachedHandbooks[$name];
        }

        return [];
    }

    /**
     * Get handbooks list for dropdown
     *
     * @return array|\Illuminate\Support\Collection
     */
    public function getList()
    {
        return \App\Components\handbook\Models\Handbook::all()->pluck('systemName', 'id')->all();
    }

    /**
     * Set handbooks and data to cache
     *
     * @return void
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function setToCache()
    {
        foreach (\App\Components\handbook\Models\Handbook::all() as $handbook) {
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

    public function getRecord($name, $data_id)
    {
        // TODO: Implement getRecord() method.
    }
}