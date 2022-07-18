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
  <li><a href="{{route('rental.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Data Rental Mobil</span></a></li>
  <li class="active"><a href="{{route('back.index')}}"><i class="fa fa-circle-o text-green"></i> <span>Laporan Pengembalian</span></a></li>
@endrole

@role('member')
  <li class="header">MAIN NAVIGATION</li>
  <li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   <span>Dashboard</span></a></li>
  <li><a href="{{route('mobil.index')}}"><i class="fa fa-car text-aqua"></i>   <span>Mobil</span></a></li>
  <li><a href="{{route('supir.index')}}"><i class="fa fa-user text-red"></i>   <span>Supir</span></a></li>
  <li class="header">TRANSAKSI</li>
  <li><a href="{{url('/mobil/daftar')}}"><i class="fa fa-circle-o text-red"></i> <span>Daftar Mobil</span></a></li>
  <li><a href="{{route('rental.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Data Rental Mobil</span></a></li>
  <li class="active"><a href="{{route('back.index')}}"><i class="fa fa-circle-o text-green"></i> <span>Laporan Pengembalian</span></a></li>
@endrole
  
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<section class="content-header">
    		 <h1>
    		   Edit Laporan Pengembalian
    		 </h1>
      		<ol class="breadcrumb">
      		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      		  <li class="fa fa-car">Laporan</li><li class="active">Edit</li>
      		</ol>
    	</section><br><br>
    	<div class="panel panel-danger">
			<div class="panel-heading">Rental Mobil
		</div>

		<div class="panel-body">
		<form action="{{route('edit.update',$back->id)}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			{{csrf_field()}}
			
			<input type="hidden" name="jumlah_hari_awal" value="{{$back->jumlah_hari}}">
			<input type="hidden" name="total_sewa_awal" value="{{$back->total_harga}}">
			<input type="hidden" name="harga_mobil" value="{{$back->harga_mobil}}">			
			<input type="hidden" name="harga_supir" value="{{$back->harga_supir}}">
			<input type="hidden" name="tgl_sewa" value="{{$back->tgl_sewa}}">
			<input type="hidden" name="tgl_kembali_awal" value="{{$back->tgl_kembali_awal}}">

			<div class="form-group">
				<div class="col-md-4">
					<div class="well">
						<center><b> Data Rental</b></center><br>
						Merk : <b>{{$back->merk_mobil}}</b><br>
						Harga Sewa Mobil : <b>Rp. {{$back->harga_mobil}}</b><br>
						Nama Supir : <b>{{$back->nama_supir}}</b><br>
						Harga Sewa Supir : <b>Rp. {{$back->harga_supir}}</b><br>
						Tanggal Sewa : <b>{{$back->tgl_sewa}}</b><br>
						Tgl Kembali Awal : <b>{{$back->tgl_kembali_awal}}</b><br>
						Harga Sewa Mobil : <b>{{$back->merk_mobil}}</b><br>
						Jumlah Hari : <b>{{$back->jumlah_hari}} Hari</b><br>
						Total Sewa : <b>Rp. {{$back->total_harga}}</b><br>
					</div>
				</div>
			</div>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<div class="form-group">
				<label class="control-lable">Tanggal Kembali Akhir</label>
				<input type="date" name="tgl_kembali_akhir" class="form-control" required="" value="{{$back->tgl_kembali_akhir}}">
			</div>	

			<div class="pull-right">
				<div class="form-group">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</div>
			</div>

		</form>
	</div>
	</div>
</div>
</div>
@endsection