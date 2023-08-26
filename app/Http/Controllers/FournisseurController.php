<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    function index(){
        $fournisseur=Fournisseur::all();
        return response()->json(['ok'=>true,'data'=>$fournisseur,'message'=>'Counted successfully ']);

    }
}
