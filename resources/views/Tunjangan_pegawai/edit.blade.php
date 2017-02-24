@extends('layouts.up')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-danger">
                <div class="panel-heading">Update Lembur Pegawai</div>
                <div class="panel-body">
{!! Form::model($Tunjangan_pegawai, ['method' => 'PATCH','route'=>['Tunjangan_pegawai.update', $Tunjangan_pegawai->id]]) !!}
 <div class="panel-body">
{!! Form::open(['url' => 'Tunjangan_pegawai']) !!}
<div class="form-group">
{!! Form::label('Kode_tunjangan_pegawai', 'Kode:') !!}
{!! Form::text('Kode_tunjangan_pegawai' ,null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
{!! Form::label('Nip', 'Nama Pegawai:
') !!}
<select name="Nip" class="form-control">
	@foreach($Pegawai as $data)
	<option value="{{$data->id}}">{{$data->User->name}}</option>
	@endforeach
</select>
</div>
<div class="form-group">
{!! Form::label('Kode_tunjangan', 'Kode Tunjangan:
') !!}
<select name="Kode_tunjangan" class="form-control">
	@foreach($Tunjangan as $data)
	<option value="{{$data->id}}">{{$data->Kode_tunjangan}}</option>
	@endforeach
</select>
</div>

<div class="form-group">
{!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
</div>
{!! Form::close() !!}
@stop