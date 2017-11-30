<?php

namespace App\Http\Controllers\Shop;

use App\Models\IndexFilter;
use App\Models\Shop\Product\Product\Product;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers\Shop
 */
class ProductController extends ShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemsArray = $this->getIndexItemsArray();
        return view('shop.index', [
            'products' => $itemsArray['products'],
            'filterArrays' => $itemsArray['filterArrays'],
            'productArrays' => $itemsArray['productArrays'],
        ]);
    }

    /**
     * @return array
     */
    private function getIndexItemsArray()
    {
        $products = Product::whereOnSale(1)->get();
        $filters = IndexFilter::where('key', 'beans_between')->get(['value']);
        $filterArrays = [];
        $productArrays = [];
        foreach ($filters as $filter) {
            $filterArray = explode(',', $filter->value);
            array_push($filterArrays, $filterArray);
            $productArray = [];
            foreach ($products as $product) {
                if (is_array($filterArray) && $product->integral > $filterArray[0] && $product->integral < $filterArray[1]) {
                    array_push($productArray, $product);
                }
            }
            $productArrays[$filter->value] = $productArray;
        }
        return [
            'filterArrays' => $filterArrays,
            'productArrays' => $productArrays,
            'products' => $products,
        ];
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('shop.detail', [
            'product' => Product::find($id)
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
}
