<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Models\Foro;
use App\Models\Organizador;
use App\Models\User;

class SearchController extends Controller
{
    public function buscar(Request $request)
    {
        $query = $request->input('q');
        $tipo = $request->input('tipo');

        if ($tipo === 'foros') {
            $resultados = Foro::search($query)->paginate(5);
        } elseif ($tipo === 'users') {
            $resultados = User::search($query)->paginate(5);
        } elseif ($tipo === 'organizadores') {
            $resultados = Organizador::search($query)->paginate(5);
        } elseif ($tipo === 'eventos') {
            $resultados = Evento::search($query)->paginate(5);
        } else {
            $resultados = collect();
        }

        return response()->json($resultados);
    }
}
