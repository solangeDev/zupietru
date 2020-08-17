<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Status;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StatusRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method Status findWithoutFail($id, $columns = ['*'])
 * @method Status find($id, $columns = ['*'])
 * @method Status first($columns = ['*'])
*/
class StatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Status::class;
    }
}
