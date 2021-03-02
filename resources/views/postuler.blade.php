@extends('template')
@section('fil')
	@parent - Lister
@stop
@section('content')

<table class="table table-hover">
<thead>
    <tr>
      <th scope="col">Stage</th>
      <th scope="col">Ville</th>
      <th scope="col">Postuler</th>
    </tr>
  </thead>
	@foreach($stage as $ligne)
  <tbody>
    <tr>
    <td>{{ $ligne->titre }} </td>
    <td>{{ $ligne->entreprise->ville}} </td>
    {!! Form::open(['url'=> route('stage-postuler',[Auth::user()->eleve->id, $ligne->id]), 'method' => 'post']) !!}
    <td><input class="btn btn-primary" type="submit" value="Postuler"/></td>
        {!! Form::close() !!}

    </tr>
	@endforeach
  </tbody>
 
</table> 
@stop