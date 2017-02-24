@extends('layouts.up')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Create Data Penggajian</div>
                <div class="panel-body">
                
{!! Form::open(['url' => 'Penggajian']) !!}

<div class="form-group">
{!! Form::label('Kode_tunjangan_pegawai', 'Kode Tunjangan Pegawai:
') !!}
<select name="Kode_tunjangan_pegawai" class="form-control">
	@foreach($Tunjangan_pegawai as $data)
	<option value="{{$data->id}}">{{$data->Kode_tunjangan_pegawai}}</option>
	@endforeach
</select>
</div>

<div class="form-group">
{!! Form::label('Status_pengambilan', 'Status:') !!}
{!! Form::text('Status_pengambilan' ,null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('Petugas_penerima', 'Petugas:') !!}
{!! Form::text('Petugas_penerima' ,null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
@stop