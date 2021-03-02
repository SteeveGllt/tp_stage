<?php

namespace App\Http\Controllers;
use App\Entreprise;
use App\Stage;

use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('is_admin')->except('index');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tab = Entreprise::with('stages')->get();
        

    return view('listEntreprise', compact('tab'));
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createEntreprise');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|min:3',
            'ville' => 'required',
            'tel' => 'required|max:10'
            ]);

        $e = new Entreprise;
        $e->nom = $request->input('nom');
        $e->ville = $request->input('ville');
        $e->tel = $request->input('tel');
        $e->save();
        return redirect()->route('entreprise.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $e = Entreprise::find($id);
        $s = Stage::find($id);
        return view('listEntreprise', compact('e'), compact('s'));
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        try{
            $e = Entreprise::find($id);
            $e->delete();
            $request->session()->flash('success', "L'entreprise a été supprimé");
            return redirect()->route('entreprise.index');
        }
        catch(\PDOException $e){
            $request->session()->flash('errors', "L'entreprise a des stages");
            return redirect()->route('entreprise.index');
        }
       
    }
    
}
