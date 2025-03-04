<div id="crearModalOrganizador" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">crear Organizador</h2>

        <form action="{{ route('organizador.store') }} " method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="createOrganizadorId" id="editOrganizadorId">

            <div class="mb-3">
                <label for="OrganizadorNombre" class="block font-medium">Nombre</label>
                <input type="text" name="OrganizadorNombre" id="OrganizadorNombre" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-3">
                <label for="OrganizadorTelefono" class="block font-medium">Telefono</label>
                <input type="text" name="OrganizadorTelefono" maxlength="10" 
                    id="OrganizadorTelefono"
                    class="w-full p-2 border rounded"
                    onKeypress="if(!(event.charCode >= 48 && event.charCode <= 57)) event.preventDefault()"
                    required>
            </div>

            <div class="flex justify-end sp ace-x-2">
                <button type="button" onclick="closeCrearModalOrganizador()"
                    class="px-3 py-1 bg-gray-400 text-white rounded hover:bg-gray-500">Cancelar</button>
                <button type="submit"
                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Guardar</button>
            </div>
        </form>
    </div>
</div>
<script>
    function opencrearModalOrganizadorEditar() {
        document.getElementById("crearModalOrganizador").classList.remove("hidden");
    }

    function closeCrearModalOrganizador() {
        document.getElementById("").classList.add("hidden");
    }
</script>
