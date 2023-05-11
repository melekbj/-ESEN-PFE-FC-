<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FastCare </title>

  <link href="{{ asset('/icon.png') }}" rel="icon">
  <link href="{{ asset('css/searchForm.css') }}" rel="stylesheet"> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="{{ asset('use/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
      <!-- Custom Theme Style -->
    <link href="{{ asset('use/build/css/custom.css') }}" rel="stylesheet">
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('/') }}" class="site_title">
                
                <span>FastCare</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('images/icon4.png')}}" alt="use." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenue,</span>
                <h2>{{Auth::user()->name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Générale</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ route('user.accueil') }}"><i class="fa fa-home"></i> Accueil</span></a></li>
                  {{-- <li><a href="{{ route('user.profile') }}"><i class="fa fa-user"></i> Profil </a></li> --}}
                  <li><a href="{{ route('user.gestrdv') }}"><i class="fa fa-calendar"></i> Gérer rendez-vous </a></li>
                  <li><a href="{{ route('user.histordv') }}"><i class="fa fa-history"></i> Historique des rendez-vous </a></li>
                </ul>
              </div>
         

            </div>
            <!-- /sidebar menu -->

           
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right " >
                <li class="nav-item dropdown open" style="padding-left: 15px ;">
                  <a href="javascript:;" class="user-profile dropdown-toggle"  id="navbarDropdown" data-toggle="dropdown" >
                    <img src="{{asset('images/icon9.png')}}" alt="">{{Auth::user()->name}}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu " aria-labelledby="navbarDropdown" >
                    <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fa fa-user pull-right"></i>Mon profil</a>
                    <a class="dropdown-item" 
                    href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>

                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

@yield('content')

   <br><br><br><br><br>   

    <!-- jQuery -->
    <script src="{{ asset('use/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('use/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('use/build/js/custom.min.js') }}"></script>



     <script src="{{ asset('js/choices.js') }}"></script> 


     <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });
  
    </script>
    
    <script>

      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
      });
  
      $(function(){
  
      //  Update Personal info 
      $('#UserInfoForm').on('submit', function(e){
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
              $('#UserInfoForm')[0].reset();
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
}, 6000); 
  </script>



  </body>
</html>
