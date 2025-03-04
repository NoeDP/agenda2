<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Evento;
use App\Models\Foro;
use App\Models\Organizador;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Throwable;


class CalendarController extends Controller
{
    public function index()
    {

        $eventosLista = array();
        $eventos = Evento::with(['user', 'foro', 'organizador'])->get();
        foreach ($eventos as $evento) {
            $eventosLista[] = [
                'id' => $evento->id,
                'title' => $evento->title,
                'start' => $evento->start_date,
                'end' => $evento->end_date,

                'tipoEvento' => $evento->tipo_evento,
                'notasGen' => $evento->notas_generales,
                'notasCta' => $evento->notas_cta,
                'organizador_id' => $evento->organizador->id,
                'organizador_nombre' => $evento->organizador->nombre,
                'organizador_telefono' => $evento->organizador->telefono,

                'foro_id' => $evento->foro->id,
                'foro_nombre' => $evento->foro->nombre,
                'foro_sede' => $evento->foro->sede,

                'registrador' => $evento->registrador,
                'user_name' => $evento->user->name,
                'user_id' => $evento->user->id

            ];
        }

        $organizadores = Organizador::withoutTrashed()->get(); // Solo los que no están eliminados
        $foros = Foro::withoutTrashed()->get(); // Solo los que no están eliminados
        //$dependencias = Foro::all();
        $dependencias = Foro::select('sede', DB::raw('MIN(id) as id'))
            ->groupBy('sede')
            ->get();


        return view('welcome', [
            'eventosLista' => $eventosLista,
            'organizadores' => $organizadores,
            'foros' => $foros,
            'dependencias' => $dependencias,
        ]);
        //return view('welcome', ['eventosLista' => $eventosLista]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',

            'users_id' => 'nullable|exists:usuarios,id',
            'foros_id' => 'nullable|exists:foros,id',
            'organizadors_id' => 'nullable|exists:organizadors,id',

            'notas_cta' => 'nullable|string',
            'notas_generales' => 'nullable|string',
            'tipo_evento' => 'nullable|string|max:255'
        ]);


        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);

        // Extraer solo la hora de inicio y fin
        $horaInicio = $start_date->format('H:i:s');
        $horaFin = $end_date->format('H:i:s');

        // Iterar desde la fecha de inicio hasta la fecha de fin
        for ($date = $start_date->copy(); $date->lte($end_date); $date->addDay()) {
            $fechaActual = $date->format('Y-m-d');
            try {
                // Verificar si ya existe un evento en el mismo foro y fecha (y opcionalmente, en el mismo horario)
                $eventoExistente = Evento::where('foros_id', $request->foros_id)
                    ->whereDate('start_date', $fechaActual)
                    ->where(function ($query) use ($horaInicio, $horaFin) {
                        // Verificamos si el evento actual se solapa con algún otro evento en el mismo foro
                        $query->whereBetween(DB::raw("TIME(start_date)"), [$horaInicio, $horaFin])
                            ->orWhereBetween(DB::raw("TIME(end_date)"), [$horaInicio, $horaFin])
                            ->orWhereRaw('? BETWEEN TIME(start_date) AND TIME(end_date)', [$horaInicio])
                            ->orWhereRaw('? BETWEEN TIME(start_date) AND TIME(end_date)', [$horaFin]);
                    })
                    ->exists();

                if ($eventoExistente) {
                    return response()->json([
                        'error' => 'Ya existe un evento en el lugar y día.',
                    ], 422);
                }

                Evento::create([
                    'users_id' => Auth::user()->id,
                    'organizadors_id' => $request->organizadors_id,
                    'foros_id' => $request->foros_id,

                    'title' => $request->title,
                    'start_date' => "$fechaActual $horaInicio",
                    'end_date' => "$fechaActual $horaFin",

                    'tipo_evento' => $request->tipo_evento,
                    'notas_generales' => $request->notas_generales,
                    'notas_cta' => $request->notas_cta,

                ]);
            } catch (Throwable $e) {
                return response()->json([
                    'error' => $e
                ]);
            }
            // Si no existe un evento, guardamos el nuevo evento
        }
        return response()->json(['message' => 'Evento(s) registrado(s) correctamente']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',

            'users_id' => 'nullable|exists:usuarios,id',
            'foros_id' => 'nullable|exists:foros,id',
            'organizadors_id' => 'nullable|exists:organizadors,id',

            'notas_cta' => 'nullable|string',
            'notas_generales' => 'nullable|string',
            'tipo_evento' => 'nullable|string|max:255'
        ]);

        $evento = Evento::findOrFail($id);

        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);

        $horaInicio = $start_date->format('H:i:s');
        $horaFin = $end_date->format('H:i:s');
        $fechaActual = $start_date->format('Y-m-d');

        // Verificar si el nuevo horario entra en conflicto con otro evento
        try {
            // Verificar si ya existe un evento en el mismo foro y fecha (y opcionalmente, en el mismo horario)
            $eventoExistente = Evento::where('foros_id', $request->foro)
                ->where('id', '!=', $id)
                ->whereDate('start_date', $fechaActual)
                ->where(function ($query) use ($horaInicio, $horaFin) {
                    // Verificamos si el evento actual se solapa con algún otro evento en el mismo foro
                    $query->whereBetween(DB::raw("TIME(start_date)"), [$horaInicio, $horaFin])
                        ->orWhereBetween(DB::raw("TIME(end_date)"), [$horaInicio, $horaFin])
                        ->orWhereRaw('? BETWEEN TIME(start_date) AND TIME(end_date)', [$horaInicio])
                        ->orWhereRaw('? BETWEEN TIME(start_date) AND TIME(end_date)', [$horaFin]);
                })
                ->exists();

            if ($eventoExistente) {
                return response()->json([
                    'error' => 'Ya existe un evento en el lugar y día.',
                ], 422);
            }
            $evento->update([
                'users_id' => Auth::user()->id,
                'organizadors_id' => $request->organizador,
                'foros_id' => $request->foro,

                'title' => $request->title,
                'start_date' => "$fechaActual $horaInicio",
                'end_date' => "$fechaActual $horaFin",

                'tipo_evento' => $request->tipoEvento,
                'notas_generales' => $request->notasGen,
                'notas_cta' => $request->notasCta,
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'error' => $e
            ]);
        }
        return response()->json(['message' => 'Evento actualizado correctamente']);
    }






    public function destroy($id)
    {
        $agendar = Evento::find($id);
        if (! $agendar) {
            return response()->json([
                'error' => 'no se ha encontrado el evento'
            ], 404);
        }
        $agendar->delete();
        return $id;
    }
}
