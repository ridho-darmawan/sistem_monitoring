@extends('template')

@section('content')
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Monitoring Akta Cerai Belum Keluar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Monitoring Akta Cerai</li>
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
                    <th>Ketua Majelis / Panitera Pengganti</th>
                    <th>Tanggal Daftar</th>
                    <th>Tanggal Putusan</th>
                    <th>Tanggal BHT</th>
                    <th>Jenis Perkara</th>
                  </tr>
                  </thead>
                  <tbody>

                    @php
                        $no = 1 ; 
                    @endphp

                    @forelse ($aktaCerai as $ac)
                    <tr>
                        
                        <td>{{ $no++ }}.</td>
                        <td>{{ $ac->nomor_perkara }}</td>
                        <td>{{ $ac->hakim_nama }}</td>
                        <td>{{ date('d-M-Y', strtotime($ac->tanggal_pendaftaran)) }}</td>
                        <td>{{ date('d-M-Y', strtotime($ac->tanggal_putusan ))}}</td>
                        <td>{{ date('d-M-Y', strtotime($ac->tanggal_bht)) }}</td>
                        <td>{{ $ac->jenis_perkara_text }}</td>
                        
                      
                    </tr>
                       
                    @empty
                        <td colspan="7">Data Belum ditemukan</td>
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