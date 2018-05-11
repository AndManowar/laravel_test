<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 11.05.18
 * Time: 11:16
 */

namespace App\Components\User\Requests;

use App\Http\Requests\Request;

/**
 * Class AdminRequest
 * @package App\Components\User\Requests
 */
class AdminRequest extends Request
{
    /**
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [];
    }
}