<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SasattaController extends Controller
{
    public function store($tsubuyakiId)
    {
        \Auth::user()->sasatta($tsubuyakiId);
        return back();
    }
    
    public function destroy($tsubuyakiId)
    {
        \Auth::user()->mouii($tsubuyakiId);
        return back();        
    }
}
