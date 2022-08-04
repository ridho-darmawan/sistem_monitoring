@extends('template')

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Data Permohonan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Data Permohonan</li>
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

                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nomor Perkaraa</th>
                                        <th>Pemohon</th>
                                        <th>Termohon</th>
                                        <th>Jenis Layanan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <td>-</td>
                                    <td>{{ $permohonan->nama_pemohon }}</td>
                                    <td>-</td>
                                    <td>{{ $permohonan->jenis_layanan == '1' ? 'Layanan KK' : ' Layanan KK + POS' }}</td>
                                
                                </tbody>
                                
                            </table>

                            <hr>

                            <div class="col-12">
                                <div class="card card-primary card-tabs">
                                    <div class="card-header p-0 pt-1">
                                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Data Umum</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Dokumen</a>
                                        </li>
                                       
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                            <table class="table table-bordered table-hover">
                                                
                                                    <tr>
                                                        <th width="20%">Tanggal Pendaftaran</th>
                                                        <td>kl</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jenis Perkara</th>
                                                        <td>kl</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal Putus</th>
                                                        <td>kl</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Akta Cerai</th>
                                                        <td>kl</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Kartu Keluarga</th>
                                                        <td>kl</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Resi Pos</th>
                                                        <td>kl</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor HP Pemohon</th>
                                                        <td>kl</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pemohon</th>
                                                        <td>
                                                            <table>
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nama</th>
                                                                        <th>Alamat</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>-</td>
                                                                        <td>-</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Termohon</th>
                                                        <td>
                                                            <table>
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nama</th>
                                                                        <th>Alamat</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>-</td>
                                                                        <td>-</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                               
                                               
                                            </table>
                                        </div>

                                        <div class="tab-pane fade " id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                             <table class="table table-bordered table-hover">
                                                
                                                    <tr>
                                                        <th width="20%">Surat Permohonan</th>
                                                        <td>
                                                            @if ($permohonan->surat_permohonan == null)
                                                                <a href="#uploadSuratPermohonan{{$permohonan->id_permohonan}}" data-toggle="modal" data-keyboard="false" data-backdrop="static">upload surat permohonan</a>
                                                                @include('admin.modalUploadPermohonan')
                                                            @else      
                                                            
                                                            <a href="#previewPermohonan" data-toggle="modal" data-keyboard="false" data-backdrop="static" class="btn btn-sm btn-info">Lihat </a> |

                                                             @include('admin.modalPreviewPermohonan')

                                                            <a href="#editSuratPermohonan" data-toggle="modal" data-keyboard="false" data-backdrop="static" class="btn btn-sm btn-danger">Edit </a> 

                                                             @include('admin.modalEditSuratPermohonan')

                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="20%">Surat Kuasa</th>
                                                        <td>
                                                            @if ($permohonan->jenis_layanan == '1')
                                                                -
                                                            @elseif($permohonan->jenis_layanan == '2' && $permohonan->surat_kuasa == null)
                                                                <a href="#uploadSuratKuasa{{$permohonan->id_permohonan}}" data-toggle="modal" data-keyboard="false" data-backdrop="static">upload surat kuasa</a>
                                                                @include('admin.modalUploadKuasa')
                                                            @else
                                                                <a href="#previewSuratKuasa" data-toggle="modal" data-keyboard="false" data-backdrop="static" class="btn btn-sm btn-info">Lihat </a> |

                                                                @include('admin.modalPreviewSuratKuasa')

                                                                <a href="#editSuratKuasa" data-toggle="modal" data-keyboard="false" data-backdrop="static" class="btn btn-sm btn-danger">Edit </a> 

                                                                @include('admin.modalEditSuratKuasa')
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="20%">File Kartu Keluarga</th>
                                                        <td>
                                                            @if ($permohonan->file_kk == null)
                                                                <a href="">Upload Kartu Keluarga Baru</a>
                                                            @else                                                                
                                                                <a href="#">Lihat</a> |
                                                                <a href="#">Edit</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                             </table>
                                        </div>
                                       
                                        </div>
                                    </div>
                                <!-- /.card -->
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection