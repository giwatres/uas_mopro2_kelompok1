@extends('layouts.frist')
@section('sidebar')
@role('admin')
  <li class="header">MAIN NAVIGATION</li>
  <li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   <span>Dashboard</span></a></li>
  <li class="active"><a href="{{route('mobil.index')}}"><i class="fa fa-car text-aqua"></i>   <span>Mobil</span></a></li>
  <li><a href="{{route('supir.index')}}"><i class="fa fa-user text-red"></i>   <span>Supir</span></a></li>
  <li><a href="{{route('user.index')}}"><i class="fa fa-user text-green"></i>   <span>Pengguna</span></a></li>
  <li class="header">TRANSAKSI</li>
  <li><a href="{{url('/mobil/daftar')}}"><i class="fa fa-circle-o text-red"></i> <span>Daftar Mobil</span></a></li>
  <li><a href="{{route('rental.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Data Rental Mobil</span></a></li>
  <li><a href="{{route('back.index')}}"><i class="fa fa-circle-o text-green"></i> <span>Laporan Pengembalian</span></a></li>
@endrole

@role('member')
  <li class="header">MAIN NAVIGATION</li>
  <li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   <span>Dashboard</span></a></li>
  <li><a href="{{route('mobil.index')}}"><i class="fa fa-car text-aqua"></i>   <span>Mobil</span></a></li>
  <li><a href="{{route('supir.index')}}"><i class="fa fa-user text-red"></i>   <span>Supir</span></a></li>
  <li class="header">TRANSAKSI</li>
  <li class="active"><a href="{{url('/mobil/daftar')}}"><i class="fa fa-circle-o text-red"></i> <span>Daftar Mobil</span></a></li>
  <li><a href="{{route('rental.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Data Rental Mobil</span></a></li>
  <li><a href="{{route('back.index')}}"><i class="fa fa-circle-o text-green"></i> <span>Laporan Pengembalian</span></a></li>
@endrole
  
@endsection
@section('content')
<div class="row">
	<section class="content-header">
    <h1>
      Daftar Mobil
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Mobil</li>
    </ol>
</section><br><br><br>

  <div class="col-md-12">
    <!-- MAP & BOX PANE -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <div class="box-tools pull-right">
          <span class="pull-right"><center>{{$mobil->links()}}</center></span>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <div class="row">
          <div class="col-md-9 col-sm-8">
            <div class="pad">
              <!-- Map will be created here -->
              <div id="world-map-markers" style="height: 50px;"></div>
            </div>
          </div>
          <!-- /.col -->
          <form enctype="multipart/form-data">
          <div class="col-md-12">
            @foreach($mobil as $data)
          <div class="col-md-4">
                <div class="well">
                  <img class="thumbnail" width="350" src="{{asset('/img/'.$data->fotomobil.'')}}" />
                  <center><font size="4px">{{$data->merk}}<br>" {{$data->plat_no}} "</font></center><br>
       
                  @if($data->status == 'Tidak')
                    <a class="btn btn-primary" href="{{url('/rentall/'.$data->id)}}">Sewa Mobil</a>
                  @elseif($data->status == 'Disewa')
                    <a class="btn btn-danger" disabled><b>Sedang Disewa</b></a>
                  @endif
                </div>
            </div>
          @endforeach
          </div>
          
          </form>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
        
</div>

@endsection