<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 01.05.18
 * Time: 13:29
 */

namespace App\Components\handbook\Services;

use App\Components\handbook\Models\Handbook;

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

        return Handbook::query()->findOrFail($id);
    }

    /**
     * @param $attributes
     * @return bool
     */
    public function create($attributes)
    {
        $handbook = $this->getHandbook(null);
        $handbook->fill($attributes);
        $handbook->setFields();

        return $handbook->save();
    }

}