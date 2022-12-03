<div class="modal fade fixed top-0 left-0 w-full h-full bg-black hidden overflow-x-hidden overflow-y-auto usuario-informacion" tabindex="-1" aria-modal="true" style="display: block; background: rgba( 0,0,0, 0.5);">
    <div class="modal-content shadow-lg bg-white outline-none flex flex-col rounded-md m-auto w-1/3 fixed" style="top: 4vh; left: 33vw;">
        <div class="flex justify-end mr-8">
            <a class="mt-4 text-center text-m rounded-full border-slate-300 border-4 w-8 usuario-cerrar">x</a>
        </div>
        <div class="m-4 border-l-4 border-cyan-500 pl-2 text-xl flex justify-between">
            <div>
                <h1><strong class="usuario-nombre">Ismael Salas López</strong></h1>
                <p class="usuario-roll text-sm">Participante </p>
            </div>
            <div>
                <p><strong>Código: </strong><span class="usuario-id">1</span></p>
            </div>
        </div>
        <div class="m-4 pl-2">
            <div>
                <p><strong>Lugar de nacimiento: </strong></p><p class="usuario-lugar">Jalisco, México</p>
            </div>
            <hr>
            <div class="mt-4">
                <p><strong>CURP</strong></p><p class="usuario-curp">SALI990311HJCLPS00</p>
            </div>
            <hr>
            <div class="mt-4">
                <p><strong>Fecha de nacimiento: </strong></p><p class="usuario-fecha-nacimiento">11 de marzo de 1999</p>
            </div>
            <hr>
            <div class="mt-4">
                <p><strong>Correo electrónico: </strong></p><p class="usuario-correo">isma.salas24@gmail.com</p>
            </div>
            <br>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtiene el componente modal que guarda los eventos
        let eventoInfo = document.querySelector( ".usuario-informacion" );
        eventoInfo.style.display = "none";
        eventoInfo.querySelector( ".usuario-cerrar" ).onclick = function(){ eventoInfo.style.display = "none"; };
    });
</script>