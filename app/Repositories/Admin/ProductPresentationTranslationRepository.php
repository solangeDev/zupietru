<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductPresentationTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductPresentationTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method ProductPresentationTranslation findWithoutFail($id, $columns = ['*'])
 * @method ProductPresentationTranslation find($id, $columns = ['*'])
 * @method ProductPresentationTranslation first($columns = ['*'])
*/
class ProductPresentationTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_presentation_id',
        'language_id',
        'name',
        'container',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductPresentationTranslation::class;
    }
}
