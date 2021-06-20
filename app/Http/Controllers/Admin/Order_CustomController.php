<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order_Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Order_CustomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = DB::table('order_customs')
            ->join('detail_order_customs', 'detail_order_customs.order_customs_id', '=', 'order_customs.id')
            ->select(
                'order_customs.*',
                'detail_order_customs.*'
            )
            ->get();
        return view('admin/pages/penjualan_custom/index', [
            'page' => $page
        ]);
    }

    public function updsttsdesacc($id)
    {
        $accdes = DB::table('order_customs')
            ->where('id', '=', $id)->update([
                'status_pengerjaan' => 'Menunggu Data Order'
            ]);
        return redirect('/penjualancustom');
    }

    public function updsttsdesden($id)
    {
        $dendes = DB::table('order_customs')
            ->where('id', '=', $id)->update([
                'status_pengerjaan' => 'Ditolak'
            ]);
        return redirect('/penjualancustom');
    }

    public function updsttsharden($id)
    {
        // $denhar = DB::table('order_customs')
        //     ->where('id', '=', $id)->update([
        //         'status_pengerjaan' => 'Ditolak'
        //     ]);
        return redirect('/penjualancustom');
    }

    public function tampileditharga($id)
    {
        $data_penjualan = DB::table('detail_order_customs')
            ->join('order_customs', 'detail_order_customs.order_customs_id', '=', 'order_customs.id')
            ->join('customers', 'customers.id', '=', 'order_customs.customers_id')
            ->where('order_customs_id', '=', $id)
            ->select(
                'order_customs.id',
                'order_customs.date',
                'detail_order_customs.qty',
                'detail_order_customs.size',
                'customers.address'
            )
            ->get();

        // dd(
        //     $id,
        //     $data_penjualan
        // );
        return view('admin/pages/penjualan_custom/create', [
            'data_penjualan' => $data_penjualan
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
        $updhar = DB::table('order_customs')
        ->where('id', '=', $request->id)->update([
            'status_pembayaran' => 'Belum Dibayar',
            'ongkir' => $request->ongkir,
            'total' => $request->total,
            'status_pengerjaan' => 'Menunggu Proses Pembayaran',
            'status_pembayaran' => 'Belum Dibayar'
        ]);

        $updhar2 = DB::table('detail_order_customs')
        ->where('order_customs_id', '=', $request->id)->update([
            'harga' => $request->harga,
            'subtotal' => $request->total
        ]);
        return redirect('/penjualancustom');
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
