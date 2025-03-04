<x-app-layout>
    <x-slot name="header">
        <div class="display:flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>

        </div>
    </x-slot>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}'
                });
            @endif
        });
    </script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    
                    <!--
                    <select id="searchType" class="border rounded p-2 mt-2">
                        <option value="eventos">Eventos</option>
                        <option value="organizadores">Organizadores</option>
                        <option value="foros">Foros</option>
                        <option value="users">Usuarios</option>
                    </select>
                -->
                </div>

                <div id="searchResults"></div>
                <h2 class="text-xl font-bold mb-4"></h2>

                <div
                    class="w-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <!-- Menú de pestañas -->
                    <ul class="text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg flex dark:divide-gray-600 dark:text-gray-400"
                        id="tabs">
                        <li class="w-full">
                            <button data-tab="eventos"
                                class="tab-button active inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600">
                                Eventos
                            </button>
                        </li>
                        <li class="w-full">
                            <button data-tab="organizadores"
                                class="tab-button inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600">
                                Organizadores
                            </button>
                        </li>
                        <li class="w-full">
                            <button data-tab="foros"
                                class="tab-button inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600">
                                Foros
                            </button>
                        </li>
                        <li class="w-full">
                            <button data-tab="usuarios"
                                class="tab-button inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600">
                                Usuarios
                            </button>
                        </li>
                    </ul>

                    <!--Eventos-->
                    <div class="border-t border-gray-200 dark:border-gray-600">
                    <div id="eventos" class="tab-content  p-4 bg-white rounded-lg dark:bg-gray-800">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">Eventos</h2>
                            <input type="text" id="searchInputEvento" class="border rounded p-2 w-full" placeholder="Buscar...">
                            <button id='crear_evento'
                                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600"
                                onclick="CrearEvento()">Crear</button>
                        </div>
                        <ul class="text-gray-500 dark:text-gray-400">
                            @foreach ($eventos as $evento)
                                <li
                                    class="cardEvento block mb-2  p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"
                                    data-title="{{ strtolower($evento->title) }}"
                                    data-start-date="{{strtolower($evento->start_date)}}"
                                    data-end-date="{{strtolower($evento->end_date) }}"
                                    data-sede="{{strtolower($evento->foro->sede)}}"
                                    data-foro="{{strtolower($evento->foro->nombre)}}"
                                    data-organizador="{{ strtolower($evento->organizador->nombre) }}"
                                    data-tipo-evento="{{ strtolower($evento->tipo_evento) }}">
                                    <div class="flex justify-between items-center">
                                        <div class="flex justify-between">
                                            <strong>ID: </strong><span>{{ $evento->id }}</span>
                                            <div class="flex items-stretch">

                                                <div class="flex flex-col">
                                                    <div>
                                                        <strong>Titulo :</strong><span>{{ $evento->title }}</span>
                                                    </div>
                                                    <div>
                                                        <strong>Fecha de inicio : </strong><span>{{ $evento->start_date }}</span>
                                                    </div>
                                                    <div>
                                                        <strong>fecha de cierre : </strong><span>{{ $evento->end_date }}</span>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col">
                                                    <div>
                                                        <strong>Sede : </strong><span>{{ $evento->foro->sede }}</span>
                                                    </div>
                                                    <div>
                                                        <strong>Foro : </strong><span>{{ $evento->foro->nombre }}</span>
                                                    </div>
                                                    <div>
                                                        <strong>Organizador :</strong><span>{{ $evento->organizador->nombre }}</span>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col">
                                                    <div>
                                                        <strong>Tipo de evento :</strong><span>{{ $evento->tipo_evento }}</span>
                                                    </div>
                                                    <div>
                                                        <strong>Notas CTA :
                                                        </strong><span>{{ $evento->notas_cta }}</span>
                                                    </div>
                                                    <div>
                                                        <strong>Notas generales:</strong><span>{{ $evento->notas_generales }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-x-2 flex justify-between items-center">
                                            <button id="editarEvento"
                                                onclick="EditarEvento({{ $evento->id }}, 
                                                `{{ addslashes($evento->title) }}`,
                                                `{{ addslashes($evento->start_date) }}`,
                                                `{{ addslashes($evento->end_date) }}`,
                                                `{{ addslashes($evento->tipo_evento) }}`,
                                                `{{ addslashes($evento->organizador->id) }}`,
                                                `{{ addslashes($evento->foro->id) }}`,
                                                `{{ addslashes($evento->notas_generales) }}`,
                                                 `{{ addslashes($evento->notas_cta) }}`)"
                                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </button>
                                            <button
                                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </li>
                            @endforeach
                            <div class="mt-6">
                                {{ $eventos->links() }}  
                            </div> 
                        </ul>
                    </div>


                    <!-- Organizadores -->
                    <div id="organizadores" class="tab-content hidden p-4 bg-white rounded-lg dark:bg-gray-800">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">Organizadores</h2>
                            <input type="text" id="searchInputOrganizador" class="border rounded p-2 w-full" placeholder="Buscar...">
                            <button id='crear_organizador' onclick="opencrearModalOrganizadorEditar()"
                                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Crear</button>
                        </div>
                        <ul class="text-gray-500 dark:text-gray-400">

                            @foreach ($organizadores as $organizador)
                                <li
                                    class="cardOrganizador block mb-2  p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 "
                                    data-organizador-nombre="{{ strtolower($organizador->nombre)}}"
                                    data-organizador-telefono="{{ strtolower($organizador->telefono) }}">
                                    <div class="flex justify-between items-center">
                                        <strong>ID: </strong><span>{{ $organizador->id }}</span>
                                        <strong>Nombre: </strong><span>{{ $organizador->nombre }}</span>
                                        <strong>telefono: </strong><span>{{ $organizador->telefono }}</span>
                                        <div class="space-x-2 flex justify-between items-center">
                                            <button
                                                onclick="openEditModalOrganizadorEditar({{ $organizador->id }}, `{{ addslashes($organizador->nombre) }}`, `{{ addslashes($organizador->telefono) }}`)"
                                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </button>
                                            <form action="{{ route('organizador.destroy', $organizador->id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <div class="mt-6">
                                {{ $organizadores->links() }}  
                            </div> 
                        </ul>
                    </div>
                    <!-- foros -->
                    
                        <div id="foros" class="tab-content hidden p-4 bg-white rounded-lg dark:bg-gray-800">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">Foros</h2>
                                <input type="text" id="searchInputForo" class="border rounded p-2 w-full" placeholder="Buscar...">
                                <button id='crear_foro' onclick="opencrearModalForo()"
                                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Crear</button>
                            </div>
                            <div id="search-results"></div>
                            <ul class="text-gray-500 dark:text-gray-400">
                                @foreach ($foros as $foro)
                                    <li
                                        class="cardForo block mb-2 p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"
                                        data-foro-nombre="{{ strtolower($foro->nombre)}}"
                                        data-foro-sede="{{ strtolower($foro->sede)}}">
                                        <div class="flex justify-between items-center">
                                            <strong>ID: </strong><span>{{ $foro->id }}</span>
                                            <strong>Nombre: </strong><span>{{ $foro->nombre }}</span>
                                            <strong>Sede: </strong><span>{{ $foro->sede }}</span>

                                            <div class="space-x-2 flex justify-between items-center">
                                                <button
                                                    onclick="openEditModalForoEditar({{ $foro->id }}, '{{ $foro->nombre }}', '{{ $foro->sede }}')"
                                                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </button>
                                                <form action="{{ route('foro.destroy', $foro->id) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                <div class="mt-6">
                                    {{ $foros->links() }}  
                                </div> 
                            </ul>
                        </div>
                    </div>

                    <!-- usuarios -->
                    <div id="usuarios" class="tab-content hidden p-4 bg-white rounded-lg dark:bg-gray-800">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">Usuarios</h2>
                            <input type="text" id="searchInputUser" class="border rounded p-2 w-full" placeholder="Buscar...">
                            <button id='crear_usuario' onclick="openCrearModalUsuario()"
                                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Crear</button>
                        </div>
                        <ul class="text-gray-500 dark:text-gray-400">

                            @foreach ($users as $user)
                                <li
                                    class="cardUser block mb-2 p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"
                                    data-user-nombre="{{ strtolower($user->name)}}"
                                    data-user-codigo="{{ strtolower($user->codigo)}}"
                                    data-user-email="{{ strtolower($user->email)}}"
                                    data-user-telefono="{{ strtolower($user->telefono)}}">
                                    <div class="flex justify-between items-center">
                                        <strong>ID: </strong><span>{{ $user->id }}</span>
                                        <strong>Nombre: </strong><span>{{ $user->name }}</span>
                                        <strong>codigo: </strong><span>{{ $user->codigo }}</span>
                                        <strong>Email: </strong><span>{{ $user->email }}</span>
                                        <strong>Telefono: </strong><span>{{ $user->telefono }}</span>

                                        <div class="space-x-2 flex justify-between items-center">
                                            <button onclick="openEditarModalUsuario({{ json_encode($user) }})"
                                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </button>
                                            <form action="{{ route('usuario.destroy', $user->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </li>
                            @endforeach
                            <div class="mt-6">
                                {{ $users->links() }}  
                            </div> 
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Modales foro-->
            @include('modales.editarForo')
            @include('modales.crearForo')

            <!--Modales organizadores-->
            @include('modales.editarOrganizador')
            @include('modales.crearOrganizador')

            <!-- modales para eventos-->
            @include('modales.crearEvento')
            @include('modales.editarEvento')

            <!-- modales para usuarios-->
            @include('modales.crearUsuario')
            @include('modales.editarUsuario')




        </div>
    </div>

    <!-- Script para cambiar las pestañas sin ocultar el menú -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remover clase activa de todos los botones y ocultar contenido
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.add('hidden'));

                    // Activar la pestaña seleccionada
                    const target = document.getElementById(this.getAttribute('data-tab'));
                    target.classList.remove('hidden');
                    this.classList.add('active');
                });
            });
        });
    </script><!-- Script para cambiar las pestañas sin ocultar el menú -->

    <script>
        document.getElementById('searchInputEvento').addEventListener('input', function() {
            const searchQuery = this.value.toLowerCase();  // Captura lo que el usuario escribe
            const cards = document.querySelectorAll('.cardEvento');  // Selecciona todas las tarjetas

            cards.forEach(function(card) {
                // Compara los atributos de datos de la tarjeta con la búsqueda
                const buscarTitle = card.getAttribute('data-title');
                const buscarStartDate = card.getAttribute('data-start-date');
                const buscarEndDate = card.getAttribute('data-end-date');
                const buscarSede = card.getAttribute('data-sede');
                const buscarForo = card.getAttribute('data-foro');
                const buscarOrganizador = card.getAttribute('data-organizador');
                const buscarTipoEvento = card.getAttribute('data-tipo-evento');

                // Si algún atributo contiene el texto de búsqueda, muestra la tarjeta; si no, la oculta
                if ( buscarTitle.includes(searchQuery) ||buscarStartDate.includes(searchQuery) 
                    ||buscarEndDate.includes(searchQuery) 
                    ||buscarTipoEvento.includes(searchQuery) 
                    ||buscarSede.includes(searchQuery) 
                    ||buscarForo.includes(searchQuery) 
                    ||buscarOrganizador.includes(searchQuery) 
                ){
                    card.style.display = '';  // Muestra la tarjeta
                } else {
                    card.style.display = 'none';  // Oculta la tarjeta
                }
            });
        });
        document.getElementById('searchInputOrganizador').addEventListener('input', function() {
            const searchQuery = this.value.toLowerCase();  // Captura lo que el usuario escribe
            const cards = document.querySelectorAll('.cardOrganizador');  // Selecciona todas las tarjetas

            cards.forEach(function(card) {
                // Compara los atributos de datos de la tarjeta con la búsqueda
                const buscarOrganizadorNombre = card.getAttribute('data-organizador-nombre');
                const buscarOrganizadorTelefono = card.getAttribute('data-organizador-telefono');
                
                const buscarForoNombre = card.getAttribute('data-foro-nombre');
                const buscarForosede = card.getAttribute('data-foro-sede');
                
                // Si algún atributo contiene el texto de búsqueda, muestra la tarjeta; si no, la oculta
                if (buscarOrganizadorNombre.includes(searchQuery) 
                    ||buscarOrganizadorTelefono.includes(searchQuery)
                    
                ){
                    card.style.display = '';  // Muestra la tarjeta
                } else {
                    card.style.display = 'none';  // Oculta la tarjeta
                }
            });
        });
        document.getElementById('searchInputForo').addEventListener('input', function() {
            const searchQuery = this.value.toLowerCase();  // Captura lo que el usuario escribe
            const cards = document.querySelectorAll('.cardForo');  // Selecciona todas las tarjetas

            cards.forEach(function(card) {
                // Compara los atributos de datos de la tarjeta con la búsqueda
                const buscarForoNombre = card.getAttribute('data-foro-nombre');
                const buscarForosede = card.getAttribute('data-foro-sede');

                // Si algún atributo contiene el texto de búsqueda, muestra la tarjeta; si no, la oculta
                if ( buscarForoNombre.includes(searchQuery)
                    ||buscarForosede.includes(searchQuery)
                ){
                    card.style.display = '';  // Muestra la tarjeta
                } else {
                    card.style.display = 'none';  // Oculta la tarjeta
                }
            });
        });
        document.getElementById('searchInputUser').addEventListener('input', function() {
            const searchQuery = this.value.toLowerCase();  // Captura lo que el usuario escribe
            const cards = document.querySelectorAll('.cardUser');  // Selecciona todas las tarjetas

            cards.forEach(function(card) {
                // Compara los atributos de datos de la tarjeta con la búsqueda
                const buscarUserNombre = card.getAttribute('data-user-nombre');
                const buscarUserCodigo = card.getAttribute('data-user-codigo');
                const buscarUserEmail = card.getAttribute('data-user-email');
                const buscarUserTelefono = card.getAttribute('data-user-telefono');

                // Si algún atributo contiene el texto de búsqueda, muestra la tarjeta; si no, la oculta
                if (buscarUserNombre.includes(searchQuery)
                    ||buscarUserCodigo.includes(searchQuery)
                    ||buscarUserEmail.includes(searchQuery) 
                    ||buscarUserTelefono.includes(searchQuery)
                ){
                    card.style.display = '';  // Muestra la tarjeta
                } else {
                    card.style.display = 'none';  // Oculta la tarjeta
                }
            });
        });

    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        fetchEventos(page);
    });

    function fetchEventos(page) {
        $.ajax({
            url: "/eventos?page=" + page,
            success: function(data) {
                $(".text-gray-500").html(data);
            }
        });
    }

    </script>

</x-app-layout>