<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Administración') }}
        </h2>
    </x-slot>

    <x-principal titulo="Inicio">
        <x-slot name="menu">
            <ul class="bg-sky-900 rounded p-4 text-white">
                <li class="m-2 border-b-2 border-cyan-500">
                    <a href="">Competencias</a>
                </li>
                <li class="m-2 border-b-2 border-sky-900">
                    <a href="">Financiero</a>
                <li>
                <li class="m-2 border-b-2 border-sky-900">
                    <a href="{{route('administracion.users')}}">Participantes y usuarios</a>
                </li>
                <li class="m-2 border-b-2 border-sky-900">
                    <a href="">Catálogos</a>
                </li>
            </ul>
        </x-slot>

        <button class="bg-green-700 text-white p-2 rounded">Agregar</button>
        
    </x-principal>
</x-app-layout>