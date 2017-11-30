<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop\Address\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class AddressController
 * @package App\Http\Controllers\Shop
 */
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.address.index', [
            'addresses' => Address::whereCustomerId(session('med_user')['id'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Address::create([
            'customer_id' => session('med_user')['id'],
            'receiver_phone' => $request->input('receiver_phone'),
            'receiver_name' => $request->input('receiver_name'),
            'province' => $request->input('province'),
            'city' => $request->input('city'),
            'district' => $request->input('district'),
            'address' => $request->input('address'),
        ]);
        return redirect(route('address.index'));
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
        return view('shop.address.edit', ['address' => Address::find($id)]);
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
        Address::find($id)->update([
            'receiver_phone' => $request->input('receiver_phone'),
            'receiver_name' => $request->input('receiver_name'),
            'province' => $request->input('province'),
            'city' => $request->input('city'),
            'district' => $request->input('district'),
            'address' => $request->input('address'),
        ]);
        return redirect(route('address.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Address::find($id)->delete();
        return redirect(route('address.index'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function setDefault($id)
    {
        Address::where('customer_id', session('med_user')['id'])->update(['default' => 0]);
        Address::where('customer_id', session('med_user')['id'])
            ->where('id', $id)
            ->update(['default' => 1]);

        return redirect(route('order.pay', ['productId' => session('pay_product_id')]));
    }
}
