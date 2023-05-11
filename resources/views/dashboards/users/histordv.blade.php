@extends('dashboards.users.layout')

@section('content')


<div class="x_panel">
    <div class="x_title">
      <h3 class="text-center"> Historique des rendez-vous   </h3>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
    
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            {{-- <th>Patient</th> --}}
            <th class="h6">Medecin</th>
             <th class="h6">Spécialité</th>
            <th class="h6">Ville</th> 
            <th class="h6">date de rendez-vous</th>
            <th class="h6">Heure exacte</th>
            <th class="h6">Etat</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($rendezv as $item)
            <tr>
                <th class="h6">{{ $loop->iteration }}</th>
                <td class="h6">Dr.{{ $item->medecin->name }}</td> 
                <td class="h6">{{ $item->medecin->specialite->labelSpec }}</td>
                <td class="h6">{{ $item->medecin->ville->nomVille }}</td>
                <td class="h6 text-danger">{{ $item->dateRdv }}</td>
                <td class="h6 text-danger">{{ $item->heureRdv }}</td>  
                
                @if($item->etat==1)
                <td class="h6 ">rendez-vous <strong class="text-success">Accepté</strong> </td>
                @elseif($item->etat==0)
                  <td class="h6 text-primary">En cours de traitement <strong>...</strong> </td>
                @else($item->etat==-1)
                  <td class="h6 ">rendez-vous <strong class="text-danger">Reporté</strong> </td>
                @endif
            </tr>
            @endforeach
        </tbody>
      </table>

    </div>
  </div>


@endsection