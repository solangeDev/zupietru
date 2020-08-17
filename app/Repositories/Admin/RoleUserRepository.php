<?php

namespace App\Repositories\Admin;

use App\Models\Admin\RoleUser;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoleUserRepository
 * @package App\Repositories\Admin
 * @version August 3, 2018, 4:24 pm UTC
 *
 * @method RoleUser findWithoutFail($id, $columns = ['*'])
 * @method RoleUser find($id, $columns = ['*'])
 * @method RoleUser first($columns = ['*'])
*/
class RoleUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'role_id',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoleUser::class;
    }
}
