@extends('template')
@section('fil')
	@parent - Liste Entreprise
@stop
@section('content')

<a href="{{route('entreprise.create')}}"><button type="button" class="btn btn-outline-secondary">Créer</button></a>

@foreach($tab as $entreprises)
<div class="modal fade" id="idm{{$entreprises->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment supprimer l'entreprise ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
        <form action="{{route('entreprise.destroy', ['entreprise'=>$entreprises->id])}}" method="post">
			@csrf
			@method('delete')
      <button type="submit" class="btn btn-primary">Oui</button>
			</form>
       
      </div>
    </div>
  </div>
</div>

  <p><b>{{$entreprises->nom}}</b></p>
  <button type="button" class="btn btn-outline-secondary btnSuppr" id="{{$entreprises->id}}">Afficher les {{$entreprises->stages->count()}} stages</button>
  <button type="button" class="btn btn-outline-danger" style="color:red" data-toggle="modal" data-target="#idm{{$entreprises->id}}">X</button>
  <div id="d{{$entreprises->id}}"  style="display:none">
  <ul>
  @forelse ($entreprises->stages as $stage)
    <b><li>{{ $stage->titre }}</li></b>
    @forelse ($stage->eleves as $eleves)
        <li>{{ $eleves->users->name }}</li>
      @empty
        <li>Pas d'élèves</li>
      @endforelse
    @empty
    <li>Pas de stage</li>  
</ul>
@endforelse
</ul>
<ul>
  
  </div>
@endforeach

@section('script')
<script>
$(".btnSuppr").click(function(){
  id=$(this).attr("id");
  $("#d"+id).toggle();
  //$(this).next().toggle();
});

</script>
@stop
 
<style>
  li{
    list-style: none;
  }
}
</style>
@stop