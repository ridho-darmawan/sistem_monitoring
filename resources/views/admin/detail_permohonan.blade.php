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
                     <a href="{{ route('permohonan') }}" class="btn btn-warning mb-2">
                                    <i class="fa fa-out"></i>
                                    Kembali
                                </a>
                    <!-- general form elements -->
                    <div class="card card-default">
                        
                        <div class="card-header">
                            <h3 class="card-title">
                               
                                Hasil Telusur Informasi Perkara
                                
                            </h3>
                        </div>

                        <div class="card-body">

                            @if ($permohonan->nomor_perkara_permohonan == null)
                                <a href="#tambahNomorPerkara" class="btn btn-default mb-4" data-toggle="modal"  data-keyboard="false" data-backdrop="static">
                                    <i class="fa fa-plus"></i>
                                    Tambah Nomor Perkara
                                </a>
                                 @include('admin.modalTambahNomorPerkara')
                            @else
                                <a href="#editNomorPerkara" class="btn btn-default mb-4" data-toggle="modal"  data-keyboard="false" data-backdrop="static">
                                    <i class="fa fa-edit"></i>
                                    Edit Nomor Perkara
                                </a>
                                 @include('admin.modalEditNomorPerkara')
                            @endif

                            @if ($permohonan->tanggal_putusan != null & $permohonan->file_kk != null & $permohonan->resi_pos == null)
                                <a href="#inputResiPos" class="btn btn-success mb-4" data-toggle="modal"  data-keyboard="false" data-backdrop="static">
                                    <i class="fa fa-edit"></i>
                                    Input No Resi POS
                                </a>
                                 @include('admin.modalInputNoResi')

                            @elseif($permohonan->tanggal_putusan != null & $permohonan->file_kk != null & $permohonan->resi_pos != null)
                                 <a href="#editResiPos" class="btn btn-success mb-4" data-toggle="modal"  data-keyboard="false" data-backdrop="static">
                                    <i class="fa fa-edit"></i>
                                    Edit No Resi POS
                                </a>
                                 @include('admin.modalEditNoResi')
                            @endif

                           

                            

                           
                           
                           
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nomor Perkara</th>
                                        <th>Pemohon</th>
                                        <th>Termohon</th>
                                        <th>Jenis Layanan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <td>{{ $permohonan->nomor_perkara_permohonan != null ? $permohonan->nomor_perkara_permohonan : '-'  }}</td>
                                    <td>{{ $permohonan->nama_pemohon }}</td>
                                    <td>{{ $permohonan->nomor_perkara_permohonan != null ? $permohonan->pihak2_text : '-' }}</td>
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
                                                        <td>{{ $permohonan->nomor_perkara_permohonan != null ? date('d-M-Y', strtotime($permohonan->tanggal_pendaftaran)) : '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jenis Perkara</th>
                                                        <td>{{ $permohonan->nomor_perkara_permohonan != null ? $permohonan->jenis_perkara_text : '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal Putus</th>
                                                        <td>{{ $permohonan->tanggal_putusan != null ? date('d-M-Y', strtotime($permohonan->tanggal_putusan)) : '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Akta Cerai</th>
                                                        <td>{{ $permohonan->nomor_akta_cerai != null ? $permohonan->nomor_akta_cerai : '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Kartu Keluarga</th>
                                                        <td>{{ $permohonan->no_kk != null ? $permohonan->no_kk : '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Resi Pos</th>
                                                        <td>{{ $permohonan->resi_pos != null ? $permohonan->resi_pos : '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor HP Pemohon</th>
                                                        <td>{{ $permohonan->nomor_hp_pemohon }}</td>
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
                                                                        <td>{{ $permohonan->nama_pemohon }}</td>
                                                                        <td>{{ $permohonan->alamat_pemohon }}</td>
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
                                                                        <td>{{ $permohonan->nomor_perkara_permohonan != null ? $termohon->nama : '-' }}</td>
                                                                        <td>{{ $permohonan->nomor_perkara_permohonan != null ? $termohon->alamat : '-' }}</td>
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
                                                                <a href="#uploadSuratKuasa" data-toggle="modal" data-keyboard="false" data-backdrop="static">upload surat kuasa</a>
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
                                                                <a href="#uploadKK" data-toggle="modal" data-keyboard="false" data-backdrop="static">Upload Kartu Keluarga Baru</a>
                                                                @include('admin.modalUploadKK')

                                                            @else     
                                                                <a href="#previewKK" data-toggle="modal" data-keyboard="false" data-backdrop="static" class="btn btn-sm btn-info">Lihat </a> |

                                                                @include('admin.modalPreviewKK')   

                                                                <a href="#editKK" data-toggle="modal" data-keyboard="false" data-backdrop="static" class="btn btn-sm btn-danger">Edit </a> 

                                                                @include('admin.modalEditKK')
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