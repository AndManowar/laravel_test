<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 11.05.18
 * Time: 11:16
 */

namespace App\Components\Admin\Requests;

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
        return [
            'surname'   => 'required|string',
            'name'      => 'required|string',
            'last_name' => 'required|string',
            'birthday'  => 'required|date:Y-m-d',
            'avatar'    => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'surname.required'   => 'Поле обязательно к заполнению',
            'name.required'      => 'Поле обязательно к заполнению',
            'last_name.required' => 'Поле обязательно к заполнению',
            'birthday.required'  => 'Поле обязательно к заполнению',
            'avatar.required'    => 'Поле обязательно к заполнению',
        ];
    }
}