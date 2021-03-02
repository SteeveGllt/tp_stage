<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stage;

class AdminController extends Controller
{
    public function demande()
    {
       
        $stage = Stage::all();
        foreach ($stage as $ligne)
        {
            if ($ligne->eleves->isEmpty()==false)
            {
                $tab[]=$ligne;
            }
        }  
   	return view('validation', compact('stage'));
        
    }
}
