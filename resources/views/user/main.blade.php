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
            <a href="{{ route('create') }}" class="btn btn-primary btn-sm mb-2">Tambah {{ $judul }}</a>
            <table id="tabel-data" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $us)
                <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $us->nama }}</td>
                <td>{{ $us->username }}</td>
                <td>{{ $us->email }}</td>
                @if($us->status >= date('Y-m-d'))
                <td>
                    <a href="{{ route('userStat', $us->id) }}" class="btn btn-success" type="submit" name="stat" value="{{  $us->status  }}" onclick="return confirm('Yakin ingin mengubah')">Aktif</a></td>
                @else
                <td>
                    <a href="{{ route('userStat', $us->id) }}" class="btn btn-secondary" type="submit" name="stat" value="{{  $us->status  }}" onclick="return confirm('Yakin ingin mengubah')">Non-Aktif</a>
                </td>
                @endif
                <td>
                    <a href="{{route('show', $us->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                    <a href="{{route('edit', $us->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('destroy', $us->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Apakah anda ingin menghapus Data?')"></i></a>
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