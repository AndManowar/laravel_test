<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 08.05.18
 * Time: 10:27
 */

namespace App\Components\rbac\Requests;

use App\Http\Requests\Request;

/**
 * Class RoleRequest
 * @package App\Components\rbac\Requests
 */
class RoleRequest extends Request
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4',
            'slug' => 'required|min:4',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Поле обязательно к заполнению',
            'slug.required' => 'Поле обязательно к заполнению',
            'name.min'      => 'Поле не может быть короче :min символов',
            'slug.min'      => 'Поле не может быть короче :min символов',
        ];
    }
}