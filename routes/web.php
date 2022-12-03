<?php

use App\Http\Controllers\DireccionController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get( "/usuario/domicilio", [DireccionController::class, 'index'] ) -> name( 'profile.address' );
    Route::controller(UsersController::class) -> group( function(){
        Route::get( '/administracion/users', 'index' ) -> name( 'administracion.users' );
    });
    Route::get('/administracion', function () {
        return view('administracion.index');
    })->name('administracion');
    Route::get('/jueces', function () {
        return view('jueces');
    })->name('jueces');
    Route::get('/cobranza', function () {
        return view('cobranza');
    })->name('cobranza');
});
