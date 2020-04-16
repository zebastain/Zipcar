@extends('layouts.app')
@section('title')
    {{__("Account")}}
@endsection

@section('content')
<div class="container">
    <h1>Configuración</h1>
</div>
<div class="card" style="width: 50%; margin: 0 auto;">
  <div class="card-header"> 
    <ul class="nav nav-tabs card-header-tabs pull-right"  id="myTab" role="tablist">
      <li class="nav-item">
       <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Licencia</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Ajustes avanzados</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
   <div class="tab-content" id="myTabContent">
             <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
             <img src="{{ asset('img/car.png')}}" class="rounded mx-auto d-block" alt="...">
             </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">hol</div>
  <div class="tab-pane fade d-flex flex-column bd-highlight mb-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  @php
    $user = Auth::id();
  @endphp
  <p class="text-center">Al eliminar cuenta no podrá volver a acceder a ella nuevamente.</p>
  <button type="submit" class="btn btn-danger" onclick="deleteAccount('{{$user}}')" >Eliminar cuenta</button>
  </div>
        </div>
  </div>
</div>
@endsection