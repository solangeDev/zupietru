<?php

namespace App\Repositories\Admin;

use App\Models\Admin\RoomTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method RoomTranslation findWithoutFail($id, $columns = ['*'])
 * @method RoomTranslation find($id, $columns = ['*'])
 * @method RoomTranslation first($columns = ['*'])
*/
class RoomTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'room_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoomTranslation::class;
    }
}
