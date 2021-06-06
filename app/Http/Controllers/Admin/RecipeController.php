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
        $items = Recipe::with(['product', 'material'])->get();
        return view('admin.pages.resep.index', [
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
        $items = Product::all();
        $bahan = material::all();
        return view('admin.pages.resep.create', [
            'items' => $items,
            'bahan' => $bahan
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
        $data = $request->all();
        // dd($data);
        
        $bahan = $data['materials_id'];
        $arr_qty = $data['qty'];
        $arr_satuan = $data['satuan'];

        $cekproduk = Product::where('id', $data['products_id'])->count();



        if ($cekproduk > 0) {
            for ($i = 0; $i < count($bahan); $i++) {
                $cekbahan = material::where('id', $bahan[$i])->count();

                if ($cekbahan > 0) {
                    $tambah = Recipe::where('products_id', $data['products_id'])
                        ->where('materials_id', $bahan[$i])->first();
                    if ($tambah) {
                        $tambah->qty =  $arr_qty[$i];
                        $tambah->satuan =  $arr_satuan[$i];
                        $tambah->save();
                        
                    }
                    else {
                        $resep = new Recipe();
                        $resep->materials_id = $bahan[$i];
                        $resep->products_id = $data['products_id'];
                        $resep->qty = $arr_qty[$i];
                        $resep->satuan = $arr_satuan[$i];
                        $resep->save();
                    }

                    // dd($tambah);
                }
            }
        }
        return redirect()->route('resep.index');
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
