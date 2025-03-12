<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yacimiento;


class YacimientoController extends Controller
{
    public function index()
    {
        // Obtener todos los yacimientos de la base de datos
        $yacimientos = Yacimiento::all();
        
        // Retorna la vista 'yacimientos.index' y pasa los yacimientos
        return view('yacimientos.index', compact('yacimientos'));
    }
}
