<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use PDF;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cekcust = DB::table('customers')
            ->select('id')
            ->where('users_id', '=', auth()->user()->id)
            ->count();

        // dd(
        //     $cek,
        //     $cust_id[0]->id
        // );

        if ($cekcust == 0) {
            // Data Cust tidak ada masuk ke custom product

            return redirect('/');
        } else {
            $cust_id = DB::table('customers')
                ->where('users_id', '=', auth()->user()->id)
                ->get();

            $idcust = customer::select('id')
                ->where('users_id', '=', auth()->user()->id)
                ->get();

            $cart = Cart::select('id')
                ->where('customers_id', '=', $idcust[0]->id)
                ->count();

            $cekjmlcus = DB::table('orders')
                ->where('customers_id', '=', $cust_id[0]->id)
                ->count();

            $cek = DB::table('orders')
                ->join('customers', 'customers.id', '=', 'orders.customers_id')
                ->join('users', 'users.id', '=', 'customers.users_id')
                ->where('customers_id', '=', $cust_id[0]->id)
                ->select('orders.*', 'users.first_name')
                ->get();

            $nomorhp = DB::table('profiles')->first();

            if ($cekjmlcus == 0) {
                return redirect('/');
            } else {
                return view('package.login.biasa.history', [
                    'cek' => $cek,
                    'cart' => $cart,
                    'data' => $nomorhp
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

    public function cetak_pdf($id)
    {
        $page = DB::table('detail_orders')
            ->join('products', 'detail_orders.products_id', '=', 'products.id')
            ->join('orders', 'orders.id', '=', 'detail_orders.orders_id')
            ->select(
                'products.name',
                'products.id as id_products',
                'products.price',
                'detail_orders.*',
                'orders.*'
            )
            ->where('orders_id', '=', $id)
            ->get();

        $arr = [];
        foreach ($page as $row) {
            $stock = DB::table('stocks')
                ->where('products_id', $row->id_products)
                ->where('size', $row->size)
                ->first();

            $stock = collect($stock);
            $baris = collect($row);
            $gabung = $stock->merge($baris);
            array_push($arr, $gabung);
        }

        $arr = json_decode(json_encode($arr, true));

        // dd(
        //     $arr
        // );

        $pelanggan = DB::table('customers')
            ->join('users', 'customers.users_id', '=', 'users.id')
            ->where('users_id', '=', auth()->user()->id)
            ->get();

        // dd($pelanggan);
        $pdf = PDF::loadview('package.login.biasa.invoicebiasa', [
            'produk' => $arr,
            'pelanggan' => $pelanggan,
            'id' => $id
        ]);
        return $pdf->download('invoice_produk' . $page[0]->id . '.pdf');
    }
}
