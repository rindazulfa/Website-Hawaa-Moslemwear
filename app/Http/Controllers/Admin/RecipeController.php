<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\material;
use App\Models\Product;
use App\Models\Recipe;
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
        $produk = Product::all();
        $items = Recipe::with(['product', 'material'])->get();
        return view('admin.pages.resep.index', [
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

    public function form(Request $request, $id)
    {

        $detail = product::findOrFail($id);
        $resep = Recipe::where('products_id', $detail->id)->first();
        $bahan = material::all();
        return view('admin.pages.resep.create', [
            // 'items' => $items,
            'bahan' => $bahan,
            'detail' => $detail
        ]);
    }


    public function tambah(Request $request, $id)
    {

        $idproduk = Product::findOrFail($id);
        $arr_produk = $idproduk['products_id'];

        $data = $request->all();
        // dd($data);

        $arr_bahan = $data['materials_id'];
        $arr_qty = $data['qty'];
        $arr_satuan = $data['satuan'];

        // $cekproduk = Product::where('id', $data['products_id'])->count();

        for ($i = 0; $i < count($arr_bahan); $i++) {
            $cekbahan = material::where('id', $arr_bahan[$i])->count();

            if ($cekbahan > 0) {
                $tambah = Recipe::where('products_id', $id)
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
                    $resep->products_id = $id;
                    $resep->qty = $arr_qty[$i];
                    $resep->satuan = $arr_satuan[$i];
                    $resep->save();
                }

                // dd($tambah);
            }
        }

        return redirect()->route('produk.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $idproduk = Product::findOrFail($id);
        // $arr_produk = $idproduk['products_id'];

        $data = $request->all();
        // dd($data);

        $arr_bahan = $data['materials_id'];
        $arr_qty = $data['qty'];
        $arr_satuan = $data['satuan'];

        // $cekproduk = Product::where('id', $data['products_id'])->count();

        for ($i = 0; $i < count($arr_bahan); $i++) {
            $cekbahan = material::where('id', $arr_bahan[$i])->count();

            if ($cekbahan > 0) {
                $tambah = Recipe::where('products_id', $data['products_id'])
                    ->where('materials_id', $arr_bahan[$i])->first();
                dd($tambah);
                if ($tambah) {
                    // $tambah->id = $arr_produk[$i];
                    $tambah->qty =  $arr_qty[$i];
                    $tambah->satuan =  $arr_satuan[$i];
                    $tambah->save();
                } else {
                    $resep = new Recipe();
                    $resep->materials_id = $arr_bahan[$i];
                    $resep->products_id = $data['products_id'];
                    $resep->qty = $arr_qty[$i];
                    $resep->satuan = $arr_satuan[$i];
                    $resep->save();
                }

                // dd($tambah);
            }
        }

        return redirect()->route('produk.index');
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
        $detail = product::findOrFail($id);
        $resep = Recipe::where('products_id', $detail->id)->first();
        $bahan = material::all();
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
        $idproduk = Product::findOrFail($id);
        $arr_produk = $idproduk['products_id'];

        $data = $request->all();
        // dd($data);

        $arr_bahan = $data['materials_id'];
        $arr_qty = $data['qty'];
        $arr_satuan = $data['satuan'];

        // $cekproduk = Product::where('id', $data['products_id'])->count();

        for ($i = 0; $i < count($arr_bahan); $i++) {
            $cekbahan = material::where('id', $arr_bahan[$i])->count();

            if ($cekbahan > 0) {
                $tambah = Recipe::where('products_id', $id)
                    ->where('materials_id', $arr_bahan[$i])->first();
                // dd($tambah);
                if ($tambah) {
                    // $tambah->products_id = $arr_produk[$i];
                    $tambah->qty =  $arr_qty[$i];
                    $tambah->satuan =  $arr_satuan[$i];
                    $tambah->save();
                } else {
                    $resep = new Recipe();
                    $resep->materials_id = $arr_bahan[$i];
                    $resep->products_id = $id;
                    $resep->qty = $arr_qty[$i];
                    $resep->satuan = $arr_satuan[$i];
                    $resep->save();
                }

                // dd($tambah);
            }
        }

        return redirect()->route("produk.index")->with("info", "Recipe has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Recipe::findOrFail($id);
        $delete->delete();
        return redirect()->route('produk.index')->with("info", "Recipe has been deleted");;
    }
}
