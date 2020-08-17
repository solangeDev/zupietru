<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ServiceTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServiceTranslationRepository
 * @package App\Repositories\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @method ServiceTranslation findWithoutFail($id, $columns = ['*'])
 * @method ServiceTranslation find($id, $columns = ['*'])
 * @method ServiceTranslation first($columns = ['*'])
*/
class ServiceTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'service_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ServiceTranslation::class;
    }
}
