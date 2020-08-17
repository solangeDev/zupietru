<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Event;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method Event findWithoutFail($id, $columns = ['*'])
 * @method Event find($id, $columns = ['*'])
 * @method Event first($columns = ['*'])
*/
class EventRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'slug',
        'start_date',
        'end_date',
        'event_category_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Event::class;
    }
}
