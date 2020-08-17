<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Language
 * @package App\Models\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @property \App\Models\Admin\Status status
 * @property \Illuminate\Database\Eloquent\Collection activities
 * @property \Illuminate\Database\Eloquent\Collection ActivityCategoryTranslation
 * @property \Illuminate\Database\Eloquent\Collection ActivityTranslation
 * @property \Illuminate\Database\Eloquent\Collection BlogCategoryTranslation
 * @property \Illuminate\Database\Eloquent\Collection blogComments
 * @property \Illuminate\Database\Eloquent\Collection BlogTranslation
 * @property \Illuminate\Database\Eloquent\Collection bookings
 * @property \Illuminate\Database\Eloquent\Collection BrandTranslation
 * @property \Illuminate\Database\Eloquent\Collection EventCategoryTranslation
 * @property \Illuminate\Database\Eloquent\Collection EventTranslation
 * @property \Illuminate\Database\Eloquent\Collection events
 * @property \Illuminate\Database\Eloquent\Collection orders
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection ProductCategoryTranslation
 * @property \Illuminate\Database\Eloquent\Collection ProductPresentationTranslation
 * @property \Illuminate\Database\Eloquent\Collection productPresentationsProducts
 * @property \Illuminate\Database\Eloquent\Collection productSubcategories
 * @property \Illuminate\Database\Eloquent\Collection ProductSubcategoryTranslation
 * @property \Illuminate\Database\Eloquent\Collection ProductTranslation
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection RoomCategoryTranslation
 * @property \Illuminate\Database\Eloquent\Collection RoomSeasonTranslation
 * @property \Illuminate\Database\Eloquent\Collection roomSeasons
 * @property \Illuminate\Database\Eloquent\Collection RoomTranslation
 * @property \Illuminate\Database\Eloquent\Collection rooms
 * @property \Illuminate\Database\Eloquent\Collection roomsServices
 * @property \Illuminate\Database\Eloquent\Collection SeoTranslation
 * @property \Illuminate\Database\Eloquent\Collection ServiceCategoryTranslation
 * @property \Illuminate\Database\Eloquent\Collection ServiceTranslation
 * @property \Illuminate\Database\Eloquent\Collection services
 * @property \Illuminate\Database\Eloquent\Collection TagTranslation
 * @property string code
 * @property string name
 * @property integer status_id
 */
class Language extends Model
{
    use SoftDeletes;

    public $table = 'languages';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'name',
        'status_id'
    ];

    /**
    * Get the route key for the model.
    *
    * @return string
    */
    public function getRouteKeyName()
    {
       return 'code';
    }

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'status_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(\App\Models\Admin\Status::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function activityCategoryTranslations()
    {
        return $this->hasMany(\App\Models\Admin\ActivityCategoryTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function activityTranslations()
    {
        return $this->hasMany(\App\Models\Admin\ActivityTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function blogCategoryTranslations()
    {
        return $this->hasMany(\App\Models\Admin\BlogCategoryTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function blogTranslations()
    {
        return $this->hasMany(\App\Models\Admin\BlogTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function brandTranslations()
    {
        return $this->hasMany(\App\Models\Admin\BrandTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventCategoryTranslations()
    {
        return $this->hasMany(\App\Models\Admin\EventCategoryTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventTranslations()
    {
        return $this->hasMany(\App\Models\Admin\EventTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productCategoryTranslations()
    {
        return $this->hasMany(\App\Models\Admin\ProductCategoryTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productPresentationTranslations()
    {
        return $this->hasMany(\App\Models\Admin\ProductPresentationTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productSubcategoryTranslations()
    {
        return $this->hasMany(\App\Models\Admin\ProductSubcategoryTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productTranslations()
    {
        return $this->hasMany(\App\Models\Admin\ProductTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function roomCategoryTranslations()
    {
        return $this->hasMany(\App\Models\Admin\RoomCategoryTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function roomSeasonTranslations()
    {
        return $this->hasMany(\App\Models\Admin\RoomSeasonTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function roomTranslations()
    {
        return $this->hasMany(\App\Models\Admin\RoomTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function seoTranslations()
    {
        return $this->hasMany(\App\Models\Admin\SeoTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function serviceCategoryTranslations()
    {
        return $this->hasMany(\App\Models\Admin\ServiceCategoryTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function serviceTranslations()
    {
        return $this->hasMany(\App\Models\Admin\ServiceTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tagTranslations()
    {
        return $this->hasMany(\App\Models\Admin\TagTranslation::class);
    }

    /*public function scopeLang($query, $lang)
    {
        $query->select('id')->where('code', '=', $lang);
    }*/
}
