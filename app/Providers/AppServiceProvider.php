<?php

namespace App\Providers;

use App\Http\Controllers\Admin\TagTranslationController;
use App\Models\Admin\Language;
use App\Models\Admin\Status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if ( Schema::hasTable('languages') && Schema::hasTable('statuses') && Schema::hasTable('status_translations') ) {
            $tags      = TagTranslationController::getTagsValues(\App::getLocale());
            $statuses  = Status::byLanguage(\App::getLocale())->pluck('name', 'id');
            $languages = Language::all()->pluck('name', 'id');

            view()->share(['tags' => $tags, 'statuses' => $statuses, 'languages' => $languages]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
