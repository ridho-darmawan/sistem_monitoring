@extends('template')

@section('content')

 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Permohonan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Permohonan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{ route('permohonan') }}" class="btn btn-warning d-flex ml-auto">
                                    <i class="fa fa-out"></i>
                                    Kembali
                                </a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('permohonan.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}    
                
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nama_pemohon">Nama Pemohon</label>
                                            <input type="text" name="pemohon" class="form-control" id="nama_pemohon" value="{{ old('pemohon') }}" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_pemohon">Alamat Pemohon</label>
                                            <textarea type="text" name="alamat_pemohon" class="form-control" id="alamat_pemohon" >{{ old('alamat_pemohon') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nomor_hp_pemohon">Nomor Hp Pemohon</label>
                                            <input type="text" name="nomor_hp_pemohon" class="form-control" id="nomor_hp_pemohon" autocomplete="off">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputFile">Jenis Layanan</label>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="jenis_layanan1" name="jenis_layanan" value="1">
                                                <label for="jenis_layanan1" class="custom-control-label">Pelayanan KK</label>
                                            </div>

                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="jenis_layanan2" name="jenis_layanan" value="2">
                                                <label for="jenis_layanan2" class="custom-control-label">Pelayanan KK + POS</label>
                                            </div>
                                            
                                            
                                        </div>
                                    </div> 
                                </div>                     
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary d-flex ml-auto">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection