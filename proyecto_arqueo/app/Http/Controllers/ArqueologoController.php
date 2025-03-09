<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arqueologo;


class ArqueologoController extends Controller
{
    public function index()
    {
        // Obtener todos los arqueólogos de la base de datos
        $arqueologos = Arqueologo::all();
        
        // Retorna la vista 'arqueologos.index' y pasa los arqueólogos
        return view('arqueologos.index', compact('arqueologos'));
    }
}
