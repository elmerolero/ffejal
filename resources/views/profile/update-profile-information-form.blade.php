@php
    use App\Models\Pais;
    use App\Models\Estado;
    use App\Models\Municipio;
    use Illuminate\Support\Facades\DB;

    $paises = Pais::all();
    $estados = Estado::all();
    $municipios = Municipio::all();
@endphp

<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información Personal') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualiza tu información personal y de contacto, necesaria para participar en una competencia.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nombre') }}" />
            <div>
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
            </div>
        </div>
        
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="last_name" value="{{ __('Apellidos') }}" />
            <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="state.last_name" autocomplete="last_name" />
            <x-jet-input-error for="last_name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 flex">
            <div class="w-2/3 mr-2">
                <x-jet-label for="curp" value="{{ __('CURP') }}" />
                <x-jet-input id="curp" type="text" class="mt-1 block w-full" wire:model.defer="state.curp" autocomplete="curp" />
                <x-jet-input-error for="curp" class="mt-2" />
            </div>

            <div class="">
                <x-jet-label for="fecha_nacimiento" value="{{ __('Fecha de nacimiento') }}" />
                <x-jet-input id="fecha_nacimiento" type="date" class="mt-1 block w-full" wire:model.defer="state.fecha_nacimiento" autocomplete="fecha_nacimiento" />
                <x-jet-input-error for="fecha_nacimiento" class="mt-2" />
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <div>
                <x-jet-label for="pais_nacimiento" value="{{ __('Lugar de nacimiento') }}" />
                <div class="flex w-full">
                    <div class="w-1/2 mr-2">
                        <select id="pais_nacimiento" class="block mt-1 rounded-md w-full" :value="old('pais_nacimiento')" wire:model.defer="state.pais_nacimiento" name="pais_nacimiento" required>
                            <option value="0">Elegir país</option>
                            @foreach ($paises as $pais)
                                <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="pais_nacimiento" class="mt-2" />
                    </div>
                    <div class="w-1/2">

                        <select id="estado_nacimiento" class="block mt-1 rounded-md w-full" :value="old('estado_nacimiento')" wire:model.defer="state.estado_nacimiento" name="estado" required>
                            <option value="0">Elegir estado o provincia</option>
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="estado_nacimiento" class="mt-2" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Tu dirección de correo electrónico no ha sido verificado.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                        {{ __('Haz clic aquí para actualizarlo.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('Se envió un correo electrónico para verificar tu correo.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Guardado.') }} <!-- verificar traducción, decía "Saved" -->
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
