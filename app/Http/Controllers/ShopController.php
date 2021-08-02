<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\customer;
use App\Models\detail_order;
use App\Models\product;
use App\Models\profile;
use App\Models\stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::with(['stok'])->get();
        $footer = profile::all()->last();
        $kategori = DB::table('categories')->get();

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
                return view('package.product', [
                    'shop' => $product,
                    'cart' => 0,
                    'footer' => $footer,
                    'kategori' => $kategori
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

                return view('package.product', [
                    'shop' => $product,
                    'cart' => $cart,
                    'footer' => $footer,
                    'kategori' => $kategori
                ]);
            }
        } else {
            return view('package.product', [
                'shop' => $product,
                'cart' => 0,
                'footer' => $footer,
                'kategori' => $kategori
            ]);
        }
    }

    // public function indexlogin()
    // {
    //     $product = Product::with([
    //         'stok'
    //     ])
    //         ->get();
    //     $profile = profile::all()->first();
    //     return view('package.login.product', [
    //         'shop' => $product,
    //         'profile' => $profile
    //     ]);
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
    public function process(Request $request, $id)
    {
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

            $stockid = stock::select('id')
                    ->where('products_id', '=', $request->id)
                    ->first();

            // Memasukkan ke keranjang
            $cekprod = Cart::select('id')
                ->where('products_id', '=', $request->id)
                ->where('stocks_id', '=', $stockid->id)
                ->count();

            // dd(
            //     $cekprod,
            //     $request->id,
            //     $stockid->id
            // );

            // dibawah ini error
            $cekidcart = Cart::select('id')
                ->where('products_id', '=', $request->id)
                ->where('stocks_id', '=', $stockid->id)
                ->get();

            if ($cekprod >= 1) {
                $stockid = stock::select('id')
                    ->where('products_id', '=', $request->id)
                    ->first();

                $qtyold = Cart::select('qty')
                    ->where('products_id', '=', $request->id)
                    ->where('stocks_id', '=', $stockid->id)
                    ->get();

                $qtynow = $qtyold[0]->qty + $request->qty;
                $subtotalnow = $qtynow * $request->price;

                $updcart = DB::table('cart')
                    ->where('id', '=', $cekidcart[0]->id)->update([
                        'qty' => $qtynow,
                        'subtotal' => $subtotalnow
                    ]);

                return redirect('/shop');
            } else {
                $stockid = stock::select('id')
                    ->where('products_id', '=', $request->id)
                    ->first();

                // dd($stockid->id);

                $tambahcart = Cart::create([
                    'products_id' => $request->id,
                    'stocks_id' => $stockid->id,
                    'customers_id' => $idcust[0]->id,
                    'size' => $request->size,
                    'price' => $request->price,
                    'qty' => $request->qty,
                    'subtotal' => $subtotal,
                    'date' => $request->date
                ]);
                return redirect('/shop');
            }
        } else {
            // Masukkan tampilan form insert customer
            return view('package/login/biasa/customerform', [
                'cart' => 0
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //detail produk
        $detail = product::with(['stok'])
            ->findOrFail($id);
        $stok = stock::where('products_id', $id)->first();
        $cart = Cart::select('id')->count();

        return view('package.detail_product', [
            'detail' => $detail,
            'stok' => $stok,
            'cart' => $cart
        ]);
    }

    public function kategori($id){
        $product = product::with(['stok'])->get();
        $footer = profile::all()->last();
        $kategori = DB::table('categories')->get();

        if (Auth::check()) {
            $product = DB::table('products')
                ->select('products.*')
                ->join('stocks', 'stocks.products_id', '=', 'products.id')
                ->where('stocks.qty', '>', 0)
                ->where('categories_id','=',$id)
                ->distinct()
                ->get();
            
            // dd(
            //     $product
            // );

            $cek = customer::select('id')
                ->where('users_id', '=', auth()->user()->id)
                ->count();

            if ($cek == 0) {
                return view('package.product', [
                    'shop' => $product,
                    'cart' => 0,
                    'footer' => $footer
                ]);
            } else {
                $product = DB::table('products')
                    ->select('products.*')
                    ->join('stocks', 'stocks.products_id', '=', 'products.id')
                    ->where('stocks.qty', '>', 0)
                    ->where('categories_id','=',$id)
                    ->distinct()
                    ->get();
                $idcust = customer::select('id')
                    ->where('users_id', '=', auth()->user()->id)
                    ->get();

                $cart = Cart::select('id')
                    ->where('customers_id', '=', $idcust[0]->id)
                    ->count();

                return view('package.product', [
                    'shop' => $product,
                    'cart' => $cart,
                    'footer' => $footer,
                    'kategori' => $kategori
                ]);
            }
        } else {
            return view('package.product', [
                'shop' => $product,
                'cart' => 0,
                'footer' => $footer,
                'kategori' => $kategori
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
        $detail = detail_order::all();
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
    public function checkStokBySize(Request $request)
    {
        if ($request->ajax()) {
            $cekstok = stock::where('products_id', $request->get('products_id'))->where('size', $request->get('size'))->first();

            return response()->json($cekstok);
        }
    }
}
