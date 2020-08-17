<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @property \App\Models\Admin\Brand brand
 * @property \App\Models\Admin\Status status
 * @property \App\Models\Admin\ProductSubcategory productSubcategory
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
 * @property \Illuminate\Database\Eloquent\Collection productCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection productPresentationTranslations
 * @property \Illuminate\Database\Eloquent\Collection ProductPresentationsProduct
 * @property \Illuminate\Database\Eloquent\Collection productSubcategories
 * @property \Illuminate\Database\Eloquent\Collection productSubcategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection ProductTranslation
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
 * @property string slug
 * @property string code
 * @property integer brand_id
 * @property integer subcategory_id
 * @property integer status_id
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'slug',
        'price',
        'tax',
        'for_delivery',
        'code',
        'brand_id',
        'subcategory_id',
        'status_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'slug' => 'string',
        'price' => 'float',
        'tax' => 'float',
        'for_delivery' => 'integer',
        'code' => 'string',
        'brand_id' => 'integer',
        'subcategory_id' => 'integer',
        'status_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'price' => 'required',
        'tax' => 'required',
        'code' => 'required',
        'brand_id' => 'required',
        'subcategory_id' => 'required',
        'status_id' => 'required',
        'for_delivery' => 'required'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function brand()
    {
        return $this->belongsTo(\App\Models\Admin\Brand::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(\App\Models\Admin\Status::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productSubcategory()
    {
        return $this->belongsTo(\App\Models\Admin\ProductSubcategory::class, 'subcategory_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productPresentationsProducts()
    {
        return $this->hasMany(\App\Models\Admin\ProductPresentationProduct::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productTranslations()
    {
        return $this->hasMany(\App\Models\Admin\ProductTranslation::class);
    }

    /**
     * Get the row for the product.
     */
    public function row()
    {
        return $this->morphOne('App\Models\Admin\Rows', 'rowable');
    }

    public function galeryImages()
    {
        $retu = $this->row;
        if($this->row!=null) {
            $retu = $this->row->rowsMultimedia->filter(
                function ($rowMultimedia){
                    return ($rowMultimedia->status_id==1);
                }
            );
        }
        /*dd($retu);*/
        return $retu;
    }

    public function galeryImagesAPI()
    {
        $retu = $this->row;
        if($this->row!=null) {
            $retu = $this->row->rowsMultimedia->filter(
                function ($rowMultimedia){
                    return ($rowMultimedia->status_id==1);
                }
            )->all();
        }
        return $retu;
    }


     /*
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function itemByLanguage($language_code)
    {
        $language = Language::where('code', $language_code)->first();

        return $this->productTranslations->filter(function($productTranslation) use($language){
            return $productTranslation->language_id == $language->id;
        })->first();
    }
}
