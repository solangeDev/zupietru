<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductPresentationProduct
 * @package App\Models\Admin
 * @version August 4, 2018, 7:11 pm UTC
 *
 * @property \App\Models\Admin\Product product
 * @property \App\Models\Admin\ProductPresentation productPresentation
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
 * @property \Illuminate\Database\Eloquent\Collection screensFrontSections
 * @property \Illuminate\Database\Eloquent\Collection seoTranslations
 * @property \Illuminate\Database\Eloquent\Collection serviceCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection serviceTranslations
 * @property \Illuminate\Database\Eloquent\Collection services
 * @property \Illuminate\Database\Eloquent\Collection statusTranslations
 * @property \Illuminate\Database\Eloquent\Collection tagTranslations
 * @property integer product_presentation_id
 * @property integer product_id
 * @property string code
 * @property string slug
 * @property float price
 * @property float tax
 * @property integer product_quantity
 * @property integer for_delivery
 * @property integer max_quantity_of_sale
 * @property integer min_quantity_of_sale
 */
class ProductPresentationProduct extends Model
{
    use SoftDeletes;

    public $table = 'product_presentations_products';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'product_presentation_id',
        'product_id',
        'code',
        'slug',
        'price',
        'tax',
        'product_quantity',
        'for_delivery',
        'max_quantity_of_sale',
        'min_quantity_of_sale'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_presentation_id' => 'integer',
        'product_id' => 'integer',
        'code' => 'string',
        'slug' => 'string',
        'price' => 'float',
        'tax' => 'float',
        'product_quantity' => 'integer',
        'for_delivery' => 'integer',
        'max_quantity_of_sale' => 'integer',
        'min_quantity_of_sale' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'product_presentation_id' => 'required',
        'product_id'              => 'required',
        'price'                   => 'required|max:35',
        'tax'                     => 'required|min:1|max:35',
        'product_quantity'        => 'required|min:1|max:35',
        'max_quantity_of_sale'    => 'required|min:2|max:35',
        'min_quantity_of_sale'    => 'required|max:35'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Admin\Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productPresentation()
    {
        return $this->belongsTo(\App\Models\Admin\ProductPresentation::class);
    }
}
