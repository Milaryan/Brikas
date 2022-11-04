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
            <a href="{{ route('kaskeluarcreate') }}" class="btn btn-primary btn-sm mb-2">Tambah {{ $judul }}</a>
            <table id="tabel-data" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>No</th>
                <th>Jenis Pengeluaran</th>
                <th>Nominal</th>
                <th>Tanggal Keluar</th>
                <th>Nama Penarik</th>
                <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kas_keluar as $key => $us)
                <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $us->jenis }}</td>
                <td>Rp. {{ number_format($us->jumlah, 0, ',', '.') }}</td>
                <td>{{ $us->tanggal }}</td>
                <td>{{ $us->nama_penarik }}</td>
    
                <td>
                    <a href="{{route('kaskeluarshow', $us->id_kas_keluar)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                    <a href="{{route('kaskeluaredit', $us->id_kas_keluar)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="{{route('kaskeluardestroy', $us->id_kas_keluar) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Apakah anda ingin menghapus Data?')"></i></a>
                </td>
                </tr>
                @endforeach
                </tbody>
            </table>
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
</script>

@endsection