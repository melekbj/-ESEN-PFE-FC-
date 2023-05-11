<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FastCare</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">

        <link href="{{ asset('/icon.png') }}" rel="icon">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'> 

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/lib/twentytwenty/twentytwenty.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
       
    </head> 

    <body>

    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="{{url('/')}}" class="navbar-brand p-0">
            <h1 class="m-0 text-primary"><img class="logo" src="{{asset('images/logo.png')}}" />FastCare</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{url('/')}}" class="nav-item nav-link">Accueil</a>
                <a href="{{url('/about')}}" class="nav-item nav-link">À Propos</a>
                <a href="{{url('/service')}}" class="nav-item nav-link">Services</a>
                <a href="{{url('/contact')}}" class="nav-item nav-link">Contact</a>
            </div>
            <button type="button" class="btn text-secondary" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
            
            @guest
            
            <a href="{{route('login')}}" class="lien py-2">{{__('Se connecter')}}</a>/
             @if (Route::has('register'))
             <a href="{{route('register')}}" class="lien py-2">{{__('S\'inscrire')}}</a>
             @endif  
            @else                 
                    <a href="{{ url('/logout') }}"
                      class="lien py-2"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                          {{__('Deconnecter')}}
                    </a>

               <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    @csrf
                        </form>


            @endguest
                                    
                                

        </div>
    </nav>
   


@yield('content')


    {{-- <!-- Newsletter Start -->
    <div class="container-fluid position-relative pt-5 wow fadeInUp" data-wow-delay="0.1s" style="z-index: 1;">
        <div class="container">
            <div class="bg-primary p-5">
                <form class="mx-auto" style="max-width: 600px;">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-3" placeholder="Votre mail">
                        <button class="btn btn-dark px-4">S'inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Newsletter End --> --}}

    <br><br><b><br><br><br>
    

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light py-5 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: -75px;">
        <div class="container pt-5">
            <div class="row g-5 pt-4">
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Accès  Rapides</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="{{url('/')}}"><i class="bi bi-arrow-right text-primary me-2"></i>Accueil</a>
                        <a class="text-light mb-2" href="{{url('/about')}}"><i class="bi bi-arrow-right text-primary me-2"></i>À propos</a>
                        <a class="text-light mb-2" href="{{url('/service')}}"><i class="bi bi-arrow-right text-primary me-2"></i>Nos Services</a>
                        <a class="text-light" href="{{url('/contact')}}"><i class="bi bi-arrow-right text-primary me-2"></i>Contact </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Nos Spécialités</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <i class="bi bi-arrow-right text-primary mb-2 "> <span class="text-light " style="font-style: normal;">  Dentiste</span></i>
                        <i class="bi bi-arrow-right text-primary mb-2 "> <span class="text-light "style="font-style: normal;">  Cardiologue</span></i>
                        <i class="bi bi-arrow-right text-primary mb-2 "> <span class="text-light "style="font-style: normal;">  Nutritionniste</span></i>
                        <i class="bi bi-arrow-right text-primary mb-2 "> <span class="text-light  "style="font-style: normal;">  Psychologue</span></i>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Nous Contacter</h3>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>4 Ensaf, Cite Ettahrir</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>fastcare@gmail.com</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+216 24 892 764</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Suivez-Nous</h3>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-light py-4" style="background: #051225;">
        <div class="container">
            <div class="row g-0">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0"> Tous les droits sont réservés&nbsp;&copy;&nbsp;FastCare</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   
    <script src=" {{ asset('assets/lib/wow/wow.min.js') }} "></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.j') }}s"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('assets/lib/twentytwenty/jquery.event.move.js') }}"></script>
    <script src="{{ asset('assets/lib/twentytwenty/jquery.twentytwenty.js') }}"></script>

                <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>



    </body>
</html>
