@extends('dashboards.admins.layout')
@section('content')


    <div class="container">
        
        <div class="row">
           
            <div class="col-md-10 mt-3">
            
                <div class="carte card col-md-12 mt-5" style="margin-left: 23%;">
                     @if (session()->has('message'))
                    <p id="successMessage" class="alert alert-success" >
                        {{session()->get('message') }}
                    </p>
                    @endif 
                    <div class="card-header h4 text-center text-dark">Tous les patients</div>
                    <div class="card-body">
                              {{-- <a href="{{ url('/patients/create') }}" class="btn btn-success btn-sm mt-3" >
                                Ajouter nouveau patient
                            </a>  --}}
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        {{-- <th>#</th> --}}
                                        <th>Nom et prénom</th>
                                        <th>Numéro </th>
                                        <th>Adresse e-mail</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($patients as $patient)
                                    <tr>
                                        {{-- <td>{{$loop->iteration }}</td> --}}
                                        <td>{{ $patient->name }}</td>
                                        <td>{{ $patient->num }}</td>
                                        <td>{{ $patient->email }}</td>
                                        {{-- <td>{{ $patient->block }}</td> --}}
                                        {{-- <td>{{ $patient->role }}</td> --}}
 
                                        {{-- <td> 
                                            <form method="POST" action="{{ url('/patients' . '/' . $patient->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"> Supprimer</button>
                                            </form>
                                        </td> --}}
                                        {{-- <td>
                                            <a href="{{ route('admin.bloque',['id'=>$patient->id])}}" >
                                              <button class="btn btn-success btn-sm">bloquer ?:unblock</button></a>
                                          </td> --}}
                                          <td>
                                            <a href="{{ route('admin.bloque',['id'=>$patient->id])}}" >
                                            <input type="hidden" name="status" value="{{ $patient->block == 1 ? 0 : 1 }}"/>
                                                @if($patient->block == 1)
                                                    <button type="submit"  class="btn btn-dark btn-sm" onclick="return confirm('Voulez vous le débloqué?')">Débloquer </button>
                                                @else
                                                    <button type="submit"  class="btn btn-danger btn-sm" onclick="return confirm('Vous êtes sûr?')"> Bloquer</button>
                                                @endif 
                                            </a>
                                          </td>
                                    </tr>
                                    {{-- @endif --}}
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
 
@endsection