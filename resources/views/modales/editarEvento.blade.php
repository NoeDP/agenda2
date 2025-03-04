<!-- Modal de Editar del Evento -->
<div class="modal fade" id="eventoEditarModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Evento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

                <form id="formEditarEvento">

                    <input type="hidden" id="edit_evento_id">
                    <p><strong>ID:</strong> <span id="editarEvento_id"></span></p>

                    <div class="mb-3">
                        <label for="edit_evento_titulo" class="form-label">titulo</label>
                        <input type="text" class="form-control" id="edit_evento_titulo">
                    </div>

                    <div class="mb-3">
                        <label for="edit_evento_fecha_inicio" class="form-label">Fecha inicio </label>
                        <input type="date" class="form-control" id="edit_evento_fecha_inicio">
                    </div>

                    <strong>Horario</strong>
                    <div>
                        <label>Hora Inicio:</label>
                        <input type="time" id="edit_horaInicio" name="inicio" min="08:00" max="17:00"
                            class="form-control" required>

                        <span id="errorFecha"></span>

                        <label>Hora final:</label>
                        <input type="time" id="edit_horaFin" name="fin" min="09:00" max="18:00"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Organizador:</label>
                        <select name="edit_organizadores_id" id="edit_organizadores_id">
                            <option value="" disabled selected>Seleccione un organizador</option>
                            @foreach ($organizadores as $organizador)
                                <option value="{{ $organizador->id }}">{{ $organizador->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Dependencia:</label>
                        <select name="edit_dependencia" id="edit_dependencia">
                            <option value="" disabled selected>Seleccione un foro</option>
                            @foreach ($dependencias as $dependencia)
                                <option value="{{ $dependencia->sede }}">{{ $dependencia->sede }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Foro:</label>
                        <select name="edit_cede_modalE" id="edit_cede_modalE">
                            <option value="" disabled selected>Seleccione un foro</option>
                            @foreach ($foros as $foro)
                                <option value="{{ $foro->id }}" data-dependencia="{{ $foro->nombre }}">
                                    {{ $foro->nombre }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="edit_tipoEvento" class="form-label">Tipo de Evento</label>
                        <input type="text" class="form-control" id="edit_tipoEvento">
                    </div>

                    <div class="mb-3">
                        <label for="edit_notasGen" class="form-label">Notas Generales</label>
                        <textarea class="form-control" id="edit_notasGen"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="edit_notasCta" class="form-label">Notas CTA</label>
                        <textarea class="form-control" id="edit_notasCta"></textarea>
                    </div>
                    @auth
                        <p><strong>RESGISTRADOR:</strong> <span id="edit_evento_registrador">{{ Auth::user()->name }}</span>
                        </p>
                    @endauth

                    <button type="button" id="actualizarEvento" class="btn btn-primary">actualizar</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let dependenciaSelect = document.getElementById("edit_dependencia");
            let foroSelect = document.getElementById("edit_cede_modalE");

            // Bloquear el select de foro al inicio
            foroSelect.disabled = false;

            dependenciaSelect.addEventListener("change", function() {
                let sede = this.value; // Obtener el valor de la sede seleccionada

                if (sede) {
                    foroSelect.disabled = false; // Desbloquear el select de foro

                    // Hacer petición AJAX para obtener los foros de la dependencia seleccionada
                    fetch(`/foros-dependencia/${sede}`)
                        .then(response => response.json())
                        .then(data => {
                            // Limpiar las opciones del select
                            foroSelect.innerHTML =
                                '<option value="" disabled selected>Seleccione un foro</option>';

                            // Agregar las nuevas opciones al select
                            data.forEach(foro => {
                                let option = document.createElement("option");
                                option.value = foro.id;
                                option.textContent = foro.nombre;
                                foroSelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error("Error cargando los foros:", error));
                } else {
                    // Si no hay dependencia seleccionada, bloquear el select de foro
                    foroSelect.innerHTML = '<option value="" disabled selected>Seleccione un foro</option>';
                    foroSelect.disabled = true;
                }
            });
        });
    </script>
</div>
<!-- fin de modal editar-->
<script>
    function EditarEvento(
                id,
                title,
                start_date,
                end_date,

                tipo_evento,
                organizador,
                foro, 
                notas_generales,
                notas_cta,
            ) {
        let modalEditar = new bootstrap.Modal(document.getElementById('eventoEditarModal'));
        modalEditar.show();
        console.log(foro,dependencia)
                let startDate = new Date(start_date).toISOString().split`T`[0];
                let fechaInicio = new Date(start_date)
                let horaInicio =  fechaInicio.getHours().toString().padStart(2, '0');
                let minutoInicio = fechaInicio.getMinutes().toString().padStart(2, '0')
                let fechacierre = new Date(end_date)
                let horaFin =  fechacierre.getHours().toString().padStart(2, '0');
                let minutoFin = fechacierre.getMinutes().toString().padStart(2, '0');
                 
                let endDate =  new Date(end_date) // Si no tiene fecha de fin, usa la de inicio
                let endFormatted = endDate.toISOString().slice(0, 16);
                //console.log(`${horaInicio}:${minutoInicio}`)
                //console.log(`${horaFin}:${minutoFin}`)
                document.getElementById("edit_evento_fecha_inicio").value = startDate
                document.getElementById("edit_horaInicio").value = `${horaInicio}:${minutoInicio}`;
                document.getElementById("edit_horaFin").value =`${horaFin}:${minutoFin}` 
                var tituloNuevo = document.getElementById("edit_evento_titulo").value =title;
                var tipoEventoNuevo = document.getElementById("edit_tipoEvento").value =tipo_evento;
                var notasCtaNuevo = document.getElementById("edit_notasCta").value =notas_cta;
                var notasGenNuevo = document.getElementById("edit_notasGen").value =notas_generales;
                var selectOrganizador = document.getElementById("edit_organizadores_id");
                selectOrganizador.value = organizador;
                var selectCede = document.getElementById("edit_cede_modalE");
                selectCede.value = foro;
                /*
                var selectDependencia = document.getElementById("edit_dependencia");
                selectDependencia.value = foro.sede;
*/
    }
</script>
