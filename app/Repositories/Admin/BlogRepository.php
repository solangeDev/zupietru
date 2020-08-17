<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Blog;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BlogRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method Blog findWithoutFail($id, $columns = ['*'])
 * @method Blog find($id, $columns = ['*'])
 * @method Blog first($columns = ['*'])
*/
class BlogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'slug',
        'blog_category_id',
        'user_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Blog::class;
    }
}
