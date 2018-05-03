<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 01.05.18
 * Time: 10:54
 */

namespace App\Http\Requests;

use Request;

/**
 * Class PostRequest
 * @package App\Http\Requests
 */
class PostRequest extends Request
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'required|string|max=50',
            'description' => 'required|string|max=255',
            'category'    => 'required|integer',
            'image'       => 'required|string'
        ];
    }
}