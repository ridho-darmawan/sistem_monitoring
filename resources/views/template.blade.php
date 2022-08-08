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
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <img src="{{ asset('assets/images/logo pa.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PA TBH</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item {{ request()->is('permohonan') ? 'active' : '' }}">
            <a href="{{ route('permohonan') }}" class="nav-link">Permohonan</a>
          </li>
          <li class="nav-item dropdown {{ request()->is('monitoring_ac') ? 'active' : '' }}">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Monitoring</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{ route('monitoring_ac') }}" class="dropdown-item">Akta Cerai Belum Keluar</a></li>
              <li><a href="{{ route('monitoring_kk') }}" class="dropdown-item">KK Belum Upload</a></li>
              <li><a href="#" class="dropdown-item">Data Belum Dikirim Via Pos</a></li>
            
            </ul>
          </li>
        </ul>

    
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item">
            <a class="dropdown-item" 
                href="{{ route('logout.admin') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout.admin') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('sweetalert::alert')
    @yield('content')
   
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

 <script type="text/javascript">
        
    $(document).ready(function(){
       $('#form-upload').submit(function(){
                    
          $('#spinner').addClass('spinner-border');
          $("#simpan-btn").css('pointer-events', 'none');
          $("#kembali-btn").css('pointer-events', 'none');

      });

      $("#cari-nomor-perkara").click(function(event){  
          event.preventDefault();
					var nomor = $("#nomor").val();
					var tahun = $("#tahun").val();
          var nomorPerkara = nomor + '/Pdt.G'  + '/' + tahun + '/PA.Tbh';

          console.log('full nomor perkara : ', nomorPerkara);
          let _token   = $('meta[name="csrf-token"]').attr('content');
					
            if(nomor == ''){
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
                    url   : "{{ URL::to('cekNomorPerkara') }}",
                    type:"POST",
                    
                    data:{
                        nomorPerkara:nomorPerkara,
                        _token: _token
                    },
                    success:function(response){
                        console.log(response.data);
                    if (response.data != null) {
                        document.getElementById("detail_perkara").innerHTML ='<table><tr><td>Nama Pemohon</td><td>:</td><td>'+response.data.pihak1_text+'</td></tr><tr><td>Nama Termohon</td><td>:</td><td>'+response.data.pihak2_text+'</td></tr><tr><td>Jenis Perkara</td><td>:</td><td>'+response.data.jenis_perkara_text+'</td></tr></table>';
                        document.getElementById("info").innerHTML='<b>*Jika data tersebut telah benar, silakan klik tombol Simpan.</b>';

                        $("#simpan-btn").removeClass('d-none');

                    } else {
                        document.getElementById("detail_perkara").innerHTML='';
                        document.getElementById("info").innerHTML='<b>*Data untuk Nomor Perkara Tersebut belum tersedia.</b>';
                        $("#simpan-btn").addClass('d-none');
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
