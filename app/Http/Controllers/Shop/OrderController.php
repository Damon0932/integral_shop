<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop\Address\Address;
use App\Models\Shop\Order\Order;
use App\Models\Shop\Product\Product\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class OrderController
 * @package App\Http\Controllers\Shop
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::whereCustomerId(session('med_user')['id'])->orderBy('created_at', 'desc')->get();
        return view('shop.order.index', [
            'orders' => $orders,
            'orderArray' => $this->initOrderArrayByFilter($orders)
        ]);
    }

    /**
     * @param $orders
     * @return array
     */
    protected function initOrderArrayByFilter($orders)
    {
        $orderArray = [];
        foreach ($orders as $order) {
            if (!array_key_exists($order->status, $orderArray)) {
                $orderArray[$order->status] = [];
            }
            array_push($orderArray[$order->status], $order);
        }
        return $orderArray;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Order::pay([
            'customer_id' => session('med_user')['id'],
            'product_id' => $request->input('product_id'),
            'address_phone' => $request->input('address_phone'),
            'address_name' => $request->input('address_name'),
            'address_province' => $request->input('address_province'),
            'address_city' => $request->input('address_city'),
            'address_district' => $request->input('address_district'),
            'address_detail' => $request->input('address_detail')
        ]);
        return redirect(route('order.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('shop.order.detail', [
            'order' => Order::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * @param $productId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pay($productId)
    {
        session(['pay_product_id' => $productId]);
        return view('shop.order.pay', [
            'product' => Product::find($productId),
            'defaultAddress' => Address::orderBy('default')->whereCustomerId(session('med_user')['id'])->orderBy('default', 'asc')->first()
        ]);
    }
}
