<?php

namespace App\Repositories\Admin;

use App\Models\Admin\BlogCategoryTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BlogCategoryTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method BlogCategoryTranslation findWithoutFail($id, $columns = ['*'])
 * @method BlogCategoryTranslation find($id, $columns = ['*'])
 * @method BlogCategoryTranslation first($columns = ['*'])
*/
class BlogCategoryTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'blog_category_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BlogCategoryTranslation::class;
    }
}
