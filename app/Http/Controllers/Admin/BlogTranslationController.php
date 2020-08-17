<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateBlogTranslationRequest;
use App\Http\Requests\Admin\UpdateBlogTranslationRequest;
use App\Models\Admin\BlogTranslation;
use App\Repositories\Admin\BlogTranslationRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Rows;
use Illuminate\Http\Request;
use App\Models\Admin\Multimedia;
use App\Models\Admin\RowsMultimedia;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Admin\Blog;
use Session;

class BlogTranslationController extends AppBaseController
{
    /** @var  BlogTranslationRepository */
    private $blogTranslationRepository;

    public function __construct(BlogTranslationRepository $blogTranslationRepo)
    {
        $this->blogTranslationRepository = $blogTranslationRepo;
    }

    /**
     * Display a listing of the BlogTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->blogTranslationRepository->pushCriteria(new RequestCriteria($request));
        $blogTranslations = $this->blogTranslationRepository->all();

        return view('admin.blogs.blog_translations.index')
            ->with('blogTranslations', $blogTranslations);
    }

    /**
     * Show the form for creating a new BlogTranslation.
     *
     * @return Response
     */
    public function create(Blog $object,Multimedia $filesDB)
    {
        return view('admin.blogs.blog_translations.create')
            ->with('object', $object)
            ->with('filesDB', $filesDB);
    }

    /**
     * Store a newly created BlogTranslation in storage.
     *
     * @param CreateBlogTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateBlogTranslationRequest $request)
    {
        $input = $request->all();

        $blogTranslation = $this->blogTranslationRepository->create($input);
        //dd($blogTranslation->blog_id);
        Flash::success('Blog Translation saved successfully.');

        $object = Blog::find($blogTranslation->blog_id);
        $filesDB = Multimedia::all();
        $gallery= $object->galeryImages();
        $ind=0;
        //Buscar los registros que existen el modulo y sacaros del array del storage
        foreach($filesDB as $mediaDB)
        {
            foreach($gallery as $media)
            {
                if($media->multimedia_id==$mediaDB->id) {
                    unset($filesDB[$ind]);
                }
            }
            //dd($media->id);
            $ind=$ind+1;
        }
        //dd($filesDB);

        //return redirect(route('admin.blogs.blogTranslations.index'))
        //return redirect(route('admin.blogTranslations.create'))
        //return view('admin.blogTranslations.create')
        //return view('admin.blogs.blog_translations.create')
        return view('admin.blogs.blog_translations.edit')
            ->with('blogTranslation', $blogTranslation)
            ->with('object', $object)
            ->with('filesDB', $filesDB);
    }

    /**
     * Display the specified BlogTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $blogTranslation = $this->blogTranslationRepository->findWithoutFail($id);

        if (empty($blogTranslation)) {
            Flash::error('Blog Translation not found');

            return redirect(route('admin.blogs.blogTranslations.index'));
        }

        return view('admin.blogs.blog_translations.show')->with('blogTranslation', $blogTranslation);
    }

    /**
     * Show the form for editing the specified BlogTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $blogTranslation = $this->blogTranslationRepository->findWithoutFail($id);

        if (empty($blogTranslation)) {
            Flash::error('Blog Translation not found');

            return redirect(route('admin.blogs.blogTranslations.index'));
        }

        return view('admin.blogs.blog_translations.edit')->with('blogTranslation', $blogTranslation);
    }

    /**
     * Update the specified BlogTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateBlogTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBlogTranslationRequest $request)
    {
        $blogTranslation = $this->blogTranslationRepository->findWithoutFail($id);

        if (empty($blogTranslation)) {
            Flash::error('Blog Translation not found');

            return redirect(route('admin.blogs.blogTranslations.index'));
        }

        $blogTranslation = $this->blogTranslationRepository->update($request->all(), $id);

        Flash::success('Blog Translation updated successfully.');

        return redirect(route('admin.blogs.blogTranslations.index'));
    }

    /**
     * Remove the specified BlogTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $blogTranslation = $this->blogTranslationRepository->findWithoutFail($id);

        if (empty($blogTranslation)) {
            Flash::error('Blog Translation not found');

            return redirect(route('admin.blogs.blogTranslations.index'));
        }

        $this->blogTranslationRepository->delete($id);

        Flash::success('Blog Translation deleted successfully.');

        return redirect(route('admin.blogs.blogTranslations.index'));
    }

    public function saveGalery(Request $request, $id)
    {

        /*$user = new User;
        $user->authorize('Admin');*/
        //nombre de la clase
        $class = class_basename($this);
        //dd($request);
        $object = Blog::find($id);
        $request['slug']="blog";

        //se valida la imagen y se guarda
        $multimedia=new MultimediaController();
        $multimedia->store($request, $object, $class, 1);

        $type='success';
        $message='Le immagini sono state salvate correttamente';

        Session::flash($type, $message);



        //redireccionamos
        //return view('admin.utils.multimedia.index');
        //return redirect()->route('admin.utils.multimedia.index');
        return redirect()->back();
    }

    public function saveGaleryOfStorage(Request $request)
    {
        /*$user = new User;
        $user->authorize('Admin');*/
        //nombre de la clase
        $class = class_basename($this);
        $object = Blog::find($request->id_object);
        $request['slug']="blog";
        //dd($request);
        //se valida la imagen y se guarda
        //se crea el row
        $row = new Rows();
        $object->row()->save($row);
        //se crea el image_module
        $multimedia=new MultimediaController();
        foreach($request->images_id as $media)
        {
            //dd($rp);
            $multimedia->saveMultimediaModule($object, $media, 1);
        }

        //$this->store($request, $object, $class, 1);

        $type='success';
        $message='Le immagini sono state salvate correttamente';

        Session::flash($type, $message);

        //redireccionamos
        //return view('admin.utils.multimedia.index');
        //return redirect()->back();
        return redirect()->back();

    }

    public function deleteGalery(Request $request,  $row_multimedia, $id_object)
    {
        /*$langs = Language::all();*/

        /*$user = new User;
        $user->authorize('Admin');*/
        try {

            //accedemos al evento al que pertenece la imagen

            $row_multimedia = RowsMultimedia::find($row_multimedia);
            if($row_multimedia!=null) {
                $object_rowable = $row_multimedia->row->rowable;

                // //Storage::disk('multimedia')->delete($row_multimedia->multimedia->name);

                //eliminamos la imagen
                $imgs = Multimedia::find($row_multimedia->multimedia->id);
                $row_multimedia->delete();
                //$imgs->delete();


                //mensaje de exito
                $type='success';
                $message='Le immagini sono state cancellate con successo';
                Session::flash($type, $message);
            }

            //redireccionamos
            //return redirect()->back();
            $blogTranslation= BlogTranslation::find($id_object);
            //dd($blogTranslation);
            $object= Blog::where('id',$blogTranslation->blog_id)->get();
            $object = Blog::find($object[0]->id);
            //dd($object->galeryImages());
            $filesDB = Multimedia::all();
            if($row_multimedia!=null) {
                //$object = Blog::find($blogTranslation->blog_id);
                $gallery= $object->galeryImages();
                $ind=0;
                //Buscar los registros que existen el modulo y sacaros del array del storage
                foreach($filesDB as $mediaDB)
                {
                    foreach($gallery as $media)
                    {
                        if($media->multimedia_id==$mediaDB->id) {
                            unset($filesDB[$ind]);
                        }
                    }
                    //dd($media->id);
                    $ind=$ind+1;
                }
            }
            //dd($filesDB);
            /*return view('admin.blogs.blog_translations.edit')
                ->with('blogTranslation', $blogTranslation)
                ->with('object', $object)
                ->with('filesDB', $filesDB);*/

        } catch (Exception $e) {
            return false;
        }
    }
}
