<div id="editModalOrganizador" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">Editar organizadores</h2>

        <form action="{{ route('organizador.update') }} " method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="editOrganizadorID" id="editOrganizadorID">

            <div class="mb-3">
                <label for="editOrganizadorNombre" class="block font-medium">Nombre</label>
                <input type="text" name="editOrganizadorNombre" id="editOrganizadorNombre" class="w-full p-2 border rounded">
            </div>

            <div class="mb-3">
                <label for="editOrganizadorTelefono" class="block font-medium">Telefono</label>
                <input type="text" name="editOrganizadorTelefono" id="editOrganizadorTelefono" onKeypress=" if (!(event.charCode >= 48 && event.charCode <= 57)) event.preventDefault()" class="w-full p-2 border rounded">
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeEditModalOrganizador()"
                    class="px-3 py-1 bg-gray-400 text-white rounded hover:bg-gray-500">Cancelar</button>
                <button type="submit"
                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Guardar</button>
            </div>
        </form>
    </div>
</div>


<script>
    function openEditModalOrganizadorEditar(id, nombre, telefono) {
        document.getElementById("editOrganizadorID").value = id;
        document.getElementById("editOrganizadorNombre").value = nombre;
        document.getElementById("editOrganizadorTelefono").value = telefono;
        document.getElementById("editModalOrganizador").classList.remove("hidden");
        console.log(id + " " + nombre + " " + telefono)
        document.getElementById("editOrganizadorID").value = id;
    }

    function closeEditModalOrganizador() {
        document.getElementById("editModalOrganizador").classList.add("hidden");
    }
</script>
