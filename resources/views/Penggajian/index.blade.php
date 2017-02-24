@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">PT PANASIA GROUP</div>
                <div class="panel-body">
                <h1><center>Data Penggajian</center></h1></div>
                <div class="panel-body">

	
	<a href="{{ url('/Penggajian/create') }}" class="btn btn-success"> Tambah Data </a>
	<hr>
	
<div class="form-group"><center>
                    <form action="{{url('Penggajian')}}/?Nip=Nip">
                    <input type="text" name="Nip" placeholder="Cari"></form>
                </center></div>
	<table class="table table-striped table-bordered table-hover">
		<thead>
		<tr class="bg-info">
			<th> No </th>
			<th>Tanggal Pengambilan</th>
			<th><center>Nama Pegawai</center></th>
			<th><center>Besaran Uang(Tunjangan)</center></th>
			<th><center>Gaji Pokok(Uang Jabatan+Golongan)</center></th>
			<th><center>Uang Lembur</center></th>
			<th><center>Jumlah Jam </center>
			<th><center>Total Gaji</center>
			<th><center>Status Pengambilan</center></th>
			<th><center>Petugas Penggambilan</center></th>
	
			<th colspan="2"><center> Action </center></th>
		</tr>
		</thead>
		
		<tbody>
	@foreach ($Penggajian as $data)
	<tr>
	            <td>{{ $data->id }}</td>
				<td>{{ $data->updated_at }}</td>
				<td> {{ $data->Tunjangan_pegawai->Pegawai->User->name}}</td>
				<td> {{ $data->Tunjangan_pegawai->Tunjangan->Besaran_uang}}</td>
				<td> {{ $data->Tunjangan_pegawai->Pegawai->Jabatan->Besaran_uang + $data->Tunjangan_pegawai->Pegawai->Golongan->Besaran_uang}}</td>
				<td></td>
				<td></td>
				<td> {{ $data->Tunjangan_pegawai->Tunjangan->Besaran_uang + $data->Tunjangan_pegawai->Pegawai->Jabatan->Besaran_uang + $data->Tunjangan_pegawai->Pegawai->Golongan->Besaran_uang}}</td>

				<td> {{ $data->Status_pengambilan}}</td>
				<td> {{ $data->Petugas_penerima}}</td>

				<td><center><a href="{{route('Penggajian.edit', $data->id)}}" class="btn btn-warning">Update</a></center></td>  
	<td>  

	<center>{!! Form::open(['method' => 'DELETE', 'route'=>['Penggajian.destroy', $data->id]]) !!}
	{!! Form::submit('Delete', ['class' => 'btn btn-primary']) !!}</center>
	{!! Form::close() !!}
	</td>
	</tr>
	@endforeach
		</tbody>

	</table>
</div>
</div>
</div>
</div>
</div>
</div>
@stop