<?php

namespace App\Http\Controllers\Shop;

use App\Models\BeansLog;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.order.index', [
            'orders' => Customer::find(session('med_user')['id'])->orders
        ]);
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
        $product = Product::find($request->input('product_id'));
        $customer = Customer::find(session('med_user')['id']);
        $order = Order::create([
            'customer_id' => $customer->id,
            'product_id' => $product->id,
            'beans_fee' => $product->integral,
            'price_fee' => $product->price,
            'status' => 1,
            'address_phone' => $request->input('address_phone'),
            'address_name' => $request->input('address_name'),
            'address_province' => $request->input('address_province'),
            'address_city' => $request->input('address_city'),
            'address_district' => $request->input('address_district'),
            'address_detail' => $request->input('address_detail')
        ]);
        $customer->update([
            'beans' => $customer->beans - $product->integral
        ]);

        BeansLog::create([
            'customer_id' => $customer->id,
            'order_id' => $order->id,
            'beans' => $order->beans_fee,
            'type' => 2,
            'description' => '兑换'.$product->name,
        ]);
        $product->update([
            'sale_count' => Order::whereProductId($product->id)->count()
        ]);
        $order->generateOrderSn();
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
        //
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
            'defaultAddress' => Customer::find(session('med_user')['id'])->defaultAddress,
        ]);
    }
}
