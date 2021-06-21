<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        $cust_id = DB::table('customers')
            ->where('users_id', '=', auth()->user()->id)
            ->get();

        $cek = DB::table('order_customs')
            ->join('customers', 'customers.id', '=', 'order_customs.customers_id')
            ->join('users', 'users.id', '=', 'customers.users_id')
            ->where('customers_id', '=', $cust_id[0]->id)
            ->select('order_customs.*', 'users.first_name')
            ->get();

        // dd(
        //     $cek,
        //     $cust_id[0]->id
        // );
        // return view('package.login.historycustom',[
        //     'cek' => $cek
        // ]);

        if (empty($cek)) {
            return redirect('/');
        } else {
            return view('package.login.historycustom', [
                'cek' => $cek
            ]);
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
        customer::create([
            'users_id' => auth()->user()->id,
            'address' => $request->address,
            'city' => $request->city,
            'province' => $request->province,
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
}
