<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductCategoryTranslation
 * @package App\Models\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @property \App\Models\Admin\Language language
 * @property \App\Models\Admin\ProductCategory productCategory
 * @property \Illuminate\Database\Eloquent\Collection activities
 * @property \Illuminate\Database\Eloquent\Collection activityCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection activityTranslations
 * @property \Illuminate\Database\Eloquent\Collection blogCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection blogComments
 * @property \Illuminate\Database\Eloquent\Collection blogTranslations
 * @property \Illuminate\Database\Eloquent\Collection bookings
 * @property \Illuminate\Database\Eloquent\Collection brandTranslations
 * @property \Illuminate\Database\Eloquent\Collection eventCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection eventTranslations
 * @property \Illuminate\Database\Eloquent\Collection events
 * @property \Illuminate\Database\Eloquent\Collection orders
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection productPresentationTranslations
 * @property \Illuminate\Database\Eloquent\Collection productPresentationsProducts
 * @property \Illuminate\Database\Eloquent\Collection productSubcategories
 * @property \Illuminate\Database\Eloquent\Collection productSubcategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection productTranslations
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection roomCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection roomSeasonTranslations
 * @property \Illuminate\Database\Eloquent\Collection roomSeasons
 * @property \Illuminate\Database\Eloquent\Collection roomTranslations
 * @property \Illuminate\Database\Eloquent\Collection rooms
 * @property \Illuminate\Database\Eloquent\Collection roomsServices
 * @property \Illuminate\Database\Eloquent\Collection seoTranslations
 * @property \Illuminate\Database\Eloquent\Collection serviceCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection serviceTranslations
 * @property \Illuminate\Database\Eloquent\Collection services
 * @property \Illuminate\Database\Eloquent\Collection tagTranslations
 * @property integer product_category_id
 * @property integer language_id
 * @property string name
 * @property string description
 */
class ProductCategoryTranslation extends Model
{
    use SoftDeletes;

    public $table = 'product_category_translations';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'product_category_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_category_id' => 'integer',
        'language_id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'language_id'            => 'required',
        'name'                   => 'required|min:2|max:35',
        'description'            => 'required|min:2|max:500',
        'status_id'              => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function language()
    {
        return $this->belongsTo(\App\Models\Admin\Language::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productCategory()
    {
        return $this->belongsTo(\App\Models\Admin\ProductCategory::class);
    }
}
