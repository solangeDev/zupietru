<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductPresentationProduct;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductPresentationProductRepository
 * @package App\Repositories\Admin
 * @version August 4, 2018, 7:11 pm UTC
 *
 * @method ProductPresentationProduct findWithoutFail($id, $columns = ['*'])
 * @method ProductPresentationProduct find($id, $columns = ['*'])
 * @method ProductPresentationProduct first($columns = ['*'])
*/
class ProductPresentationProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_presentation_id',
        'product_id',
        'code',
        'slug',
        'price',
        'tax',
        'product_quantity',
        'for_delivery',
        'max_quantity_of_sale',
        'min_quantity_of_sale'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductPresentationProduct::class;
    }
}
