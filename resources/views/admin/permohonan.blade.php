@extends('template')

@section('content')
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Permohonan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Permohonan</li>
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
                <h3 class="card-title">
                    <a href="{{ route('permohonan.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </a>
                </h3>
              </div>
              <!-- /.card-header -->
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama P</th>
                    <th>Alamat P</th>
                    <th>Nomor HP P</th>
                    <th>Jenis Layanan</th>
                    <th>File Surat Permohonan</th>
                    <th>File Surat Kuasa</th>
                    <th>Detail</th>
                  </tr>
                  </thead>
                  <tbody>

                    @php
                        $no = 1 ; 
                    @endphp

                    @forelse ($permohonans as $permohonan)
                    <tr>
                       <td>{{ $no++ }}</td>
                        <td>{{ $permohonan->nama_pemohon }}</td>
                        <td>{{ $permohonan->alamat_pemohon }}</td>
                        <td>{{ $permohonan->nomor_hp_pemohon }}</td>
                        <td>{{ $permohonan->jenis_layanan == '1' ? 'Layanan KK' : ' Layanan KK + POS' }}</td>
                        
                        <td>
                          @if ($permohonan->surat_permohonan != null)
                              {{ $permohonan->surat_permohonan }}
                          @else
                           <a href="{{ route('unduhSuratPernyataan') }}" class="badge badge-info">Unduh template Surat Pernyataan </a>
                          @endif
                        </td>
                        <td>

                          @if ($permohonan->jenis_layanan == '2' && $permohonan->surat_kuasa == null)
                              <a href="{{ route('unduhSuratKuasa') }}" class="badge badge-info">Unduh template Surat Kuasa </a>
                          @elseif ($permohonan->jenis_layanan == '2' && $permohonan->surat_kuasa != null)
                            {{ $permohonan->surat_kuasa }}
                          @else
                              -
                          @endif
                           
                        </td>
                        <td><a href="{{ route('permohonan.detail',$permohonan->id_permohonan) }}">Detail</a></td>
                    </tr>
                       
                    @empty
                        <td colspan="6">Data Belum ditemukan</td>
                    @endforelse

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
@endsection