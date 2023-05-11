@extends('dashboards.admins.layout')
@section('content')

<main id="main" class="main">

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@600&display=swap");
body {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color:#091E3E
}
.center {
  position: relative;
  padding: 50px 50px;
  background: #fff;
  border-radius: 10px;
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
    <h1>Mail</h1>
    <form action="{{ route('admin.sendemail',$data->id)}}" method="GET">
      <div class="inputbox">
        <input type="text" name="greeting" value="Bonjour, ADMIN" class="form-control mb-1 " placeholder="greeting">
      </div>
      <div class="inputbox">
        <input type="text" name="body" value="Nous Sommes Heureux De Vous Compter Parmi Les Membres De Notre Famille. " class="form-control mb-1 " placeholder="body">
      </div>
      <div class="inputbox">
        <input type="text" name="actiontext" value="VOUS POUVEZ MAINTENANT VOUS CONNECTER" class="form-control mb-1 " placeholder="actiontext">
    </div>
    <div class="inputbox">
        <input type="text" name="actionurl" value="http://127.0.0.1:8000/login" class="form-control mb-1 " placeholder="actionurl">
    </div>
    <div class="inputbox">
        <input type="text" name="endpart" value="Merci" class="form-control mb-1 " placeholder="endpart">
    </div>
    <div class="inputbox">
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </div>
    </form>
  </div>
  
    </main><!-- End #main -->
  





@endsection