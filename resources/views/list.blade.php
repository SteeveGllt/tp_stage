@extends('template')
@section('fil')
	@parent - Lister
@stop
@section('content')

<a href="{{route('stage-create')}}"><button type="button" class="btn btn-outline-secondary">Créer</button></a>
<table class="table table-hover">
<thead>
    <tr>
      <th scope="col">Titre</th>
      <th scope="col">Entreprise</th>
      <th scope="col">Date de début</th>
      <th scope="col">Supprimer</th>
      <th scope="col">Modifier</th>
    </tr>
  </thead>
	@foreach($tab as $ligne)
  <tbody>
    <tr>
    <div class="modal fade" id="idm{{$ligne->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment supprimer le stage ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
        <form action="{{route('stage-delete', ['id'=>$ligne])}}" method="post">
			@csrf
			@method('delete')
      <button type="submit" class="btn btn-primary">Oui</button>
			</form>
       
      </div>
    </div>
  </div>
</div>
      <td><a href="{{route('stage-id', $ligne)}}">{{$ligne->titre}}</a></td>
      <td>{{ $ligne->entreprise->nom }}
      <td>{{Carbon\Carbon::parse($ligne->datedebut)->format('d-m-Y')}}</td>
      <td><button type="button" class="btn btn-outline-danger" style="color:red" data-toggle="modal" data-target="#idm{{$ligne->id}}">X</button></td>
      <td><a href="{{route('stage-edit', $ligne)}}">Modifier</a></td>

    </tr>
	@endforeach
  </tbody>
 
</table> 
	
</table>
@stop