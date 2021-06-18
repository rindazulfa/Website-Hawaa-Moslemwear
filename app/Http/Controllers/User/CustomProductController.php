<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\Detail_Order_Custom;
use App\Models\Order_Custom;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CustomProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cek = customer::where('users_id', '=', auth()->user()->id)->count();
        // dd($cek);

        if ($cek == 1) {
            // echo 'data ada';
            return view('package.login.custom.customproduct');
        } else {
            // echo 'data tidak ada';
            return view('package.login.custom.customercustomproduct');
        }
    }

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
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $cust_id = customer::where('users_id', '=', auth()->user()->id)
                ->select('id')
                ->get();

            // Order_Custom::create([
            //     'customers_id' => 1,
            //     'date' => $request->date,
            //     'status_pengerjaan' => 'Menunggu Persetujuan Desain'
            // ]);

            $order = new Order_Custom();
            $order->customers_id = $cust_id[0]->id;
            $order->date = $request->get('date');
            $order->status_pengerjaan = 'Menunggu Persetujuan Desain';
            $order->save();

            $id = Order_Custom::all()->last()->id;

            Detail_Order_Custom::create([
                'order_customs_id' => $id,
                'pict_desain' => $nama_file
            ]);
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload, $nama_file);

            // dd(
            //     $cust_id[0]->id,
            //     $id,
            //     $request->date,
            //     auth()->user()->id,
            //     $nama_file
            // );
        } else {
            // do nothing
        }
        return redirect()->route("/history")->with("info", "Your Request has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Order_Custom::findOrFail($id);
        return view('package.login.custom.customproductform',[
            'items' => $items
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
        // return view('package.login.custom.customproductform');
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
        $data = DB::table('detail_order_customs')
        ->where('order_customs_id','=',$id)->update([
            'size' => $request->size,
            'qty' => $request->qty,
            'satuan' => $request->satuan
        ]);

        // $data = DB::table('order_customs')
        // ->where('id','=',$id)->update([
        //     'status_pengerjaan' => 'Menunggu '
        // ]);

        return redirect('/history');
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
