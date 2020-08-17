<?php

namespace App\Repositories\Admin;

use App\Models\Admin\PermissionRole;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PermissionRoleRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method PermissionRole findWithoutFail($id, $columns = ['*'])
 * @method PermissionRole find($id, $columns = ['*'])
 * @method PermissionRole first($columns = ['*'])
*/
class PermissionRoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'permission_id',
        'role_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PermissionRole::class;
    }
}
