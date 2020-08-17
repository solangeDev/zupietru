<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method ProductTranslation findWithoutFail($id, $columns = ['*'])
 * @method ProductTranslation find($id, $columns = ['*'])
 * @method ProductTranslation first($columns = ['*'])
*/
class ProductTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductTranslation::class;
    }
}
