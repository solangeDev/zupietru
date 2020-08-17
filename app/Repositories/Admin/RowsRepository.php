<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Rows;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RowsRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method Rows findWithoutFail($id, $columns = ['*'])
 * @method Rows find($id, $columns = ['*'])
 * @method Rows first($columns = ['*'])
*/
class RowsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rowable_type',
        'rowable_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Rows::class;
    }
}
