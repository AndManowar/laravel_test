<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 01.05.18
 * Time: 10:53
 */

namespace App\Repositories;


use App\Http\Requests\PostRequest;

class PostRepository
{
    public function getAll()
    {
        return [];
    }

    public function getPost($id)
    {

    }

    public function create(PostRequest $postRequest)
    {

        return null;
    }

    public function postUpdate(PostRequest $postRequest, $post)
    {

    }

    public function postDelete($id)
    {

    }
}