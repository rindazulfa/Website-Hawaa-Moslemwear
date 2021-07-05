<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\material;
use App\Models\Production;
use App\Models\Recipe;
use PDF;
use App\Models\stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $page = Production::all();
        $page = DB::table('productions')
            ->join('recipes', 'productions.recipes_id', '=', 'recipes.id')
            ->join('stocks', 'recipes.stocks_id', '=', 'stocks.id')
            ->join('products', 'stocks.products_id', '=', 'products.id')
            ->select('productions.*', 'products.name', 'stocks.size')
            ->get();
        return view('admin/pages/produksi/index', ['page' => $page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Recipe::select('stocks_id')
            ->distinct()->get();
        // dd($id);
        return view('admin/pages/produksi/create', [
            'items' => $items
        ]);
        // return view('admin/pages/produksi/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Update Stok
        $stok = stock::findorFail($request->id_stock);
        $stok->qty = $stok->qty + $request->qty;
        $stok->save();

        //Update Bahan Baku
        $resep = Recipe::where('stocks_id', $request->id_stock)->get();
        foreach ($resep as $key => $value) {
            $bahan = material::findorFail($value->materials_id);
            $bahan->qty = $bahan->qty - ($value->qty * $request->qty );
            $bahan->save();
        }

        Production::create([
            'recipes_id' => $request->id_stock,
            'stocks_id' => $stok->products_id,
            'qty' => $request->qty,
            'date' => $request->date
        ]);


        // Ambil resep
        // $ambilbahan = DB::table('recipes')
        //     ->where('stocks_id', '=', $request->id_stock)
        //     ->select('materials_id', 'qty')
        //     ->get();

        // Ambil data bahan + stok
        // $databahan = [];
        // $jumlahbahan = [];
        // $ambilstockbahan = [];
        // $jumlahproduksi = $request->qty;

        // for ($i = 0; $i < sizeof($ambilbahan); $i++) {
        //     $databahan[$i] = $ambilbahan[$i]->materials_id;
        //     $jumlahbahan[$i] = $ambilbahan[$i]->qty * $jumlahproduksi;
        // $data = DB::table('materials')
        // $ambilstockbahan[$i] = DB::table('materials')
        //     ->where('id', '=', $databahan[$i])
        //     ->select('id', 'qty')
        //     ->get();
        // $ambilstockbahan[$i] =  $data;
        // }

        // Pengurangan stok bahan
        $stoksekarang = [];

        // for ($i = 0; $i < sizeof($ambilbahan); $i++) {
        // $stoksekarang[$i] = $ambilstockbahan[$i]->qty - $jumlahbahan[$i];
        // }

        // $id_produk = stock::select('products_id')
        // ->where('id',$request->id_stock)
        // ->get();

        // Production::create([
        //     'recipes_id' => $request->id_stock,
        //     'stocks_id' => $id_produk[0]->products_id,
        //     'qty' => $request->qty,
        //     'date' => $request->date
        // ]);

        // dd(
        //     $request->date,
        //     $request->qty,
        //     $request->id_stock,
        //     $ambilbahan,
        //     sizeof($ambilbahan),
        //     $databahan,
        //     $jumlahbahan,
        //     $ambilstockbahan[0]->qty,
        //     $stoksekarang,
        //     $id_produk[0]->products_id
        // );

        return redirect()->route("produksi.index")->with("info", "Your Transaction has been saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $ambil = DB::table('stocks')
        // ->where('id','=',$id)
        // ->get();

        $id_stok = $id;
        // dd(
        //     $id,
        //     $id_produk,
        //     $id_stok
        // );

        return view('admin/pages/produksi/create', [
            'id_stok' => $id_stok,
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
        $page = Production::findOrFail($id);
        // $data_produksi = Production::where('id',$id)->get();

        return view('admin.pages.produksi.edit', [
            'page' => $page
            // 'data_produksi' => $data_produksi
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
        // DB::table('production')->where('id', $id)->update([
        // gatau mau update apa
        // ]);

        return redirect()->route("produksi.index")->with("info", "Your Transaction has been updated");
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

    public function cetak_pdf()
    {
    	$page = DB::table('productions')
            ->join('recipes', 'productions.recipes_id', '=', 'recipes.id')
            ->join('stocks', 'recipes.stocks_id', '=', 'stocks.id')
            ->join('products', 'stocks.products_id', '=', 'products.id')
            ->select('productions.*', 'products.name', 'stocks.size')
            ->get();
        $total = Production::sum('id');
    	$pdf = PDF::loadview('admin.pages.produksi.pdf',[
            'produksi'=>$page,
            'total' => $total
        ]);
    	return $pdf->download('laporan-produksi.pdf');
    }
}
