<!-- Modal Creacion-->
@include('importaciones.importaciones')

<div class="modal fade" id="eventoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="formulario" method="POST" id="createEventoModal">
                    @csrf

                    <label for="create_title">Titulo</label>
                    <input type="text" class="form-control" id="create_title" name="create_title" required>
                    <span id="titleError" class="text-danger"></span>

                    <label>fecha de inicio:</label>
                    <input type="date" id="create_fechaInicio" name="inicio" class="form-control" required>

                    <span id="errorFecha"></span>

                    <label>fecha de cierre:</label>
                    <input type="date" id="create_fechaFin" name="fin" class="form-control">
                    
                    <strong>Horario</strong>
                    <div>
                        <label>Hora Inicio:</label>
                        <input type="time" id="create_horaInicio" name="inicio" min="08:00" max="17:00" class="form-control" required>
                        
                        <span id="errorFecha"></span>
                        
                        <label>Hora final:</label>
                        <input type="time" id="create_horaFin" name="fin" min="09:00" max="18:00" class="form-control" required>
                    </div>
                    

                
                    <div class="mb-3" >
                        <label>Organizador:</label>
                        <select name="create_organizadores" id="create_organizadores" required>
                            <option value="" disabled selected>Seleccione un organizador</option>
                                @foreach ($organizadores as $organizador)
                                    <option value="{{ $organizador->id }}">{{ $organizador->nombre }}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="mb-3" >
                        <label>Dependencia:</label>
                        <select name="create_dependencia" id="create_dependencia" required>
                            <option value="" disabled selected>Seleccione una dependencia</option>
                                @foreach ($dependencias as $dependencia)
                                    <option value="{{ $dependencia->sede }}">{{ $dependencia->sede }}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="mb-3" >
                        <label>foro:</label>
                        <select name="create_sede" id="create_sede" required>
                            <option value="" disabled selected>Seleccione un foro</option>
                                @foreach ($foros as $foro)
                                    <option value="{{ $foro->id }}">{{ $foro->nombre }}</option>
                                @endforeach
                        </select>
                    </div>
                    
                    <label for="create_notasGen">Notas generales</label>
                    <input type="text" class="form-control" id="create_notasGen" name="create_notasGen">                

                    <label for="create_notasCta">Notas CTA</label>
                    <input type="text" class="form-control" id="create_notasCta" name="create_notasCta">
                    
                    <label for="create_tipoEvento">Tipo de evento</label>
                    <input type="text" class="form-control" id="create_tipoEvento" name="create_tipoEvento" required>

                    @auth
                    <p><strong>RESGISTRADOR:</strong> <span id="evento_registrador">{{ Auth::user()->name }}</span></p>
                    <span type="hidden" id="evento_registradorId">{{ Auth::user()->id }}</span></p>
                    @endauth
                </form>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="guardarEvento" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
    <script>
       document.addEventListener("DOMContentLoaded", function () {
            let dependenciaSelect = document.getElementById("create_dependencia");
            let foroSelect = document.getElementById("create_sede");

            // Bloquear el select de foro al inicio
            foroSelect.disabled = true;

            dependenciaSelect.addEventListener("change", function () {
                let sede = this.value; // Obtener el valor de la sede seleccionada

                if (sede) {
                    foroSelect.disabled = false; // Desbloquear el select de foro

                    // Hacer petición AJAX para obtener los foros de la dependencia seleccionada
                    fetch(`/foros-dependencia/${sede}`)
                        .then(response => response.json())
                        .then(data => {
                            // Limpiar las opciones del select
                            foroSelect.innerHTML = '<option value="" disabled selected>Seleccione un foro</option>';

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
<!--fin de modal creacion-->
<script>
function CrearEvento() {
    let eventoModal = new bootstrap.Modal(document.getElementById('eventoModal'));
    eventoModal.show();
    }

</script>
