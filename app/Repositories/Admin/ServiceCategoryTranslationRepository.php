<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ServiceCategoryTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServiceCategoryTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method ServiceCategoryTranslation findWithoutFail($id, $columns = ['*'])
 * @method ServiceCategoryTranslation find($id, $columns = ['*'])
 * @method ServiceCategoryTranslation first($columns = ['*'])
*/
class ServiceCategoryTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'service_category_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ServiceCategoryTranslation::class;
    }
}
