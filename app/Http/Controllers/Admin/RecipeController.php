<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\material;
use App\Models\Product;
use App\Models\Recipe;
use App\Models\stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\all;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = stock::all();
        $items = Recipe::with(['stok', 'material'])->get();
        return view('admin.pages.stok_produk.detail', [
            'produk' => $produk,
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $items = Product::all();
        // $detail = product::findOrFail($id);
        // $resep = Recipe::where('products_id',$detail->id)->first();
        $bahan = material::all();
        return view('admin.pages.resep.create', [
            // 'items' => $items,
            'bahan' => $bahan
        ]);
    }
    //TAMBAH RESEP
    public function form(Request $request, $id)
    {
        $arr_idbahan =[];
        $detail = stock::findOrFail($id); //idstok
        foreach ($detail->resep as $row) {
            // dd($row);
            $arr_idbahan[] = $row->materials_id;
        }
        //$resep = Recipe::where('stocks_id', $detail->id)->first();
        $bahan = material::whereNotIn('id', $arr_idbahan)->get();




        return view('admin.pages.resep.create', [
            // 'items' => $items,
            'bahan' => $bahan,
            'detail' => $detail
        ]);
    }

    //TAMBAH NK DB NE
    public function tambah(Request $request, $id)
    {

        $idproduk = stock::findOrFail($id);
        $arr_produk = $idproduk['stocks_id'];

        $data = $request->all();
        // dd($data);


        
        $arr_bahan = $data['materials_id'];
        // $arr_bahan = array_filter($arr_bahan);
        $arr_qty = $data['qty'];
        // $arr_qty = array_filter($arr_qty);
      
        $arr_satuan = $data['satuan'];
        $arr_satuan = array_filter($arr_satuan);
        $bahankos =[];
        $qtykos =[];
        $satuankos= [];
        foreach ($arr_bahan as $key => $value) {
            if (!empty($value)) {
                array_push($bahankos,$value);

            }
        }
        foreach ($arr_qty as $key => $value) {
            if (!empty($value)) {
                array_push($qtykos,$value);

            }
        }
        foreach ($arr_satuan as $key => $value) {
            if (!empty($value)) {
                array_push($satuankos,$value);

            }
        }

        $arr_bahan=$bahankos;
        $arr_qty = $qtykos;
        $arr_satuan= $satuankos;
        // dd($arr_qty);
        
        

        for ($i = 0; $i < count($arr_bahan); $i++) {
            $cekbahan = material::where('id', $arr_bahan[$i])->count();

            if ($cekbahan > 0) {
                $tambah = Recipe::where('stocks_id', $id)
                    ->where('materials_id', $arr_bahan[$i])->first();
                // dd($tambah);
                if ($tambah) {
                    // $tambah->products_id = $arr_produk[$i];
                    $tambah->qty =  $arr_qty[$i] + $tambah->qty;
                    $tambah->satuan =  $arr_satuan[$i];
                    $tambah->save();
                } else {
                    $resep = new Recipe();
                    $resep->materials_id = $arr_bahan[$i];
                    $resep->stocks_id = $id;
                    $resep->qty = $arr_qty[$i];
                    $resep->satuan = $arr_satuan[$i];
                    $resep->save();
                }

                // dd($tambah);
            }
        }

        return redirect()->route('stok_produk.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
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
        // $detail = product::findOrFail($id);
        // $resep = Recipe::where('stocks_id', $detail->id)->first();
        // $bahan = material::all();

        $detail = Recipe::findOrFail($id); //idstok
        // dd($id);
        
        $bahan = material::where('id', $detail->materials_id)->get();


        return view('admin.pages.resep.edit', [
            // 'items' => $items,
            'bahan' => $bahan,
            'detail' => $detail
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
        // $idproduk = Recipe::findOrFail($id);
        // $arr_produk = $idproduk['stocks_id'];
        $tambah = Recipe::where('id', $id)->first();
        $data = $request->all();
        // dd($data);

        $arr_bahan = $data['materials_id'];
        $arr_qty = $data['qty'];
        $arr_satuan = $data['satuan'];
        $tambah->qty =  $arr_qty;
        $tambah->satuan =  $arr_satuan;
        $tambah->save();
        // $cekproduk = Product::where('id', $data['products_id'])->count();


        return redirect()->route("stok_produk.index")->with("info", "Recipe has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $delete = Recipe::findOrFail($id);
        $delete->delete();
        return redirect()->route('stok_produk.index')->with("info", "Recipe has been deleted");;
    }
}
