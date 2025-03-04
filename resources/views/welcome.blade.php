<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script><meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Agenda</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0px}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-mx-3{margin-left:-0.75rem;margin-right:-0.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.grid{display:grid}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-full{width:100%}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.max-w-\[877px\]{max-width:877px}.max-w-2xl{max-width:42rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-md{border-radius:0.375rem}.rounded-sm{border-radius:0.125rem}.bg-\[\#FF2D20\]\/10{background-color:rgb(255 45 32 / 0.1)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to:rgb(255 255 255 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to:#fff var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#FF2D20}.object-cover{object-fit:cover}.object-top{object-position:top}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-3{padding-top:0.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\]{--tw-shadow:0px 14px 34px 0px rgba(0,0,0,0.08);--tw-shadow-colored:0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-transparent{--tw-ring-color:transparent}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-300{transition-duration:300ms}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}@media (min-width: 640px){.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0px}.lg\:text-\[\#FF2D20\]{--tw-text-opacity:1;color:rgb(255 45 32 / var(--tw-text-opacity))}}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:via-zinc-900{--tw-gradient-to:rgb(24 24 27 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to:#18181b var(--tw-gradient-to-position)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-white\/70{color:rgb(255 255 255 / 0.7)}.dark\:ring-zinc-800{--tw-ring-opacity:1;--tw-ring-color:rgb(39 39 42 / var(--tw-ring-opacity))}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:text-white\/80:hover{color:rgb(255 255 255 / 0.8)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity:1;--tw-ring-color:rgb(63 63 70 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 255 255 / var(--tw-ring-opacity))}}
    </style>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">

    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        <div>
            <a href="{{ route('welcome') }}">
                <img src="https://www.deila.cucsh.udg.mx/invitado/img/CUCSH.png" width="50px" alt="">
            </a>
        </div>
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <select id="sedeSelect" class="form-control">
        <option value="">Selecciona una sede</option>
            <option value="LA Normal" selected="selected">La Normal</option>
            <option value="Belenes">Belenes</option>
            <option value="Belenes Aulas">Belenes Aulas</option>
    </select>
    <main class="mt-6">
        <div id='calendar' class="calendar"></div>
    </main>

    @include('modales.crearEvento')   
    @include('modales.editarEvento')     
    @include('modales.infoEvento')      

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });

            var eventos = @json($eventosLista);
            let eventoModal = new bootstrap.Modal(document.getElementById('eventoModal'));
            let eventoInfoModal = new bootstrap.Modal(document.getElementById('eventoInfoModal'));

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                allDaySlot: false,
                locale: 'es',
                slotMinTime: '08:00:00', // Horario de inicio (8 AM)
                slotMaxTime: '21:00:00', //  Horario de fin (6 PM)
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay', // botones directos desde fullcalendar
                },


                events: eventos,
                eventTimeFormat: { // Formato de la hora
                    hour: '2-digit',
                    minute: '2-digit',
                    meridiem: 'short'
                },
                
                selectable: true, //hace las casillas de dias seleccionables
                select: function(info) {
                    //$('#eventomodal').modal('toggle');

                    eventoModal.show();

                    $('#guardarEvento').click(function(e) {
                        //asignacion de datos
                        e.preventDefault();
                        let errores = [];


                        var inicio = $('#create_fechaInicio').val() + " "+ $('#create_horaInicio').val()
                        var fin = ($('#create_fechaFin').val() ? $('#create_fechaFin').val() + " " + $('#create_horaFin').val() : $('#create_fechaInicio').val() + " "+ $('#create_horaFin').val() ) 

                        let create_data = {
                            '_token': $('input[name=_token]').val(),
                            foros_id: $('#create_sede').val(),
                            title: $('#create_title').val(),
                            start_date: inicio,
                            allDay: false,
                            end_date: fin,
                            organizadors_id: $('#create_organizadores').val(),
                            notas_generales: $('#create_notasGen').val(),
                            notas_cta: $('#create_notasCta').val(),
                            user: document.getElementById("evento_registradorId").innerText,
                            tipo_evento: $('#create_tipoEvento').val(),
                        }
                        //console.log($("#createEventoModal").serialize())

                        if (!create_data.tipo_evento) errores.push( "Seleccione el tipo de evento.");
                        if (!create_data.foros_id) errores.push("Seleccione una sede.");
                        if (!create_data.title || create_data.title.trim() === '') errores.push("El título es obligatorio.");
                        if (create_data.start_date === undefined) errores.push("Debe seleccionar una fecha de inicio.");
                        if ($('#create_horaInicio') === undefined) errores.push("Debe seleccionar una hora de inicio.");
                        if ($('#create_horaFin') === undefined) errores.push("Debe seleccionar una hora de fin.");
                        if (!create_data.end_date) errores.push("Debe seleccionar una fecha de fin.");
                        if (create_data.start_date >= create_data.end_date) errores.push("error al registrar la fecha , verifica que la la hora y fecha de inicio no sean menores  o igual al cierre.");

                            let horaInicio = new Date($('#create_horaInicio'));
                            let horaFinal = new Date($('#create_horaFin'));
                            let fecha = new Date($('#create_fechaFin')).getFullYear();
                            console.log(fecha)
                        if (horaInicio >= horaFinal ) errores.push("La hora de inicio no puede ser igual o mayor que la de fin.");

                        //if (!create_data.organizador_id) errores.push("Seleccione un organizador.");
                        if (!create_data.tipo_evento) errores.push(
                            "Seleccione el tipo de evento.");

                        
                        // Mostrar errores si existen
                        if (errores.length > 0) {
                            let mensajeError = errores.join("\n");
                            alert("Corrige los siguientes errores:\n" + mensajeError);
                            return;
                        }

                        $.ajax({
                            url: "{{ route('welcome.store') }}",
                            method: 'POST',
                            dataType: 'json',
                            data: create_data,
                            success: function(response) {
                                eventoModal.hide();
                                console.log(response);
                                
                                      setTimeout(() => {
                                         // document.location.reload();
                                      }, 200);
                
                            },
                            error: function(xhr) {
                                if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.error) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: xhr.responseJSON.error
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error inesperado',
                                        text: 'Ocurrió un problema al intentar guardar el evento.'
                                    });
                                }
                                console.log(xhr.responseJSON);
                            }
                        });
                        
                       

                    });
                },
 
                editable: true,
                eventDrop: function(info) {
                    console.log(info)
                    var id = info.event.id;
                    var start_date = info.event.startStr;
                    var end_date = info.event.endStr;
                    console.log(id, start_date, end_date)

                   
                },
                eventClick: function(info) {
                    let id = info.event.id
                    let evento = info.event
                    let eventosProps = evento.extendedProps
                    //console.log(evento)

                    //llenado de datos en modal info

                    document.getElementById("evento_id").innerText = info.event.id;

                    document.getElementById("evento_titulo").innerText = info.event.title;
                    document.getElementById("evento_fechaInicio").innerText = info.event.start;
                    document.getElementById("evento_fechaFin").innerText = info.event.end;

                    document.getElementById("infoOrganizadorNombre").innerText = eventosProps.organizador_nombre;
                    document.getElementById("infoOrganizadorTelefono").innerText = eventosProps.organizador_telefono;

                    document.getElementById("infoTipoEvento").innerText = eventosProps.tipoEvento;
                    document.getElementById("infoDependencia").innerText = eventosProps.foro_sede;
                    document.getElementById("infoForo").innerText = eventosProps.foro_nombre;

                    document.getElementById("infoNotasGen").innerText = eventosProps.notasGen;
                    document.getElementById("infoNotasCta").innerText = eventosProps.notasCta;

                    document.getElementById("infoRegistrador").innerText = eventosProps.user_name;

                    eventoInfoModal.show();
                    //fin del llenado de datos
                    //definicion de funcion para el boton en modal info
                     document.getElementById("borrarEvento").onclick = function() {
                        if (confirm('deseas eliminar este evento?')) {

                            $.ajax({
                                url: "{{ route('welcome.destroy', '') }}" + '/' + id,
                                type: 'DELETE',
                                dataType: 'json',
                                success: function(response) {
                                    var id = response.id;
                                    console.log(id)
                                    console.log(response);
                                    alert('se ha eliminado un evento');
                                    setTimeout(() => {
                                        document.location.reload();
                                    }, 100);
                                },
                                error: function(error) {
                                    if (error.responseJSON.errors) {
                                        $('#titleError').html(error.responseJSON.errors
                                            .title);
                                    }
                                },
                            });
                        }
                    } 
                    //recuperacion de datos para modal update
                    document.getElementById("btnEditarEvento").addEventListener("click", function() {
                        // Ocultar el modal de información
                        eventoInfoModal.hide();

                        var dependencias = @json($dependencias);
                        // Mostrar el modal de edición
                        let modalEditar = new bootstrap.Modal(document.getElementById('eventoEditarModal'));
                        modalEditar.show();



                        document.getElementById("editarEvento_id").innerText = info.event.id;
                        let id = document.getElementById("evento_id").innerText;

                        // Llenar el formulario del modal de edición 

                        let startDate = new Date(info.event.start).toISOString().split`T`[0];
                        let fechaInicio = new Date(info.event.start)
                        let horaInicio =  fechaInicio.getHours().toString().padStart(2, '0');
                        let minutoInicio = fechaInicio.getMinutes().toString().padStart(2, '0');

                        let fechacierre = new Date(info.event.end)
                        let horaFin =  fechacierre.getHours().toString().padStart(2, '0');
                        let minutoFin = fechacierre.getMinutes().toString().padStart(2, '0');
                         
                        let endDate =  new Date(info.event.end) // Si no tiene fecha de fin, usa la de inicio
                        let endFormatted = endDate.toISOString().slice(0, 16);
                        console.log(`${horaInicio}:${minutoInicio}`)
                        console.log(`${horaFin}:${minutoFin}`)

                        document.getElementById("edit_evento_fecha_inicio").value = startDate
                        document.getElementById("edit_horaInicio").value = `${horaInicio}:${minutoInicio}`;
                        document.getElementById("edit_horaFin").value =`${horaFin}:${minutoFin}` ;

                        var tituloNuevo = document.getElementById("edit_evento_titulo").value =info.event.title;
                        var tipoEventoNuevo = document.getElementById("edit_tipoEvento").value =info.event.extendedProps.tipoEvento;
                        var notasCtaNuevo = document.getElementById("edit_notasCta").value =info.event.extendedProps.notasCta;
                        var notasGenNuevo = document.getElementById("edit_notasGen").value =info.event.extendedProps.notasGen;


                        var selectOrganizador = document.getElementById("edit_organizadores_id");
                        selectOrganizador.value = info.event.extendedProps.organizador_id;

                        var selectDependencia = document.getElementById("edit_dependencia");
                        selectDependencia.value = info.event.extendedProps.foro_sede;

                        var selectCede = document.getElementById("edit_cede_modalE");
                        selectCede.value = info.event.extendedProps.foro_id;

                        var list = document.querySelector("#edit_cede_modalE");

                        list.addEventListener('change', capturarValor);

                        function capturarValor() {
                            var valor = list.value;

                            console.log(valor);
                        }

                        $('#actualizarEvento').off('click').on('click', function(e) {
                            let errores = [];
                            let updatedEvent = {
                                '_token': $('input[name=_token]').val(),
                                //id: document.getElementById("editarEvento_id").innerText,
                                foro: document.getElementById("edit_cede_modalE").value,
                                organizador: document.getElementById("edit_organizadores_id").value,
                                allDay: false,
                                title: document.getElementById("edit_evento_titulo").value,
                                start_date:  $('#edit_evento_fecha_inicio').val() + " "+ $('#edit_horaInicio').val(),
                                end_date: $('#edit_evento_fecha_inicio').val() + " "+ $('#edit_horaFin').val(),

                                tipoEvento: document.getElementById("edit_tipoEvento").value,
                                notasCta: document.getElementById("edit_notasCta").value,
                                notasGen: document.getElementById("edit_notasGen").value,
                                sede: document.getElementById("edit_cede_modalE").value,
                                
                                registrador: document.getElementById( "evento_registrador").innerText,
                            };
                            

                            e.preventDefault();
                            if (!updatedEvent.foro) errores.push("Seleccione una sede.");
                            if (!updatedEvent.title || updatedEvent.title.trim() === '')errores.push("El título es obligatorio.");
                            if (!updatedEvent.start_date) errores.push("Debe seleccionar una fecha de inicio.");
                            if (!updatedEvent.end_date) errores.push("Debe seleccionar una fecha de fin.");
                            if (updatedEvent.start_date >= updatedEvent.end_date) errores.push("La fecha u hora de inicio no puede ser mayor que la de fin.");
                            

                            if (!updatedEvent.organizador) errores.push("Seleccione un organizador.");
                            if (!updatedEvent.tipoEvento) errores.push("Seleccione el tipo de evento.");

                            // Mostrar errores si existen
                            if (errores.length > 0) {
                                let mensajeError = errores.join("\n");
                                alert("Corrige los siguientes errores:\n" +
                                    mensajeError);
                                return;
                            }

                            // Si hay errores, mostrar alerta y no enviar los datos
                            if (errores.length > 0) {
                                alert("⚠️ Corrige los siguientes errores antes de actualizar:\n\n" +
                                    errores.join("\n"));
                                return;
                            }


                            $.ajax({
                                url: "{{ route('calendario.update', '') }}" +
                                    '/' +
                                    id, // Asegúrate de pasar el ID del evento
                                method: 'PATCH',
                                dataType: 'json',
                                data: updatedEvent,
                                success: function(response) {
                                    eventoModal.hide();
                                    console.log(response.message);
                                    setTimeout(() => {
                                        //document.location.reload();
                                    }, 200);
                                },
                                error: function(xhr) {
                                if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.error) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: xhr.responseJSON.error
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error inesperado',
                                        text: 'Ocurrió un problema al intentar guardar el evento.'
                                    });
                                }
                                console.log(xhr.responseJSON);
                            }
                            });
                            
                        })
                    });   
                }
            });
            calendar.render();
        });
    </script>

    <script>
        $('#sedeSelect').change(function() {
    var sedeId = $(this).val();
    if (sedeId) {
        // Cargar eventos para la sede seleccionada
        $.ajax({
            url: '/cargarEventos/' + sedeId,
            type: 'GET',
            success: function(data) {
                $('#calendar').fullCalendar('removeEvents'); // Elimina los eventos actuales
                $('#calendar').fullCalendar('addEventSource', data); // Agrega los nuevos eventos
            },
            error: function(xhr) {
                console.error('Error al cargar los eventos', xhr.responseText);
            }
        });
    }
});

    </script>

</body>

</html>
