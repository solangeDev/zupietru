<?php

namespace App\Repositories\Admin;

use App\Models\Admin\UserAddress;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserAddressRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method UserAddress findWithoutFail($id, $columns = ['*'])
 * @method UserAddress find($id, $columns = ['*'])
 * @method UserAddress first($columns = ['*'])
*/
class UserAddressRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'alias',
        'description',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserAddress::class;
    }
}
