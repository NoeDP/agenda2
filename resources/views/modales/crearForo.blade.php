<div id="crearModalForo" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">crear Organizador</h2>

        <form action="{{ route('foro.store') }} " method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="createForoId" id="createForoId">

            <div class="mb-3">
                <label for="foroNombre" class="block font-medium">Nombre</label>
                <input type="text" name="foroNombre" id="foroNombre" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-3">
                <label for="foroSede" class="block font-medium">Sede</label>
                <select name="foroSede" id="foroSede" required>
                    <option value="" disabled selected>Selecione una dependencia</option>
                    <option value="La Normal">La Normal</option>
                    <option value="Belenes">Belenes</option>
                    <option value="Belenes Aulas">Belenes Aulas</option>
                </select>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closecrearModalOForo()"
                    class="px-3 py-1 bg-gray-400 text-white rounded hover:bg-gray-500">Cancelar</button>
                <button type="submit"
                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Guardar</button>
            </div>
        </form>
    </div>
</div>
<!-- Script para capturar informacion de crearModalForo para foro -->
<script>
    function opencrearModalForo() {
        document.getElementById("crearModalForo").classList.remove("hidden");
    }

    function closeEditModalOrganizador() {
        document.getElementById("crearModalForo").classList.add("hidden");
    }
</script>
