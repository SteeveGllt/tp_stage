@extends('template')
@section('fil')
	@parent - Créer Entreprise
@stop
@section('content')

<div class="flag flag-us"></div>
<div class="flag flag-fr"></div>


@if($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif

{!! Form::open(['url' => route('entreprise.store'), 'method' => 'post']) !!}
@csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Nom</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nom" value="{{ old('nom') }}">
    @error('nom')
        <div class="alert alert-danger"> {{ $message }} </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Ville</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="ville"  value="{{ old('ville') }}">
    @error('ville')
    <div class="alert alert-danger"> {{ $message }} </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Téléphone</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="tel"  value="{{ old('tel')}}">
    @error('tel')
    <div class="alert alert-danger"> {{ $message }} </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Créer</button>
{!! Form::close() !!}
@stop