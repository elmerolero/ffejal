<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Estado;
use App\Models\Municipio;
use Illuminate\Support\Facades\DB;

class DireccionController extends Controller
{
    
    //
    public function index(){
        $paises = Pais::all();
        $estados = Estado::all();
        $municipios = Municipio::all();
        return view( "profile.address-user-form", compact( 'paises', 'estados', 'municipios' ) );
    }
}
