@extends('template')
@section('content')

<table class="table table-hover">
<thead>
    <tr>
      <th scope="col">Titre</th>
      <th scope="col">Eleve</th>
      <th scope="col">Valider</th>
    </tr>
  </thead>
	@foreach($stage as $stage)
  <tbody>
    <tr>
      <td>{{$stage->titre}}</td>
      <td>{{$stage->eleves}}
    </tr>
	@endforeach
  </tbody>
 
</table> 
@stop