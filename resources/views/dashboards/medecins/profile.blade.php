@extends('dashboards.medecins.layout')
@section('content')



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profil</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
            <li class="breadcrumb-item ">Profil Utilisateur</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="{{asset('images/icon3.png')}}"
                     alt="User profile picture">
              </div>

              <h2 class="profile-username text-center">{{Auth::user()->name}}</h2>
              <h6 class="profile-username text-primary text-center"  style="font-size: 15px">{{Auth::user()->email}}</h6>
               <h6 class="profile-username text-primary text-center" style="font-size: 15px">
                {{Auth::user()->specialite->labelSpec}}
                
               </h6> 
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#personal_info" data-toggle="tab">Informations personnelles</a></li>
                <li class="nav-item"><a class="nav-link" href="#change_password" data-toggle="tab">Changer mot de passe</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="personal_info">
                  <form class="form-horizontal" method="POST" action="{{route('medecin.updateInfo')}}" id="MedInfoForm">
                    @csrf
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Nom et prénom</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" value="{{Auth::user()->name}}">
                        <span class="text-danger error-text name_error"></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Adresse e-mail</label>
                      <div class="col-sm-10">
                        <input disabled type="text" name="email" class="form-control" id="inputEmail" placeholder="Email" value="{{Auth::user()->email}}">
                        <span class="text-danger error-text email_error"></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Numéro de téléphone</label>
                      <div class="col-sm-10">
                        <input type="text" autocomplete="off" name="num" class="form-control" id="inputNum" placeholder="+216 204 201 20" value="{{Auth::user()->num}}">
                        <span class="text-danger error-text num_error"></span>
                      </div>
                    </div>      
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Modifier </button>
                      </div>
                    </div>
                  </form>
                  <!-- /.post -->
                </div> 
                <div class="tab-pane" id="change_password">
                  <form class="form-horizontal" action="{{ route('medecin.changePassword') }}" method="POST" id="changePasswordMedForm">
                    @csrf
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Mot de passe actuel</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="current_password" placeholder="tapez ici..." name="oldpassword">
                        
                        @error('oldpassword')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Nouveau mot de passe</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="tapez ici..." name="password">
                         @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Confirmer mot de passe</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="password_confirmation" placeholder="tapez ici..." name="password_confirmation">
                        @error('password_confirmation')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Valider </button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
            </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>


@endsection