@extends('dashboards.users.layout')

@section('content')

@if(session()->has('message'))
<div id="successMessage" class="alert alert-success col-md-5">
{{session()->get('message')}}
</div>
@endif

<div class="x_panel">
    <div class="x_title">
      <h3 class="text-center">Liste des rendez-vous  </h3>
      <div class="clearfix"></div>
      <div class="text-danger text-center h6">Attention !! Vous pouvez seulement modifier ou annuler un rendez-vous qui n'est pas été encore traité par votre médecin</div>
    </div>
    <div class="x_content">
    
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            {{-- <th>Patient</th> --}}
            <th class="h6">Medecin</th>
            <th class="h6">Spécialité</th>
            <th class="h6">date de rendez-vous</th>
            <th class="h6">Heure exacte</th>
            <th class="h6">État</th>
            <th class="h6"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($rendezv as $item)
            <tr>
                <th class="h6">{{ $loop->iteration }}</th>
                {{-- <td>{{ $item->idPatient }}</td> --}}
                <td class="h6">Dr.{{ $item->medecin->name }}</td>
                <td class="h6">{{ $item->medecin->specialite->labelSpec }}</td>
                <td class="h6">{{ $item->dateRdv }}</td>
                <td class="h6">{{ $item->heureRdv }}</td>
                @if($item->etat==1)
                <td class="h6 text-primary">Rendez-vous <strong class="text-success">Accepté</strong> </td>
                @elseif($item->etat==0)
                  <td class="h6 text-primary">En cours de traitement </td>
                @else($item->etat==-1)
                  <td class="h6 text-danger">Rendez-vous <strong>Reporté</strong> </td>
                @endif

                <td>
                  <a href="{{ url('/rendezvo/' . $item->id . '/edit') }}"><button class="btn btn-primary btn-sm"> Modifier</button></a>

                  <form method="POST" action="{{ url('/rendezvo' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      @csrf
                      <button type="submit" id="confirmer" class="btn btn-danger btn-sm" onclick="return confirm('Vous êtes sûr?')" > Annuler</button> 
                      {{-- onclick="return confirm('Vous êtes sûr?')" --}}
                  </form>
              </td>
            </tr>
               {{-- @endif  --}}
            @endforeach
        </tbody>
      </table>

    </div>
  </div>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  {{-- <script>

    function fire() {
      const button = document.getElementById('confirmer');
      button.addEventListener('submit', event => {
        Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
    event.preventDefault();
      });


     
    }
 
  </script> --}}

@endsection