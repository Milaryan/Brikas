<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="{{ csrf_token() }}">
    <title>BRIKAS | {{ $judul }}</title>

    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
  <link rel="stylesheet" href= "{{ asset('plugins/fontawesome-free/css/all.min.css') }}" >
  {{-- Toastr --}}
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href= "{{ asset('dist/css/adminlte.min.css') }}" >
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>
<body>
  <h1 style="text-align: center" class="mb-2">Laporan Kas Keluar</h1>
  <h4 style="text-align: center" class="mb-5">Tanggal {{ $tanggal_awal }} - {{ $tanggal_akhir }}</h4>
  
    <table id="tabel-data" class="table table-bordered table-hover">
      <thead>
        <tr>
        <th>No</th>
        <th>Jenis Penarikan</th>
        <th>Nominal</th>
        <th>Tanggal Penarikan</th>
        <th>Nama Penarik</th>
        <th>Keterangan</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kas_keluar as $key => $us)
        <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $us->jenis }}</td>
        <td>Rp. {{ number_format($us->jumlah, 0, ',', '.') }}</td>
        <td>{{ $us->tanggal }}</td>
        <td>{{ $us->nama_penyetor }}</td>
        <td>{{ $us->keterangan }}</td>
        </tr>
        @endforeach
        </tbody>
      </table>
</body>

<script>
    window.print()
    window.onfocus=function(){window.close()}
</script>

</html>