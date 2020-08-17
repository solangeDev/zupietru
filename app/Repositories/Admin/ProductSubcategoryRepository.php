<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductSubcategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductSubcategoryRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method ProductSubcategory findWithoutFail($id, $columns = ['*'])
 * @method ProductSubcategory find($id, $columns = ['*'])
 * @method ProductSubcategory first($columns = ['*'])
*/
class ProductSubcategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'product_category_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductSubcategory::class;
    }
}
