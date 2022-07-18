<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\back;
use Carbon\Carbon;
class EditBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $rental = back::findOrFail($id);
        $rental->harga_mobil=$request->harga_mobil;
        $rental->harga_supir= $request->harga_supir;
        $rental->tgl_sewa= $request->tgl_sewa;
        $rental->tgl_kembali_akhir= $request->tgl_kembali_akhir;

        $awal = new Carbon($request->tgl_sewa);
        $akhir = new Carbon($request->tgl_kembali_akhir);
        $hasil= "{$awal->diffInDays($akhir)}";

        $cektelat=$hasil - $request->jumlah_hari_awal;
        $rental->jumlah_hari= $hasil;
        if ($cektelat<0) {
            $rental->telat=0;
        }elseif ($cektelat>0) {
            $rental->telat=$cektelat;
        }else{
            $rental->telat=0;
        }

        $cekdenda=($hasil * ($request->harga_mobil + $request->harga_supir))- $request->total_sewa_awal;
        if ($cekdenda<0) {
            $rental->denda=0;
        }elseif ($cekdenda>0) {
            $rental->denda=$cekdenda;
        }else {
            $rental->denda=0;
        }
        $rental->total_harga= $hasil * ($request->harga_mobil + $request->harga_supir);
        
        $rental->save();
        return redirect('back');
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
