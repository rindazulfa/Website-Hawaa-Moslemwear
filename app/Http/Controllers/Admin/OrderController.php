<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\confirm_payment;
use App\Models\detail_order;
use App\Models\order;
use App\Models\Product;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Session\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tampil = DB::table('orders')
        //     ->join('detail_orders', 'detail_orders.orders_id', '=', 'orders.id')
        //     ->join('products', 'detail_orders.products_id', '=', 'products.id')
        //     ->join('discount_customer', 'discount_customer.orders_id', '=', 'orders.id')
        //     ->select(
        //         'orders.id',
        //         'orders.date',
        //         'products.name',
        //         'detail_orders.qty',
        //         'products.price',
        //         'orders.shipping',
        //         'orders.ongkir',
        //         'orders.keterangan',
        //         'orders.status',
        //         'orders.total',
        //         'orders.pict_payment'
        //     )
        //     ->get();
        // return view('admin/pages/penjualan/index',[
        //     'page'=> $tampil
        // ]);

        $order = order::all();
       
        $arr = [];
        foreach ($order as $key => $value) {
         
            $data = json_decode(json_encode($value), true);
            $arr[] = array_merge($data);
        }

        $order = json_decode(json_encode($arr));
        return view('admin.pages.order.index', ['order' => $order]);
    }
    

    // public function addcart(Request $request, $id){
    //     $product = Product::find($id);
    //     $oldCart = Session::has('cart') ? Session::get('cart') : null;
    //     $cart = new Cart($oldCart);
    //     $cart->add($product, $product->id);

    //     $request->session()->put('cart', $cart);
    //     dd($request->session()->get('cart'));
    //     return redirect()->route('shop.index');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $order = Order::findOrFail($id);
        $dtOrder = detail_order::where('orders_id', $id)->get();

        $arr = [];
        foreach ($dtOrder as $key => $value) {
            $pr = Product::find($value->products_id);
            $x['product_name'] = $pr->name;
            $x['shipping'] = $order->shipping;
            $x['ship_date'] = $order->date;
            $data = json_decode(json_encode($value), true);
            $arr[] = array_merge($data, $x);
        }

        $order = json_decode(json_encode($arr));
        return view("admin.pages.order.detail", ['order' => $order]);
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
    public function destroy(Request $request,$id)
    {
        if ($request->ajax()) {
            // $cek = discount_customer::where('orders_id', $id)->delete();
            $delOrder = Order::where('id', $id);
            $data = $delOrder->first();
            if ($data) {
                if ($data->pict_payment != null) {
                    $namaFileLama1 = "uploads/confirm/" . $data->pict_payment;
                    File::delete($namaFileLama1);
                }
            }
            $delOrder->delete();
            $delConfirm = confirm_payment::where('orders_id', $id)->delete();
            return response()->json([
                'status' => true
            ]);
        }
    }
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $order = Order::find($request->get('id'));
            $order->status = $request->get("status");
            $order->save();

            return response()->json([
                'status' => $request->get("status")
            ]);
        }
    }
}
