<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductSubcategoryTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductSubcategoryTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method ProductSubcategoryTranslation findWithoutFail($id, $columns = ['*'])
 * @method ProductSubcategoryTranslation find($id, $columns = ['*'])
 * @method ProductSubcategoryTranslation first($columns = ['*'])
*/
class ProductSubcategoryTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_subcategory_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductSubcategoryTranslation::class;
    }
}
