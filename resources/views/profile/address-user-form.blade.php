<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Administración') }}
        </h2>
    </x-slot>

    <!-- Name -->
    <div class="bg-sky-700 max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 mt-4 rounded">
        <h1 class="block mt-1 w-full text-xl text-white text-center font-bold">Domicilio</h1>
        <div class="col-span-6 sm:col-span-4 flex sm:p-2">
            <div class="w-2/4 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('Calle') }}" />
                <div>
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
                </div>
            </div>
            
            <div class="w-1/4 sm:col-span-4">
                <x-jet-label for="last_name" value="{{ __('Numero') }}" />
                <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="state.last_name" autocomplete="last_name" />
                <x-jet-input-error for="last_name" class="mt-2" />
            </div>

            <div class="w-1/4 mr-2">
                <x-jet-label for="curp" value="{{ __('Interior') }}" />
                <x-jet-input id="curp" type="text" class="mt-1 block w-full" wire:model.defer="state.curp" autocomplete="curp" />
                <x-jet-input-error for="curp" class="mt-2" />
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4 flex sm:p-2">
            

            <div class="">
                <x-jet-label for="fecha_nacimiento" value="{{ __('Fecha de nacimiento') }}" />
                <x-jet-input id="fecha_nacimiento" type="date" class="mt-1 block w-full" wire:model.defer="state.fecha_nacimiento" autocomplete="fecha_nacimiento" />
                <x-jet-input-error for="fecha_nacimiento" class="mt-2" />
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4 sm:p-2">
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
    </div>
</x-app-layout>