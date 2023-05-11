@extends('dashboards.admins.layout')
@section('content')

<br>
<div class="card col-md-4 mt-5 " style="margin-left: 40%">
  <div class="card-header h5 text-center text-dark">Modifier médecin</div>
  <div class="card-body">
      
      <form action="{{ url('medecins/' .$medecins->id) }}" method="post">
        @csrf
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$medecins->id}}" id="id" />
        <label>Name</label>
        <input type="text" name="name" id="name" value="{{$medecins->name}}" class="form-control" required>
        <label>Num</label>
        <input type="text" name="num" id="num" value="{{$medecins->num}}" class="form-control" autocomplete="off" required>
        <label>Email</label>
        <input type="text" name="email" id="email" value="{{$medecins->email}}" class="form-control" disabled readonly>
        <label>Specialite</label>
        <input type="text" name="idSpec" id="idSpec" value="{{$medecins->idSpec}}" class="form-control" required>
        <label>Ville</label>
        <input type="text" name="idVille" id="idVille" value="{{$medecins->idVille}}" class="form-control mb-5" required>
        <input type="hidden" name="role" id="role" value="{{$medecins->role}}" class="form-control ">


        <button style="margin-top: -20px"  type="submit" class="btn btn-success">Enregistrer</button>
    </form>
   
  </div>
</div>
 
@stop