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
                <label for="nama">Jenis Pemasukan</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama" value="{{old('nama') ? old('nama') : $kas_masuk->jenis_pemasukan }}" disabled>
              </div>
              <div class="form-group">
                <label for="nominal">Nominal</label>
                <input type="text" name="nominal" class="form-control" id="nominal" placeholder="Masukkan nominal" value="{{old('nominal') ? old('nominal') : 'Rp. '.number_format($kas_masuk->jumlah, 0, ',', '.') }}" disabled>
              </div>
              <div class="form-group">
                <label for="tanggal">Tanggal Masuk</label>
                <input type="text" name="tanggal" class="form-control" id="tanggal" placeholder="Masukkan tanggal" value="{{old('tanggal') ? old('tanggal') : $kas_masuk->tanggal }}" disabled>
              </div>
              <div class="form-group">
                <label for="nama">Nama Penyetor</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') ? old('nama') : $kas_masuk->nama_penyetor  }}" disabled>
              </div>
              <div class="form-group">
                <label for="keterangan">keterangan Penyetor</label>
                <textarea type="text" name="keterangan" class="form-control" id="keterangan" value="" disabled>{{ old('keterangan') ? old('keterangan') : $kas_masuk->keterangan  }}</textarea>
              </div>

            <div class="card-footer">
              <a href="{{ route('kasmasuk') }}" class="btn btn-secondary btn-md">Kembali</a>
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