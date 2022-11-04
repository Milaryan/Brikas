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
            <h3 class="card-title">Edit {{ $judul }}</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{ route('update', $users->id)}}">
              @csrf
              <input type="hidden" name="level" id="level" value="user">
              <input type="hidden" name="status" id="status" value="{{ old('status') ? old('status') : $users->status  }}">
              <div class="card-body">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama" value="{{old('nama') ? old('nama') : $users->nama }}">
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username" value="{{old('username') ? old('username') : $users->username }}">
                </div>
                <div class="form-group">
                  <label for="email">Alamat Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" value="{{old('email') ? old('email') : $users->email }}">
                </div>
                <div class="form-group">
                  <label for="batas">Batas Aktif</label>
                  <input type="text" name="batas" class="form-control" id="batas" value="{{ old('status') ? old('status') : $users->status  }}" disabled>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password"class="form-control" id="password" placeholder="Masukkan Password Bila Ingin Merubah" value="{{old('password')}}">
                </div>
              </div>
            <div class="card-footer">
              <a href="{{ route('user') }}" class="btn btn-secondary btn-md">Kembali</a>
              <button type="submit" class="btn btn-primary">Submit</button>
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