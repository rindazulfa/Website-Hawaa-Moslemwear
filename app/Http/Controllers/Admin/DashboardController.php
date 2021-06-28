<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\Order_Custom;
use App\Models\puchase;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaran = puchase::sum('total');

        $pemasukkancustom = Order_Custom::sum('total');
        $pemasukkanbiasa = order::sum('total');

        $jmlordercustom = Order_Custom::count('total');
        $jmlorderbiasa = order::count('total');

        $keuntungan = ($pemasukkancustom+$pemasukkanbiasa) - $pengeluaran;
        $pesanan = $jmlordercustom+$jmlorderbiasa;
        // dd($pengeluaran);
        return view ('admin/pages/dashboard',[
            'pengeluaran' => $pengeluaran,
            'pemasukkancustom' => $pemasukkancustom,
            'keuntungan' => $keuntungan,
            'jmlordercustom' => $pesanan
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
        //
    }
}
