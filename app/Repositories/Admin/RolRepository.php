<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Rol;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RolRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method Rol findWithoutFail($id, $columns = ['*'])
 * @method Rol find($id, $columns = ['*'])
 * @method Rol first($columns = ['*'])
*/
class RolRepository extends BaseRepository
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
        return Rol::class;
    }
}
