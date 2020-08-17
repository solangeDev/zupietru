<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Seo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SeoRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method Seo findWithoutFail($id, $columns = ['*'])
 * @method Seo find($id, $columns = ['*'])
 * @method Seo first($columns = ['*'])
*/
class SeoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'row_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Seo::class;
    }
}
