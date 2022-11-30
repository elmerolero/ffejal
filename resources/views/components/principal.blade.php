@props(['titulo'])

<div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-around">
        <x-menu>
            {{ $menu }}
        </x-menu>
        <div class="bg-white rounded p-4 w-8/12">
            <h1 class="text-2xl text-sky-900 font-sans"><strong>{{ $titulo }}</strong></h1>
            {{ $slot }}
        </div>
    </div>
</div>
