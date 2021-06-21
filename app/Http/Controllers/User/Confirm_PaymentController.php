<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\confirm_payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Confirm_PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('package.login.confirm_payment');
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

    public function accpembayaran($id)
    {
        $accpay1 = DB::table('order_customs')
            ->where('id', '=', $id)->update([
                'status_pengerjaan' => 'Selesai',
                'status_pembayaran' => 'Selesai'
            ]);

        $accpay2 = DB::table('confirm_payments')
            ->where('id', '=', $id)->update([
                'proof_of_payment' => 'Selesai'
            ]);
        return redirect('/penjualancustom');
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

            $data = DB::table('order_customs')
                ->where('id', '=', $request->id)->update([
                    'pict_payment' => $nama_file,
                    'confirm_payments_id' => $idconfirm->id,
                    'status_pembayaran' => 'Menunggu Konfirmasi Pembayaran',
                    'status_pengerjaan' => 'Menunggu Konfirmasi Pembayaran'
                ]);

            $tujuan_upload = 'uploads/bukti';
            $file->move($tujuan_upload, $nama_file);

            // dd(
            //     $idconfirm
            // );
            return redirect("/history")->with("info", "Your Request has been created");
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
