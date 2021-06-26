<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\customer;
use App\Models\detail_order;
use App\Models\Product;
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
        $product = Product::with(['stok'])->get();

        if (Auth::check()) {
            $cek = customer::select('id')
                ->where('users_id', '=', auth()->user()->id)
                ->count();

            if ($cek == 0) {
                return view('package.product', [
                    'shop' => $product,
                    'cart' => 0
                ]);
            } else {
                $idcust = customer::select('id')
                    ->where('users_id', '=', auth()->user()->id)
                    ->get();

                $cart = cart::select('id')
                    ->where('customers_id', '=', $idcust[0]->id)
                    ->count();

                return view('package.product', [
                    'shop' => $product,
                    'cart' => $cart
                ]);
            }
        } else {
            return view('package.product', [
                'shop' => $product,
                'cart' => 0
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
        $validator = Validator::make($request->all(), [
            'size' => 'required',
            'qty' => 'required',

        ]);
        // dd($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            if ($request->session()->has("cart_shop_data")) {
                $cek = false;
                $res = $request->session()->get("cart_shop_data");
                $arr = [];
                foreach ($res as $key => $value) {
                    if ($request->get("products_id") == $value["products_id"] && $request->get("size") == $value["size"]) {
                        $x["products_id"] = $value["products_id"];
                        $x["size"] = $value["size"];
                        $dataqty = $request->get("qty") + (int) $value["qty"];
                        $x["qty"] = $dataqty;
                        $cek = true;
                        array_push($arr, $x);
                    } else {
                        array_push($arr, $value);
                    }
                }

                if (!$cek) {
                    $data = [
                        'products_id' => $request->get("products_id"),
                        "size" => $request->get("size"),
                        "qty" => $request->get("qty")
                    ];
                    array_push($arr, $data);
                }

                $request->session()->forget("cart_shop_data");
                $request->session()->put(["cart_shop_data" => $arr]);
                $request->session()->save();
            } else {
                $dataarray = [];
                $data = [
                    'products_id' => $request->get("products_id"),
                    "size" => $request->get("size"),
                    "qty" => $request->get("qty")
                ];
                array_push($dataarray, $data);
                $request->session()->put(["cart_shop_data" => $dataarray]);
                $request->session()->save();
            }
            $product = Product::all();
            $datacart = request()->session()->get("cart_shop_data");
            $arr = [];
            foreach ($datacart as $key => $valuecart) {
                $value = Product::find($valuecart["products_id"]);
                // $pic = Picture::where("products_id", $value->id)->first();
                $x["products_id"] = $value->id;
                $x["name"] = $value->name;
                $x["pict_1"] = $value->pict_1;
                $x["pict_2"] = $value->pict_2;
                $x["pict_3"] = $value->pict_3;
                $x["size"] = $valuecart["size"];
                $x["qty"] = $valuecart["qty"];
                $x["price"] = $value["price"];
                array_push($arr, $x);
            }
            $request->session()->forget("cart_shop_data");
            $request->session()->put(["cart_shop_data" => $arr]);
            $request->session()->save();
            // return redirect("shop");
        }
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
            $cekprod = cart::select('id')
                ->where('products_id', '=', $request->id)
                ->where('stocks_id', '=', $request->size)
                ->count();

            $cekidcart = cart::select('id')
                ->where('products_id', '=', $request->id)
                ->where('stocks_id', '=', $request->size)
                ->get();

            if ($cekprod == 1) {
                $qtyold = cart::select('qty')
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

                return redirect('/shop');
            } else {
                $tambahcart = cart::create([
                    'products_id' => $request->id,
                    'stocks_id' => $request->size,
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
        $detail = Product::with(['stok'])
            ->findOrFail($id);
        $stok = stock::where('products_id', $id)->first();
        $cart = cart::select('id')->count();

        return view('package.detail_product', [
            'detail' => $detail,
            'stok' => $stok,
            'cart' => $cart
        ]);
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
