<?php

namespace App\Http\Controllers;

// use App\Detail_order;
use App\Models\cart;
use App\Models\detail_order;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Shoping_CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_order = detail_order::with([
            'products'
        ])->get();
        $footer = profile::all()->last();
        $cart = cart::select('id')->count();

        // dd($propinsi);
        return view('pages.shoping_cart', [
            'detail' => $detail_order,
            'cart' => $cart,
            'footer' => $footer
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
        //
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
    
    public function changeQty(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'qty' => 'required',
                'id' => 'required',
                'size' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors());
            }
            if ($request->session()->has("cart_shop_data")) {
                $arr = [];
                $data = $request->session()->get("cart_shop_data");
                $qty = $request->get("qty");
                $id = $request->get("id");
                $size = $request->get("size");
                foreach ($data as $key => $value) {
                    if ($id == $value["products_id"] && $size == $value["size"]) {
                        $value["qty"] = $qty;
                        array_push($arr, $value);
                    } else {
                        array_push($arr, $value);
                    }
                }
                $request->session()->forget("cart_shop_data");
                $request->session()->save();
                $request->session()->put("cart_shop_data", $arr);
                $request->session()->save();
                return response()->json([
                    'status' => true
                ]);
                // return redirect()->route("shoping_cart.index");
            }
        }
    }


}
