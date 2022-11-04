@extends('part.main')

@section('container')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ $judul }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">{{ $judul }}</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel {{ $judul }}</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="{{ route('laporankasmasuk') }}" method="GET">
              <div class="row mb-3">
                <div class="col-7"></div>
                <div class="col-2">
                  <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" value="{{ isset($_GET['tanggal_awal']) ? $_GET['tanggal_awal'] : date('Y-m-d') }}">
                </div>
                <div class="">
                  -
                </div>
                <div class="col-2">
                  <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" value="{{ isset($_GET['tanggal_akhir']) ? $_GET['tanggal_akhir'] : date('Y-m-d') }}">
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i>Cari</button>
                </div>
              </div>
            </form>
            <table id="tabel-data" class="table table-bordered table-hover">
              <thead>
                <tr>
                <th>No</th>
                <th>Jenis Pemasukan</th>
                <th>Nominal</th>
                <th>Tanggal Masuk</th>
                <th>Nama Penyetor</th>
                <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kas_masuk as $key => $us)
                <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $us->jenis_pemasukan }}</td>
                <td>Rp. {{ number_format($us->jumlah, 0, ',', '.') }}</td>
                <td>{{ $us->tanggal }}</td>
                <td>{{ $us->nama_penyetor }}</td>
                <td>{{ $us->keterangan }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>            
            <a class="btn btn-warning float-right mt-2" onclick="print()"><i class="fa fa-print"></i>Print</a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->


@endsection

@section('script')

<script>
    $("#tabel-data").DataTable();

    function print(){
      var tanggal_awal = $("#tanggal_awal").val()
      var tanggal_akhir = $("#tanggal_akhir").val()

      window.open(`{{ route('printkasmasuk') }}?tanggal_awal=${tanggal_awal}&tanggal_akhir=${tanggal_akhir}`,`_blank`)
    }
</script>

@endsection