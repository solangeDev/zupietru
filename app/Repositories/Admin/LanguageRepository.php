<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Language;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LanguageRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method Language findWithoutFail($id, $columns = ['*'])
 * @method Language find($id, $columns = ['*'])
 * @method Language first($columns = ['*'])
*/
class LanguageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Language::class;
    }
}
