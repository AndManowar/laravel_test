<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\DB\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * PostController constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json($this->postRepository->getAll());
    }

    /**
     * @param PostRequest $postRequest
     * @return $this|\Illuminate\Http\JsonResponse
     */
    public function create(PostRequest $postRequest)
    {

        if (($response = $this->postRepository->create($postRequest)) != null) {
            return response()->json($response);
        }

        return response()->setStatusCode(400);
    }

    /**
     * @return array
     */
    public function getCategories()
    {

        return response()->json(Post::$categoryList);
    }
}
