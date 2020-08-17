<?php

namespace App\Repositories\Admin;

use App\Models\Admin\BlogCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BlogCategoryRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method BlogCategory findWithoutFail($id, $columns = ['*'])
 * @method BlogCategory find($id, $columns = ['*'])
 * @method BlogCategory first($columns = ['*'])
*/
class BlogCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BlogCategory::class;
    }
}
