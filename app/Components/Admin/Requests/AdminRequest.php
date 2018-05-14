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
            'surname'     => 'required|string',
            'email'       => 'required|email|unique:admins,email,'.$this->get('id'),
            'name'        => 'required|string',
            'last_name'   => 'required|string',
            'birthday'    => 'required|date:Y-m-d',
            'image'       => 'image|mimes:jpeg,png',
            'password'    => $this->get('id') ? '' : 'required|min:5',
            'newPassword' => 'min:5|nullable',
            'role'        => 'required|integer',
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
            'password.required'  => 'Поле обязательно к заполнению',
            'role.required'      => 'Поле обязательно к заполнению',
            'password.min'       => 'Длина не может быть меньше :min символов',
            'newPassword.min'    => 'Длина не может быть меньше :min символов',
            'email.unique'       => 'Данный email адресс уже занят',
            'email.email'        => 'Неверный адресс',
        ];
    }
}