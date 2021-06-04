<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StokProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = stock::with(['product'])->get();
        return view('admin.pages.stok_produk.index', [
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
        return view('admin.pages.stok_produk.create', [
            'items' => $items
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
        if ($request->get('size') == 'S') {
            $size = 'S';
        } elseif ($request->get('size') == 'M') {
            $size = 'M';
        } elseif ($request->get('size') == 'L') {
            $size = 'L';
        } elseif ($request->get('size') == 'XL') {
            $size = 'XL';
        } elseif ($request->get('size') == 'XXL') {
            $size = 'XXL';
        }

        $item = Product::findOrFail($data['products_id']); //mencari id produk yg diinputkan

        $cekproduk = Product::where('id',$data['products_id'])->count();
        $ceksize = stock::where('products_id',$data['products_id'])
        ->where('size',$data['size'])->count();

        if ($cekproduk > 0) {
            if ($ceksize >0) {
                $update = stock::where('products_id',$data['products_id'])
                ->where('size',$data['size'])->first();
                $stokk =  $request->get('stok');
                $update->stok = $update->stok + $stokk;
                $update->save();
            }
            else {
                $data['size'] = $size;
                stock::create($data);
            }
        }
        return redirect()->route('stok_produk.index');
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
        $edit = stock::findOrFail($id);
        $product = Product::find($edit->products_id);
        // $stok = stock::find($edit->products_id);
        return view('admin.pages.stok_produk.edit', [
            'edit' => $edit,
            'product' => $product,
            // 'stok' =>$stok
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
        $validator = Validator::make($request->all(),[
            'qty' => 'required|integer'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $stok = stock::find($id);
            $stok->qty = $request->get("qty");
            $stok->save();

            return redirect()->route("stok_produk.index")->with('info','Stok has been updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = stock::findOrFail($id);
        $delete->delete();
        return redirect()->route('stok_produk.index');
    }
}
