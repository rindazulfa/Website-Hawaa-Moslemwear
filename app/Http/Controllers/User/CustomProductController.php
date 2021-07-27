<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\confirm_payment;
use App\Models\customer;
use App\Models\Detail_Order_Custom;
use App\Models\Order_Custom;
use App\Models\Shipping;
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
            $idcust = customer::select('id')
                ->where('users_id', '=', auth()->user()->id)
                ->get();

            $cart = cart::select('id')
                ->where('customers_id', '=', $idcust[0]->id)
                ->count();

            return view('package.login.custom.customproduct', [
                'cart' => $cart
            ]);
        } else {
            return view('package.login.custom.customercustomproduct', [
                'cart' => 0
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

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
        return redirect("/history")->with("info", "Your Request has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cek = customer::where('users_id', '=', auth()->user()->id)->count();
        $items = Order_Custom::findOrFail($id);
        $ship = Shipping::all();
        if ($cek == 1) {
            // echo 'data ada';
            $idcust = customer::select('id')
                ->where('users_id', '=', auth()->user()->id)
                ->get();

            $cart = cart::select('id')
                ->where('customers_id', '=', $idcust[0]->id)
                ->count();

            
            return view('package.login.custom.customproductform', [
                'items' => $items,
                'ship' => $ship,
                'cart' => $cart
            ]);
        } else {
            return view('package.login.custom.customproductform', [
                'items' => $items,
                'ship' => $ship,
                'cart' => 0
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $total = DB::table('order_customs')
            ->select('total')
            ->where('id', '=', $id)
            ->get();

        $data = DB::table('order_customs')
            ->where('id', '=', $id)
            ->get();

        $idcust = customer::select('id')
            ->where('users_id', '=', auth()->user()->id)
            ->get();

        $cart = cart::select('id')
            ->where('customers_id', '=', $idcust[0]->id)
            ->count();

        $nomorhp = DB::table('profiles')->first();

        $payment = DB::table('payments')->get();

        // dd(
        //     $nomorhp->telepon
        // );

        return view('package.login.custom.custombayar', [
            'total' => $total,
            'payment' => $payment,
            'data' => $data,
            'cart' => $cart,
            'nomor' => $nomorhp
        ]);
    }

    // public function simpanbayar(Request $request)
    // {

    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datadetail = DB::table('detail_order_customs')
            ->where('order_customs_id', '=', $id)->update([
                'size' => $request->size,
                'qty' => $request->qty,
                'satuan' => $request->satuan
            ]);

        $dataorder = DB::table('order_customs')
            ->where('id', '=', $id)->update([
                'keterangan' => $request->keterangan,
                'shipping' => $request->cbnamashipping,
                'status_pengerjaan' => 'Menunggu Harga'
            ]);

        // $data = DB::table('order_customs')
        // ->where('id','=',$id)->update([
        //     'status_pengerjaan' => 'Menunggu '
        // ]);

        return redirect('/history');
    }

    public function updsttsden($id)
    {
        $dendes = DB::table('order_customs')
            ->where('id', '=', $id)->update([
                'status_pengerjaan' => 'Ditolak',
                'status_pembayaran' => 'Ditolak',
            ]);
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
        $delete = Order_Custom::findOrFail($id);
        $delete->delete();
        return redirect('/history');
    }
}
