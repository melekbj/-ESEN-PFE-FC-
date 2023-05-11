{{-- @extends('dashboards.adminmed.layout')
@section('content')
 
<div class="card col-xl-6">
  <div class="card-header">Ajouter medecin</div>
  <div class="card-body">
      
      <form action="{{ url('medecins') }}" method="post">
        @csrf

        <input type="text" name="name" id="name" class="form-control mb-3" placeholder="name">
        
        <input type="text" name="num" id="num" class="form-control mb-3" placeholder="num"
          oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

        <input type="email" name="email" id="email" class="form-control mb-3" placeholder="email">

        <select name="specialite" class="form-select bg-light border-0 mb-3" style="height: 40px;">
              <option value="" selected>Choisir une specialite</option>
              @foreach($specialites as $spec)
              <option value="{{$spec->idSpec  }}" > {{$spec->labelSpec }}</option>
              @endforeach
        </select> 

        <select name="ville" class="form-select bg-light border-0 mb-3" style="height: 40px;">
              <option value="" selected>Choisir une ville</option>
              @foreach($villes as $ville)
              <option value="{{$ville->idVille  }}" > {{$ville->nomVille}}</option>
              @endforeach
        </select>

        <input type="number" name="role" id="role" class="form-control mb-3" placeholder="role"
          oninput="this.value = this.value.replace(/[^3-3.]/g, '').replace(/(\..*)\./g, '$1');">

        <input type="file" name="avatar" id="avatar" class="form-control mx-6 mb-3 col-xl-6">

        <input type="password" name="password" id="password" placeholder="password"  class="form-control mb-3 ">

       
        <button type="submit"  class="btn btn-success">Enregistrer</button>
    </form>
   
  </div>
</div>
 
@stop --}}