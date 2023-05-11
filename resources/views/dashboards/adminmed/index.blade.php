@extends('dashboards.admins.layout')
@section('content')

@if (session()->has('message'))
<p id="successMessage" class="alert alert-success" >
    {{session()->get('message') }}
</p>
@endif    
@if (session()->has('error'))
<p id="successMessage" class="alert alert-success" >
    {{session()->get('error') }}
</p>
@endif 
    <div class="container">
    
        <div class="row">
          
            <div class="col-md-10 mt-3">
                <div class="carte card col-md-12 mt-5" style="margin-left: 23%;">
                    @if (session()->has('message'))
                    <p id="successMessage" class="alert alert-success"  >
                        {{session()->get('message') }}
                    </p>
                    @endif
                    <div class="card-header h4 text-center text-dark">Tous les medecins</div>
                    <div class="card-body">
                             {{-- <a href="{{ url('/medecins/create') }}" class="btn btn-success btn-sm mt-3" >
                                Ajouter nouveau medecin
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
                                        <th>Spécialité</th>
                                        <th>Ville</th>
                                        <th>Action</th>
                                        {{-- <th>Role</th> --}}
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($medecins as $medecin)
                                    {{-- @if($medecin->role == 3) --}}
                                    <tr>
                                        {{-- <td>{{$loop->iteration }}</td> --}}
                                        <td>Dr.{{ $medecin->name }}</td>
                                        <td>{{ $medecin->num }}</td>
                                        <td>{{ $medecin->email }}</td>
                                        <td>{{ $medecin->specialite->labelSpec }}</td>
                                        <td>{{ $medecin->ville->nomVille }}</td>
                                        {{-- <td>{{ $medecin->block}}</td> --}}
                                        {{-- <td>{{ $medecin->role }}</td> --}}
 
                                        <td>
                                            <a href="{{ url('/medecins/' . $medecin->id . '/edit') }}" ><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
 
                                            {{-- <form method="POST" action="{{ url('/medecins' . '/' . $medecin->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
                                            </form> --}}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.bloque',['id'=>$medecin->id])}}" >
                                            <input type="hidden" name="status" value="{{ $medecin->block == 1 ? 0 : 1 }}"/>
                                                @if($medecin->block == 1)
                                                    <button type="submit"  class="btn btn-dark btn-sm" onclick="return confirm('Voulez vous le débloqué?')">Débloquer</button>
                                                @else
                                                    <button type="submit"  class="btn btn-danger btn-sm"  onclick="return confirm('Vous êtes sûr?')">bloquer</button>
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