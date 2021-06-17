<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tampil = DB::table('orders')
            ->join('detail_orders', 'detail_orders.orders_id', '=', 'orders.id')
            ->join('products', 'detail_orders.products_id', '=', 'products.id')
            ->join('discount_customer', 'discount_customer.orders_id', '=', 'orders.id')
            ->select(
                'orders.id',
                'orders.date',
                'products.name',
                'detail_orders.qty',
                'products.price',
                'orders.shipping',
                'orders.ongkir',
                'orders.keterangan',
                'orders.status',
                'orders.total',
                'orders.pict_payment'
            )
            ->get();
        return view('admin/pages/penjualan/index',[
            'page'=> $tampil
        ]);
    }

    // public function addcart(Request $request, $id){
    //     $product = Product::find($id);
    //     $oldCart = Session::has('cart') ? Session::get('cart') : null;
    //     $cart = new Cart($oldCart);
    //     $cart->add($product, $product->id);

    //     $request->session()->put('cart', $cart);
    //     dd($request->session()->get('cart'));
    //     return redirect()->route('shop.index');
    // }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
