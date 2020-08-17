<?php

namespace App\Repositories\Admin;

use App\Models\Admin\BookingDetail;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BookingDetailRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method BookingDetail findWithoutFail($id, $columns = ['*'])
 * @method BookingDetail find($id, $columns = ['*'])
 * @method BookingDetail first($columns = ['*'])
*/
class BookingDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'checkin_date',
        'checkout_date',
        'persons_amount',
        'booking_id',
        'row_id',
        'payment_method_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BookingDetail::class;
    }
}
