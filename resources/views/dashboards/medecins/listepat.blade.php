@extends('dashboards.medecins.layout')
@section('content')

<div class="content-wrapper">
  @if(session()->has('message'))
        <div id="successMessage" class="alert alert-success">
        {{session()->get('message')}}
        </div>
      @endif
    <br>
    <!-- Main content -->
    <section class="content">

      
<!-- Alert content -->
          <table class="table col-md-8" style="margin-left: 20%">
             <p class="text-center text-danger h4">
             Si un patient vous dérange !!!
             </p> 
            <tbody>
              @foreach($admins as $item)
              {{-- @if ($item->role==1) --}}
                <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->num }}</td>
                  <td>
                    <a href="{{ route('medecin.alerte',$item->id)}}" >
                      <button class="btn btn-danger btn-sm">Envoyer un mail</button></a>
                  </td>

                

                </tr>
                {{-- @endif --}}
              @endforeach  

            </tbody>
          </table>
<!-- End alert content -->

<!-- Liste patient content -->

      <div class="card">
        <div class="card-header">
          <h4 class=" text-center">Liste des patients</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nom et prénom</th>
                <th>email</th>
                <th>Numéro</th>
              </tr>
            </thead>
            <tbody>

              @foreach($patients->unique('id') as $item)
                @if ($item->block==0) 
                  <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->num }}</td>
                  </tr>
                @endif
              @endforeach  

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>

<!-- End liste patient content -->

    </section>
    <!-- /.content -->
  </div>





@endsection