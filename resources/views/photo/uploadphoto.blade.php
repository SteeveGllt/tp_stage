@extends('template')
@section('content')

<form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
<div>
<div class="mt-2">
      <label class="block text-sm block text-gray-600" for="cus_email">Titre</label>
      <input class=" px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="titre" type="text" required="" placeholder="Titre" aria-label="Email">
    </div>
</div>
    <div class="form-group">
        <label  class="block text-sm block text-gray-600" for="exampleInputFile">File input</label>
        <input class="px-2 py-2 text-gray-700 rounded" type="file" name="profile_image" id="exampleInputFile">
    </div>
    {{ csrf_field() }}
    <div class="mt-4">
      <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Uploader</button>
    </div>
</form>
@stop