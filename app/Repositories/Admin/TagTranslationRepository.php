<?php

namespace App\Repositories\Admin;

use App\Models\Admin\TagTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TagTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method TagTranslation findWithoutFail($id, $columns = ['*'])
 * @method TagTranslation find($id, $columns = ['*'])
 * @method TagTranslation first($columns = ['*'])
*/
class TagTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tag',
        'value',
        'front_section_id',
        'language_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'tag' => 'string',
        'value' => 'string',
        'front_section_id' => 'integer',
        'language_id' => 'integer'
    ];


    /**
     * Configure the Model
     **/
    public function model()
    {
        return TagTranslation::class;
    }
}
