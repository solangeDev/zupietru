<?php

namespace App\Repositories\Admin;

use App\Models\Admin\RoomCategoryTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomCategoryTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method RoomCategoryTranslation findWithoutFail($id, $columns = ['*'])
 * @method RoomCategoryTranslation find($id, $columns = ['*'])
 * @method RoomCategoryTranslation first($columns = ['*'])
*/
class RoomCategoryTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'room_category_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoomCategoryTranslation::class;
    }
}
