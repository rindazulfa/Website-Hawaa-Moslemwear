<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\confirm_payment;
use App\Models\customer;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('package.login.checkout');
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
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_file = time() . "_" . $file->getClientOriginalName();

            confirm_payment::create([
                'payment_purpose' => $request->cbnamabank,
                'transfer_date' => $request->date,
                'transfer_amount' => $request->amount,
                'proof_of_payment' => 'Menunggu Konfirmasi Pembayaran',
                'description' => $request->description
            ]);

            $idconfirm = confirm_payment::all()->last();

            $data = DB::table('orders')
                ->where('id', '=', $request->id)->update([
                    'pict_payment' => $nama_file,
                    'confirm_payments_id' => $idconfirm->id,
                    'status' => 'Menunggu Konfirmasi Pembayaran',
                    'shipping' => $request->cbnamashipping,
                    'keterangan' => $request->description
                ]);

            $tujuan_upload = 'uploads/bukti';
            $file->move(public_path($tujuan_upload), $nama_file);
            

            // dd(
            //     $idconfirm
            // );

            return redirect("/riwayat")->with("info", "Your Request has been created");
        } else {
            // do nothing
        }
        return redirect("/")->with("info", "Your Request has been created");
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
        $total = DB::table('orders')
            ->select('total')
            ->where('id', '=', $id)
            ->get();

        $data = DB::table('orders')
            ->where('id', '=', $id)
            ->get();

        $ship = Shipping::all();

        $idcust = customer::select('id')
            ->where('users_id', '=', auth()->user()->id)
            ->get();

        $cart = Cart::select('id')
            ->where('customers_id', '=', $idcust[0]->id)
            ->count();

        // dd(
        //     $total,
        //     $data
        // );

        $nomorhp = DB::table('profiles')->first();

        $payment = DB::table('payments')->get();

        return view('package.login.biasa.bayar', [
            'total' => $total,
            'payment' => $payment,
            'data' => $data,
            'cart' => $cart,
            'ship' => $ship,
            'nomor' => $nomorhp
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
