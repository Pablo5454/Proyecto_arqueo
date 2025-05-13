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
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'pais' => 'required|string|max:255',
            'anio_descubrimiento' => 'required|integer|between:1900,' . date('Y'), 
            'poblacion' => 'required|string|max:255', 
        ]);
    
        // Crear yacimiento
        $yacimiento = Yacimiento::create([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
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
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullarequiredle|date|after_or_equal:fecha_inicio',
            'pais' => 'required|string|max:255', // Validación para pais
            'anio_descubrimiento' => 'required|integer|between:1900,' . date('Y'), // Asegurarse de que el año esté en un rango válido
        ]);

        // Actualizar yacimiento
        $yacimiento->update([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'pais' => $request->pais,
            'anio_descubrimiento' => $request->anio_descubrimiento,
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
