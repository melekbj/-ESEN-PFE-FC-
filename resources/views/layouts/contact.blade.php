@extends('layouts.layout')
@section('content')
 

    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Contact</h1>
                <a href="" class="h4 text-white">Accueil</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Contact</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->

<!-- Contact Start -->
<div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 d-flex justify-content-center ">
                <div class="col-xl-6 col-lg-6 wow slideInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded h-100 p-5">
                        <div class="section-title">
                            <h5 class="position-relative d-inline-block text-primary text-uppercase">Contactez-nous</h5>
                            <h1 class="display-6 mb-4">Sentez-Vous Libre De Nous Contacter</h1>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h5 class="mb-0">Notre bureau</h5>
                                <span>Cité Éttahrir</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h5 class="mb-0">E-mail</h5>
                                <span>fastcare@gmail.com</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h5 class="mb-0">Numéro de téléphone</h5>
                                <span>+216 20 820 530</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-4 col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form>
                        <div class="row g-3">
                            <div class="col-12">
                                <input type="text" class="form-control border-0 bg-light px-4" placeholder="Your Name" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="email" class="form-control border-0 bg-light px-4" placeholder="Your Email" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control border-0 bg-light px-4" placeholder="Subject" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0 bg-light px-4 py-3" rows="5" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div> --}}
                <div class="col-xl-6 col-lg-12 wow slideInUp" data-wow-delay="0.6s">
                 <iframe class="position-relative rounded w-100 h-100"
                 src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d409987.5879705867!2d10.06370945895915!3d36.60163392835799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd3303adc42d23%3A0x70243630b8fc03e1!2sEttahrir!5e0!3m2!1sfr!2stn!4v1653304775989!5m2!1sfr!2stn"
                        frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe> 
                        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d409987.5879705867!2d10.06370945895915!3d36.60163392835799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd3303adc42d23%3A0x70243630b8fc03e1!2sEttahrir!5e0!3m2!1sfr!2stn!4v1653304775989!5m2!1sfr!2stn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->





@endsection