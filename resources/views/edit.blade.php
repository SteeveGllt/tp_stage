@extends('template')
@section('content')
{!! Form::open(['url' => route('stage-update', $s), 'method' => 'post']) !!}
@method('put')
    <div class="form-group">
    <label for="exampleInputEmail1">Titre</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="titre" value="{{$s->titre}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="description" value="{{$s->description}}">
  </div>
  <div class="form-group">
  {!!Form::select('entreprise', $e, $s->entreprise_id)!!}
  </div>
  <button type="submit" class="btn btn-primary">Modifier</button>
{!! Form::close() !!}
@stop