<!-- Modal de edición -->
<div id="editarModalUsuario" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">Editar Usuario</h2>

        <form id="editarUsuarioForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="editUsuarioId">

            <div class="mb-3">
                <label for="editNombre" class="block font-medium">Nombre</label>
                <input type="text" name="name" id="editNombre" class="w-full p-2 border rounded">
            </div>

            <div class="mb-3">
                <label for="editTelefono" class="block font-medium">Teléfono</label>
                <input type="text" name="telefono" id="editTelefono" class="w-full p-2 border rounded">
            </div>

            <div class="mb-3">
                <label for="editCodigo" class="block font-medium">Código</label>
                <input type="text" name="codigo" id="editCodigo" class="w-full p-2 border rounded">
            </div>

            <div class="mb-3">
                <label for="editEmail" class="block font-medium">Correo Electrónico</label>
                <input type="email" name="email" id="editEmail" class="w-full p-2 border rounded">
            </div>

            <div class="mb-3">
                <label for="editPassword" class="block font-medium">Nueva Contraseña (Opcional)</label>
                <input type="password" name="password" id="editPassword" class="w-full p-2 border rounded">
            </div>

            <div class="mb-3">
                <label for="editPasswordConfirm" class="block font-medium">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="editPasswordConfirm" class="w-full p-2 border rounded">
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeEditarModalUsuario()" class="px-3 py-1 bg-gray-400 text-white rounded hover:bg-gray-500">Cancelar</button>
                <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Actualizar</button>
            </div>
        </form>
    </div>
</div>

<!-- Script para controlar el modal -->
<script>
    function openEditarModalUsuario(user) {
        document.getElementById("editarModalUsuario").classList.remove("hidden");

        // Llenar los campos con los datos del usuario
        document.getElementById("editUsuarioId").value = user.id;
        document.getElementById("editNombre").value = user.name;
        document.getElementById("editTelefono").value = user.telefono;
        document.getElementById("editCodigo").value = user.codigo;
        document.getElementById("editEmail").value = user.email;
    }

    function closeEditarModalUsuario() {
        document.getElementById("editarModalUsuario").classList.add("hidden");
    }
</script>
<script>
    document.getElementById("editarUsuarioForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Evita la recarga de la página

        let formData = new FormData(this);

        fetch("{{ route('usuario.update') }}", {
            method: "PATCH",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Usuario actualizado correctamente.");
                closeEditarModalUsuario();
                location.reload();
            } else {
                alert("Error al actualizar: " + JSON.stringify(data.errors));
            }
        })
        .catch(error => console.error("Error:", error));
    });
</script>