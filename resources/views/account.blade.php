@extends('layouts.app')
@section('title')
    {{__("Account")}}
@endsection

@section('content')
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
        <img src="{{ asset($user->profile_picture)}}" class="rounded mx-auto d-block" alt="..." height="70%" width="70%">
        <form method="post" action="{{route('account.update', Auth::id())}}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="form-group">
            <label for="name">{{__('Profile picture')}}</label>
            <input type="file" name="picture" class="form-control-file">
            @error('picture')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="username">{{__('Username')}}</label>
            <input type="text" readonly value="{{$user->username}}" class="form-control">
          </div>
          <div class="form-group">
            <label for="name">{{__('Name')}}</label>
            <input type="text" value="{{$user->name}}" name="name" class="form-control">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">{{__('E-mail')}}</label>
            <input type="text" value="{{$user->email}}" name="email" class="form-control">
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <input type="submit" class="btn btn-primary" value="{{__('Update')}}">
        </form>

      </div>

      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        hol
      </div>

      <div class="tab-pane fade d-flex flex-column bd-highlight mb-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <p class="text-center">Al eliminar cuenta no podrá volver a acceder a ella nuevamente.</p>
        <button type="submit" class="btn btn-danger" onclick="deleteAccount('{{Auth::id()}}')" >Eliminar cuenta</button>
      </div>

    </div>
  </div>
</div>
@endsection