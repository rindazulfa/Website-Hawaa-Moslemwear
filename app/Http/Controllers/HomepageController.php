<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\customer;
use App\Models\product;
use App\Models\profile;
use App\Models\stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Profiler\Profile as ProfilerProfile;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all()->last();
        $footer = profile::all()->last();
        $product = product::with([
            'stok'
        ])
            ->get();

        // dd($profile);
        // dd(
        //     $product
        // );

        if (Auth::check()) {
            $product = DB::table('products')
                ->select('products.*')
                ->join('stocks', 'stocks.products_id', '=', 'products.id')
                ->where('stocks.qty', '>', 0)
                ->distinct()
                ->get();

            $cek = customer::select('id')
                ->where('users_id', '=', auth()->user()->id)
                ->count();

            if ($cek == 0) {
                return view('index', [
                    'banner' => $banner,
                    'shop' => $product,
                    'cart' => 0,
                    'footer' => $footer
                ]);
            } else {
                $product = DB::table('products')
                    ->select('products.*')
                    ->join('stocks', 'stocks.products_id', '=', 'products.id')
                    ->where('stocks.qty', '>', 0)
                    ->distinct()
                    ->get();
                    
                $idcust = customer::select('id')
                    ->where('users_id', '=', auth()->user()->id)
                    ->get();

                $cart = Cart::select('id')
                    ->where('customers_id', '=', $idcust[0]->id)
                    ->count();

                return view('index', [
                    'banner' => $banner,
                    'shop' => $product,
                    'cart' => $cart,
                    'footer' => $footer
                ]);
            }
        } else {
            return view('index', [
                'banner' => $banner,
                'shop' => $product,
                'cart' => 0,
                'footer' => $footer
            ]);
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
        $cekcust = DB::table('customers')
            ->select('id')
            ->where('users_id', '=', auth()->user()->id)
            ->count();

        $idcust = DB::table('customers')
            ->select('id')
            ->where('users_id', '=', auth()->user()->id)
            ->get();

        if ($cekcust == 1) {
            $subtotal = $request->qty * $request->price;

            // Memasukkan ke keranjang
            $cekprod = Cart::select('id')
                ->where('products_id', '=', $request->id)
                ->where('stocks_id', '=', $request->size)
                ->count();

            $cekidcart = Cart::select('id')
                ->where('products_id', '=', $request->id)
                ->where('stocks_id', '=', $request->size)
                ->get();

            if ($cekprod == 1) {
                $qtyold = Cart::select('qty')
                    ->where('products_id', '=', $request->id)
                    ->where('stocks_id', '=', $request->size)
                    ->get();

                $qtynow = $qtyold[0]->qty + $request->qty;
                $subtotalnow = $qtynow * $request->price;

                $updcart = DB::table('cart')
                    ->where('id', '=', $cekidcart[0]->id)->update([
                        'qty' => $qtynow,
                        'subtotal' => $subtotalnow
                    ]);

                return redirect('/');
            } else {
                $tambahcart = Cart::create([
                    'products_id' => $request->id,
                    'stocks_id' => $request->size,
                    'customers_id' => $idcust[0]->id,
                    'size' => $request->size,
                    'price' => $request->price,
                    'qty' => $request->qty,
                    'subtotal' => $subtotal,
                    'date' => $request->date
                ]);

                return redirect('/');
            }
        } else {
            // Masukkan tampilan form insert customer
            return view('package/login/biasa/customerform', [
                'cart' => 0
            ]);
        }

        // dd(
        //     $idcust,
        //     $subtotal
        // );

        // return redirect('/');
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
