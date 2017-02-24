<?php

namespace App\Http\Controllers;

use Request;
use App\Jabatan;
use App\Golongan;
use App\User;
use App\Pegawai;
use DB;
use Validator;
use Input;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class Pegawai_Controller extends Controller
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
        $Jabatan = Jabatan::all();
        $Golongan = Golongan::all();
        $Pegawai = Pegawai::all();
         $Pegawai=Pegawai::where('Nip',request('Nip'))->paginate(0);
        if(request()->has ('Nip'))
        {
         $Pegawai=Pegawai::where('Nip',request('Nip'))->paginate(0);
 
        }
        else
        {
            $Pegawai=Pegawai::paginate(3);
        }
        return view('Pegawai.index', compact('Jabatan', 'Golongan', 'Pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        

        $dd = User::all();
        $Jabatan = Jabatan::all();
        $Golongan = Golongan::all();
        return view('Pegawai.create', compact('Kode', 'Pegawai', 'dd', 'Jabatan', 'Golongan'));
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
        $input = Request::all();
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'permission' => $input['permission']
        ]);

        $file = Input::file('Photo');
        $destinationPath = public_path().'/image/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);

        if(Input::hasFile('Photo')){
           $mm = new Pegawai;
           $mm->Nip = Input::get('Nip'); 
           $mm->user_id = $user->id;  
           $mm->Kode_jabatan = Input::get('Kode_jabatan'); 
           $mm->Kode_golongan = Input::get('Kode_golongan'); 
           $mm->Photo = $filename;
           $mm->save();
        }
        return redirect('Pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $Pegawai = Pegawai::find($id);
        $Jabatan = Jabatan::all();
        $Golongan = Golongan::all();

        return view('Pegawai.edit', compact('Pegawai', 'Jabatan', 'Golongan'));
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
        $Pegawai = Pegawai::find($id);

        if(Request::hasFile('Photo')){
            $file = Request::file('Photo');
            $destinationPath = public_path().'/image/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
        }
        
        $Pegawai->Nip = Request::get('Nip'); 
        $Pegawai->Kode_jabatan = Request::get('Kode_jabatan'); 
        $Pegawai->Kode_golongan = Request::get('Kode_golongan'); 
        $Pegawai->Photo = $filename;
        $Pegawai->save();
        return redirect('Pegawai');
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
        Pegawai::find($id)->delete();
        return redirect('Pegawai');
    }
}
