<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateOrderRequest;
use App\Http\Requests\Admin\UpdateOrderRequest;
use App\Models\Admin\Product;
use App\Models\Admin\ProductPresentationProduct;
use App\Models\Admin\UserAddress;
use App\Repositories\Admin\OrderRepository;
use App\User;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrderController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
    }

    /**
     * Display a listing of the Order.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orderRepository->pushCriteria(new RequestCriteria($request));
        $orders = $this->orderRepository->all();

        return view('admin.products.orders.index')
            ->with('orders', $orders);
    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */
    public function create()
    {

        /*
            $productPresentationProducts = ProductPresentationProduct::all();
            $final = [];
            $selectProducPresentationProducts = [];
            $hiddenProducPresentationProductPrices = [];
            foreach ($productPresentationProducts as $key => $productPresentationProduct) {
                $final[$key]                    = (object)[];
                $final[$key]->product_id        = $productPresentationProduct->product_id;
                $final[$key]->product_name      = $productPresentationProduct->product->itemByLanguage(\App::getLocale())->name;
                $final[$key]->presentation_name = $productPresentationProduct->productPresentation->itemByLanguage(\App::getLocale())->name;
                $final[$key]->presentation_id   = $productPresentationProduct->id;
                $final[$key]->price             = $productPresentationProduct->price;
                $final[$key]->tax               = $productPresentationProduct->tax;
                $final[$key]->for_delivery      = $productPresentationProduct->for_delivery;

                $selectProducPresentationProducts[$final[$key]->presentation_id] = $final[$key]->product_name . ' - ' . $final[$key]->presentation_name . ' (€' . number_format($final[$key]->price, 2) . ')';
                $hiddenProducPresentationProductPrices[$final[$key]->presentation_id] = $final[$key]->price;
            }
        */

        $products = Product::all();

        $final = [];
        $selectProducts = [];
        $hiddenProductsPrices = [];
        $hiddenProductsIvas = [];
        foreach ($products as $key => $product) {
            $final[$key]                    = (object)[];
            $final[$key]->product_id        = $product->id;
            $final[$key]->product_name      = $product->itemByLanguage(\App::getLocale())->name;
            $final[$key]->presentation_name = ($product->for_delivery==1)?'Delivery':'Store';
            $final[$key]->presentation_id   = $product->for_delivery;
            $final[$key]->price             = $product->price;
            $final[$key]->tax               = $product->tax;
            $final[$key]->for_delivery      = $product->for_delivery;

            $selectProducts[$final[$key]->product_id] = $final[$key]->product_name . ' - ' . $final[$key]->presentation_name . ' (€' . number_format($final[$key]->price, 2) . ')';
            $hiddenProductsPrices[$final[$key]->product_id] = $final[$key]->price;
            $hiddenProductsIvas[$final[$key]->product_id] = $final[$key]->tax;
        }

        // dd($hiddenProductsIvas);

        $users = User::pluck('email', 'id');

        // dd($final);

        return view('admin.products.orders.create', compact('selectProducts', 'hiddenProductsPrices', 'hiddenProductsIvas', 'users'));
    }

    /**
     * Get the UserAddress by User
     *
     * @param int $request
     *
     * @return json
     */
    public function getUserAddressByUser(Request $request, $user)
    {
        if ($request->ajax()) {
            $user = User::find($user);
            $userAddreesses = UserAddress::where('user_id',$user->id)->get();

            $finalUserAddresses = [];
            foreach ($userAddreesses as $key => $userAddress) {
                $finalUserAddresses[$userAddress->id] = $userAddress->alias . ' - ' . $userAddress->description;
            }
            //dd($finalUserAddresses);

                                     // ->itemByLanguage(App::getLocale())
                                     // ->pluck("name", "id");
            return response()->json([$finalUserAddresses]);
        }
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->all();

        // dd($input);

        $order = $this->orderRepository->create($input);

        Flash::success('Order saved successfully.');

        return redirect(route('admin.products.orders.index'));
    }

    /**
     * Display the specified Order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('admin.products.orders.index'));
        }

        return view('admin.products.orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('admin.products.orders.index'));
        }

        return view('admin.products.orders.edit')->with('order', $order);
    }

    /**
     * Update the specified Order in storage.
     *
     * @param  int              $id
     * @param UpdateOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('admin.products.orders.index'));
        }

        $order = $this->orderRepository->update($request->all(), $id);

        Flash::success('Order updated successfully.');

        return redirect(route('admin.products.orders.index'));
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('admin.products.orders.index'));
        }

        $this->orderRepository->delete($id);

        Flash::success('Order deleted successfully.');

        return redirect(route('admin.products.orders.index'));
    }
}
