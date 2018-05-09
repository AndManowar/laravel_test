<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 08.05.18
 * Time: 10:36
 */

namespace App\Components\Rbac\Requests;

use App\Http\Requests\Request;

/**
 * Class PermissionGroupRequest
 * @package App\Components\Rbac\Requests
 */
class PermissionGroupRequest extends Request
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name'   => 'required|min:4|regex:/[a-zA-Z]/u|unique:permission_groups',
            'module' => 'required|min:4|regex:/[a-zA-Z]/u|unique:permission_groups',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'   => 'Поле обязательно к заполнению',
            'name.regex'      => 'Ввод доступен только латиницей',
            'name.unique'     => 'Поле должно быть уникальным',
            'module.required' => 'Поле обязательно к заполнению',
            'module.unique'   => 'Поле должно быть уникальным',
            'module.regex'    => 'Ввод доступен только латиницей',
            'name.min'        => 'Поле не может быть короче :min символов',
            'module.min'      => 'Поле не может быть короче :min символов',
        ];
    }
}