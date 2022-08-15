<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Monitoring</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">


  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>
<body class="hold-transition layout-top-nav" >
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="{{ asset('assets/images/logo pa.png') }}" alt="LOGO PA TEMBILAHAN" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistem Telusur Dokumen Perkara</span>
      </a>


      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->

      </div>


    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('sweetalert::alert')
         

        <section class="content mt-4">
           
            <div class="container-fluid ">
                    <div class="mb-1 mt-1">
                        <a href="{{ route('homepage') }}" class="btn btn-warning ">Kembali</a>
                    </div>
                <div class="card card-info">
                   
                    <div class="card-header">
                        <h3 class="card-title">Form Telusur Informasi Perkara</h3>
                    </div>
                    {{-- <form action="{{ route('welcome') }}" class="form-horizontal" method="GET" id="form-upload" enctype="multipart/form-data"> --}}
                    <form action="#" class="form-horizontal" method="POST" id="form-upload" enctype="multipart/form-data">
                    {{-- <form action="#" class="form-horizontal" method="POST" id="form-upload" enctype="multipart/form-data"> --}}
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Perkara</label>
                                <div class="col-sm-10">
                                  <div class="input-group">
                                    <input id="nomor" name="nomor" type="text" class="form-control " placeholder="0000" maxlength="4" required value="{{ old('nomor') }}">
                                    <input  type="text" class="form-control" value="Pdt.G" readonly="" >

                                    <select id="tahun" name="tahun" class="form-control " required value="{{ old('tahun') }}">
                                        @php
                                            $currently_selected = date('Y');
                                            $earliest_year = 2022;
                                            $latest_year = date('Y');
                                        @endphp

                                        @foreach (range($latest_year,$earliest_year) as $year)
                                            <option  value="{{ $year }}" {{ $year === $currently_selected ? 'selected' : '' }} >{{ $year }}</option>
                                        @endforeach
                                    </select>

                                    <input type="text" id="kode_satker" class="form-control text-center" value="PA.Tbh" readonly="" required>

                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nomor_hp_terdaftar" class="col-sm-2 col-form-label">Nomor HP Terdaftar</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="nomor_hp_terdaftar" id="nomor_hp_terdaftar" value="{{ old('nomor_hp_terdaftar') }}" required>
                                <small>*Contoh: 081201010101</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nomor_hp_terdaftar" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                  {{-- <button type="submit" id="cari-nomor-perkara"  class="btn btn-info">Cari Data</button> --}}
                                  {{-- <button type="submit"  class="btn btn-info">Cari Data</button> --}}
                                  <button type="button" id="cari-nomor-perkara1"  class="btn btn-info">Cari Data</button>
                                </div>
                            </div>

                             <div class="text-center">
                                <div  id="spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </section>



     <section class="content d-none" id="hasil-monitoring">
        <div class="container-fluid">
            <div class="row">
            <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                 <h3 class="card-title">Hasil Telusur Informasi Perkara</h3>
                            </h3>
                        </div>

                        <div class="card-body ">


                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>Nomor Perkara</th>
                                        <th>Pemohon</th>
                                        <th>Termohon</th>
                                        <th>Jenis Layanan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <td>
                                        <p id="nomor-perkara-pemohon"></p>
                                      {{-- {{ $permohonan->nomor_perkara_permohonan != null ? $permohonan->nomor_perkara_permohonan : '-'  }} --}}
                                    </td>
                                    <td>
                                      <table >
                                          <thead>
                                              <tr>
                                                  <th>Nama</th>
                                                  <th>Alamat</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td id="nama_p">
                                                  </td>
                                                  <td id="alamat_p">
                                                  </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                      {{-- {{ $permohonan->nama_pemohon }} --}}
                                    </td>
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
                                                  <td id="nama_t">
                                                  </td>
                                                  <td id="alamat_t">
                                                  </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                      {{-- {{ $permohonan->nomor_perkara_permohonan != null ? $permohonan->pihak2_text : '-' }}</td> --}}
                                    <td id="jenis_layanan">
                                      {{-- {{ $permohonan->jenis_layanan == '1' ? 'Layanan KK' : ' Layanan KK + POS' }} --}}
                                    </td>

                                </tbody>

                            </table>

                            <hr>

                            <div class="col-12">
                                <div class="card card-primary ">
                                     <div class="card-header">
                                        <h3 class="card-title">
                                            <h3 class="card-title">Data Umum</h3>
                                        </h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                            <table class="table table-bordered table-hover">

                                                    <tr>
                                                        <th width="20%">Tanggal Pendaftaran</th>
                                                        <td id="tanggal_pendaftaran">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jenis Perkara</th>
                                                        <td id="jenis_perkara">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal Putus</th>
                                                        <td id="tanggal_putusan"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Akta Cerai</th>
                                                        <td id="no_akta_cerai"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Kartu Keluarga</th>
                                                        <td id="no_kk"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Resi Pos</th>
                                                        <td id="no_resi">-</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor HP Pemohon</th>
                                                        <td id="no_hp_p">
                                                        </td>
                                                    </tr>



                                            </table>
                                        </div>



                                        </div>
                                    </div>
                                <!-- /.card -->
                                </div>

                                 <div class="card card-primary ">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <h3 class="card-title">File Dokumen</h3>
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                            <table class="table table-bordered table-hover">



                                                     <tr>
                                                        <th width="20%">Surat Permohonan</th>
                                                        <td id="surat_permohonan">
                                                           
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="20%">Surat Kuasa</th>
                                                        <td id="surat_kuasa">
                                                         
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="20%">File Kartu Keluarga</th>
                                                        <td id="file_kk">
                                                         
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
    </div>



  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    {{-- <div class="float-right d-none d-sm-inline">
      Anything you want
    </div> --}}
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 <a href="https://pa-tembilahan.go.id/">Pengadilan Agama Tembilahan</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dist/js/pages/dashboard2.js') }}"></script>


<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script  type="text/javascript" src="{{ asset('assets/dist/js/style.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


 <script type="text/javascript">

    $(document).ready(function(){
       $('#form-upload').submit(function(){

          $('#spinner').addClass('spinner-border');
          $("#cari-nomor-perkara1").css('pointer-events', 'none');

      });

      $("#cari-nomor-perkara1").click(function(event){
        //   $('#spinner').addClass('spinner-border');
        //   $("#cari-nomor-perkara1").css('pointer-events', 'none');
          event.preventDefault();
					var nomor = $("#nomor").val();
					var tahun = $("#tahun").val();
					var nomorHp = $("#nomor_hp_terdaftar").val();
          var nomorPerkara = nomor + '/Pdt.G'  + '/' + tahun + '/PA.Tbh';

          console.log('full nomor perkara : ', nomorPerkara);
          console.log('nomor hp : ', nomorHp);
          let _token   = $('meta[name="csrf-token"]').attr('content');

            if(nomor == '' || nomorHp == ''){
                //loading();
                swal({
                    title: 'Maaf!',
                    text: "Nomor tidak boleh kosong",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6'
                })
                $("#nomor").select();

            } else {

                $.ajax({
                    url   : "{{ URL::to('cekPerkaraPemohon') }}",
                    type:"POST",

                    data:{
                        nomorPerkara:nomorPerkara,
                        nomorHp:nomorHp,
                        _token: _token
                    },
                    success:function(response){
                        // console.log('data termohon = ',response.termohon);
                        console.log(response.data);
                    if (response.data != null) {
                        $("#hasil-monitoring").removeClass('d-none');
                        document.getElementById("nomor-perkara-pemohon").innerHTML = response.data.nomor_perkara_permohonan;
                        document.getElementById("nama_p").innerHTML = response.pemohon.nama;
                        document.getElementById("alamat_p").innerHTML = response.pemohon.alamat;
                        document.getElementById("nama_t").innerHTML = response.termohon.nama;
                        document.getElementById("alamat_t").innerHTML = response.termohon.alamat;
                        
                        if (response.data.jenis_layanan == 1) {
                            document.getElementById("jenis_layanan").innerHTML = 'Layanan KK';
                        }else{
                            document.getElementById("jenis_layanan").innerHTML = 'Layanan KK + POS';
                        }
                        document.getElementById("tanggal_pendaftaran").innerHTML = response.data.tanggal_pendaftaran;
                        document.getElementById("jenis_perkara").innerHTML = response.data.jenis_perkara_text;
                        
                        if (response.data.tanggal_putusan != null) {
                           document.getElementById("tanggal_putusan").innerHTML = response.data.tanggal_putusan;
                        }else{
                           document.getElementById("tanggal_putusan").innerHTML = '-';
                        }

                        if (response.data.nomor_akta_cerai != null) {
                           document.getElementById("no_akta_cerai").innerHTML = response.data.nomor_akta_cerai;
                        }else{
                           document.getElementById("no_akta_cerai").innerHTML = 'belum terbit';
                        }

                        if (response.data.no_kk != null) {
                           document.getElementById("no_kk").innerHTML = response.data.no_kk;
                        }else{
                           document.getElementById("no_kk").innerHTML = 'belum terbit';
                        }

                        if (response.data.resi_pos != null) {
                           document.getElementById("no_resi").innerHTML = response.data.resi_pos;
                        }else{
                           document.getElementById("no_resi").innerHTML = 'belum dikirim';
                        }

                        var x =2;
                        document.getElementById("no_hp_p").innerHTML = response.data.nomor_hp_pemohon;

                        var url = '{{ route("unduhSuratPernyataan", ":id") }}';
                        url = url.replace(':id', response.data.id_permohonan);

                        if (response.data.surat_permohonan != null) {
                                 document.getElementById("surat_permohonan").innerHTML = '<a class="badge badge-primary" href="'+url+'">Download</a>';
                        } else {
                             document.getElementById("surat_permohonan").innerHTML = '-';
                        }

                        var routeSuratKuasa = '{{ route("unduhSuratKuasa", ":id") }}';
                        urlSuratKuasa = routeSuratKuasa.replace(':id', response.data.id_permohonan);

                        if (response.data.surat_kuasa != null) {
                                 document.getElementById("surat_kuasa").innerHTML = '<a class="badge badge-primary" href="'+urlSuratKuasa+'">Download</a>';
                        } else {
                             document.getElementById("surat_kuasa").innerHTML = '-';
                        }

                        var routeKK = '{{ route("unduhKK", ":id") }}';
                        urlKK = routeKK.replace(':id', response.data.id_permohonan);

                        if (response.data.file_kk != null) {
                                 document.getElementById("file_kk").innerHTML = '<a class="badge badge-primary" href="'+urlKK+'">Download</a>';
                        } else {
                             document.getElementById("file_kk").innerHTML = '-';
                        }


                    } else {

                         swal({
                            title: 'Maaf!',
                            text: "Nomor Perkara daan Nomor Hp tidak sesuai",
                            icon: 'warning',
                            confirmButtonColor: '#3085d6'
                        })
                        // document.getElementById("detail_perkara").innerHTML='';
                        // document.getElementById("info").innerHTML='<b>*Data untuk Nomor Perkara Tersebut belum tersedia.</b>';
                        // $("#simpan-btn").addClass('d-none');
                    }

                    },
                    error: function(error) {
                        console.log(error);
                    }
                });


            }
        });

    });



</script>


</body>
</html>
