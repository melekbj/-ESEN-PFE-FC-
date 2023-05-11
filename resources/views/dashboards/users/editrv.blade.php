@extends('dashboards.users.layout')

@section('content')

<br>
<div class=" col-md-4 mt-5 " style="margin-left: 35%;">
  <div class=" h5 text-center text-dark">Modifier rendez-vous</div>
  <div class="">
      
      <form action="{{ url('rendezvo/' .$rendezv->id) }}" method="post">
        @csrf
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$rendezv->id}}" id="id" />
        <label>Date</label>
        <input type="date" name="dateRdv" id="dateRdv" value="{{$rendezv->dateRdv}}" class="form-control">
        <label>Heure</label>
        <input type="time" name="heureRdv" id="heureRdv" value="{{$rendezv->heureRdv}}" min="09:00" max="16:00" class="form-control">
        {{-- <label>Role</label></br>
        <input type="hidden" name="role" id="role" value="{{$patients->role}}" class="form-control"></br> --}}



        <button type="submit" class="btn btn-success">Valider</button>
    </form>
   
  </div>
</div>
 
<script>
  document.getElementById('dateRdv').min = new Date().toISOString().substring(0, 10);
</script>

@stop