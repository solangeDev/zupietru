<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ActivityCategoryTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ActivityCategoryTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method ActivityCategoryTranslation findWithoutFail($id, $columns = ['*'])
 * @method ActivityCategoryTranslation find($id, $columns = ['*'])
 * @method ActivityCategoryTranslation first($columns = ['*'])
*/
class ActivityCategoryTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'activity_category_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ActivityCategoryTranslation::class;
    }
}
