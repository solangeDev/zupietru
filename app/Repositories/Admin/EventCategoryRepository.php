<?php

namespace App\Repositories\Admin;

use App\Models\Admin\EventCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventCategoryRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method EventCategory findWithoutFail($id, $columns = ['*'])
 * @method EventCategory find($id, $columns = ['*'])
 * @method EventCategory first($columns = ['*'])
*/
class EventCategoryRepository extends BaseRepository
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
        return EventCategory::class;
    }
}
