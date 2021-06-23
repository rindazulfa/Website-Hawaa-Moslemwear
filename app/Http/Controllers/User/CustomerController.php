<?php

namespace App\Http\Controllers\User;

use App\Models\customer;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = User::where('id','!=',1)->get();
        $items = DB::table('users')
        ->join('customers', 'users.id', '=', 'customers.users_id')
        ->select('users.*', 'customers.*')
        ->get();

        return view('admin/pages/customer/index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('package.login.customercustomproduct');
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

        return redirect('/');
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
        $item = DB::table('users')
        ->join('customers', 'users.id', '=', 'customers.users_id')
        ->select('users.*', 'customers.*')
        ->where('customers.id', '=', $id)
        ->first();

        // dd($item);

        return view('admin.pages.customer.edit', [
            'items' => $item, 
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
        // $data = $request->all()->except(['_token']);
        // dd($data);
        $customer = customer::findOrFail($id);
        dd($customer);
        $customer->address= $request->get("address");
        $customer->city = $request->get("city");
        $customer->province= $request->get("province");
        $customer->phone = $request->get("phone");
        $customer->postal_code = $request->get("postal_code");

        $customer->save();
        dd($customer);
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = customer::find($id);
        $delete->delete();
        return redirect()->route('customer.index');
    }

    public function updateData(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $customer = customer::find($id);
        // $customer = customer::where('id', $id)->first();

        // dd($id);
        $customer->address= $request->get("address");
        $customer->city = $request->get("city");
        $customer->province= $request->get("province");
        $customer->phone = $request->get("phone");
        $customer->postal_code = $request->get("postal_code");

        $customer->save();
        return redirect()->route('customer.index');
    }

    // public function export_excel()
	// {
	// 	return Excel::download(new CustomerExport(), 'customer.xlsx');
    // }

    // public function cetak_pdf()
    // {
    //     $items = User::where('id','!=',1)->get();
    // 	$pdf = PDF::loadview('admin.pages.customer.pdf',['items'=>$items]);
    // 	return $pdf->download('laporan-customer-pdf');
    // }
}
