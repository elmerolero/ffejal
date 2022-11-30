<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Administración') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="flex justify-around">
                    <div class="w-1/4">
                        <ul class="bg-sky-900 rounded p-4 text-white">
                            <li class="m-2 border-b-2 border-cyan-500">
                                <a href="">Validación del competidor</a>
                            </li>
                            <li class="m-2 border-b-2 border-sky-900">
                                <a href="">Concursos</a>
                            <li>
                        </ul>
                    </div>
                    <div class="w-2/3 bg-white rounded p-4">
                        <h1 class="text-2xl text-sky-900 font-sans"><strong>Validación de datos del competidor</strong></h1>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
