<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 08.05.18
 * Time: 10:36
 */

namespace App\Components\rbac\Requests;

use App\Http\Requests\Request;

/**
 * Class PermissionGroupRequest
 * @package App\Components\rbac\Requests
 */
class PermissionGroupRequest extends Request
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name'   => 'required|min:4',
            'module' => 'required|min:4',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'   => 'Поле обязательно к заполнению',
            'module.required' => 'Поле обязательно к заполнению',
            'name.min'        => 'Поле не может быть короче :min символов',
            'module.min'      => 'Поле не может быть короче :min символов',
        ];
    }
}