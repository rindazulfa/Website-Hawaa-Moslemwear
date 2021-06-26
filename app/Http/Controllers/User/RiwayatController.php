<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
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

            $cekjmlcus = DB::table('orders')
                ->where('customers_id', '=', $cust_id[0]->id)
                ->count();

            $cek = DB::table('orders')
                ->join('customers', 'customers.id', '=', 'orders.customers_id')
                ->join('users', 'users.id', '=', 'customers.users_id')
                ->where('customers_id', '=', $cust_id[0]->id)
                ->select('orders.*', 'users.first_name')
                ->get();

            if ($cekjmlcus == 0) {
                return redirect('/');
            } else {
                return view('package.login.biasa.history', [
                    'cek' => $cek,
                    'cart' => $cart
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
}
