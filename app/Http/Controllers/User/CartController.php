<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idcust = customer::select('id')
        ->where('users_id','=', auth()->user()->id)
        ->get();
        
        $cart = cart::select('id')
        ->where('customers_id','=', $idcust[0]->id)
        ->count();

        $cek = cart::select('products.name','products.pict_1','stocks.size','cart.price','cart.subtotal','cart.qty','cart.id')
        ->join('stocks','stocks.id','=','cart.stocks_id')
        ->join('products','products.id','=','cart.products_id')
        ->join('customers','customers.id','=','cart.customers_id')
        ->where('customers_id','=', $idcust[0]->id)
        ->get();

        $total = DB::table('cart')
        ->sum('subtotal');
        
        return view('package.login.cart',[
            'cart' => $cart,
            'cek' => $cek,
            'total' => $total
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
        // Belum Bisa Hpusss
        // DB::table('cart')
        // ->where('id','=',$id)
        // ->delete();

        return view('/cart');
    }
}
