<?php

namespace App\Http\Controllers;
use App\User;
use App\Eleve;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('is_admin');
     }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createUser');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            
            ]);
        $u = new User;
        $u->name = $request->input('nom');
        $u->email = $request->input('email');
        $u->password = Hash::make($request->input('password'));
        $u->is_admin = 0;
        
        $e = new Eleve;
        $e->num_etudiant = $request->input('numEtudiant');
        $e->save();
        $u->eleve_id = $e->id;
        $u->save();
        return redirect()->route('home');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
