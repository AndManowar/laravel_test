<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $category
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 */
class Post extends Model
{

    /**
     * @const
     */
    const CATEGORY_NEW = 1;

    /**
     * @const
     */
    const CATEGORY_INTERESTING = 2;

    /**
     * @const
     */
    const CATEGORY_AMAZING = 3;

    /**
     * @var array
     */
    public static $categoryList = [
        ['id' => self::CATEGORY_NEW, 'title' => 'Новое'],
        ['id' => self::CATEGORY_INTERESTING, 'title' => 'Интересное'],
        ['id' => self::CATEGORY_AMAZING, 'title' => 'Невероятное'],
    ];

    /**
     * @var array
     */
    protected $fillable = ['title', 'description', 'category', 'image', 'created_at', 'updated_at'];

}
