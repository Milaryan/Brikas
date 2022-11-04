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
            <a href="{{ route('kasmasukcreate') }}" class="btn btn-primary btn-sm mb-2">Tambah {{ $judul }}</a>
            <table id="tabel-data" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                <th>No</th>
                <th>Jenis Pemasukan</th>
                <th>Nominal</th>
                <th>Tanggal Masuk</th>
                <th>Nama Penyetor</th>
                <th>Aksi</th>
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
    
                <td>
                    <a href="{{route('kasmasukshow', $us->id_kas_masuk)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                    <a href="{{route('kasmasukedit', $us->id_kas_masuk)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="{{route('kasmasukdestroy', $us->id_kas_masuk) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Apakah anda ingin menghapus Data?')"></i></a>
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