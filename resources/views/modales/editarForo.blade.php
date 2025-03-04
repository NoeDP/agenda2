<!-- Modal editar foro-->
<div id="editModalForo" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">Editar Foro</h2>

        <form action="{{ route('foro.update') }} " method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="editForoId" id="editForoId">

            <div class="mb-3">
                <label for="editForoNombre" class="block font-medium">Nombre</label>
                <input type="text" name="editForoNombre" id="editForoNombre" class="w-full p-2 border rounded">
            </div>

            <div class="mb-3">
                <label for="editForoSede" class="block font-medium">Sede</label>
                <select name="editForoSede" id="editForoSede">
                    <option value="" disabled selected>Selecione una dependencia</option>
                    <option value="La Normal">La Normal</option>
                    <option value="Belenes">Belenes</option>
                </select>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeEditModalForo()"
                    class="px-3 py-1 bg-gray-400 text-white rounded hover:bg-gray-500">Cancelar</button>
                <button type="submit"
                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Guardar</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModalForoEditar(id, nombre, sede) {
        document.getElementById("editForoId").value = id;
        document.getElementById("editForoNombre").value = nombre;
        document.getElementById("editForoSede").value = sede;
        document.getElementById("editModalForo").classList.remove("hidden");
    }

    function closeEditModalForo() {
        document.getElementById("editModalForo").classList.add("hidden");
    }
</script>
