<?php

namespace App\Http\Livewire\Profile;
use Laravel\Fortify\UpdateUserAddressInformation;
use App\Models\Domicilio;
use App\Models\User;
use Livewire\Component;

class UpdateAddressInformationForm extends Component
{
    public function render( $user )
    {
        return view('livewire.profile.update-address-information-form');
    }
}
