@extends('dashboards.users.layout')

@section('content')

<main>

   <div class="col-md-7" style="margin-left: 20%">

    @php 
    $idmed=$_GET['idMed'];
    $idpatient=$_GET['idpatient'];
    @endphp

    <div class="">
      @if(session()->has('message'))
        <div class="alert alert-success">
        {{session()->get('message')}}
        </div>
      @endif
      <br>
      {{-- action="{{ url('rdcontroller') }}" --}}
      <form  method="post"  id="form" action="{{ url('rdcontroller') }}" >
        @csrf
        <input type="hidden" name="idmed" id="idmed" value={{$idmed}}>
        <input type="hidden" name="idpat" id="idpat" value={{$idpatient}}>

        <label for="dateRdv" class="h6 mx-3 text-info" style="font-size: 16px"> Choisir la date</label>
        <input type="date" name="dateRdv" id="dateRdv" class="date form-control mx-3 mb-3" required/>
        {{-- <p id="date"></p> --}}

        <label for="time"  class="h6 mx-3 text-info" style="font-size: 16px">Choisir l'heure </label>
        <input type="time"  name="time" id="time"  min="09:00" max="16:00"  class="time form-control mx-3 mb-3" required/> 


        <label for="motif" class="h6 mx-3 text-info" style="font-size: 16px" > Desription <span class="text-danger">(facultatif)</span></label>
        <textarea name="motif" id="motif" cols="20" rows="3" class="form-control mx-3 mb-3"></textarea>

        <button type="submit"  class="btn btn-success col-xl-2 mb-5 mx-3">Confirmer</button>
      </form>

    </div>  
   
  </div> 
</main>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
<script>

  window.onload = init;

  function init()
  {
    document.getElementById('dateRdv').value = new Date().toISOString().substring(0, 10);
    const form = document.getElementById('form');
    form.addEventListener('submit', event => 
    {
      var dateRdv = document.getElementById('dateRdv').value;
      var time = document.getElementById('time').value.substring(0, 2);
      tf = parseInt(time);
      ct = parseInt(new Date().getHours());
    
      // debugger;

      if(new Date().toISOString().substring(0, 10) > dateRdv )
      {
        //  alert("SVP Veuillez vérifier la date de rendez-vous !!!");
         Swal.fire(
           'SVP Veuillez vérifier la date de rendez-vous !!!',
           '',
           'error'
         )
        event.preventDefault(); // stop submit treatment
      }
      if((tf < ct) && new Date().toISOString().substring(0, 10) == dateRdv )
      {
        // alert("SVP Veuillez vérifier l'heure de rendez-vous !!!");
        Swal.fire(
         "SVP Veuillez vérifier l'heure de rendez-vous !!!",
         '',
         'error'
       )
        event.preventDefault();
      }
                
    });
  }
</script> 

<script>
var currentTime = new Date().getHours() + ':' + new Date().getMinutes();
document.getElementById('time').value = currentTime;
</script>

@endsection