<?php

namespace App\Repositories\Admin;

use App\Models\Admin\PermissionUser;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PermissionUserRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method PermissionUser findWithoutFail($id, $columns = ['*'])
 * @method PermissionUser find($id, $columns = ['*'])
 * @method PermissionUser first($columns = ['*'])
*/
class PermissionUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'permission_id',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PermissionUser::class;
    }
}
