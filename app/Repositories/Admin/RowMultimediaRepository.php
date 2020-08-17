<?php

namespace App\Repositories\Admin;

use App\Models\Admin\RowsMultimedia;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RowMultimediaRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method RowsMultimedia findWithoutFail($id, $columns = ['*'])
 * @method RowsMultimedia find($id, $columns = ['*'])
 * @method RowsMultimedia first($columns = ['*'])
*/
class RowMultimediaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'row_id',
        'multimedia_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RowsMultimedia::class;
    }
}
