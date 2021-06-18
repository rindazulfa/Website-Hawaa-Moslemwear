<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan = payment::all();
        return view('admin/pages/payment/index', [
            'items' => $bahan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/payment/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'bank' => 'required',
            'no_rekening' => 'required',
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $page = new payment();
            $page->bank= $request->get("bank");
            $page->no_rekening = $request->get("no_rekening");
            $page->name= $request->get("name");
            $page->save();

            return redirect()->route("payment.index")->with("info", "Payments has been created");
        }
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
        $edit = payment::findOrFail($id);
        
        return view('admin.pages.payment.edit', [
            'edit' => $edit
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
        $page = payment::findOrFail($id);
            $page->bank= $request->get("bank");
            $page->no_rekening = $request->get("no_rekening");
            $page->name= $request->get("name");
            $page->save();

            return redirect()->route("payment.index")->with("info", "Payments has been created");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = payment::findOrFail($id);
        $delete->delete();
        return redirect()->route('payment.index');
    }
}
