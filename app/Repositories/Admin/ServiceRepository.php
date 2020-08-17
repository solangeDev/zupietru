<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Service;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServiceRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method Service findWithoutFail($id, $columns = ['*'])
 * @method Service find($id, $columns = ['*'])
 * @method Service first($columns = ['*'])
*/
class ServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'price',
        'tax',
        'service_category_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Service::class;
    }
}
