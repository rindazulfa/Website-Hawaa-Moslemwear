<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\supplier;
use App\Models\material;
use Illuminate\Http\Request;
use DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pembelian = purchase::all();
        $pembelian = DB::table('puchases')
        ->join('materials', 'puchases.materials_id', '=', 'materials.id')
        ->join('suppliers', 'puchases.suppliers_id', '=', 'suppliers.id')
        ->select('puchases.*', 'materials.price', 'suppliers.name')
        ->get();
        // dd($pembelian);

        return view('admin/pages/pembelian/index',[
            'pembelian' => $pembelian
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_supplier = supplier::select('name')->distinct()->get();
        $data_materials = material::all();
        // dd($data_bahan);
        return view('admin.pages.pembelian.create',[
            'data_supplier' => $data_supplier,
            'data_materials' => $data_materials
        ]);
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
