<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductCategoryTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductCategoryTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method ProductCategoryTranslation findWithoutFail($id, $columns = ['*'])
 * @method ProductCategoryTranslation find($id, $columns = ['*'])
 * @method ProductCategoryTranslation first($columns = ['*'])
*/
class ProductCategoryTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_category_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductCategoryTranslation::class;
    }
}
