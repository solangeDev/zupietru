<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\UtilController;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateMultimediaRequest;
use App\Http\Requests\Admin\CreateProductTranslationRequest;
use App\Http\Requests\Admin\UpdateProductTranslationRequest;
use App\Models\Admin\Brand;
use App\Models\Admin\Multimedia;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;
use App\Models\Admin\ProductPresentation;
use App\Models\Admin\ProductPresentationProduct;
use App\Models\Admin\ProductPresentationTranslation;
use App\Models\Admin\ProductSubcategory;
use App\Models\Admin\ProductTranslation;
use App\Models\Admin\Rows;
use App\Models\Admin\RowsMultimedia;
use App\Repositories\Admin\ProductPresentationRepository;
use App\Repositories\Admin\ProductPresentationTranslationRepository;
use App\Repositories\Admin\ProductRepository;
use App\Repositories\Admin\ProductTranslationRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

class ProductTranslationController extends AppBaseController
{
    /** @var  ProductTranslationRepository */
    private $productTranslationRepository;

    /** @var  ProductRepository */
    private $productRepository;

    /** @var  ProductPresentationRepository */
    private $productPresentationRepository;

    /** @var  ProductPresentationTranslationRepository */
    private $productPresentationTranslationRepository;

    public function __construct(
        ProductTranslationRepository $productTranslationRepo,
        ProductRepository $productRepo,
        ProductPresentationRepository $productPresentationRepo,
        ProductPresentationTranslationRepository $productPresentationTranslationRepositoryRepo)
    {
        $this->productTranslationRepository             = $productTranslationRepo;
        $this->productRepository                        = $productRepo;
        $this->productPresentationRepository            = $productPresentationRepo;
        $this->productPresentationTranslationRepository = $productPresentationTranslationRepositoryRepo;
    }

    /**
     * Display a listing of the ProductTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productTranslationRepository->pushCriteria(new RequestCriteria($request));
        $productTranslations = $this->productTranslationRepository->all();

        return view('admin.products.product_translations.index')
            ->with('productTranslations', $productTranslations);
    }

    /**
     * Show the form for creating a new ProductTranslation.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $brands = Brand::byLanguage(\App::getLocale())->get()->pluck('name', 'id');
        $product_categories = ProductCategory::byLanguage(\App::getLocale())->get()->pluck('name', 'id');
        $product_subcategories = ProductSubcategory::byLanguage(\App::getLocale())->get()->pluck('name', 'id');

        // begin::para mostrar modal de product_presentations_products
        $modal_presentation = $request->input('modal_presentation');
        // end::para mostrar modal de product_presentations_products

        return view('admin.products.product_translations.create', compact('brands', 'product_categories', 'product_subcategories', 'modal_presentation'));
    }

    /**
     * Store a newly created ProductTranslation in storage.
     *
     * @param CreateProductTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateProductTranslationRequest $request)
    {
        try{
            // save Product
            $product = $this->saveProduct($request);
        }catch(Exeption $e){
            return $e->getMessage();
        }

        try{
            // save ProductTranslation
            $productTranslation = $this->saveProductTranslation($request, $product);
        }catch(Exeption $e){
            return $e->getMessage();
        }

        //create product_presentation

        //create product_presentation_translation

        Flash::success('Product saved successfully.');

        return redirect(route('admin.products.index'));
    }

    /**
     * Return the subcategory of the given category.
     *
     * @return Json
     */
    public function getSubcategoryByCategory(Request $request, $category)
    {
        dd($request);
      if ($request->ajax()){
        $subcategories = ProductSubcategory::where('product_category_id',$category)->get();

        $finalSubcategories = [];
        foreach ($subcategories as $key => $subcategory) {
            $finalSubcategories[$subcategory->id] = $subcategory->itemByLanguage(\App::getLocale())->name;
        }
        //dd($finalSubcategories);

                                 // ->itemByLanguage(App::getLocale())
                                 // ->pluck("name", "id");
        return response()->json([$finalSubcategories]);
      }
    }


    /**
     * Save (store/update) a model in storage.
     *
     * @param $request
     * @param $product
     *
     * @return Product $product
     */
    public function saveProduct($request, $product = null)
    {
        //data model
        $inputProduct = $request->only(['for_delivery','price','tax','brand_id', 'subcategory_id', 'status_id']);
        $inputProduct['slug'] = str_slug($request->input('name'), '-');

        // if creating a newly model
        if ($product == null) {
            $product = $this->productRepository->create($inputProduct);

            /* Registrar en la tabla polimorfica para enlazar el producto con seos */
            $row = UtilController::saveRow($product);
            /* Registrar en la tabla seo */
            $seos = UtilController::saveSeo($row->id);
            /* Registrar en la tabla seo_translations */
            $seoTranslation = UtilController::saveSeoTranlation($request,$seos->id);
        } else { // if updating a existing model
            $product->update($inputProduct);
            /* Registrar en la tabla seo_translations */
            $seoTranslation = UtilController::saveSeoTranlation($request,$request->seos_id);
        }

        return $product;
    }

    /**
     * Save (store/update) a model in storage.
     *
     * @param $request
     * @param $productTranslation
     *
     * @return ProductTranslation $productTranslation
     */
    public function saveProductTranslation($request, $product, $productTranslation = null)
    {

        //data productTranslation
        $inputProductTranslation = $request->only(['language_id', 'name', 'description']);
        $inputProductTranslation['product_id'] = $product->id;

        // if creating a newly model
        if ($productTranslation == null) {
            $productTranslation = $this->productTranslationRepository->create($inputProductTranslation);
        }
        // if updating a existing model
        else {
            $productTranslation->update($inputProductTranslation);
            // $productTranslation = $this->productTranslationRepository->update($request->all(), $id);
        }

        return $productTranslation;
    }

    /**
     * Display the specified ProductTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productTranslation = $this->productTranslationRepository->findWithoutFail($id);

        if (empty($productTranslation)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        return view('admin.products.product_translations.show')->with('productTranslation', $productTranslation);
    }

    /**
     * Show the form for editing the specified ProductTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $brands = Brand::byLanguage(\App::getLocale())->get()->pluck('name', 'id');
        $product_categories = ProductCategory::byLanguage(\App::getLocale())->get()->pluck('name', 'id');
        $product_subcategories = ProductSubcategory::byLanguage(\App::getLocale())->get()->pluck('name', 'id');
        $productTranslation = $this->productTranslationRepository->findWithoutFail($id);
        // dd($productTranslation->product->for_delivery);

        // $for_delivery =

        // begin::para mostrar modal de product_presentations_products
        $modal_presentation = $request->input('modal_presentation');
        // end::para mostrar modal de product_presentations_products

        //para product presentation
        $productPresentationsProducts = $productTranslation->product->productPresentationsProducts;
        $ownProductPresentations = [];
        foreach ($productPresentationsProducts as $key => $productPresentationProduct) {
            $productPresentation = $productPresentationProduct->productPresentation;

            $productPresentationsProducts[$key]->productPresentation = $productPresentation;
        }
        $productPresentationProducts = $productPresentationsProducts;


        if (empty($productTranslation)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        /*Cargar las galerias de imagenes de los productos y cargar las imagenes adicionles del storage*/
        $object = Product::find($productTranslation->product_id);
        $filesDB = Multimedia::all();
        $gallery= $object->galeryImages();
        //dd($gallery);
        $ind=0;
        //Buscar los registros que existen el modulo y sacaros del array del storage
        if($gallery!=null) {
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

        $seos_utils=isset($object->row->seo->id) ? UtilController::seoTranslations($object->row->seo->id) : null;

        return view('admin.products.product_translations.edit', compact('brands', 'product_categories', 'product_subcategories', 'productPresentationProducts', 'product_presentations', 'modal_presentation'))
            ->with('seos', $seos_utils)
            ->with('productTranslation', $productTranslation)
            ->with('object', $object)
            ->with('filesDB', $filesDB);
    }

    /**
     * Update the specified ProductTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateProductTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductTranslationRequest $request)
    {
        // dd($request);
        $productTranslation = $this->productTranslationRepository->findWithoutFail($id);


        if (empty($productTranslation)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }


        // get Product
        $product = Product::find( $productTranslation->product_id );

        // save Product
        $product = $this->saveProduct($request, $product);

        // save ProductTranslation
        $productTranslation = $this->saveProductTranslation($request, $product, $productTranslation);


        Flash::success('Product updated successfully.');

        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified ProductTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productTranslation = $this->productTranslationRepository->findWithoutFail($id);

        if (empty($productTranslation)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        $this->productTranslationRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('admin.products.index'));
    }

    public function saveGalery(CreateMultimediaRequest $request, $id)
    {

        /*$user = new User;
        $user->authorize('Admin');*/
        //nombre de la clase
        $class = class_basename($this);
        //dd($request);
        $object = Product::find($id);
        $request['slug']="blog";

        //se valida la imagen y se guarda
        $multimedia=new MultimediaController();
        $multimedia=$multimedia->store($request, $object, $class, 1);
        //dd($multimedia);
        if($multimedia==null){
            $message="L\'immagine non ha un\'estensione corretta";
            $type = "ERROR";
            //Session::flash($type, $message);
        } else {
            $type='success';
            $message='Le immagini sono state salvate correttamente';
        }
        Session::flash($type, $message);

        //redireccionamos
        return view('admin.utils.multimedia.index');
        //return redirect()->route('admin.utils.multimedia.index');
        return redirect()->back();
    }

    public function saveGaleryOfStorage(Request $request)
    {
        /*$user = new User;
        $user->authorize('Admin');*/
        //nombre de la clase
        $class = class_basename($this);
        $object = Product::find($request->id_object);
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
            $productTranslation= ProductTranslation::find($id_object);
            //dd($productTranslation);
            $object= Product::where('id',$productTranslation->product_id)->get();
            $object = Product::find($object[0]->id);
            //dd($object->galeryImages());
            $filesDB = Multimedia::all();
            if($row_multimedia!=null) {
                //$object = Product::find($productTranslation->product_id);
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


            $brands = Brand::byLanguage(\App::getLocale())->get()->pluck('name', 'id');
            $product_categories = ProductCategory::byLanguage(\App::getLocale())->get()->pluck('name', 'id');
            $product_subcategories = ProductSubcategory::byLanguage(\App::getLocale())->get()->pluck('name', 'id');
            //$productTranslation = $this->productTranslationRepository->findWithoutFail($id_object);

            // begin::para mostrar modal de product_presentations_products
            $modal_presentation = $request->input('modal_presentation');
            // end::para mostrar modal de product_presentations_products

            //para product presentation
            $productPresentationsProducts = $productTranslation->product->productPresentationsProducts;
            $ownProductPresentations = [];
            foreach ($productPresentationsProducts as $key => $productPresentationProduct) {
                $productPresentation = $productPresentationProduct->productPresentation;

                $productPresentationsProducts[$key]->productPresentation = $productPresentation;
            }
            $productPresentationProducts = $productPresentationsProducts;


            if (empty($productTranslation)) {
                Flash::error('Product not found');

                return redirect(route('admin.products.index'));
            }

            return view('admin.products.product_translations.edit', compact('brands', 'product_categories', 'product_subcategories', 'productPresentationProducts', 'product_presentations', 'modal_presentation'))
                ->with('productTranslation', $productTranslation)
                ->with('object', $object)
                ->with('filesDB', $filesDB);

        } catch (Exception $e) {
            return false;
        }
    }
}
