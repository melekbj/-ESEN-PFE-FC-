@extends('dashboards.admins.layout')
@section('content')

<main id="main" class="main">



    <section class="section">
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h3 class="card-title text-center">Tous les rendez-vous</h3>
  
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Patient</th>
                      <th scope="col">Médecin</th>
                      <th scope="col">Date de rendez-vous</th>
                      <th scope="col">Heure de rendez-vous</th>
                      <th scope="col">Etat</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($rdvs as $rv)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$rv->idPatient}}</td>
                      <td>{{$rv->idMedecin}}</td>
                      <td>{{$rv->dateRdv}}</td>
                      <td>{{$rv->heureRdv}}</td>
                      <td>{{$rv->etat}}</td>
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
  
  
    </main><!-- End #main -->
  





@endsection