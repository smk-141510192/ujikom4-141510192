<?php

namespace App\Http\Controllers;

use Request;
use App\Tunjangan_pegawai;
use App\Pegawai;
use App\Jabatan;
use App\Golongan;
use App\Tunjangan;
use App\Penggajian;


class Penggajian_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $Penggajian = Penggajian::all();
        return view('Penggajian.index', compact('Penggajian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Tunjangan= Tunjangan::all();
         $Tunjangan_pegawai = Tunjangan_pegawai::all();
         $Pegawai = Pegawai::all();
         $Jabatan = Jabatan::all();
         $Golongan = Golongan::all();

        return view('Penggajian.create', compact('Penggajian','Golongan', 'Jabatan', 'Pegawai','Tunjangan_pegawai', 'Tunjangan'));
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
         $Penggajian = Request::all();
        Penggajian::create($Penggajian);
        return redirect('Penggajian');
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
        Penggajian::find($id)->delete();
        return redirect('Penggajian');
    }
}
