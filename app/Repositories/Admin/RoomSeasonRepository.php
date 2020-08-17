<?php

namespace App\Repositories\Admin;

use App\Models\Admin\RoomSeason;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomSeasonRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method RoomSeason findWithoutFail($id, $columns = ['*'])
 * @method RoomSeason find($id, $columns = ['*'])
 * @method RoomSeason first($columns = ['*'])
*/
class RoomSeasonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'start_date',
        'end_date',
        'price',
        'additional_price',
        'pet_price',
        'room_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoomSeason::class;
    }
}
