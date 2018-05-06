<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 05.05.2018
 * Time: 15:20
 */

namespace App\Components\handbook\Validators;

use Illuminate\Validation\Validator;

/**
 * Class CustomValidator
 * @package App\Components\handbook\Validators
 */
class DataValidator extends Validator
{
    /**
     * @param string $attribute
     * @param mixed $value
     * @param array $params
     * @return bool
     */
    public function ValidateUniqueId($attribute, $value, $params)
    {
        if (empty($params)) {
            return false;
        }

        if (count(array_keys($this->getArrayOfValuesFromParams($params), $value)) > 1) {
            return false;
        }

        return true;
    }

    /**
     * Getting values of all form attributes from params
     *
     * @param array $params
     * @return array
     */
    private function getArrayOfValuesFromParams($params)
    {
        return explode(' ', array_pop($params));
    }
}