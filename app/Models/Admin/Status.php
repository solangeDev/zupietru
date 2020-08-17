<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Status
 * @package App\Models\Admin
 * @version August 1, 2018, 6:10 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection Activity
 * @property \Illuminate\Database\Eloquent\Collection ActivityCategory
 * @property \Illuminate\Database\Eloquent\Collection activityCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection activityTranslations
 * @property \Illuminate\Database\Eloquent\Collection BlogCategory
 * @property \Illuminate\Database\Eloquent\Collection blogCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection blogComments
 * @property \Illuminate\Database\Eloquent\Collection blogTranslations
 * @property \Illuminate\Database\Eloquent\Collection Blog
 * @property \Illuminate\Database\Eloquent\Collection Booking
 * @property \Illuminate\Database\Eloquent\Collection brandTranslations
 * @property \Illuminate\Database\Eloquent\Collection Brand
 * @property \Illuminate\Database\Eloquent\Collection EventCategory
 * @property \Illuminate\Database\Eloquent\Collection eventCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection eventTranslations
 * @property \Illuminate\Database\Eloquent\Collection Event
 * @property \Illuminate\Database\Eloquent\Collection Language
 * @property \Illuminate\Database\Eloquent\Collection Module
 * @property \Illuminate\Database\Eloquent\Collection NewsletterUser
 * @property \Illuminate\Database\Eloquent\Collection Order
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection ProductCategory
 * @property \Illuminate\Database\Eloquent\Collection productCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection productPresentationTranslations
 * @property \Illuminate\Database\Eloquent\Collection ProductPresentation
 * @property \Illuminate\Database\Eloquent\Collection productPresentationsProducts
 * @property \Illuminate\Database\Eloquent\Collection ProductSubcategory
 * @property \Illuminate\Database\Eloquent\Collection productSubcategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection productTranslations
 * @property \Illuminate\Database\Eloquent\Collection Product
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection RoomCategory
 * @property \Illuminate\Database\Eloquent\Collection roomCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection roomSeasonTranslations
 * @property \Illuminate\Database\Eloquent\Collection RoomSeason
 * @property \Illuminate\Database\Eloquent\Collection roomTranslations
 * @property \Illuminate\Database\Eloquent\Collection Room
 * @property \Illuminate\Database\Eloquent\Collection roomsServices
 * @property \Illuminate\Database\Eloquent\Collection RowsMultimedia
 * @property \Illuminate\Database\Eloquent\Collection seoTranslations
 * @property \Illuminate\Database\Eloquent\Collection ServiceCategory
 * @property \Illuminate\Database\Eloquent\Collection serviceCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection serviceTranslations
 * @property \Illuminate\Database\Eloquent\Collection Service
 * @property \Illuminate\Database\Eloquent\Collection tagTranslations
 * @property \Illuminate\Database\Eloquent\Collection UserAddress
 * @property string code
 * @property string name
 * @property string description
 */
class Status extends Model
{
    use SoftDeletes;

    public $table = 'statuses';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
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
        'code' => 'string',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function activities()
    {
        return $this->hasMany(\App\Models\Admin\Activity::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function activityCategories()
    {
        return $this->hasMany(\App\Models\Admin\ActivityCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function blogCategories()
    {
        return $this->hasMany(\App\Models\Admin\BlogCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function blogs()
    {
        return $this->hasMany(\App\Models\Admin\Blog::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bookings()
    {
        return $this->hasMany(\App\Models\Admin\Booking::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function brands()
    {
        return $this->hasMany(\App\Models\Admin\Brand::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventCategories()
    {
        return $this->hasMany(\App\Models\Admin\EventCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function events()
    {
        return $this->hasMany(\App\Models\Admin\Event::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function languages()
    {
        return $this->hasMany(\App\Models\Admin\Language::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function modules()
    {
        return $this->hasMany(\App\Models\Admin\Module::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function newsletterUsers()
    {
        return $this->hasMany(\App\Models\Admin\NewsletterUser::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Admin\Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productCategories()
    {
        return $this->hasMany(\App\Models\Admin\ProductCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productPresentations()
    {
        return $this->hasMany(\App\Models\Admin\ProductPresentation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productSubcategories()
    {
        return $this->hasMany(\App\Models\Admin\ProductSubcategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(\App\Models\Admin\Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function roomCategories()
    {
        return $this->hasMany(\App\Models\Admin\RoomCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function roomSeasons()
    {
        return $this->hasMany(\App\Models\Admin\RoomSeason::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function rooms()
    {
        return $this->hasMany(\App\Models\Admin\Room::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function rowsMultimedia()
    {
        return $this->hasMany(\App\Models\Admin\RowsMultimedia::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function serviceCategories()
    {
        return $this->hasMany(\App\Models\Admin\ServiceCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function services()
    {
        return $this->hasMany(\App\Models\Admin\Service::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function userAddresses()
    {
        return $this->hasMany(\App\Models\Admin\UserAddress::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function statusTranslations()
    {
        return $this->hasMany(\App\Models\Admin\StatusTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany PENDIENTE
     **/
    public function scopeByLanguage($query, $language_code)
    {
        $language = Language::where('code', $language_code)->first();
        // dd($language->id);
        return $query->join('status_translations', 'statuses.id', '=', 'status_translations.status_id')
                     ->where('status_translations.language_id', $language->id)
                     ->select('statuses.id', 'status_translations.name');
    }
}
