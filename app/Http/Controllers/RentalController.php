<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rental;
use App\Supir;
use App\Mobil;
use App\back;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use Carbon\Carbon;
use File;
class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supir=Supir::all();
        $mobil=Mobil::all();
        $rental=rental::where('status','Belum')->get();
        return view('rental.index',compact('rental','supir','mobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rental.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        return view('rental.edit', compact('mobil','rental'));
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
        $mobil = Mobil::all();
        $supir = Supir::all();
        $rental = rental::findOrFail($id);
        return view('rental.detail', compact('mobil','supir','rental'));
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
        $rental = rental::findOrFail($id);
        $supir = Supir::all();
        $mobil = Mobil::all();
        return view('rental.edit', compact('rental','supir','mobil')); 
    }

    public function creates($id)
    {
       
        $rental = rental::findOrFail($id);
        $back = back::all();
        return view('back.create', compact('rental','back'));
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

        Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil Menyimpan Data Rental"]);

        $mobil = Mobil::findOrFail($id);
        $supir = Supir::findOrFail($id);
        $rental = rental::findOrFail($id);
        $rental->no_identitaskons=$request->no_identitaskons;
        $rental->namakons =$request->nama;
        $rental->jkkons=$request->jk;
        $rental->alamatkons=$request->alamat;
        $rental->no_hpkons=$request->no_hpkons;
        $rental->status="Belum";
        
        $rental->tgl_sewa=$request->tgl_sewa;
        $rental->tgl_kembali=$request->tgl_kembali;

        $awal = new Carbon($request->tgl_sewa);
        $akhir = new Carbon($request->tgl_kembali);
        $hasil= "{$awal->diffInDays($akhir)}";
        $rental->jumlah_hari=$hasil;
        $rental->supir_id=$request->supir_id;
        $rental->total_sewa=($mobil->harga_sewamobil + $supir->harga_sewasupir) * $hasil;

        $rental->save();
        return redirect('rental');
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
        $rental = rental::findOrFail($id);
        $rental->delete();
        return redirect()->route('rental.index');
    }

    public function drop($status)
    {
        //
        $rental = rental::where('status','Sudah');
        $rental->delete();
        return redirect('rental');
    }
}
