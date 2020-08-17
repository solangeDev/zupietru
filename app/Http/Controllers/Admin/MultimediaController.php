<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateMultimediaRequest;
use App\Http\Requests\Admin\UpdateMultimediaRequest;
use App\Models\Admin\Blog;
use App\Models\Admin\Rows;
use App\Repositories\Admin\MultimediaRepository;
use App\Models\Admin\Multimedia;
use App\Models\Admin\RowsMultimedia;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Session;

class MultimediaController extends AppBaseController
{
    /** @var  MultimediaRepository */
    private $multimediaRepository;

   /* public function __construct(MultimediaRepository $multimediaRepo)
    {
        $this->multimediaRepository = $multimediaRepo;
    }*/

    /**
     * Display a listing of the Multimedia.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$object,$filesDB)
    {
        dd($filesDB);
        /*$this->multimediaRepository->pushCriteria(new RequestCriteria($request));
        $filesDB = $this->multimediaRepository->all();


        $object = Blog::find(1);
        $gallery= $object->galeryImages();
        $ind=0;
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
        }*/
        //dd($filesDB);

        return view('admin.utils.multimedia.index')
            ->with('object', $object)
            ->with('filesDB', $filesDB);
    }

    /**
     * Show the form for creating a new Multimedia.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.utils.multimedia.create');
    }

    /**
     * Store a newly created Multimedia in storage.
     *
     * @param CreateMultimediaRequest $request
     *
     * @return Response
     */
    /*public function store(CreateMultimediaRequest $request)
    {
        $input = $request->all();

        $multimedia = $this->multimediaRepository->create($input);

        Flash::success('Multimedia saved successfully.');

        return redirect(route('admin.utils.multimedia.index'));
    }*/

    public function store($request, $object, $class, $main)
    {
        //se valida y almacena la imagen
        $image = $this->validateAndSaveMultimedia($request, $class);
        if (!$image) {
            $message="L\'immagine non ha un\'estensione corretta";
            $type = "ERROR";
            Session::flash($type, $message);
            return false;
        }

        //se crea el row
        $row = new Rows();
        $object->row()->save($row);
        //se crea el image_module
        $this->saveMultimediaModule($object, $image->id, $main);
    }

    public function saveMultimediaModule($object_, $media_id, $main_ = 1)
    {
        //se crea el image_module
        $row_multimedia             = new RowsMultimedia();
        $row_multimedia->row_id     = $object_->row->id;
        $row_multimedia->multimedia_id   = $media_id;
        /*$image_module->main       = $main_;
        $image_module->order      = null;*/
        $row_multimedia->status_id     = 1;
        $row_multimedia->save();
    }

    /**
     * Display the specified Multimedia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $multimedia = $this->multimediaRepository->findWithoutFail($id);

        if (empty($multimedia)) {
            Flash::error('Multimedia not found');

            return redirect(route('admin.utils.multimedia.index'));
        }

        return view('admin.utils.multimedia.show')->with('multimedia', $multimedia);
    }

    /**
     * Show the form for editing the specified Multimedia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $multimedia = $this->multimediaRepository->findWithoutFail($id);

        if (empty($multimedia)) {
            Flash::error('Multimedia not found');

            return redirect(route('admin.utils.multimedia.index'));
        }

        return view('admin.utils.multimedia.edit')->with('multimedia', $multimedia);
    }

    /**
     * Update the specified Multimedia in storage.
     *
     * @param  int              $id
     * @param UpdateMultimediaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMultimediaRequest $request)
    {
        $multimedia = $this->multimediaRepository->findWithoutFail($id);

        if (empty($multimedia)) {
            Flash::error('Multimedia not found');

            return redirect(route('admin.utils.multimedia.index'));
        }

        $multimedia = $this->multimediaRepository->update($request->all(), $id);

        Flash::success('Multimedia updated successfully.');

        return redirect(route('admin.utils.multimedia.index'));
    }

    /**
     * Remove the specified Multimedia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $multimedia = $this->multimediaRepository->findWithoutFail($id);

        if (empty($multimedia)) {
            Flash::error('Multimedia not found');

            return redirect(route('admin.utils.multimedia.index'));
        }

        $this->multimediaRepository->delete($id);

        Flash::success('Multimedia deleted successfully.');

        return redirect(route('admin.utils.multimedia.index'));
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
        $this->store($request, $object, $class, 1);

        $type='success';
        $message='Le immagini sono state salvate correttamente';

        Session::flash($type, $message);
        //return redirect('/rooms');



        //redireccionamos
        //return view('admin.utils.multimedia.index');
        return redirect()->route('admin.utils.multimedia.index');

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
        foreach($request->images_id as $media)
        {
            //dd($rp);
            $this->saveMultimediaModule($object, $media, 1);
        }

        //$this->store($request, $object, $class, 1);

        $type='success';
        $message='Le immagini sono state salvate correttamente';

        Session::flash($type, $message);
        //return redirect('/rooms');



        //redireccionamos
        //return view('admin.utils.multimedia.index');
        return redirect()->back();

    }



    /**
     * Store a newly image in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return App\Images                $imgs
     */
    public function validateAndSaveMultimedia($request, $class )
    {
        //se valida que haya enviado imagen
        if ($request->file("image")) {
            $file = $request->file("image");
        }
        else if ($request->file("file")) {
            $file = $request->file("file");
        }
        else {
            return false;
        }
        $this->validate($request,[
            'name' => 'image|mimes:jpg,png,gif,jpeg'
        ]);
        $mime=$file->getClientMimeType();

        $contain = strstr($mime, 'image');
        //dd($contain);
        if ($contain) {
            $size = getimagesize($file);

            //se guarda en public la imagen
            $name = $class . time() . "." . $file->getClientOriginalName();
            $name = str_replace(" ", "_", $name);
            \Storage::disk('multimedia')->put($name, \File::get($file));
            $request['name']=$name;
            $request['description']="blog";
            $request['width']= $size[0];
            $request['height']= $size[1];
            $request['size']=$size[2];

            //se almacena el nombre de la imagen en bd
            $path = storage_path($name);
            $pathParts = pathinfo($path);
            $request['path']=$pathParts['dirname'];
            //dd($pathParts['dirname']);
            /*var_dump($request['width']); MultimediaController1533310577.g_cuarto2
            exit();*/
            $imgs = new Multimedia($request->all());
            $imgs->name = $name;
            $imgs->save();
            //dd($request->all());
            //$multimedia = $this->multimediaRepository->create($request->all());
            return $imgs;
        } else {
            $type='success';
            $message="L\'immagine non ha un\'estensione corretta";

            Session::flash($type, $message);
            return false;
        }

    }
}
