@extends('template')
@section('fil')
	@parent - Créer un élève
@stop
@section('content')




{!! Form::open(['url' => route('eleve.store'), 'method' => 'post']) !!}
@csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Nom</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nom" value="{{ old('nom') }}">
    @error('nom')
        <div class="alert alert-danger"> {{ $message }} </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="email"  value="{{ old('email') }}">
    @error('email')
    <div class="alert alert-danger"> {{ $message }} </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="password"  value="{{ old('password') }}">
    @error('password')
    <div class="alert alert-danger"> {{ $message }} </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Numéro Etudiant</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="numEtudiant"  value="{{ old('numEtudiant') }}">
    @error('numEtudiant')
    <div class="alert alert-danger"> {{ $message }} </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Créer</button>
{!! Form::close() !!}
@stop