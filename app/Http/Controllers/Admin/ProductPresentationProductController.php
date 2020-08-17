<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateProductPresentationProductRequest;
use App\Http\Requests\Admin\UpdateProductPresentationProductRequest;
use App\Models\Admin\Product;
use App\Models\Admin\ProductPresentation;
use App\Repositories\Admin\ProductPresentationProductRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductPresentationProductController extends AppBaseController
{
    /** @var  ProductPresentationProductRepository */
    private $productPresentationProductRepository;

    public function __construct(ProductPresentationProductRepository $productPresentationProductRepo)
    {
        $this->productPresentationProductRepository = $productPresentationProductRepo;
    }

    /**
     * Display a listing of the ProductPresentationProduct.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productPresentationProductRepository->pushCriteria(new RequestCriteria($request));
        $productPresentationProducts = $this->productPresentationProductRepository->all();

        return view('admin.products.product_presentation_products.index')
            ->with('productPresentationProducts', $productPresentationProducts);
    }

    /**
     * Show the form for creating a new ProductPresentationProduct.
     *
     * @return Response
     */
    public function create(Product $product)
    {
        $product_presentations = ProductPresentation::byLanguage(\App::getLocale())->get()->pluck('name', 'id');

        return view('admin.products.product_presentation_products.create', compact('product', 'product_presentations'));
    }

    /**
     * Store a newly created ProductPresentationProduct in storage.
     *
     * @param CreateProductPresentationProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductPresentationProductRequest $request)
    {
        // dd($request->all());exit();

        $input = $request->all();

        $productPresentationProduct = $this->productPresentationProductRepository->create($input);

        Flash::success('Product Presentation Product saved successfully.');

        return redirect(route('admin.products.edit', ['product' => $request->product_id, 'modal_presentation' => 'show']));
    }

    /**
     * Display the specified ProductPresentationProduct.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productPresentationProduct = $this->productPresentationProductRepository->findWithoutFail($id);

        if (empty($productPresentationProduct)) {
            Flash::error('Product Presentation Product not found');

            return redirect(route('admin.productPresentationProducts.index'));
        }

        return view('admin.products.product_presentation_products.show')->with('productPresentationProduct', $productPresentationProduct);
    }

    /**
     * Show the form for editing the specified ProductPresentationProduct.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Product $product, $id)
    {
        $productPresentationProduct = $this->productPresentationProductRepository->findWithoutFail($id);

        $product_presentations = ProductPresentation::byLanguage(\App::getLocale())->get()->pluck('name', 'id');

        if (empty($productPresentationProduct)) {
            Flash::error('Product Presentation Product not found');

            return redirect(route('admin.productPresentationProducts.index'));
        }

        return view('admin.products.product_presentation_products.edit', compact('product', 'product_presentations'))->with('productPresentationProduct', $productPresentationProduct);
    }

    /**
     * Update the specified ProductPresentationProduct in storage.
     *
     * @param  int              $id
     * @param UpdateProductPresentationProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductPresentationProductRequest $request)
    {
        $productPresentationProduct = $this->productPresentationProductRepository->findWithoutFail($id);

        if (empty($productPresentationProduct)) {
            Flash::error('Product Presentation Product not found');

            return redirect(route('admin.productPresentationProducts.index'));
        }

        $productPresentationProduct = $this->productPresentationProductRepository->update($request->all(), $id);

        Flash::success('Product Presentation Product updated successfully.');

        return redirect(route('admin.products.edit', ['product' => $request->product_id, 'modal_presentation' => 'show']));
    }

    /**
     * Remove the specified ProductPresentationProduct from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productPresentationProduct = $this->productPresentationProductRepository->findWithoutFail($id);

        if (empty($productPresentationProduct)) {
            Flash::error('Product Presentation Product not found');

            return redirect(route('admin.productPresentationProducts.index'));
        }

        $product = Product::find($productPresentationProduct->product_id);

        $this->productPresentationProductRepository->delete($id);

        Flash::success('Product Presentation Product deleted successfully.');

        return redirect(route('admin.products.edit', ['product' => $product->id, 'modal_presentation' => 'show']));
    }
}
