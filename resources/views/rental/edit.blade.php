@extends('layouts.frist')
@section('sidebar')
@role('admin')
  <li class="header">MAIN NAVIGATION</li>
  <li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   <span>Dashboard</span></a></li>
  <li><a href="{{route('mobil.index')}}"><i class="fa fa-car text-aqua"></i>   <span>Mobil</span></a></li>
  <li><a href="{{route('supir.index')}}"><i class="fa fa-user text-red"></i>   <span>Supir</span></a></li>
  <li><a href="{{route('user.index')}}"><i class="fa fa-user text-green"></i>   <span>Pengguna</span></a></li>
  <li class="header">TRANSAKSI</li>
  <li><a href="{{url('/mobil/daftar')}}"><i class="fa fa-circle-o text-red"></i> <span>Daftar Mobil</span></a></li>
  <li class="active"><a href="{{route('rental.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Data Rental Mobil</span></a></li>
  <li><a href="{{route('back.index')}}"><i class="fa fa-circle-o text-green"></i> <span>Laporan Pengembalian</span></a></li>
@endrole

@role('member')
  <li class="header">MAIN NAVIGATION</li>
  <li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   <span>Dashboard</span></a></li>
  <li><a href="{{route('mobil.index')}}"><i class="fa fa-car text-aqua"></i>   <span>Mobil</span></a></li>
  <li><a href="{{route('supir.index')}}"><i class="fa fa-user text-red"></i>   <span>Supir</span></a></li>
  <li class="header">TRANSAKSI</li>
  <li><a href="{{url('/mobil/daftar')}}"><i class="fa fa-circle-o text-red"></i> <span>Daftar Mobil</span></a></li>
  <li class="active"><a href="{{route('rental.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Data Rental Mobil</span></a></li>
  <li><a href="{{route('back.index')}}"><i class="fa fa-circle-o text-green"></i> <span>Laporan Pengembalian</span></a></li>
@endrole
  
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<section class="content-header">
    		 <h1>
    		   Edit Data Rental
    		 </h1>
      		<ol class="breadcrumb">
      		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      		  <li class="fa fa-car">Mobil</li><li class="active">Edit Mobil</li>
      		</ol>
    	</section><br><br>
    	<div class="panel panel-primary" >
			<div class="panel-heading"  style="background: #9932cc">Edit Data Rental
		</div>

		<div class="panel-body">
		<form action="{{route('rental.update',$rental->id)}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			{{csrf_field()}}
			<input type="hidden" name="mobil_id" value="{{$rental->mobil_id}}">
			<input type="hidden" name="supir_id" value="{{$rental->supir_id}}">
			<div class="form-group">
				<label class="control-lable">No Identitas</label>
				<input type="number" name="no_identitaskons" class="form-control" required=""	value="{{$rental->no_identitaskons}}">
			</div>

			<div class="form-group">
				<label class="control-lable">Nama</label>
				<input type="text" name="nama" class="form-control" required="" value="{{$rental->namakons}}">
			</div>

			<div class="form-group">
				<label class="control-lable">Jenis Kelamin</label><br>
				<select class="form-control" name="jk">
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
					<option value="Lainnya">Lainnya</option>
				</select>
			</div>

			<div class="form-group">
				<label class="control-lable">Alamat</label>
				<textarea class="form-control" name="alamat">{{$rental->alamatkons}}</textarea>
			</div>

			<div class="form-group">
				<label class="control-lable">No HP</label>
				<input type="text" name="no_hpkons" class="form-control" required="" value="{{$rental->no_hpkons}}">
			</div>

			<div class="form-group">
				<label class="control-lable">Tanggal Sewa</label>
				<input type="date" placeholder="yyyy-mm-dd" name="tgl_sewa" class="form-control" required="" value="{{$rental->tgl_sewa}}">
			</div>

			<div class="form-group">
				<label class="control-lable">Tanggal Kembali</label>
				<input type="date" placeholder="yyyy-mm-dd" name="tgl_kembali" class="form-control" required="" value="{{$rental->tgl_kembali}}">
			</div> 

			<div class="pull-right">
			<div class="form-group">
				<button type="submit" class="btn btn-success">Simpan</button>
				<button type="reset" class="btn btn-danger">Reset</button>
			</div>
			</div>
			</div>
		</form>
	</div>
	</div>
</div>
@endsection