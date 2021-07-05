<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\supplier;
use App\Models\material;
use App\Models\puchase;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pembelian = purchase::all();
        $pembelian = DB::table('puchases')
            ->join('materials', 'puchases.materials_id', '=', 'materials.id')
            ->join('suppliers', 'puchases.suppliers_id', '=', 'suppliers.id')
            ->select('puchases.*', 'materials.name as nama_bahan', 'materials.price', 'suppliers.name as nama_sup')
            ->get();

        // dd($pembelian);

        return view('admin/pages/pembelian/index', [
            'pembelian' => $pembelian
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_supplier = supplier::all();
        $data_materials = material::all();
        // dd($data_bahan);
        return view('admin.pages.pembelian.create', [
            'data_supplier' => $data_supplier,
            'data_materials' => $data_materials
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggal = date('y-m-d', strtotime($_POST['date']));

        $puchases = new puchase();
        $puchases->materials_id = $request->get('cbnamabahan');
        $puchases->suppliers_id = $request->get('cbnamasup');
        $puchases->date = $tanggal;
        $puchases->harga = $request->get('harga');
        $puchases->qty = $request->get('jumlah');
        $puchases->satuan = $request->get('satuan');
        $puchases->total = $request->get('total');
        $puchases->keterangan = $request->get('keterangan');
        $puchases->save();

        $stock = material::where('id','=',$request->cbnamabahan)->get();
        if($request->satuan == "m"){
            $stock_bahan = $stock[0]->qty;
            $jumlah = $request->get('jumlah');
            $stok_baru = ($jumlah*100) + $stock_bahan;
            DB::table('materials')->where('id', $request->cbnamabahan)->update([
                'qty' => $stok_baru
            ]);
        }else if($request->satuan == "cm"){
            $stock_bahan = $stock[0]->qty;
            $jumlah = $request->get('jumlah');
            $stok_baru = $jumlah + $stock_bahan;
            DB::table('materials')->where('id', $request->cbnamabahan)->update([
                'qty' => $stok_baru
            ]);
        }else{
            $stock_bahan = $stock[0]->qty;
            $jumlah = $request->get('jumlah');
            $stok_baru = $jumlah + $stock_bahan;
            DB::table('materials')->where('id', $request->cbnamabahan)->update([
                'qty' => $stok_baru
            ]);
        }

        // dd($stock[0]->qty);

        return redirect()->route("pembelian.index")->with("info", "Your Transaction has been saved");
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
        // $data_pembelian = puchase::findOrFail($id);
        $data_pembelian = DB::table('puchases')->where('id', $id)->get();
        // dd($data_pembelian);
        $data_materials = DB::table('materials')->where('id', $data_pembelian[0]->materials_id)->get();
        // dd($data_materials);
        $data_suppliers = DB::table('suppliers')->where('id', $data_pembelian[0]->suppliers_id)->get();


        return view('admin.pages.pembelian.edit', [
            'data_pembelian' => $data_pembelian,
            'data_materials' => $data_materials,
            'data_suppliers' => $data_suppliers
        ]);
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
        $tanggal = date('y-m-d', strtotime($_POST['date']));
        $id = puchase::findOrFail($id);
        // dd($id);
        DB::table('puchases')->where('id', $id->id)->update([
            // 'suppliers_id' => $request->cbnamasup,
            'date' => $tanggal,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route("pembelian.index")->with("info", "Your Transaction has been updated");
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

    // public function export_excel()
	// {
	// 	return Excel::download(new ProductExport(), 'product.xlsx');
    // }

    public function cetak_pdf()
    {
    	$pembelian = DB::table('puchases')
            ->join('materials', 'puchases.materials_id', '=', 'materials.id')
            ->join('suppliers', 'puchases.suppliers_id', '=', 'suppliers.id')
            ->select('puchases.*', 'materials.name as nama_bahan', 'materials.price', 'suppliers.name as nama_sup')
            ->get();
        $total = puchase::sum('total');
    	$pdf = PDF::loadview('admin.pages.pembelian.pdf',[
            'pembelian'=>$pembelian,
            'total' => $total
        ]);
    	return $pdf->download('laporan-pembelian.pdf');
    }
}
