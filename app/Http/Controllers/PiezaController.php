<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pieza;


class PiezaController extends Controller
{
    public function index()
    {
        // Obtener todos las piezas de la base de datos
        $piezas = Pieza::all();
        
        // Retorna la vista 'piezas.index' y pasa las piezas
        return view('piezas.index', compact('piezas'));
    }
}
