<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use PDF;
use App\Models\cart;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryCustomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cekcust = DB::table('customers')
            ->select('id')
            ->where('users_id', '=', auth()->user()->id)
            ->count();

        // dd(
        //     $cek,
        //     $cust_id[0]->id
        // );

        if ($cekcust == 0) {
            // Data Cust tidak ada masuk ke custom product
            
            return redirect('/');
        } else {
            $cust_id = DB::table('customers')
                ->where('users_id', '=', auth()->user()->id)
                ->get();

            $idcust = customer::select('id')
                ->where('users_id', '=', auth()->user()->id)
                ->get();

            $cart = cart::select('id')
                ->where('customers_id', '=', $idcust[0]->id)
                ->count();

            $cekjmlcus = DB::table('order_customs')
                ->join('customers', 'customers.id', '=', 'order_customs.customers_id')
                ->join('users', 'users.id', '=', 'customers.users_id')
                ->where('customers_id', '=', $cust_id[0]->id)
                ->select('order_customs.*', 'users.first_name')
                ->count();

            $cek = DB::table('order_customs')
                ->join('customers', 'customers.id', '=', 'order_customs.customers_id')
                ->join('users', 'users.id', '=', 'customers.users_id')
                ->where('customers_id', '=', $cust_id[0]->id)
                ->select('order_customs.*', 'users.first_name')
                ->get();

            $nomorhp = DB::table('profiles')->first();

            if ($cekjmlcus == 0) {
                return redirect('/');
            } else {
                return view('package.login.historycustom', [
                    'cek' => $cek,
                    'cart' => $cart,
                    'data' => $nomorhp
                ]);
            }
        }
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
        // dd($request->all());
        
        customer::create([
            'users_id' => auth()->user()->id,
            'address' => $request->address,
            'city' => $request->city,
            'province' => $request->province,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'postal_code' => $request->postal,
            'phone' => $request->phone
        ]);

        return redirect('/custom');
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

    public function cetak_pdf($id)
    {
        $page = DB::table('detail_order_customs')
            ->join('order_customs', 'order_customs.id', '=', 'detail_order_customs.order_customs_id')
            ->select(
                'order_customs.*',
                'detail_order_customs.*'
            )
            ->where('order_customs_id','=',$id)
            ->get();
        
        // dd($page);
        
        $pelanggan = DB::table('customers')
        ->join('users','customers.users_id','=','users.id')
        ->where('users_id','=', auth()->user()->id)
        ->get();

        // dd($pelanggan);
        $pdf = PDF::loadview('package.login.custom.invoicecustom', [
            'custom' => $page,
            'pelanggan' => $pelanggan
        ]);
        return $pdf->download('invoice_custom'.$page[0]->id.'.pdf');
    }
}
