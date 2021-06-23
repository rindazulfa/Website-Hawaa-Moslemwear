<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\cart;
use App\Models\customer;
use App\Models\Product;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $product = Product::with([
            'stok'
        ])
            ->get();

        $idcust = customer::select('id')
        ->where('users_id','=', auth()->user()->id)
        ->get();
        
        $cart = cart::select('id')
        ->where('id_customers','=', $idcust[0]->id)
        ->count();

        // dd(
        //     $cart
        // );

        return view('index', [
            'banner' => $banner,
            'shop' => $product,
            'cart' => $cart
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
            $tambahcart = cart::create([
                'id_products' => $request->id,
                'id_stocks' => $request->size,
                'id_customers' => $idcust[0]->id,
                'size' => $request->size,
                'price' => $request->price,
                'qty' => $request->qty,
                'subtotal' => $subtotal,
                'date' => $request->date
            ]);

            return redirect('/');
        } else {
            // Masukkan tampilan form insert customer
            $cart = cart::select('id')->count();

            return view('package/login/biasa/customerform', [
                'cart' => $cart
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
