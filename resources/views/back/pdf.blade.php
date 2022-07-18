<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Laporan Pengembalian</title>
        <body>
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
                .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
                .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
                .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
            </style>
 
            <div style="font-family:Arial; font-size:12px;">
                <center><h2>Data Pengembalian</h2></center>  
            </div>
            <br>
            <table class="tg">
              <tr>
                <th class="tg-3wr7">No</th>
                <th class="tg-3wr7">No KTP</th>
                <th class="tg-3wr7">Nama</th>
                <th class="tg-3wr7">Alamat</th>
                <th class="tg-3wr7">Merk Mobil</th>
                <th class="tg-3wr7">Nama Supir</th>
                <th class="tg-3wr7">Plat Nomor</th>
                <th class="tg-3wr7">Tgl Sewa</th>
                <th class="tg-3wr7">Tgl Kembali</th>
                <th class="tg-3wr7">Total Sewa</th>
              </tr>
              @php $no=1 @endphp
              @foreach($pengembalian as $data)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$data->no_identitaskons}}</td>
                <td>{{$data->namakons}}</td>
                <td>{{$data->alamatkons}}</td>
                <td>{{$data->merk_mobil}}</td>
                <td>{{$data->nama_supir}}</td>
                <td>{{$data->plat_no}}</td>
                <td>{{$data->tgl_sewa}}</td>
                <td>{{$data->tgl_kembali_akhir}}</td>
                <td>Rp.{{number_format($data->total_harga,2,',','.')}}</td>
              </tr>
              @endforeach
            </table>
        </body>
    </head>
</html>