<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order_Custom;
use PDF;
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
                'order_customs.date as tanggals',
                'detail_order_customs.*',
                'detail_order_customs.date as tanggal'
            )
            ->get();

            // dd(
            //     $page
            // );

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
                'status_pengerjaan' => 'Ditolak',
                'status_pembayaran' => 'Ditolak',
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

    public function tampiltanggalpengiriman($id)
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

        return view('admin/pages/penjualan_custom/tanggal', [
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
        $page = DB::table('detail_order_customs')
            ->join('order_customs', 'order_customs.id', '=', 'detail_order_customs.order_customs_id')
            ->select(
                'order_customs.*',
                'order_customs.date as tanggals',
                'detail_order_customs.*'
            )
            ->where('order_customs_id','=',$id)
            ->get();
        
        // dd($page);
        
        $pelanggan = DB::table('customers')
        ->join('users','customers.users_id','=','users.id')
        ->where('users_id','=', auth()->user()->id)
        ->get();

        return view('admin/pages/penjualan_custom/detail', [
            'produk' => $page,
            'pelanggan' => $pelanggan
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
        $updtanggal = DB::table('detail_order_customs')
            ->where('order_customs_id', '=', $request->id)->update([
                'date' => $request->tglpengiriman
            ]);

        return redirect('/penjualancustom');
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

    public function cetak_pdf(Request $request)
    {
        $tglawal = $request->get('tglawal');
        $tglakhir = $request->get('tglakhir');
        $jumlahtransaksi = DB::table('order_customs')
            ->where('status_pengerjaan', '=', 'Selesai')
            ->count();

        $periode1 = 'All';
        $periode2 = $tglakhir;

        // dd(
        //     $tglakhir,
        //     $tglawal
        // );

        if (!isset($tglawal) && isset($tglakhir)) {
            $page = DB::table('order_customs')
                ->join('detail_order_customs', 'detail_order_customs.order_customs_id', '=', 'order_customs.id')
                ->join('customers', 'customers.id', '=', 'order_customs.customers_id')
                ->join('users', 'users.id', '=', 'customers.users_id')
                ->select(
                    'order_customs.*',
                    'detail_order_customs.*',
                    'users.first_name'
                )
                ->where('order_customs.date', '<=', $tglakhir)
                ->get();

            $jumlahtransaksi = DB::table('order_customs')
                ->where('status_pengerjaan', '=', 'Selesai')
                ->where('order_customs.date', '<=', $tglakhir)
                ->count();

            $periode1 = $tglawal;
            $periode2 = $tglakhir;

            // $jmlkirim = DB::table('order_customs')
            //     ->join('detail_order_customs', 'detail_order_customs.order_customs_id', '=', 'order_customs.id')
            //     ->join('customers', 'customers.id', '=', 'order_customs.customers_id')
            //     ->join('users', 'users.id', '=', 'customers.users_id')
            //     ->select(
            //         'order_customs.*',
            //         'detail_order_customs.*',
            //         'users.first_name'
            //     )
            //     ->where('order_customs.date', '<=', $tglakhir)
            //     ->where('','=','')
            //     ->count();

            $total = Order_Custom::where('order_customs.date', '<=', $tglakhir)
                ->sum('total');
        } else if (!isset($tglakhir) && isset($tglawal)) {
            $page = DB::table('order_customs')
                ->join('detail_order_customs', 'detail_order_customs.order_customs_id', '=', 'order_customs.id')
                ->join('customers', 'customers.id', '=', 'order_customs.customers_id')
                ->join('users', 'users.id', '=', 'customers.users_id')
                ->select(
                    'order_customs.*',
                    'detail_order_customs.*',
                    'users.first_name'
                )
                ->where('order_customs.date', '>=', $tglawal)
                ->get();

            $jumlahtransaksi = DB::table('order_customs')
                ->where('status_pengerjaan', '=', 'Selesai')
                ->where('order_customs.date', '>=', $tglawal)
                ->count();

            $periode1 = $tglawal;
            $periode2 = $tglakhir;

            $total = Order_Custom::where('order_customs.date', '>=', $tglawal)
                ->sum('total');
        } else if (!isset($tglawal) && !isset($tglakhir)) {
            $page = DB::table('order_customs')
                ->join('detail_order_customs', 'detail_order_customs.order_customs_id', '=', 'order_customs.id')
                ->join('customers', 'customers.id', '=', 'order_customs.customers_id')
                ->join('users', 'users.id', '=', 'customers.users_id')
                ->select(
                    'order_customs.*',
                    'detail_order_customs.*',
                    'users.first_name'
                )
                ->get();

            $jumlahtransaksi = DB::table('order_customs')
                ->where('status_pengerjaan', '=', 'Selesai')
                ->count();

            $periode1 = $tglawal;
            $periode2 = $tglakhir;

            $total = Order_Custom::sum('total');
        } else {
            $page = DB::table('order_customs')
                ->join('detail_order_customs', 'detail_order_customs.order_customs_id', '=', 'order_customs.id')
                ->join('customers', 'customers.id', '=', 'order_customs.customers_id')
                ->join('users', 'users.id', '=', 'customers.users_id')
                ->select(
                    'order_customs.*',
                    'detail_order_customs.*',
                    'users.first_name'
                )
                ->where('order_customs.date', '>=', $tglawal)
                ->where('order_customs.date', '<=', $tglakhir)
                ->get();

            $jumlahtransaksi = DB::table('order_customs')
                ->where('status_pengerjaan', '=', 'Selesai')
                ->where('order_customs.date', '>=', $tglawal)
                ->where('order_customs.date', '<=', $tglakhir)
                ->count();

            $periode1 = $tglawal;
            $periode2 = $tglakhir;

            $total = Order_Custom::where('order_customs.date', '<=', $tglakhir)
                ->where('order_customs.date', '>=', $tglawal)
                ->sum('total');
        }

        // $page = DB::table('order_customs')
        //     ->join('detail_order_customs', 'detail_order_customs.order_customs_id', '=', 'order_customs.id')
        //     ->select(
        //         'order_customs.*',
        //         'detail_order_customs.*'
        //     )
        //     ->get();
        // $total = Order_Custom::sum('total');

        $pdf = PDF::loadview('admin.pages.penjualan_custom.pdf', [
            'custom' => $page,
            'total' => $total,
            'periode1' => $periode1,
            'periode2' => $periode2,
            'jumlahtransaksi' => $jumlahtransaksi
        ]);
        return $pdf->download('laporan-penjualan_custom-' . $periode1 . ' - ' . $periode2 . '.pdf');
    }
}
