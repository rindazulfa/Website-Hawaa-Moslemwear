<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\detail_order;
use App\Models\Discount_Product;
use App\Models\Product;
use App\Models\stock;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with([
            'stok'
        ])
       ->get();
        return view('admin/pages/produk/index', [
            'products' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('pict_1') || $request->hasFile('pict_2') || $request->hasFile('pict_3')) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $dateNow = Carbon::now();

            try {
                // Pict 1
                $file1 = $request->file('pict_1');
                $namaFile1 = $dateNow->year . $dateNow->month . '_' .  $request->get('name')  . '1' . '.' . $file1->getClientOriginalExtension();
                $file1->move('uploads/products', $namaFile1);
            } catch (\Throwable $th) {
                dd($th);
            }

            try {
                // Pict 2
                $file2 = $request->file('pict_2');
                $namaFile2 = $dateNow->year . $dateNow->month . '_' .  $request->get('name')  . '2' . '.' . $file2->getClientOriginalExtension();
                $file2->move('uploads/products', $namaFile2);
            } catch (\Throwable $th) {
                dd($th);
            }

            try {
                // Pict 3
                $file3 = $request->file('pict_3');
                $namaFile3 = $dateNow->year . $dateNow->month . '_' .  $request->get('name')  . '3' . '.' . $file3->getClientOriginalExtension();
                $file3->move('uploads/products', $namaFile3);
            } catch (\Throwable $th) {
                dd($th);
            }
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
            $product = new Product();
            $product->name = $request->get('name');
            $product->price = $request->get('price');
            $product->desc = $request->get('desc');
            $product->size = $size;
            $product->category = $request->get('category');
            $product->pict_1 = $namaFile1;
            $product->pict_2 = $namaFile2;
            $product->pict_3 = $namaFile3;
            $product->save();

        }

        return redirect()->route("produk.index")->with("info", "Product has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = product::findOrFail($id);
        // dd($detail);

        return view('admin.pages.produk.detail', [
            'detail' => $detail
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
        $edit = product::findOrFail($id);
        return view('admin.pages.produk.edit', [
            'edit' => $edit
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
        $product = product::findOrFail($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->desc = $request->get('desc');
        $product->category = $request->get('category');
        $product->size = $request->get('size');
        $product->save();
        if ($request->hasFile('pict_1') || $request->hasFile('pict_2') || $request->hasFile('pict_3')) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $dateNow = Carbon::now();


            if ($request->file('pict_1')) {

                $namaFileLama1 = "uploads/products/" . $product->pict_1;
                File::delete($namaFileLama1);

                try {
                    // Pict 1
                    $file1 = $request->file('pict_1');
                    $namaFile1 = $dateNow->year . $dateNow->month . '_' .  $request->get('name')  . '1' . '.' . $file1->getClientOriginalExtension();
                    $file1->move('uploads/products', $namaFile1);
                    $product->pict_1 = $namaFile1;
                } catch (\Throwable $th) {
                    dd($th);
                }
            }

            if ($request->file('pict_2')) {

                $namaFileLama2 = "uploads/products/" . $product->pict_2;
                File::delete($namaFileLama2);

                try {
                    // Pict 2
                    $file2 = $request->file('pict_2');
                    $namaFile2 = $dateNow->year . $dateNow->month . '_' .  $request->get('name')  . '2' . '.' . $file2->getClientOriginalExtension();
                    $file2->move('uploads/products', $namaFile2);
                    $product->pict_2 = $namaFile2;
                } catch (\Throwable $th) {
                    dd($th);
                }
            }

            if ($request->file('pict_3')) {

                $namaFileLama3 = "uploads/products/" . $product->pict_3;
                File::delete($namaFileLama3);

                try {
                    // Pict 3
                    $file3 = $request->file('pict_3');
                    $namaFile3 = $dateNow->year . $dateNow->month . '_' .  $request->get('name')  . '3' . '.' . $file3->getClientOriginalExtension();
                    $file3->move('uploads/products', $namaFile3);
                    $product->pict_3 = $namaFile3;
                } catch (\Throwable $th) {
                    dd($th);
                }
            }

            $product->save();
        }


        return redirect()->route("produk.index")->with("info","Product has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //cek relasi
        $cekStok = stock::where('products_id',$id)->first();
        $cekDcProduct = Discount_Product::where('products_id', $id)->first();
        $cekDtOrder = detail_order::where('products_id', $id)->first();
        if($cekStok){
            return redirect()->route('product.index')->with("info","Sorry, cant delete this product");
        }
        if($cekDcProduct){
            return redirect()->route('product.index')->with("info","Sorry, cant delete this product");
        }
        if($cekDtOrder){
            return redirect()->route('product.index')->with("info","Sorry, cant delete this product");
        }

        if(!$cekStok && !$cekDcProduct && !$cekDtOrder ){

            $delete = Product::findOrFail($id);
            $namaFileLama1 = "uploads/products/" . $delete->pict_1;
            File::delete($namaFileLama1);
            $namaFileLama2 = "uploads/products/" . $delete->pict_2;
            File::delete($namaFileLama2);
            $namaFileLama3 = "uploads/products/" . $delete->pict_3;
            File::delete($namaFileLama3);
            $delete->delete();
            return redirect()->route('produk.index')->with("info","Product has been deleted");;
        }

    }

    // public function export_excel()
	// {
	// 	return Excel::download(new ProductExport(), 'product.xlsx');
    // }

    // public function cetak_pdf()
    // {
    // 	$product = Product::all();
    // 	$pdf = PDF::loadview('admin.pages.product.pdf',['products'=>$product]);
    // 	return $pdf->download('laporan-product-pdf');
    // }
}
