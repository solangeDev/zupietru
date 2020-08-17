<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ScreenFrontSection;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ScreenFrontSectionRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 9:35 pm UTC
 *
 * @method ScreenFrontSection findWithoutFail($id, $columns = ['*'])
 * @method ScreenFrontSection find($id, $columns = ['*'])
 * @method ScreenFrontSection first($columns = ['*'])
*/
class ScreenFrontSectionRepository extends BaseRepository
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

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ScreenFrontSection::class;
    }
}
