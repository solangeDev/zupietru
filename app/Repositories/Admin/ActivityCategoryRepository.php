<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ActivityCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ActivityCategoryRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method ActivityCategory findWithoutFail($id, $columns = ['*'])
 * @method ActivityCategory find($id, $columns = ['*'])
 * @method ActivityCategory first($columns = ['*'])
*/
class ActivityCategoryRepository extends BaseRepository
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
        return ActivityCategory::class;
    }
}
