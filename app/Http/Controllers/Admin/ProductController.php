<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Product;
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
        $product = ModelsProduct::with([
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
        return view('admin.package.product.create');
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

            $product = new Product;
            $product->name = $request->get('name');
            $product->price = $request->get('price');
            $product->desc = $request->get('desc');
            $product->save();

            $picture = new Picture;
            $picture->products_id = $product->id;
            $picture->pict_1 =     $namaFile1;
            $picture->pict_2 =     $namaFile2;
            $picture->pict_3 =     $namaFile3;
            $picture->save();
        }

        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Product::findOrFail($id);
        // dd($detail);

        return view('admin.pages.product.detail', [
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
        $edit = Product::findOrFail($id);
        $picture = Picture::all();
        return view('admin.pages.product.edit', [
            'edit' => $edit,
            'picture' => $picture
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
        $product = Product::findOrFail($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->desc = $request->get('desc');
        $product->save();
        $picture = Picture::where('products_id',$product->id)->first();

        if ($request->hasFile('pict_1') || $request->hasFile('pict_2') || $request->hasFile('pict_3')) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $dateNow = Carbon::now();


            if ($request->file('pict_1')) {

                $namaFileLama1 = "uploads/products/" . $picture->pict_1;
                File::delete($namaFileLama1);

                try {
                    // Pict 1
                    $file1 = $request->file('pict_1');
                    $namaFile1 = $dateNow->year . $dateNow->month . '_' .  $request->get('name')  . '1' . '.' . $file1->getClientOriginalExtension();
                    $file1->move('uploads/products', $namaFile1);
                    $picture->pict_1 = $namaFile1;
                } catch (\Throwable $th) {
                    dd($th);
                }
            }

            if ($request->file('pict_2')) {

                $namaFileLama2 = "uploads/products/" . $picture->pict_2;
                File::delete($namaFileLama2);

                try {
                    // Pict 2
                    $file2 = $request->file('pict_2');
                    $namaFile2 = $dateNow->year . $dateNow->month . '_' .  $request->get('name')  . '2' . '.' . $file2->getClientOriginalExtension();
                    $file2->move('uploads/products', $namaFile2);
                    $picture->pict_2 = $namaFile2;
                } catch (\Throwable $th) {
                    dd($th);
                }
            }

            if ($request->file('pict_3')) {

                $namaFileLama3 = "uploads/products/" . $picture->pict_3;
                File::delete($namaFileLama3);

                try {
                    // Pict 3
                    $file3 = $request->file('pict_3');
                    $namaFile3 = $dateNow->year . $dateNow->month . '_' .  $request->get('name')  . '3' . '.' . $file3->getClientOriginalExtension();
                    $file3->move('uploads/products', $namaFile3);
                    $picture->pict_3 = $namaFile3;
                } catch (\Throwable $th) {
                    dd($th);
                }
            }

            $picture->save();
        }


        return redirect()->route("product.index")->with("info","Product has been updated");
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
        $cekStok = Stok::where('products_id',$id)->first();
        $cekDcProduct = discount_product::where('products_id', $id)->first();
        $cekDtOrder = Detail_order::where('products_id', $id)->first();
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

            $pc = Picture::where('products_id', $id);
            $picture = $pc->first();
            $namaFileLama1 = "uploads/products/" . $picture->pict_1;
            File::delete($namaFileLama1);
            $namaFileLama2 = "uploads/products/" . $picture->pict_2;
            File::delete($namaFileLama2);
            $namaFileLama3 = "uploads/products/" . $picture->pict_3;
            File::delete($namaFileLama3);

            $pc->delete();

            $delete = Product::findOrFail($id);
            $delete->delete();
            return redirect()->route('product.index')->with("info","Product has been deleted");;
        }

    }

    public function export_excel()
	{
		return Excel::download(new ProductExport(), 'product.xlsx');
    }

    public function cetak_pdf()
    {
    	$product = Product::all();
    	$pdf = PDF::loadview('admin.pages.product.pdf',['products'=>$product]);
    	return $pdf->download('laporan-product-pdf');
    }
}
