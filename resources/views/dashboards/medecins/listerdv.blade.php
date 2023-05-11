@extends('dashboards.medecins.layout')
@section('content')

<div class="content-wrapper">
<br>
    <!-- Main content -->
    <section class="content">

      @if (session()->has('message'))
       <p id="successMessage" class="alert alert-success" >
           {{session()->get('message') }}
       </p>
      @endif
      
      <div class="card">
        <div class="card-header">
          <h3 class="text-center">Liste de rendez-vous</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Patient</th>
                <th>Numéro de téléphone</th>
                <th>Date de rendez-vous</th>
                <th>Heure exacte</th>
                <th > </th>
              </tr>
            </thead>
            <tbody>

              @foreach($rendezv as $item)
                <tr>
                  <td>{{ $loop->iteration}}</td>
                  <td>{{ $item->patient->name }}</td>
                  <td>{{ $item->patient->num }}</td> 
                  <td>{{ $item->dateRdv }}</td>
                  <td>{{ $item->heureRdv }}</td>

                  {{-- @if($item->etat==1)
                   <td class="text-success">Accepté</td>
                  @elseif($item->etat==0)
                   <td>En attente </td>
                  @else($item->etat==-1)
                   <td class="text-danger">Reporté </td>
                  @endif --}}
                
                  <td>
                    <a href="{{ route('medecin.accepter',['id'=>$item->id])}}">
                      <button class="btn btn-success btn-sm">Accepter</button></a>

                    <a href="{{ url('/rendezvous/' . $item->id . '/edit') }}" >
                      <button class="btn btn-danger btn-sm">Reporter</button></a>
                  </td>
                  {{-- <td>
                    <a href="{{ route('medecin.alerte',$item->id)}}" >
                      <button class="btn btn-danger btn-sm">Envoimail</button></a>
                  </td> --}}

                </tr>
                
              @endforeach  
              

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>


@endsection