@extends('dashboards.medecins.layout')
@section('content')

<main id="main" class="main">

     <style>
        @import url("https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@600&display=swap");
body {
  justify-content: center;
  align-items: center;
}
.center {
  position: relative;
  padding: 50px 50px;
  background: #fff;
  border-radius: 10px;
  margin-left: 40%;
}
.center h1 {
  font-size: 2em;
  border-left: 5px solid dodgerblue;
  padding: 10px;
  color: #000;
  letter-spacing: 5px;
  margin-bottom: 30px;
  font-weight: bold;
  padding-left: 10px;
}
.center .inputbox {
  position: relative;
  width: 500px;
  height: 20px;
  margin-bottom: 50px;
}
.center .inputbox input {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  border: 2px solid #000;
  outline: none;
  background: none;
  padding: 10px;
  border-radius: 10px;
  font-size: 1em;
}
.center .inputbox:last-child {
  margin-bottom: 0;
}
.center .inputbox span {
  position: absolute;
  top: 14px;
  left: 20px;
  font-size: 1em;
  transition: 0.6s;
  font-family: sans-serif;
}
.center .inputbox input:focus ~ span,
.center .inputbox input:valid ~ span {
  transform: translateX(-13px) translateY(-35px);
  font-size: 1em;
}
.center .inputbox [type="button"] {
  width: 50%;
  background: dodgerblue;
  color: #fff;
  border: #fff;
}
.center .inputbox:hover [type="button"] {
  background: linear-gradient(45deg, greenyellow, dodgerblue);
}
    </style> 
   

<div class="center">
    <h6 class="text-danger">Attention ! ! Si vous cliquez sur le bouton ci-dessous, votre patient sera bloqué ! ! !</h6>
    <h1>Mail</h1>
    <form action="{{ route('medecin.sendemail',$data->id)}}" method="GET">
      <div class="inputbox">
        <input type="text" name="greeting" value="Bonjour, ADMIN" class="form-control mb-1 " placeholder="greeting" readonly>
      </div>
      <div class="inputbox">
        <input autocomplete="off" type="text" name="body" value="" class="form-control mb-1 " placeholder="copier l'email ou le numéro de patient "required>
      </div>
    <div class="inputbox">
        <input type="text" name="endpart" value="Merci" class="form-control mb-1 " placeholder="endpart" readonly>
    </div>
    <div class="inputbox">
        <button type="submit" class="btn btn-danger">Envoyer</button>
    </div>
    <div class="inputbox">
        <input type="hidden" name="actiontext" value="" class="form-control mb-1 " placeholder="actiontext">
    </div>
    <div class="inputbox">
        <input type="hidden" name="actionurl" value="" class="form-control mb-1 " placeholder="actionurl">
    </div>
    </form>
  </div>
  
    </main><!-- End #main -->
  





@endsection