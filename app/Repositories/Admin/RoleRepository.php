<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Role;
use InfyOm\Generator\Common\BaseRepository;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

/**
 * Class RoleRepository
 * @package App\Repositories\Admin
 * @version August 4, 2018, 3:58 pm UTC
 *
 * @method Role findWithoutFail($id, $columns = ['*'])
 * @method Role find($id, $columns = ['*'])
 * @method Role first($columns = ['*'])
*/
class RoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug',
        'description',
        'special'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Role::class;
    }
}
