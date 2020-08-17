<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductCategoryRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method ProductCategory findWithoutFail($id, $columns = ['*'])
 * @method ProductCategory find($id, $columns = ['*'])
 * @method ProductCategory first($columns = ['*'])
*/
class ProductCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductCategory::class;
    }
}
