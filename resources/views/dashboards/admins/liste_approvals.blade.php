@extends('dashboards.admins.layout')
@section('content')

<main id="main" class="main">

    @if (session()->has('message'))
    <p id="successMessage" class="alert alert-info" >
        {{session()->get('message') }}
    </p>
@endif

    <div class="card">
        <div class="card-header">
            <h5 class="text-center text-dark">Liste des médecins non approuvés</h5>
        </div>
        <br>
  <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom et prénom</th>
                <th>Numéro</th>
                <th>Adresse e-mail</th>
                <th>Spécialité</th>
                <th>Ville</th>
                {{-- <th>Approved</th> --}}
                
                
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>Dr.{{ $user->name }}</td>
                <td>{{ $user->num }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->specialite->labelSpec }}</td>
                <td>{{ $user->ville->nomVille }}</td>
                {{-- <td>{{ $user->approved }}</td> --}}

                {{-- <td>
                  <a href="{{ route('admin.approve',['id'=>$user->id])}}" >
                    <button class="btn btn-success btn-sm">approver</button></a>
                </td> --}}
                <td>
                    <a href="{{ route('admin.emailview',$user->id)}}" >
                      <button class="btn btn-success btn-sm">Approuver </button></a>
                </td>
                
            </tr>
            
        @endforeach
        </tbody>
    </table>
</div>
</div>    
  
    </main><!-- End #main -->
  





@endsection