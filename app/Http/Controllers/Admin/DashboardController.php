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
        // sampai sini dulu ya gaes
        $month = date('m');

        if($month == 1){
            $bulan = "Januari";
        }else if($month == 2){
            $bulan = "Febuari";
        }else if($month == 3){
            $bulan = "Maret";
        }else if($month == 4){
            $bulan = "April";
        }else if($month == 5){
            $bulan = "Mei";
        }else if($month == 6){
            $bulan = "Juni";
        }else if($month == 7){
            $bulan = "Juli";
        }else if($month == 8){
            $bulan = "Agustus";
        }else if($month == 9){
            $bulan = "September";
        }else if($month == 10){
            $bulan = "Oktober";
        }else if($month == 11){
            $bulan = "November";
        }else{
            $bulan = "Desember";
        }

        $pengeluaran = puchase::whereMonth('date',$month)
        ->sum('total');

        $pemasukkancustom = Order_Custom::where('status_pembayaran','=','Selesai')
        ->whereMonth('date',$month)
        ->sum('total');
        $pemasukkanbiasa = order::where('status','=','Selesai')
        ->whereMonth('date',$month)
        ->sum('total');

        $jmlordercustom = Order_Custom::where('status_pembayaran','=','Selesai')
        ->whereMonth('date',$month)
        ->count('total');
        $jmlorderbiasa = order::where('status','=','Selesai')
        ->whereMonth('date',$month)
        ->count('total');

        $keuntungan = ($pemasukkancustom+$pemasukkanbiasa) - $pengeluaran;
        $pesanan = $jmlordercustom+$jmlorderbiasa;
        // dd($pengeluaran);
        return view ('admin/pages/dashboard',[
            'pengeluaran' => $pengeluaran,
            'pemasukkan' => $pemasukkancustom+$pemasukkanbiasa,
            'keuntungan' => $keuntungan,
            'penjualan_produk' => $jmlorderbiasa,
            'penjualan_custom' => $jmlordercustom,
            'pesanan' => $pesanan,
            'month' => $bulan
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
