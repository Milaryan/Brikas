@extends('part.main')

@section('container')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12 mt-4">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data {{ $judul }}</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama" value="{{old('nama') ? old('nama') : $users->nama }}" disabled>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username" value="{{old('username') ? old('username') : $users->username }}" disabled>
              </div>
              <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" value="{{old('email') ? old('email') : $users->email }}" disabled>
              </div>
              <div class="form-group">
                <label for="batas">Batas Aktif</label>
                <input type="text" name="batas" class="form-control" id="batas" value="{{ old('status') ? old('status') : $users->status  }}" disabled>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                @if($users->status >= date('Y-m-d'))
                <input type="text" name="status"class="form-control" id="status" placeholder="Masukkan status" value="Aktif" disabled>
                @else
                <input type="text" name="status"class="form-control" id="status" placeholder="Masukkan status" value="Non-Aktif" disabled>
                @endif
              </div>

            <div class="card-footer">
              <a href="{{ route('user') }}" class="btn btn-secondary btn-md">Kembali</a>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (left) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

@endsection

@section('script')

@endsection