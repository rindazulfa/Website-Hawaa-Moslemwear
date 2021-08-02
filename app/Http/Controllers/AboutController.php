<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\customer;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = profile::all()->last();
// dd($profile);
        if (Auth::check()) {
            $cek = customer::select('id')
                ->where('users_id', '=', auth()->user()->id)
                ->count();

            if ($cek == 0) {
                return view('package/about_us', [
                    'footer' => $footer,
                    'cart' => 0
                ]);
            } else {
                $idcust = customer::select('id')
                    ->where('users_id', '=', auth()->user()->id)
                    ->get();

                $cart = Cart::select('id')
                    ->where('customers_id', '=', $idcust[0]->id)
                    ->count();

                return view('package/about_us', [
                    'footer' => $footer,
                    'cart' => $cart
                ]);
            }
        } else {
            return view('package/about_us', [
                'footer' => $footer,
                'cart' => 0
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
