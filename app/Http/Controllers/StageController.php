<?php

namespace App\Http\Controllers;
use App\Stage;
use App\Eleve;
use Carbon\Carbon;
use App\Entreprise;

use Illuminate\Http\Request;

class StageController extends Controller
{
   public function __construct(){
      $this->middleware('auth');
      $this->middleware('is_admin')->except(['list', 'listpostuler', 'postuler']);
   }
   public function list(){
   $tab = Stage::with('entreprise')->get();
   return view('list', compact('tab'));
   }
   public function create(){
       $e = Entreprise::pluck('nom', 'id');
   	return view('create', compact('e'));
   }
   public function afficher($id){
      $s = Stage::find($id);
   	return view('info', compact('s'));
   }
   public function store(Request $request){

      $validatedData = $request->validate([
         'titre' => 'required|min:3',
         'description' => 'required',
         ]);

      $s = new Stage;
      $s->titre = $request->input('titre');
      $s->description = $request->input('description');
      $s->datedebut = Carbon::now();
      $s->datefin = Carbon::now();
      $s->entreprise_id = $request->input('entreprise');
      $s->save();
      $request->session()->flash('success', 'Le stage a bien été crée');
      return redirect()->route('stage-list');
   }
   public function delete($id, Request $request){
      $s = Stage::find($id);
      $s->delete();
      $request->session()->flash('success', 'Le stage a été supprimé');
      return redirect()->route('stage-list');
   }
   public function edit($id){
      $s = Stage::find($id);
      $e = Entreprise::pluck('nom', 'id');
      return view('edit', compact('s', 'e'));
   }
   public function update($id, Request $request)
   {
      $s = Stage::find($id);
      $s->titre = $request->input('titre');
      $s->description = $request->input('description');
      $s->entreprise_id = $request->input('entreprise');
      $s->save();
      $request->session()->flash('success', 'Le stage a bien été modifié');
      return redirect()->route('stage-list');
   }
   public function dropdown()
   {
      $s = Stage::all();
      return view('dropdown', compact('s'));
   }
   public function afficher2(Request $request){
      $s = Stage::find($request->input('stage'));
      return view('afficher', compact('s'));
      
   }
   public function listpostuler()
   {
      $stage = Stage::with('eleves')->get();
   	return view('postuler', compact('stage'));
   }
   public function postuler(Request $request, $eleve, $stage)
   {

      try{
         $eleve = Eleve::find($eleve);
         $stage = Stage::find($stage);
         $eleve->stages()->attach($stage);
      
         $request->session()->flash('success', "Vous venez de postuler");
         return redirect()->route('listpostuler');
     }
     catch(\PDOException $e){
        if($e->getcode() == 23000)
        {
         $request->session()->flash('error', "Vous avez déjà postuler à ce stage");
         return redirect()->route('listpostuler');
        }
        $request->session()->flash('error', "Autre erreur");
         return redirect()->route('listpostuler');
         
     }
   }
}
