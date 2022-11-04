@extends('part.main')

@section('container')

<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>{{ $judul }}</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ 'Rp. ' .number_format($kas_masuk,0,',','.')}}</h3>

                    <p>KAS MASUK</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('kasmasuk') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ 'Rp. ' .number_format($kas_keluar,0,',','.')}}</h3>

                    <p>KAS KELUAR</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{  route('kaskeluar') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ 'Rp. ' .number_format($total,0,',','.')}}</h3>

                    <p>SALDO AKHIR</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                
                <a href="#" class="small-box-footer p-3"></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
</div>

@endsection