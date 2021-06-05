<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = supplier::all();
        return view('admin/pages/supplier/index',['page' => $page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/supplier/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new supplier();

        $page->name = $request->get("name");
        $page->address = $request->get("address");
        $page->email = $request->get("email");
        $page->phone = $request->get("phone");
        $page->save();

        return redirect()->route("supplier.index")->with("info", "Supplier has been created");
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
        $page = supplier::findOrFail($id);

        return view('admin.pages.supplier.edit', ['page' => $page]);
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
        $page = supplier::findOrFail($id);

        $page->name = $request->get("name");
        $page->address = $request->get("address");
        $page->email = $request->get("email");
        $page->phone = $request->get("phone");
        $page->save();

        return redirect()->route("supplier.index")->with("info", "Supplier has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = supplier::findOrFail($id);
        $delete->delete();
        return redirect()->route('supplier.index');
    }
}
