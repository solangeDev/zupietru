<?php

namespace App\Repositories\Admin;

use App\Models\Admin\EventTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method EventTranslation findWithoutFail($id, $columns = ['*'])
 * @method EventTranslation find($id, $columns = ['*'])
 * @method EventTranslation first($columns = ['*'])
*/
class EventTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'event_id',
        'language_id',
        'title',
        'subtitle',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EventTranslation::class;
    }
}
