@extends('template')
@section('content')
<div class="form-group">
    <label for="stage" class="col-md-4 control-label">Titre :</label>
        <div class="col-md-6">
        {!! Form::open(['url' => route('stage-afficher')]) !!}
            <select name="stage" id="stage" class="form-control">
                 @foreach($s as $option)
                       <option value="{{$option->id}}">{{ $option->titre }}</option> 
                @endforeach   
            </select>
                       <button type="submit" class="btn btn-primary">Afficher</button>
                       {!! Form::close() !!}
        </div>
</div>
@stop