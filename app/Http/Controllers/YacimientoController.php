<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yacimiento;

class YacimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view yacimientos', ['only' => ['index']]);
        $this->middleware('role:gestor', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        $yacimientos = Yacimiento::all();
        
        return view('yacimientos.index', compact('yacimientos'));
    }

    public function show(Yacimiento $yacimiento)
    {
        return view('yacimientos.show', compact('yacimiento'));
    }


    public function create()
    {
        return view('yacimientos.create');
    }

    public function store(Request $request)
    {
        // dd($request->all()); 
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'anio_descubrimiento' => 'required|integer|between:1900,' . date('Y'), 
            'poblacion' => 'required|string|max:255', 
        ]);
    
        // Crear yacimiento
        $yacimiento = Yacimiento::create([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
            'pais' => $request->pais,
            'anio_descubrimiento' => $request->anio_descubrimiento,
            'poblacion' => $request->poblacion, 
        ]);
    
        return redirect()->route('yacimientos.index')
            ->with('success', 'Yacimiento creado correctamente.');
    }
    
    public function edit(Yacimiento $yacimiento)
    {
        return view('yacimientos.edit', compact('yacimiento'));
    }

    public function update(Request $request, Yacimiento $yacimiento)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'pais' => 'required|string|max:255', // Validación para pais
            'anio_descubrimiento' => 'required|integer|between:1900,' . date('Y'), 
            'poblacion' => 'required|string|max:255',

        ]);

        // Actualizar yacimiento
        $yacimiento->update([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
            'pais' => $request->pais,
            'anio_descubrimiento' => $request->anio_descubrimiento,
            'poblacion' => $request->poblacion, 

        ]);
        
        return redirect()->route('yacimientos.index')
            ->with('success', 'Yacimiento actualizado correctamente.');
    }

    public function destroy(Yacimiento $yacimiento)
    {
        // Eliminar yacimiento
        $yacimiento->delete();
        
        return redirect()->route('yacimientos.index')
            ->with('success', 'Yacimiento eliminado correctamente.');
    }
}
