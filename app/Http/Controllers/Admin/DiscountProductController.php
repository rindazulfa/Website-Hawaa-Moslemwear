<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\discount;
use App\Models\Discount_Customer;
use App\Models\Discount_Product;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscountProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discount_product = Discount_Product::all();

        $arr = [];
        foreach ($discount_product as $key => $value) {
            $discount = discount::find($value->discounts_id);
            $product = Product::find($value->products_id);
            $x["id"] = $value->id;
            $x["name"] = $product->name;
            $x["price"] = $product->price;
            $x["name_disc"] = $discount->name_disc;
            $x["discount"] = $discount->discount;
            $x["status"] = $discount->status;
            array_push($arr, $x);
        }

        $arr = json_decode(json_encode($arr));

        return view('admin.pages.discount_product.index', ['data' => $arr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $discount = discount::all();
        return view('admin.pages.discount_product.create', ['product' => $product, 'discount' => $discount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product' => 'required',
            'discount' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            $pd = new Discount_Product();
            $pd->products_id = $request->get('product');
            $pd->discounts_id = $request->get('discount');
            $pd->save();
            return redirect()->route('discount_product.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $findData = Discount_Product::find($id);
        $cekDisc = Discount_Customer::where("discounts_id", $findData->discounts_id)->count();
        if ($cekDisc > 0) {
            return redirect()->back();
        } else {
            $deleteData = Discount_Product::find($id)->delete();
            return redirect()->back();
        }
    }
    // public function export_excel()
	// {
	// 	return Excel::download(new DiscountProductExport(), 'discount_product.xlsx');
    // }

    // public function cetak_pdf()
    // {
    //     $discount_product = product_discount::all();

    //     $arr = [];
    //     foreach ($discount_product as $key => $value) {
    //         $discount = Discount::find($value->discounts_id);
    //         $product = Product::find($value->products_id);
    //         $x["id"] = $value->id;
    //         $x["name"] = $product->name;
    //         $x["price"] = $product->price;
    //         $x["name_disc"] = $discount->name_disc;
    //         $x["discount"] = $discount->discount;
    //         $x["status"] = $discount->status;
    //         array_push($arr, $x);
    //     }

    //     $arr = json_decode(json_encode($arr));
    // 	$pdf = PDF::loadview('admin.pages.discount_product.pdf',['items'=>$arr]);
    // 	return $pdf->download('laporan-discount-product-pdf');
    // }
}
