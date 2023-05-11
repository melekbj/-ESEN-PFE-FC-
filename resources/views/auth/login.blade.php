@extends('auth.layout')
@section('content')

<section class="vh-100" >
	<div class="container py-5 h-100">
	  <div class="row d-flex justify-content-center align-items-center h-100">
		<div class="col col-xl-9">
		  <div class="card bg-dark " style="border-radius: 1rem;">
			<div class="row g-0">
			  <div class="col-md-6 col-lg-5 d-none d-md-block">
				<img src="{{asset('images/care.png')}}"
				  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
			  </div>
			  <div class="col-md-6 col-lg-7 d-flex align-items-center">
				<div class="card-body p-4 p-lg-5 text-black">
					
									@if (session()->has('message'))
										<p id="successMessage" class="alert alert-info" >
											{{session()->get('message') }}
										</p>
									@endif
									@if (session()->has('error'))
									<p id="successMessage" class="alert alert-danger" >
										{{session()->get('error') }}
									</p>
									@endif
									@if (session('success'))
										<div class="col-sm-11">
											<div class="alert  alert-success alert-dismissible fade show" role="alert">
												{{ session('success') }}
											</div>
										</div>
									@endif

				  <form  method="POST" autocomplete="off" action="{{ route('login') }}">
					@csrf
  
					<h5 class="fw-normal text-secondary mb-3 pb-3" style="letter-spacing: 1px;">Connexion</h5>
  
					<div class="form-outline mb-4">
					  <input id="email" type="email" name="email" value="" required autofocus autocomplete="email" class=" input form-control form-control-lg mb-1" style="font-family:'Times New Roman', Times, serif; color:black;"/>
					  <label class="form-label text-light" for="form2Example17">Adresse e-mail</label>
					  <span class="text-danger">@error('email'){{ $message }}@enderror</span>
					</div>
  
					<div class="form-outline mb-4">
					  <input id="password" type="password" name="password" required data-eye class="pass form-control form-control-lg mb-1" style="font-family:'Times New Roman', Times, serif; color:black;" />
					  <label class="form-label text-light" for="form2Example27">Mot de passe</label>
					  <span toggle="#password-field" class="view-password  fa fa-fw fa-eye "></span>
					  <span class="text-danger">@error('password'){{ $message }}@enderror</span>
					</div>
					<div class="form-group d-md-flex">
		            	 <div class="w-50 text-left">
			            	{{-- <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label> --}}
									</div> 
									<div class="w-75" style="margin-left: 38%;margin-top: -5%;font-size:15px;">
										<a href="{{route('password.request')}}" class="text-decoration-underline">Mot de passe oublié</a>
									</div>
		            </div>
  
					<div class="pt-1 mb-4">
					  <button class="btn btn-primary btn-md" type="submit">Se connecter</button>
					</div>
  					<p class="mb-5 pb-lg-2 text-light">Vous n'avez pas un compte ?
						<a href="{{route('register')}}" style="color: #F57E57;">S'inscrire ici</a></p>
				  </form>
  
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </section>


@endsection