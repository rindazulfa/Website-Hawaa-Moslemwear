<?php

namespace App\Http\Controllers\User;

use App\Models\customer;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\product;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            ->select(
                'users.first_name',
                'users.email',
                'users.last_name',
                'customers.*'
                )
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
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
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
        $items = DB::table('users')
            ->join('customers', 'users.id', '=', 'customers.users_id')
            ->select(
                'users.first_name',
                'users.email',
                'users.last_name',
                'customers.*'
                )
            ->where('customers.id','=',$id)
            ->get();

        return view('admin/pages/customer/detail', [
            'pelanggan' => $items,
            'id' => $id
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
        $item = DB::table('customers')
            ->join('users', 'users.id', '=', 'customers.users_id')
            ->select('users.*', 'customers.*')
            ->where('users_id', '=', auth()->user()->id)
            ->get();

        $product = product::with(['stok'])->get();
        $footer = profile::all()->last();

        if (Auth::check()) {
            $product = DB::table('products')
                ->select('products.*')
                ->join('stocks', 'stocks.products_id', '=', 'products.id')
                ->where('stocks.qty', '>', 0)
                ->distinct()
                ->get();
            $cek = customer::select('id')
                ->where('users_id', '=', auth()->user()->id)
                ->count();

            if ($cek == 0) {
                return view('package.login.biasa.customerform', [
                    'shop' => $product,
                    'cart' => 0,
                    'footer' => $footer,
                    'items' => $item

                ]);
            } else {
                $product = DB::table('products')
                    ->select('products.*')
                    ->join('stocks', 'stocks.products_id', '=', 'products.id')
                    ->where('stocks.qty', '>', 0)
                    ->distinct()
                    ->get();
                $idcust = customer::select('id')
                    ->where('users_id', '=', auth()->user()->id)
                    ->get();

                $cart = Cart::select('id')
                    ->where('customers_id', '=', $idcust[0]->id)
                    ->count();

                return view('package.login.customer.customer', [
                    'shop' => $product,
                    'cart' => $cart,
                    'footer' => $footer,
                    'items' => $item
                ]);
            }
        } else {
            return view('package.login.customer.customer', [
                'shop' => $product,
                'cart' => 0,
                'footer' => $footer,
                'items' => $item
            ]);
        }

        // dd($item);

        // return view('package.login.customer.customer', [
        //     'items' => $item
        // ]);

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
        // dd($id);

        $customer = customer::findOrFail($id);
        // dd($customer);
        $customer->address = $request->get("address");
        $customer->city = $request->get("city");
        $customer->province = $request->get("province");
        $customer->kelurahan = $request->get("kelurahan");
        $customer->kecamatan = $request->get("kecamatan");
        $customer->phone = $request->get("phone");
        $customer->postal_code = $request->get("postal");

        $customer->save();
        // dd($customer);
        return redirect()->route('index');
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
        $customer->address = $request->get("address");
        $customer->city = $request->get("city");
        $customer->province = $request->get("province");
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
