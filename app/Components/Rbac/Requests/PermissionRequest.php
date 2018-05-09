<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 08.05.18
 * Time: 10:34
 */

namespace App\Components\Rbac\Requests;

use App\Http\Requests\Request;

/**
 * Class PermissionRequest
 * @package App\Components\Rbac\Requests
 */
class PermissionRequest extends Request
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4|regex:/[a-zA-Z]/u|unique:permissions',
            'slug' => 'required|min:4|regex:/[a-zA-Z]/u|unique:permissions',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Поле обязательно к заполнению',
            'name.unique'   => 'Поле должно быть уникальным',
            'name.regex'    => 'Ввод доступен только латиницей',
            'slug.required' => 'Поле обязательно к заполнению',
            'slug.unique'   => 'Поле должно быть уникальным',
            'slug.regex'    => 'Ввод доступен только латиницей',
            'name.min'      => 'Поле не может быть короче :min символов',
            'slug.min'      => 'Поле не может быть короче :min символов',
        ];
    }
}