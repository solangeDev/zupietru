<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Brand;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BrandRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method Brand findWithoutFail($id, $columns = ['*'])
 * @method Brand find($id, $columns = ['*'])
 * @method Brand first($columns = ['*'])
*/
class BrandRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'slug',
        'code',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Brand::class;
    }
}
