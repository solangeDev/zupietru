<?php

namespace App\Repositories\Admin;

use App\Models\Admin\OrderDetail;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrderDetailRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method OrderDetail findWithoutFail($id, $columns = ['*'])
 * @method OrderDetail find($id, $columns = ['*'])
 * @method OrderDetail first($columns = ['*'])
*/
class OrderDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order_id',
        'product_presentation_id',
        'products_amount',
        'belongs_to_order_detail_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrderDetail::class;
    }
}
