<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\customer;
use App\Models\detail_order;
use App\Models\order;
use App\Models\stock;
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
        $cek = customer::select('id')
            ->where('users_id', '=', auth()->user()->id)
            ->count();

        if ($cek == 0) {
            return view('package/login/biasa/customerform', [
                'cart' => 0
            ]);
        } else {
            $idcust = customer::select('id')
                ->where('users_id', '=', auth()->user()->id)
                ->get();

            $cart = cart::select('id')
                ->where('customers_id', '=', $idcust[0]->id)
                ->count();

            $cek = cart::select('products.name', 'products.pict_1', 'stocks.size', 'cart.price', 'cart.subtotal', 'cart.qty', 'cart.id')
                ->join('stocks', 'stocks.id', '=', 'cart.stocks_id')
                ->join('products', 'products.id', '=', 'cart.products_id')
                ->join('customers', 'customers.id', '=', 'cart.customers_id')
                ->where('customers_id', '=', $idcust[0]->id)
                ->get();

            $cekjmlcart = cart::select('products.name', 'products.pict_1', 'stocks.size', 'cart.price', 'cart.subtotal', 'cart.qty', 'cart.id')
                ->join('stocks', 'stocks.id', '=', 'cart.stocks_id')
                ->join('products', 'products.id', '=', 'cart.products_id')
                ->join('customers', 'customers.id', '=', 'cart.customers_id')
                ->where('customers_id', '=', $idcust[0]->id)
                ->count();

            $total = DB::table('cart')
                ->sum('subtotal');

            if ($cekjmlcart == 0) {
                return view('package.login.cart', [
                    'cart' => $cart,
                    'cek' => $cek,
                    'total' => $total
                ]);
            } else {
                return view('package.login.cart', [
                    'cart' => $cart,
                    'cek' => $cek,
                    'total' => $total
                ]);
            }
        }
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
        $id = $request->id;
        $qty = $request->qty;
        $size = $request->size;
        $price = $request->price;
        $date = $request->date;

        $total = [];

        foreach ($request->id as $key => $row) {
            $subtotal[] = $price[$key] * $qty[$key];
        }

        $isitotal = 0;

        for ($i = 0; $i < sizeof($subtotal); $i++) {
            $isitotal += $subtotal[$i];
        }

        $total[] = $isitotal;

        $cekid = customer::select('id')
            ->where('users_id', '=', auth()->user()->id)
            ->get();

        $iniid = $cekid[0]->id;

        order::create([
            'customers_id' => $iniid,
            'date' => $date,
            'total' => $total[0],
            'status' => 'Menunggu Pembayaran'
        ]);

        // dd(
        //     $request->all(),
        //     $request->id,
        //     $cekid[0]->id,
        //     $iniid,
        //     $subtotal,
        //     $total[0],
        //     $date
        // );       

        $idorder = order::all()->last()->id;
        // $idprod = cart::select('products_id')
        //         ->where('id', '=', $id[0])
        //         ->get();

        // dd(
        //     $idorder,
        //     $request->id,
        //     $id,
        //     $qty,
        //     $size,
        //     $price[0] * $qty[0],
        //     $idprod[0]->products_id
        // );

        foreach ($request->id as $key => $row) {
            $idprod = cart::select('products_id')
                ->where('id', '=', $id[$key])
                ->get();
            $detail = new detail_order();
            $detail->orders_id = $idorder;
            $detail->products_id = $idprod[0]->products_id;
            $detail->size = $size[$key];
            $detail->qty = $qty[$key];
            $detail->satuan = 'buah';
            $detail->subtotal = $price[$key] * $qty[$key];
            $detail->save();
        }

        $del = DB::table('cart')->delete();

        return redirect('/riwayat');
    }

    public function tampilcheckout($id)
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
        // dd($id);
        $cek = customer::select('id')
            ->where('users_id', '=', auth()->user()->id)
            ->count();

        if ($cek == 0) {
            return view('package/login/biasa/customerform', [
                'cart' => 0
            ]);
        } else {
            $idcust = customer::select('id')
                ->where('users_id', '=', auth()->user()->id)
                ->get();

            $cart = cart::select('id')
                ->where('customers_id', '=', $idcust[0]->id)
                ->count();

            $cek = cart::select('products.name', 'products.pict_1', 'stocks.size', 'cart.price', 'cart.subtotal', 'cart.qty', 'cart.id')
                ->join('stocks', 'stocks.id', '=', 'cart.stocks_id')
                ->join('products', 'products.id', '=', 'cart.products_id')
                ->join('customers', 'customers.id', '=', 'cart.customers_id')
                ->where('customers_id', '=', $idcust[0]->id)
                ->get();

            $total = DB::table('cart')
                ->sum('subtotal');

            return view('package.login.biasa.cartcheckout', [
                'cart' => $cart,
                'cek' => $cek,
                'total' => $total
            ]);
        }
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
        // $totalbaru = $request->price * $request->qty;

        // $updcart = DB::table('cart')
        //     ->where('id', '=', $id)->update([
        //         'qty' => $request->qty,
        //         'size' => $request->size,
        //         'subtotal' => $totalbaru
        //     ]);

        // return redirect('/cart');
    }

    public function updcart(Request $request)
    {
        // dd($request->all());
        $qty = $request->qty;
        $size = $request->size;
        $price = $request->price;

        foreach ($request->id as $key => $row) {
            $cart = cart::findorfail($row);
            $cart->qty = $qty[$key];
            $cart->size = $size[$key];
            $cart->subtotal = $price[$key] * $qty[$key];
            $cart->save();
        }

        return redirect('/cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = order::findOrFail($id);
        $delete->delete();

        return view('/riwayat');
    }

    public function delhis($id){
        $delete = order::findOrFail($id);
        $delete->delete();

        return redirect('/riwayat');
    }

    public function delcart($id)
    {
        $test = DB::table('cart')
            ->where('id', '=', $id)
            ->delete();

        return redirect('/cart');
    }
}
