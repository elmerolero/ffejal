<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Administración') }}
        </h2>
    </x-slot>

    <x-principal titulo="Participantes y usuarios">
        <x-slot name="menu">
            <ul class="bg-sky-900 rounded p-4 text-white">
                <li class="m-2 border-b-2 border-sky-900">
                    <a href="">Competencias</a>
                </li>
                <li class="m-2 border-b-2 border-sky-900">
                    <a href="">Financiero</a>
                <li>
                <li class="m-2 border-b-2 border-cyan-500">
                    <a href="{{route('administracion.users')}}">Participantes y usuarios</a>
                </li>
                <li class="m-2 border-b-2 border-sky-900">
                    <a href="">Catálogos</a>
                </li>
            </ul>
        </x-slot>

        <button class="bg-green-700 text-white p-2 rounded">Agregar</button>
        <table class="overflow-x-auto" style="width: 50px;">
            @foreach( $users as $user )
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user -> name }} {{ $user -> last_name }}</td>
                <td>{{ $user -> current_team_id == null ? "Participante" : "" }}</td>
                <td>Jalisco, Mexico</td>
                <td>{{ $user -> email }}</td>
            </tr>
            @endforeach
        </table>
        
        @foreach( $users as $user )
        <div class="flex items-center justify-between mt-2">
            <!-- Scroll wrapper -->
            <div class="flex overflow-x-auto w-full">
                <!-- Scrollable container -->
                <div class="w-1/12 text-center">
                    <!-- Your content -->
                    {{ $user->id }}
                </div>
                <div class="w-6/12">
                    <!-- Your content -->
                    {{ $user -> name }} {{ $user -> last_name }}
                </div>
                <div class="w-2/12">
                    <!-- Your content -->
                    {{ $user -> current_team_id == null ? "Participante" : "" }}
                </div>
                <div class="w-3/12">
                    <!-- Your content -->
                    Jalisco, Mexico
                </div>
                <div class="w-auto">
                    <!-- Your content -->
                    {{ $user -> email }}
                </div>
            </div>
            <!-- Fixed sidebar -->
            <div class="w-2/12">
                <!-- Sidebar content -->
                <button class="bg-blue-600 text-white p-1 rounded" onclick="ver">
                    <img src="/ffejal/public/img/view.png" width="20">
                </button>
                <button class="bg-amber-400 text-white p-1 rounded" onclick="">
                    <img src="/ffejal/public/img/edit.png" width="20">
                </button>
                <button class="bg-red-600 text-white p-1 rounded">
                    <img src="/ffejal/public/img/delete.png" width="20">
                </button>
            </div>
        </div>
        @endforeach
    </x-principal>
</x-app-layout>