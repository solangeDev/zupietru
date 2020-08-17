<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Request;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RequestRepository
 * @package App\Repositories\Admin
 * @version August 6, 2018, 11:27 pm UTC
 *
 * @method Request findWithoutFail($id, $columns = ['*'])
 * @method Request find($id, $columns = ['*'])
 * @method Request first($columns = ['*'])
*/
class RequestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'checkin_date',
        'checkout_date',
        'persons_amount',
        'user_id',
        'no_register_user_name',
        'no_register_user_email',
        'no_register_user_phone'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Request::class;
    }
}
