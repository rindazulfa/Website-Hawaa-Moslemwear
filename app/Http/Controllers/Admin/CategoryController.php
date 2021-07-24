<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Prophecy\Call\Call;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Category::all();
        return view('admin/pages/kategori/index', ['page' => $page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/kategori/create');
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
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $page = new Category();
            $page->name = $request->get("name");
            $page->save();

            return redirect()->route("kategori.index")->with("info", "kategori has been created");
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
        $edit = Category::findOrFail($id);

        return view('admin.pages.kategori.edit', [
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
        $page = Category::findOrFail($id);
        $page->name = $request->get("name");
        $page->save();

        return redirect()->route("kategori.index")->with("info", "kategori has been created");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::findOrFail($id);
        $delete->delete();
        return redirect()->route('kategori.index')->with("info", "kategori has been deleted");
    }
}
