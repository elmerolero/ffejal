/*@php
    use App\Models\Pais;
    use App\Models\Estado;
    use App\Models\Municipio;
    use Illuminate\Support\Facades\DB;
    
    $paises = Pais::all();
    $estados = Estado::all();
    $municipios = Municipio::all();
@endphp


<x-jet-form-section submit="updateUserInformation">
    <x-slot name="title">
        {{ __('Domicilio') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Establece tu domicilio actual.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Domicilio -->
        <div class="col-span-6 sm:col-span-4 flex">
            <div class="w-2/3 mr-2">
                <x-jet-label for="calle" value="{{ __('Calle') }}" />
                <x-jet-input id="calle" type="text" class="mt-1 block w-full" wire:model.defer="state.calle" autocomplete="calle" />
                <x-jet-input-error for="calle" class="mt-2" />
            </div><br>
            <div class="w-1/6 mr-2">
                <x-jet-label for="numero" value="{{ __('Numero') }}" />
                <x-jet-input id="numero" type="text" class="mt-1 block w-full" wire:model.defer="state.numero" autocomplete="numero" />
                <x-jet-input-error for="numero" class="mt-2" />
            </div>
            <div class="w-1/6">
                <x-jet-label for="interior" value="{{ __('Interior') }}" />
                <x-jet-input id="interior" type="text" class="mt-1 block w-full" wire:model.defer="state.interior" autocomplete="interior" />
                <x-jet-input-error for="interior" class="mt-2" />
            </div>
        </div>
        
        <div class="col-span-6 sm:col-span-4 flex">
            <div class="w-2/3 mr-2">
                <x-jet-label for="colonia" value="{{ __('Colonia') }}" />
                <x-jet-input id="colonia" type="text" class="mt-1 block w-full" wire:model.defer="state.colonia" autocomplete="colonia" />
                <x-jet-input-error for="colonia" class="mt-2" />
            </div>
            <div class="1/3">
                <x-jet-label for="codigo_postal" value="{{ __('C.P.') }}" />
                <x-jet-input id="codigo_postal" type="text" class="mt-1 block w-full" wire:model.defer="state.codigo_postal" autocomplete="codigo_postal" />
                <x-jet-input-error for="codigo_postal" class="mt-2" />
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4 flex">
            <div class="w-1/3 mr-2">
                <x-jet-label for="pais" value="{{ __('País') }}" />
                <select id="pais" class="block mt-1 w-full rounded-md" :value="old('pais')" name="state.pais" required>
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-1/3 mr-2">
                <x-jet-label for="estado" value="{{ __('Estado') }}" />
                <select id="estado" class="block mt-1 w-full rounded-md" :value="old('estado')" name="state.estado" required>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-1/3">
                <x-jet-label for="municipio" value="{{ __('Municipio') }}" />
                <select id="municipio" class="block mt-1 w-full rounded-md" :value="old('municipio')" name="state.municipio" required>
                    @foreach ($municipios as $municipio)
                        <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Guardado.') }} <!-- verificar traducción, decía "Saved" -->
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
*/