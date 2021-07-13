<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Banner::all();
        // return view('admin.pages.banner.create');
        return view('admin/pages/banner/index', ['page' => $page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/banner/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'sub_title' => 'required',
            'picture' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
            // dd($validator->errors());
        } else {
            $page = new Banner();
            $page->title = $request->get("title");
            $page->subtitle = $request->get("sub_title");
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
            $page->save();

            return redirect()->route("banner.index")->with("info", "Banner has been created");
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
        $page = Banner::findOrFail($id);
        return view('admin.pages.banner.edit', ['page' => $page]);
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
        $page = Banner::findOrFail($id);
        $page->title = $request->get("title");
        $page->subtitle = $request->get("sub_title");
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
        $page->save();

        return redirect()->route("banner.index")->with("info", "Banner has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $page = Banner::findOrFail($id);
            $namaFileLama1 = "uploads/banner/" . $page->picture;
            File::delete($namaFileLama1);
            $page->delete();

            return response()->json([
                'message' => 'success'
            ]);
        }
    }
}
