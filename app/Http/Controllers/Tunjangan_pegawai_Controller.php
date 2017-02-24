<?php

namespace App\Http\Controllers;

use Request;
use App\Pegawai;
use App\Tunjangan;
use App\Tunjangan_pegawai;
use App\kategori_lembur;

class Tunjangan_pegawai_Controller extends Controller
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
        $Tunjangan_pegawai=Tunjangan_pegawai::all();
        $Tunjangan=Tunjangan::all();
        $Pegawai=Pegawai::all();
        $Tunjangan_pegawai=Tunjangan_pegawai::where('Kode_tunjangan_pegawai',request('Kode_tunjangan_pegawai'))->paginate(0);
        if(request()->has ('Kode_tunjangan_pegawai'))
        {
         $Tunjangan_pegawai=Tunjangan_pegawai::where('Kode_tunjangan_pegawai',request('Kode_tunjangan_pegawai'))->paginate(0);
 
        }
        else
        {
            $Tunjangan_pegawai=Tunjangan_pegawai::paginate(3);
        }
        return view('Tunjangan_pegawai.index', compact('Tunjangan_pegawai', 'Tunjangan', 'Pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Tunjangan=Tunjangan::all();
        $Pegawai=Pegawai::all();
       $Tunjangan_pegawai=Tunjangan_pegawai::all();
       return view('Tunjangan_pegawai.create', compact('Tunjangan_pegawai', 'Tunjangan', 'Pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Tunjangan_pegawai=Request::all();
        Tunjangan_pegawai::create($Tunjangan_pegawai);
        return redirect('Tunjangan_pegawai');
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
        $Pegawai=Pegawai::all();
        $Tunjangan=Tunjangan::all();
        $Tunjangan_pegawai=Tunjangan_pegawai::find($id);

        return view('Tunjangan_pegawai.edit', compact('Tunjangan_pegawai', 'Tunjangan', 'Pegawai'));
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
         $Tunjangan_pegawaiUpdate=Request::all();
        $Tunjangan_pegawai=Tunjangan_pegawai::find($id);
        $Tunjangan_pegawai->update($Tunjangan_pegawaiUpdate);
        return redirect('Tunjangan_pegawai'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Tunjangan_pegawai::find($id)->delete();
        return redirect('Tunjangan_pegawai');
    }
}
