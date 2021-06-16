<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\material;
use App\Models\Recipe;
use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan = material::all();
        return view('admin/pages/bahan_baku/index', [
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
        return view('admin/pages/bahan_baku/create');
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
            'name' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'satuan' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $page = new material();
            $page->name= $request->get("name");
            $page->price = $request->get("price");
            $page->qty= $request->get("qty");
            $page->satuan= $request->get("satuan");
            $page->save();

            return redirect()->route("bahan_baku.index")->with("info", "Materials has been created");
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
        $edit = material::findOrFail($id);
        
        return view('admin.pages.bahan_baku.edit', [
            'edit' => $edit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Reque   st  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = material::findOrFail($id);
            $page->name= $request->get("name");
            $page->price = $request->get("price");
            $page->qty= $request->get("qty");
            $page->satuan= $request->get("satuan");
            $page->save();

            return redirect()->route("bahan_baku.index")->with("info", "Materials has been created");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ceksupplier = supplier::where('materials_id',$id)->first();
        $cekresep= Recipe::where('materials_id', $id)->first();
        if($ceksupplier){
            return redirect()->route('bahan_baku.index')->with("info","Sorry, cant delete this material");
        }
        if($cekresep){
            return redirect()->route('bahan_baku.index')->with("info","Sorry, cant delete this material");
        }

        if(!$ceksupplier && !$cekresep ){

            $delete = material::findOrFail($id);
        
            $delete->delete();
            return redirect()->route('bahan_baku.index')->with("info","Materials has been deleted");;
        }
    }
}
