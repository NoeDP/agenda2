<!-- Modal para Crear Usuario -->
<div id="crearModalUsuario" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">Crear Usuario</h2>

        <form action="{{ route('usuario.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="name" class="block font-medium">Nombre</label>
                <input type="text" name="name" id="name" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="block font-medium">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="w-full p-2 border rounded" maxlength="10" required
                onKeypress=" if (!(event.charCode >= 48 && event.charCode <= 57)) event.preventDefault()">
            </div>

            <div class="mb-3">
                <label for="codigo" class="block font-medium">Código</label>
                <input type="text" name="codigo" id="codigo" class="w-full p-2 border rounded" maxlength="8" required
                onKeypress=" if (!(event.charCode >= 48 && event.charCode <= 57)) event.preventDefault()">
            </div>

            <div class="mb-3">
                <label for="email" class="block font-medium">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-3">
                <label for="password" class="block font-medium">Contraseña</label>
                <input type="password" name="password" id="password" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="block font-medium">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-2 border rounded" required>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeCrearModalUsuario()" class="px-3 py-1 bg-gray-400 text-white rounded hover:bg-gray-500">
                    Cancelar
                </button>
                <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Scripts para manejar el modal -->
<script>
    function openCrearModalUsuario() {
        document.getElementById("crearModalUsuario").classList.remove("hidden");
    }

    function closeCrearModalUsuario() {
        document.getElementById("crearModalUsuario").classList.add("hidden");
    }
</script>