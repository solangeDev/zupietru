<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Multimedia;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MultimediaRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method Multimedia findWithoutFail($id, $columns = ['*'])
 * @method Multimedia find($id, $columns = ['*'])
 * @method Multimedia first($columns = ['*'])
*/
class MultimediaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug',
        'description',
        'size',
        'path'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Multimedia::class;
    }
}
