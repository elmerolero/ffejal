<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //
    public function index()
    {
        // Recupera todos los usaurios registrados hasta el momento
        $users = User::all();

        // Retorna el index
        return view('administracion.users.index', compact( 'users' ) );
    }
}
