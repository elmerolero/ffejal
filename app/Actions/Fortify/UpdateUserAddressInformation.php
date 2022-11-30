<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;                              // Se usa DB para poder hacer una consulta compleja
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Carbon\Carbon;
use Livewire\Livewire;
use App\Models\Domicilio;

class UpdateUserAddressInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        // Gets address information from user
        // Obtiene los eventos para esa fecha
        $domicilio = DB::table( 'domicilios' ) -> select( '*' ) -> where( 'user_id', '=', $user->id );
        if( $domicilio == null ){
            $domicilio = new Domicilio();
        }

        Validator::make($input, [
            'calle' => ['required', 'string', 'max:100'],
            'numero'=>['required', 'integer'],
            'interior'=>['nullable', 'integer'],
            'colonia' => ['required', 'string', 'max:100'],
            'codigo_postal'=>['required', 'integer' ],
            'pais'=>['required', 'integer'],
            'estado'=>['required', 'integer' ],
            'municipio' => ['required', 'integer' ],
        ])->validateWithBag('updateProfileInformation');

        $domicilio->forceFill([
            'calle' => $input['calle'],
            'numero' => $input['numero'],
            'interior' => $input['interior'],
            'colonia' => $input['colonia'],
            'codigo_postal' => $input['codigo_postal'],
            'pais_id' => $input['pais'],
            'estado_id' => $input['estado'],
            'municipio_id' => $input[ 'municipio' ],
            'user' => $user -> id
        ])->save();
    }
}
