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
          <form method="post" action="{{ route('kasmasukupdate', $kas_masuk->id_kas_masuk)}}">
            @csrf
            <input type="hidden" name="tanggal" class="form-control" id="tanggal" value="{{ $kas_masuk->tanggal }}">
            <div class="card-body">
              <div class="form-group">
                <label for="jenis">Jenis Pemasukan</label>
                <input type="text" name="jenis_pemasukan" class="form-control" id="jenis_pemasukan" placeholder="Masukkan jenis pemasukan" value="{{$kas_masuk->jenis_pemasukan}}">
              </div>
              <div class="form-group">
                <label for="jumlah">Nominal</label>
                <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Masukkan nominal" value="{{ $kas_masuk->jumlah, }}">
              </div>
              <div class="form-group">
                <label for="tanggal">Tanggal Kas Mauk</label>
                <input type="text" name="tanggal" class="form-control" id="tanggal" placeholder="Masukkan tanggal" value="{{ $kas_masuk->tanggal }}" disabled>
              </div>
              <div class="form-group">
                <label for="nama">Nama Penyetor</label>
                <input type="text" name="nama_penyetor" class="form-control" placeholder="Masukkan nama penyetor" id="nama" value="{{ $kas_masuk->nama_penyetor }}" >
                {{-- <select name="nama_penyetor" class="form-control" value="{{ old('nama_penyetor') }}" >
                  <option value="">Pilih Nama Penyetor</option>
                  @foreach($user as $key => $us)
                    <option value="{{ $us->id }}">{{ $us->username }}</option>
                  @endforeach
                </select> --}}
              </div>  
              <div class="form-group">
                <label for="keterangan">Keterangan (Optional)</label>
                <textarea type="text" name="keterangan"class="form-control" id="keterangan" placeholder="Masukkan keterangan" value="">{{$kas_masuk->keterangan}}</textarea>
              </div>

            <div class="card-footer">
              <a href="{{ route('kasmasuk') }}" class="btn btn-secondary btn-md">Kembali</a>
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