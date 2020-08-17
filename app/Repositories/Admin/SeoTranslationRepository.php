<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SeoTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SeoTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method SeoTranslation findWithoutFail($id, $columns = ['*'])
 * @method SeoTranslation find($id, $columns = ['*'])
 * @method SeoTranslation first($columns = ['*'])
*/
class SeoTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'author',
        'robots',
        'subject',
        'language',
        'keywords',
        'seo_id',
        'language_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SeoTranslation::class;
    }
}
