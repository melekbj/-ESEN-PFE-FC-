@extends('dashboards.users.layout')

@section('content')
<br><br><br>
@if(session()->has('message'))
    <div id="successMessage" class="alert alert-info " style="font-size: 15px">
    {{session()->get('message')}}
    </div>
  @endif
  <br>
  <div class="s013">
    
    <form method="GET" action="" class="">
        <h3 class="text-legend text-dark">Trouvez votre médecin en un seul clic</h3>
    
      <div class="inner-form">
        <div class="left">
          <div class="input-wrap second">
            <div class="input-field second">
              <div class="input-field second">
                <label class="label2">Spécialité</label>
                <div class="input-select">
                  <select data-trigger="" name="specialite">
                    <option placeholder="">Choisir spécialité</option>
                    @foreach($specs->unique('idSpec') as $spec)
                    <option value="{{$spec->idSpec  }}" 
                      @if($request->has("specialite") and $request->specialite == $spec->idSpec) selected='selected' @endif>{{$spec->labelSpec }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="input-wrap second">
            <div class="input-field second">
              <label class="label2" >Ville</label>
              <div class="input-select">
                <select data-trigger="" name="ville">
                  <option placeholder="">Choisir ville</option>
                  @foreach($villes->unique('idVille') as $ville)
                  <option value="{{$ville->idVille }}" @if($request->has("ville") and $request->ville == $ville->idVille) selected='selected' @endif >{{$ville->nomVille }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <button class="btn-search btn-success" type="submit">Chercher</button>
      </div>
    </form>
  </div>
    
    
  <div class="">
    <div class="x_panel  ">
      <div class="x_title">
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link ml-5"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>

      <div class="x_content ">


        <div class="table-responsive">
          <table class="table table-striped jambo_table bulk_action">
            <thead>
              <tr class="headings">
                <th>
                  {{-- <input type="checkbox" id="check-all" class="flat"> --}}
                  <i class="fa fa-user"></i>
                </th>
                <th class="column-title h6">Nom et prénom </th>
                <th class="column-title h6">Adresse e-mail </th>
                <th class="column-title h6">Numéro de téléphone  </th>
                <th class="column-title h6"> </th>
                
              </tr>
            </thead>

            <tbody>
              <tr class="even pointer">
                @foreach($users as $user)
                @if ($user==[])
                    <p>rien</p>
                @else
                <th class="h6" scope="row"><i class="fa fa-user"></i> </th>
                <td class="h6" >{{ $user->name }}</td>
                <td class="h6">{{ $user->email }}</td>
                <td class="h6">{{ $user->num  }}</td>
                <td class="last" >
                  <a href="{{ route('user.detailrdv') }}?idMed={{ $user->id }}&idpatient={{Auth::user()->id}}">
                  <button onclick="detailRdv()" class="btn btn-success" style="font-size: 13px">Prende rendez-vous</button></a>
                </td>
              </tr>
              @endif
              @endforeach 
            </tbody>
          </table>
        </div>
  <br><br><br><br><br><br>

      </div>
    </div>
  </div>           




@endsection