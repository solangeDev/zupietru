<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateTagTranslationRequest;
use App\Http\Requests\Admin\UpdateTagTranslationRequest;
use App\Models\Admin\FrontSection;
use App\Models\Admin\Language;
use App\Models\Admin\Screen;
use App\Models\Admin\TagTranslation;
use App\Repositories\Admin\TagTranslationRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\ScreenFrontSection;

class TagTranslationController extends AppBaseController
{
    /** @var  TagTranslationRepository */
    private $tagTranslationRepository;

    public function __construct(TagTranslationRepository $tagTranslationRepo)
    {
        $this->tagTranslationRepository = $tagTranslationRepo;
    }

    /**
     * Display a listing of the TagTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tagTranslationRepository->pushCriteria(new RequestCriteria($request));
        $tagTranslations = $this->tagTranslationRepository->all();
        //dd($tagTranslations[0]->screen_id);

        //dd($tagTranslations[0]->front_section_id);
        //$screenFrontSection= ScreenFrontSection::where();
        $screens = Screen::all();
        //dd($screens);
        //$frontSection= DB::table ('front_sections')->pluck('name', 'id');
        return view('admin.utils.tag_translations.index')
            ->with('tagTranslations', $tagTranslations)
            ->with('screens', $screens);
    }

    /**
     * Get tag value.
     *
     * @param  string $language
     * @return string
     */
    public static function getTagsValues($language)
    {
        try {
            $language = Language::where('code', $language)->first();

            return TagTranslation::where('language_id', $language->id)->pluck('value', 'tag')->toArray();
        } catch (Exception $e) {
            return $e->message();
        }
    }

    /**
     * Show the form for creating a new TagTranslation.
     *
     * @return Response
     */
    public function create()
    {
        $screens = DB::table ('screens')->pluck('name', 'id');
        $frontSection= DB::table ('front_sections')->pluck('name', 'id');
        $languages= DB::table ('languages')->pluck('name', 'id');
        $languages= Language::all();
        dd($languages);
        //$brands = Brand::byLanguage(\App::getLocale())->get()->pluck('name', 'id');
        //dd($frontSection);
        return view('admin.utils.tag_translations.create')
            ->with('screens', $screens)
            ->with('frontSection', $frontSection)
            ->with('languages', $languages);
    }

    /**
     * Store a newly created TagTranslation in storage.
     *
     * @param CreateTagTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateTagTranslationRequest $request)
    {
        $input = $request->all();
        //dd($input);
        $input = $request->only(['tag', 'value', 'front_section_id', 'language_id']);

        $tagTranslation = $this->tagTranslationRepository->create($input);
        //dd($tagTranslation);

        /*Guardar la relacion en la tabla screens_front_sections*/
        $screenFrontSection=new ScreenFrontSection();
        $front_section_id=$request->front_section_id;
        $screen_id=$request->screen_id;
        $vars = array("screen_id","front_section_id");
        $resultado = compact('front_section','',$vars);
        $screenFrontSection=$screenFrontSection->create($resultado);
        //dd($screenFrontSection);


        Flash::success('Tag Translation saved successfully.');

        //return redirect(route('admin.utils.tagTranslations.index'));
        $this->tagTranslationRepository->pushCriteria(new RequestCriteria($request));
        $tagTranslations = $this->tagTranslationRepository->all();

        return view('admin.utils.tag_translations.index')
            ->with('tagTranslations', $tagTranslations);
    }

    /**
     * Display the specified TagTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tagTranslation = $this->tagTranslationRepository->findWithoutFail($id);

        if (empty($tagTranslation)) {
            Flash::error('Tag Translation not found');

            return redirect(route('admin.utils.tagTranslations.index'));
        }

        return view('admin.utils.tag_translations.show')->with('tagTranslation', $tagTranslation);
    }

    /**
     * Show the form for editing the specified TagTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tagTranslation = $this->tagTranslationRepository->findWithoutFail($id);

        if (empty($tagTranslation)) {
            Flash::error('Tag Translation not found');

            return redirect(route('admin.utils.tagTranslations.index'));
        }
        $screens = DB::table ('screens')->pluck('name', 'id');
        $frontSection= DB::table ('front_sections')->pluck('name', 'id');
        //$languages= DB::table ('languages')->pluck('name', 'id');
        $languages= Language::all();
        //dd($languages);

        return view('admin.utils.tag_translations.edit')
            ->with('tagTranslation', $tagTranslation)
            ->with('screens', $screens)
            ->with('frontSection', $frontSection)
            ->with('languages', $languages);
    }

    /**
     * Show the form for editing the specified TagTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function preparedEdit($id, UpdateTagTranslationRequest $request)
    {
        $screen = Screen::find($request->screen_id);
        $frontSection= FrontSection::find($request->front_section_id[0]);
        //dd($screen->code);
        $tagTranslation = $this->tagTranslationRepository->findWithoutFail($id);
        //$tagTranslation= TagTranslation::all()->where('front_section_id',$request->front_section_id[0]);
        $tagLocate=$screen->code."_".$frontSection->code;
        //dd($frontSection->id);
        $tagTranslation = DB::select("select id, tag, value, language_id from tag_translations where locate(?,tag)>0 and front_section_id= ?", [$tagLocate,$frontSection->id]);

        //dd($tagTranslation);
        //$lang = Language::lang(\App::getLocale())->first();

        if (empty($tagTranslation)) {
            Flash::error('Tag Translation not found');

            return redirect(route('admin.utils.tagTranslations.index'));
        }


        //$screen_name=$request->screen_name;

        //$languages= DB::table ('languages')->pluck('name', 'id');
        $languages= Language::all();
        //dd($screen);

        return view('admin.utils.tag_translations.edit')
            ->with('tagTranslations', $tagTranslation)
            ->with('screen', $screen)
            ->with('frontSection', $frontSection)
            ->with('tag', 1)
            ->with('languages', $languages);
    }
    /**
     * Show the form for editing the specified TagTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function beforeEdit($id)
    {
        $screen = Screen::find($id);
        //$frontSection= DB::table ('front_sections');
        $frontSections = DB::select("select fr.id id ,fr.name name from front_sections fr inner join screens_front_sections s_f_s on s_f_s.front_section_id = fr.id inner join screens s on s.id=s_f_s.screen_id and s_f_s.screen_id= ?", [$id]);
        //dd($frontSections);
        if (empty($frontSections)) {
            $tagTranslation = $this->tagTranslationRepository->findWithoutFail($id);
            $tagTranslation = $this->tagTranslationRepository->all();
            Flash::error('No fieno secciones registradas');
            $screens = Screen::all();
            return view('admin.utils.tag_translations.index')
                ->with('screens', $screens);
        }

        $languages= Language::all();
       // $frontSections = $frontSections->pluck('name', 'id');


        return view('admin.utils.tag_translations.edit')
            ->with('tag', 0)
            ->with('screen', $screen)
            ->with('frontSections', $frontSections)
            ->with('languages', $languages);
    }

    /**
     * Update the specified TagTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateTagTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTagTranslationRequest $request)
    {
        //dd(count($request->tag));
        $tagTranslation = $this->tagTranslationRepository->findWithoutFail($id);

        if (empty($tagTranslation)) {
            Flash::error('Tag Translation not found');

            return redirect(route('admin.utils.tagTranslations.index'));
        }

        $ind_lang=0;
        $count_tags=count($request->tag);
        //$input=$request->all();
        //$front_section_id=$request->front_section_id;
        //dd($request);
        $ind_cycle=0;
        //foreach($request->language_id as $lang_id) {
            for($ind_tag=$ind_cycle;$ind_tag<$count_tags;$ind_tag++) {
                $tag=$request->tag[$ind_tag];
                $value=$request->value[$ind_tag];
                $language_id=$request->language_id[$ind_tag];
                $id = $request->tagTranslation_id[$ind_tag];
                $input["id"] = $id;
                $input["tag"] = $tag;
                $input["value"] = $value;
                $input["front_section_id"] = $request->front_section_id;
                $input["language_id"] = $language_id;
                /*if($language_id==2){
                    dd($ind_tag);
                }*/
                $tagTranslation = $this->tagTranslationRepository->update($input, $id);
            }
            //$ind_lang=$ind_lang+1;
        //dd($tagTranslation);
    //}


       /* $tagTranslation = $this->tagTranslationRepository->update($request->all(), $id);*/

        Flash::success('Tag Translation updated successfully.');


        $this->tagTranslationRepository->pushCriteria(new RequestCriteria($request));
        $tagTranslations = $this->tagTranslationRepository->all();

        /*Actualizar la relacion en la tabla screens_front_sections*/
        $screens = Screen::all();
        return view('admin.utils.tag_translations.index')
            ->with('tagTranslations', $tagTranslations)
            ->with('screens', $screens);
    }

    /**
     * Remove the specified TagTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tagTranslation = $this->tagTranslationRepository->findWithoutFail($id);

        if (empty($tagTranslation)) {
            Flash::error('Tag Translation not found');

            return redirect(route('admin.utils.tagTranslations.index'));
        }

        $this->tagTranslationRepository->delete($id);

        Flash::success('Tag Translation deleted successfully.');

        return redirect(route('admin.utils.tagTranslations.index'));
    }
}
