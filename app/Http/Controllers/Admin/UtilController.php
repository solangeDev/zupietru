<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Models\Admin\EventCategory;
use App\Models\Admin\Language;
use App\Models\Admin\Rows;
use App\Models\Admin\Seo;
use App\Models\Admin\SeoTranslation;
use Illuminate\Http\Request;

class UtilController extends AppBaseController
{
    public function __construct()
    {
        //
    }

    /**
     * Save in the rows table.
     *
     * @param  $class, $event_id
     * @return Rows
     */
    public static function saveRow($object)
    {
        try{
            $row = new Rows;
            $object->row()->save($row);

            return $row;
        }catch(Exeption $e){
            return $e->getMessage();
        }
    }

    /**
     * Save in the seos table.
     *
     * @param  $row_id
     * @return Seo
     */
    public static function saveSeo($row_id)
    {
        try{
            return Seo::create([
                'row_id' => $row_id
            ]);
        }catch(Exeption $e){
            return $e->getMessage();
        }
    }

    /**
     * Save in the seos table.
     *
     * @param  $request, $seos_id
     * @return String
     */
    public static function saveSeoTranlation($request, $seos_id)
    {
        try{
            foreach ($request->seo_tag as $key => $tag) {
                if($tag!=null){
                    $idSeoTran = isset($request->seo_id[$key])?$request->seo_id[$key]:null;
                    $st = SeoTranslation::where('id', $idSeoTran)->first();
                    if($st){
                        $st->update([
                            'tag'           => $tag,
                            'value'         => $request->seo_value[$key]
                        ]);
                    }else{
                        if($tag!=null){
                            SeoTranslation::create([
                                'tag'           => $tag,
                                'value'         => $request->seo_value[$key],
                                'seo_id'        => $seos_id,
                                'language_id'   => $request->language_id
                            ]);
                        }
                    }
                    
                }
            }

            return 'OK';
        }catch(Exeption $e){
            return $e->getMessage();
        }
    }

    /**
     * Showing a list of Seo depends on the language.
     *
     * @return SeoTranslation
     */
    public static function seoTranslations($id)
    {
        try{
            return SeoTranslation::byLanguage(\App::getLocale(), $id)->get()->all();
        }catch(Exeption $e){
            return $e->getMessage();
        }
    }

    /**
     * Display a listing of the Language.
     *
     * @return Language
     */
    public static function langAll()
    {
        try{
            return $lang = Language::pluck('name','id');
        }catch(Exeption $e){
            return $e->getMessage();
        }
    }

    /**
     * Showing a list of Category Events depends on the language.
     *
     * @return EventCategory
     */
    public static function categoriesEvent()
    {
        try{
            return EventCategory::byLanguage(\App::getLocale())->get()->pluck('name', 'id');
        }catch(Exeption $e){
            return $e->getMessage();
        }
    }

    /**
     * Destroy seo_translations.
     *
     * @return seoTranslations
     */
    public function deleteSeo(Request $request)
    {
        try{
            $st = SeoTranslation::findOrFail($request->id);
            if($st){
                $st->delete();
            }else{
                $st = "ERROR";
            }
            return $st;
        }catch(Exeption $e){
            return $e->getMessage();
        }
    }
}
