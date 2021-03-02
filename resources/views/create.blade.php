@extends('template')
@section('fil')
	@parent - Créer
@stop
@section('content')
{!! Form::open(['url' => route('stage-store'),'method' => 'post']) !!}

    <div class="form-group">
    <label for="exampleInputEmail1">Titre</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="titre">
    @error('titre')
        <div class="alert alert-danger"> {{ $message }} </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="description">
    @error('description')
        <div class="alert alert-danger"> {{ $message }} </div>
    @enderror
  </div>

  <center><div class="form-group">
    <label for="stage" class="col-md-4 control-label">Titre :</label>
        <div class="col-md-6">
            {!!Form::select('entreprise', $e)!!}                     
        </div>
  </div></center>
  <button type="submit" class="btn btn-primary">Créer</button>
{!! Form::close() !!}
@stop
