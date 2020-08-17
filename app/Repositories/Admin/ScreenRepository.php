<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Screen;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ScreenRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 9:35 pm UTC
 *
 * @method Screen findWithoutFail($id, $columns = ['*'])
 * @method Screen find($id, $columns = ['*'])
 * @method Screen first($columns = ['*'])
*/
class ScreenRepository extends BaseRepository
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
        return Screen::class;
    }
}
