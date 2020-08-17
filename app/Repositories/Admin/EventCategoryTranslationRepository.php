<?php

namespace App\Repositories\Admin;

use App\Models\Admin\EventCategoryTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventCategoryTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method EventCategoryTranslation findWithoutFail($id, $columns = ['*'])
 * @method EventCategoryTranslation find($id, $columns = ['*'])
 * @method EventCategoryTranslation first($columns = ['*'])
*/
class EventCategoryTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'event_category_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EventCategoryTranslation::class;
    }
}
