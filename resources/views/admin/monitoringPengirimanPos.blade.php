@extends('template')

@section('content')
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Monitoring Dokumen Belum Dikirim Via POS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Monitoring Dokumen Belum Dikirim Via POS</li>
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
              {{-- <div class="card-header">
                <h3 class="card-title">
                    
                </h3>
              </div> --}}
              <!-- /.card-header -->
              <div class="card-body">
              
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No. Perkara</th>
                    <th>Nama Penggugat</th>
                    <th>Alamat Penggugat</th>
                    <th>Nama Tergugat</th>
                    <th>Alamat Tergugat</th>
                    <th>Nomor KK</th>
                    <th>Tanggal Akta Cerai</th>
                    <th>Nomor Seri AC</th>
                    <th>Nomor Akta Cerai</th>
                    <th>Jenis Perkara</th>
                  </tr>
                  </thead>
                  <tbody>

                    @php
                        $no = 1 ; 
                    @endphp

                    @forelse ($monitoringPOS as $ac)
                    <tr>
                        
                        <td>{{ $no++ }}.</td>
                        <td>{{ $ac->nomor_perkara }}.</td>
                        <td>{{ $ac->pihak1_text }}.</td>
                        <td>{{ $ac->alamat_pemohon }}</td>
                        <td>{{ $ac->pihak2_text }}.</td>
                        <td>{{ $ac->alamat_termohon }}</td>
                        <td>{{ $ac->no_kk }}</td>
                        <td>{{ date('d-M-Y', strtotime($ac->tgl_akta_cerai)) }}</td>
                        <td>{{ $ac->no_seri_akta_cerai }}</td>
                        <td>{{ $ac->nomor_akta_cerai}}</td>
                        <td>{{ $ac->jenis_perkara_text }}</td>
                        
                      
                    </tr>
                       
                    @empty
                        <td colspan="10">Data Belum ditemukan</td>
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