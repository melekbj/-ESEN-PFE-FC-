<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Fastcare</title>


  <link href="{{ asset('/icon.png') }}" rel="icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('medtemp/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('medtemp/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('medtemp/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  {{-- <link rel="stylesheet" href="{{ asset('medtemp/plugins/jqvmap/jqvmap.min.css') }}"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('medtemp/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('medtemp/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('medtemp/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('medtemp/plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
     
       <li class="nav-item dropdown" style="margin-right: 10px" >
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          {{Auth::user()->name}}
        </a>
        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right" >
          <a class="dropdown-item" href="{{route('medecin.profile')}}"><i class="fas fa-user mr-2"></i> Mon profil</a>

          <a  class="dropdown-item" href="{{ url('/logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            <i class="fas fa-door-open mr-2"></i> Deconnecter
          </a>
          
        </div>
      </li> 
      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{ asset('/icon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">FastCare</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/icon9.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info text-white">
          {{Auth::user()->name}}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item ">
            <a href="{{route('medecin.listerdv')}}" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Liste des rendez-vous 
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('medecin.listepat')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Liste des patients 
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="{{route('medecin.histrdv')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                historique des rendez-vous 
              </p>
            </a>
           
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

@yield('content')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('medtemp/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('medtemp/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('medtemp/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('medtemp/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('medtemp/plugins/sparklines/sparkline.js') }}"></script>

<script src="{{ asset('medtemp/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('medtemp/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('medtemp/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('medtemp/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('medtemp/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('medtemp/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('medtemp/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('medtemp/dist/js/pages/dashboard.js') }}"></script>

  <!-- Custom jQUERY -->

<script>

    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
    });

    $(function(){

    //  Update Personal info 
    $('#MedInfoForm').on('submit', function(e){
      e.preventDefault();

      $.ajax({
        url: $(this).attr('action'),
        method: $(this).attr('method'),
        data: new FormData(this),
        processData:false,
        dataType: "json",
        contentType: false,
        beforeSend: function () {
          $(document).find('span.error-text').text('');
        },
        success: function (data) {
          if(data.status == 0 ){
            $.each(data.error, function(prefix, val){
              $('span.'+prefix+'_error').text(val[0]);
            });
          }else{
            $('#MedInfoForm')[0].reset();
            alert(data.msg);
          }
        }
      });
    });
    
  });

   

</script>


<script>
  setTimeout(function() {
  $('#successMessage').fadeOut('fast');
    }, 3000); 
</script>



</body>
</html>
