@extends('template')
@section('content')
<div class="card" style="width: 18rem;">
  <div class="card-header">
    {{$s->titre}}
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$s->description}}</li>
    <li class="list-group-item">{{$s->entreprise->nom}}</li>
    <li class="list-group-item">{{$s->datedebut}}</li>
    <li class="list-group-item">{{$s->datefin}}</li>
    
  </ul>
</div>
@stop