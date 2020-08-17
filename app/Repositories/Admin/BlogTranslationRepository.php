<?php

namespace App\Repositories\Admin;

use App\Models\Admin\BlogTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BlogTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method BlogTranslation findWithoutFail($id, $columns = ['*'])
 * @method BlogTranslation find($id, $columns = ['*'])
 * @method BlogTranslation first($columns = ['*'])
*/
class BlogTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'blog_id',
        'language_id',
        'title',
        'subtitle',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BlogTranslation::class;
    }
}
