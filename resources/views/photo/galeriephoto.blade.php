@extends('template')
@section('content')
<main class="grid place-items-center min-h-screen bg-gradient-to-t from-blue-200 to-indigo-900 p-5">
  <div>
    <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold text-gray-200 mb-5 ">Galerie Bigard</h1>
    <section class="grid grid-cols-1 sm:grid-cols-3 gap-4 ">
      <!-- CARD 3 -->
      @foreach($test as $ligne)
      <div class="bg-gray-900 shadow-lg rounded p-3">
        <div class="group relative ">
          <img class="w-full md:w-72 block rounded" src="{{asset('storage/profile_images/thumbnail/medium_'.$ligne->chemin)}}" alt="" />
          <div class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">
          </div>
        </div>
        <div class="p-5">
          <h3 class="text-white text-lg">{{$ligne->titre}}</h3>
        </div>
      </div>
      @endforeach
      <!-- END OF CARD 3 -->
    </section>
  </div>
</main>
@stop