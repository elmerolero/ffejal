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
        
        <div class="overflow-x block">
            <table class="table-auto overflow-scroll w-full">
                <thead>
                    <tr class="text-left">
                        <th class="p-2">Código</th>
                        <th class="p-2">Nombre</th>
                        <th class="p-2">Roll</th>
                        <th class="p-2">Lugar de nacimiento</th>
                        <th class="p-2">Correo electrónico</th>
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach( $users as $user )
                <tr>
                    <td class="p-2">{{ $user->id }}</td>
                    <td class="p-2">{{ $user -> name }} {{ $user -> last_name }}</td>
                    <td class="p-2">{{ $user -> current_team_id == null ? "Participante" : "" }}</td>
                    <td class="p-2">Jalisco, Mexico</td>
                    <td class="p-2">{{ $user -> email }}</td>
                    <td class="p-2">
                        <button class="bg-blue-600 text-white p-1 rounded hover:bg-blue-800" onclick="usuarioVer({{ $user->id }})">
                            <img src="/ffejal/public/img/view.png" width="20">
                        </button>
                    </td>
                    <td>
                        <button class="bg-amber-400 text-white p-1 rounded hover:bg-amber-800" onclick="editar({{ $user->id }})">
                            <img src="/ffejal/public/img/edit.png" width="20">
                        </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-principal>
</x-app-layout>

<x-user-info>
</x-user-info>

<x-user-info-edit>
</x-user-info-edit>

<script>
    // *************************
    function usuarioVer( id ){
        // Crea un objeto XMLHttpRequest para hacer una petición
        let xhttp = new XMLHttpRequest;

        // Indicamos lo que se hara una vez que se reciba una respuesta del servidor
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Obtiene el JSON
                let datos = JSON.parse( this.responseText )[ 0 ];
                datos.estado_origen = (datos.estado_origen != null ? datos.estado_origen : "No establecido" );
                datos.pais_origen = (datos.pais_origen != null ? datos.pais_origen : "" );
                datos.curp = (datos.curp != null ? datos.curp : "No establecido" );
                datos.fecha_nacimiento = (datos.fecha_nacimiento != null ? datos.fecha_nacimiento : "No establecido" );
                console.log( datos );

                // Establece los campos del evento y después muestra la ventana modal
                let userInfo = document.querySelector( ".usuario-informacion" );

                userInfo.querySelector( ".usuario-id" ).innerHTML = 1;
                userInfo.querySelector( ".usuario-nombre" ).innerHTML = datos.name + " " + datos.last_name;
                userInfo.querySelector( ".usuario-lugar" ).innerHTML = datos.estado_origen + ", " + datos.pais_origen;
                userInfo.querySelector( ".usuario-curp" ).innerHTML = datos.curp;
                userInfo.querySelector( ".usuario-fecha-nacimiento" ).innerHTML = datos.fecha_nacimiento;
                userInfo.querySelector( ".usuario-correo" ).innerHTML = datos.email;
                userInfo.style.display = "block";
            }

        };
        
        // Realizamos la solicitud
        xhttp.open( "GET", ("/ffejal/public/api/users/" + id), true );
        xhttp.send();
    }

    function openmodal(){
        document.querySelector( "#modal" ).setAtribute( "aria-hidden", "false" );
    }
</script>