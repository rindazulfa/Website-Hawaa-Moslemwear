<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\profile;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = profile::all();
        return view('admin/pages/profil/index',['page' => $page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/profil/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new profile();
        if ($request->hasFile("picture")) {
            try {

                $file1 = $request->file('picture');
                $namaFile1 = time() . '.' . $file1->getClientOriginalExtension();
                $file1->move('uploads/banner', $namaFile1);
            } catch (\Throwable $th) {
                dd($th);
            }

            $page->picture = $namaFile1;
        }
       
        $page->desc_1= $request->get("desc_1");
        $page->desc_2 = $request->get("desc_2");
        $page->telepon= $request->get("telepon");
        $page->ig = $request->get("ig");
        $page->email= $request->get("email");
        $page->address = $request->get("address");
        $page->save();

        return redirect()->route("profilumkm.index")->with("info", "Profile UMKM has been created");
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
        $page = profile::findOrFail($id);
        return view('admin.pages.profil.edit', ['page' => $page]);
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
        $page = profile::findOrFail($id);
        if ($request->hasFile("picture")) {
            try {

                $file1 = $request->file('picture');
                $namaFile1 = time() . '.' . $file1->getClientOriginalExtension();
                $file1->move('uploads/banner', $namaFile1);
            } catch (\Throwable $th) {
                dd($th);
            }

            $page->picture = $namaFile1;
        }
       
        $page->desc_1= $request->get("desc_1");
        $page->desc_2 = $request->get("desc_2");
        $page->telepon= $request->get("telepon");
        $page->ig = $request->get("ig");
        $page->email= $request->get("email");
        $page->address = $request->get("address");
        $page->save();

        return redirect()->route("profilumkm.index")->with("info", "Profile UMKM has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if($request->ajax()){
            $page = profile::findOrFail($id);
            $namaFileLama1 = "uploads/profil/" . $page->picture;
            File::delete($namaFileLama1);
            $page->delete();
            return response()->json([
                'message'=>'success'
            ]);
           }
    }
}
