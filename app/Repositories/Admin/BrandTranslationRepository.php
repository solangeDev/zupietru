<?php

namespace App\Repositories\Admin;

use App\Models\Admin\BrandTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BrandTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method BrandTranslation findWithoutFail($id, $columns = ['*'])
 * @method BrandTranslation find($id, $columns = ['*'])
 * @method BrandTranslation first($columns = ['*'])
*/
class BrandTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'brand_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BrandTranslation::class;
    }
}
