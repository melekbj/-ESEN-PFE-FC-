@extends('layouts.layout')
@section('content')


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">À Propos</h1>
                <a href="" class="h4 text-white">Accueil</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">À Propos</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->

  <!-- About Start -->

  <div class="container-fluid py-5 wow fadeInUp " data-wow-delay="0.1s">
    <div class="container d-flex justify-flex-center" >
        <div class="row g-5 d-flex justify-flex-center ">
            <div class="col-lg-12">
                <div style="margin-top: -50px">
                    <h3 class="position-relative d-inline-block text-dark text-uppercase">Qui sommes nous ?</h3> 
                </div>
                <div class="section-title mt-5">
                    <h5 class="position-relative d-inline-block text-primary text-uppercase fst-italic">Pour les patients</h5>   
                </div>
                <p class="mb-4 h5 text-dark fst-italic">
                    FastCare est une plateforme numérique qui vous offre la possibilité de trouver immédiatement un médecin à proximité de chez vous et de prendre un rendez-vous en ligne gratuitement.</p>
                <div class="section-title mt-5">
                    <h5 class="position-relative d-inline-block text-primary text-uppercase fst-italic">Pour les medecins</h5>   
                </div>
                <p class="mb-4 h5 text-dark fst-italic">
                    FastCare est un service complet de gestion de cabinet médical, qui optimise votre organisation et vous fait gagner du temps. Avec FastCare, vous partagez vos disponibilités en temps réel avec vos patients selon vos critères, tout en gardant la main sur votre agenda médical.</p>
                <div class="section-title ">
                    <h5 class="position-relative d-inline-block text-primary text-uppercase fst-italic">Nos objectifs</h5>   
                </div>
                <p class="mb-4 h5 text-dark fst-italic">
                    Nous travaillons pour fournir des services et des outils utiles au grand public, notamment aux patients, ainsi qu'aux médecins et autres professionnels du santé. 
                <br> <strong>FastCare</strong> cherche à proposer des solutions qui facilitent et améliorent l'accès de ses utilisateurs à des services médicaux de qualité grâce à une application simple, rapide et universelle.</p>

            </div> 
             
            <div class="row g-3">
                <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s" style="margin-left:10%">
                        <img  src="{{ asset('images/multicom.png') }}" alt="" class="w-50">   
                </div>
                <div class="col-sm-6 wow zoomIn mt-5" data-wow-delay="0.4s" style="margin-left:-15%">
                   <p class="mb-4 h5 text-dark  mt-3">
                       FastCare est un site developpe en collaboration avec la sociéte multicom
                       <br>multicom est une agence de marketing qui offre de nombreux services utiles tels que le developpement web, design, photography et plein d'autres...
                   </p>
                </div>
            </div>
          
        </div>
    </div>
</div>
<!-- About End -->


















@endsection