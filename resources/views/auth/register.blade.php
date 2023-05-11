 @extends('auth.layout')
 @section('content')

 <head>
  <link rel="stylesheet" type="text/css" href="{{asset('css/register.css') }} ">
</head>

<section class="background-radial-gradient overflow-hidden">
    
  
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            La meilleure offre  <br />
            <span style="color: hsl(218, 81%, 75%)">pour un soin rapide</span>
          </h1>
          <img src="{{ asset('images/regist.png') }}" class=" mb-4 opacity-70" style="color: hsl(218, 81%, 85%)"/>
        
        </div>
  
        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
  
          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">


                      {{-- '''''select''''''' --}}
                          <h1 class=" text-center mb-4">Inscription</h1>
                          <div class="ms-5 select mb-3 " style="margin-right:30% ">
                            <select class="select1 " id="seeAnotherFieldGroup">
                                <option selected disabled>Vous êtes un professionnel de santé ?</option>
                                <option value="no">Non/Patient</option>
                                <option value="yes">Oui/Doctor</option>
                            </select>
                          </div>
                      {{-- '''''select''''''' --}}

                  

              <form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('register') }}" enctype="multipart/form-data">
                    {{-- @if ($errors->any())    
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    @endif --}}
                    @if ( Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if ( Session::get('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div> 
                    @endif

                @csrf
            
                <!-- Name input -->
                <div class="form-outline ">
                  <label class="form-label text-dark" for="name">Nom et Prénom</label>
                    <input id="name" type="text" class="form-control mb-2" name="name"  autofocus required value="{{ old('name') }}" />
                    
                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                </div>
                <!-- Numero input -->
                <div class="form-outline ">
                  <label class="form-label text-dark" for="num">Numéro de téléphone</label>
                    <input id="num" type="text" class="form-control mb-2" name="num" 
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required  />
                   
                    <span class="text-danger">@error('num'){{ $message }}@enderror</span>
                </div>

                  <div id="otherFieldGroupDiv">
                    <!-- Specialite input -->
                    <div class="form-outline ">
                      <label class="form-label text-dark" for="specialite">Specialite</label>
                      <select id="specialite" name="specialite" class="form-select bg-light border-0 mb-3" style="height: 40px;">
                        <option value="" selected>Choisir une specialite</option>
                        @foreach($specialites as $spec)
                        <option value="{{$spec->idSpec  }}" > {{$spec->labelSpec }}</option>
                        @endforeach
                      </select> 

                        <span class="text-danger">@error('specialite'){{ $message }}@enderror</span>
                    </div>
                    <!-- Ville input -->
                    <div class="form-outline ">
                      <label class="form-label text-dark" for="ville">Ville</label>
                      <select id="ville" name="ville" class="form-select bg-light border-0 mb-3" style="height: 40px;">
                        <option value="" selected>Choisir une ville</option>
                        @foreach($villes as $ville)
                        <option value="{{$ville->idVille }}"  >{{$ville->nomVille }}</option>
                        @endforeach
                      </select> 
                        <span class="text-danger">@error('ville'){{ $message }}@enderror</span>
                    </div>
                      <!-- file input -->
                    <div class="form-outline">
                      <label class="form-label text-center text-dark" for="avatar">Vous devez télécharger votre Certificat</label>
                      <input  id="avatar" type="file" name="avatar" class="form-control bg-white mb-2"  />
                      <span class="text-danger">@error('avatar'){{ $message }}@enderror</span>
                    </div>
                  </div>
               
                <!-- Email input -->
                <div class="form-outline ">
                  <label class="form-label text-dark" for="email">Adresse e-mail</label>
                  <input required  id="email" type="email" class="form-control mb-2" name="email"  value="{{ old('email') }}" />
                 
                  <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>
  
                <!-- Password input -->
                <div class="form-outline ">
                  <label class="form-label text-dark" for="password">Mot de passe</label>
                  <input required id="password" type="password" class="form-control mb-2" name="password"  data-eye  />
                  
                  <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                </div>

                <!-- Password confirm -->
                <div class="form-outline ">
                  <label class="form-label text-dark" for="password-confirm">Confirmer mot de passe</label>
                    <input  id="password-confirm" type="password" class="form-control mb-2" name="password_confirmation" required data-eye />
                    
                    <span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
                  </div>
  
                <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-2">
                <div class="custom-checkbox custom-control">
                  <input type="checkbox" name="agree" id="agree" class="form-check-input me-2" required>
                  <label for="agree" class="form-check-label">J'accepte les <a href="#">Termes et Conditions</a></label>
                  <div class="invalid-feedback">
                    Vous devez respecter nos Termes et Conditions
                  </div>
                </div>
              </div>

                <input type="hidden" name="role" value="2" id="role"/>
  
                <!-- Submit button -->
                <div class="d-flex justify-content-center">
                <button type="submit" class="button btn btn-success btn-block mb-6">
                  S'inscrire
                </button>
                </div>

                <div class="mt-2 text-center">
                  Vous avez déjà un compte? <a href="{{route('login')}}">Connexion</a>
                </div>
  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection