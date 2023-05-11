<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>Fastcare</title>
  <link href="{{ asset('/icon.png') }}" rel="icon">

<!-- Vendor CSS Files -->
  <link href="{{ asset('assets2/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets2/css/style.css') }}" rel="stylesheet">



</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{url('/')}}" class="logo d-flex align-items-center">
        <img src="{{asset('images/logo.png')}}" alt=""/>
        <span class="d-none d-lg-block">FastCare</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
      
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('images/icon1.png')}}" alt="user" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-dark">{{Auth::user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{Auth::user()->name}}</h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                        </form>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav mb-5" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.liste_approvals')}}">
          <i class="bi bi-journal-text"></i><span>Liste des médecins non approuvés</span>
        </a>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('medecins')}}">
          <i class="bi bi-journal-text"></i><span>Liste des médecins</span>
        </a>
      </li><!-- End Forms Nav -->
     
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('patients')}}">
          <i class="bi bi-journal-text"></i><span>Liste des patients</span>
        </a>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.rdvs')}}">
          <i class="bi bi-journal-text"></i><span>Liste des rendez-vous</span>
        </a>
      </li><!-- End Forms Nav -->

  

    </ul>

  </aside><!-- End Sidebar-->

  @yield('content')
  



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets2/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets2/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('assets2/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets2/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets2/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets2/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets2/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets2/js/main.js') }}"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
    setTimeout(function() {
    $('#successMessage').fadeOut('fast');
      }, 3000); 
  </script>

  @yield('scripts')
</body>
</html>