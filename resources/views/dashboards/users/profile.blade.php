@extends('dashboards.users.layout')
@section('content')

<div  role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Profil</h3>
      </div>
    </div>
    
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_content">
            <div class="col-md-3 col-sm-3  profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <img class="img-responsive avatar-view w-75" src="{{asset('images/picture.jpg')}}" alt="Avatar" style="margin-left: 30px">
                </div>
              </div>
              <h3 class="text-center text-dark">{{Auth::user()->name}}</h3>

              <ul class="list-unstyled user_data">
                <li class="text-center text-dark"><i class="fa fa-envelope user-profile-icon"></i> {{Auth::user()->email}}
                </li>
              </ul>

            </div>
            <div class="col-md-9 col-sm-9 ">
              <!-- start of user-activity-graph -->
              <div id="graph_bar" style="width:100%; height:280px;">
              
              
              
                <div class="col-md-11 col-sm-9  ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2> Informations personnelles</h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
  
                      <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Générale</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Changer mot de passe</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          
                  <form  method="POST" action="{{route('user.updateInfo')}}" id="UserInfoForm">
                    @csrf
                      
                      <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Nom et prénom<span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6">
                              <input type="text" value="{{Auth::user()->name}}" class="form-control"  name="name" placeholder="ex. John f. Kennedy"  />
                              <span class="text-danger error-text name_error"></span>
                          </div>
                      </div>
                      <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Numéro<span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6">
                              <input type="text" value="{{Auth::user()->num}}" class="form-control" class='optional' name="num"  /></div>
                              <span class="text-danger error-text num_error"></span>
                      </div>
                      <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">email<span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6">
                              <input disabled type="email" value="{{Auth::user()->email}}" class="form-control" name="email" class='email' type="email" /></div>
                              <span class="text-danger error-text email_error"></span>
                          </div>
                          <div class="form-group">
                              <div class="col-md-6 offset-md-3">
                                  <button type='submit' class="btn btn-primary">Modifier</button>
                                  <button type='reset' class="btn btn-danger">Réinitialiser</button>
                          </div>
                      </div>
                  </form>
                </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form class="form-horizontal" action="{{ route('user.changePassword') }}" method="POST" id="">
                              @csrf
                              <div class="form-group row">
                                <label for="inputName" class="col-sm-4 col-form-label">Mot de passe actuel</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="current_password" placeholder="Enter current password" name="oldpassword">
                                  
                                  @error('oldpassword')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
          
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputName2" class="col-sm-4 col-form-label">Nouveau mot de passe</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="password" placeholder="Enter new password" name="password">
                                   @error('password')
                                      <span class="text-danger">{{$message}}</span>
                                   @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputName2" class="col-sm-4 col-form-label">Confirmer mot de passe</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="password_confirmation" placeholder="ReEnter new password" name="password_confirmation">
                                  @error('password_confirmation')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10 ">
                                  <button type="submit" class="btn btn-danger mb-5" style="margin-bottom: 20px">Mettre à jour</button>
                                </div>
                                <br><br><br>
                              </div>
                            </form>
                           
                          
                        </div>
                       
          </div>
        </div>
      </div>      
    </div>

@endsection
