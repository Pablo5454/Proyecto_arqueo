<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use App\Models\Yacimiento;
use Illuminate\Http\Request;

class PiezaController extends Controller
{
    public function index()
    {
        $piezas = Pieza::all();
        return view('piezas.index', compact('piezas'));
    }

    public function create()
    {
        $yacimientos = Yacimiento::all();
        return view('piezas.create', compact('yacimientos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'yacimiento_id' => 'required|exists:yacimientos,id',
        ]);

        $pieza = new Pieza();
        $pieza->nombre = $request->nombre;
        $pieza->descripcion = $request->descripcion;
        $pieza->yacimiento_id = $request->yacimiento_id;
        $pieza->save();

        return redirect()->route('piezas.index')->with('success', 'Pieza creada correctamente.');
    }

    public function edit(Pieza $pieza)
    {
        $yacimientos = Yacimiento::all();
        return view('piezas.edit', compact('pieza', 'yacimientos'));
    }

    public function update(Request $request, Pieza $pieza)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'yacimiento_id' => 'required|exists:yacimientos,id',
        ]);

        $pieza->nombre = $request->nombre;
        $pieza->descripcion = $request->descripcion;
        $pieza->yacimiento_id = $request->yacimiento_id;
        $pieza->save();

        return redirect()->route('piezas.index')->with('success', 'Pieza actualizada correctamente.');
    }

    public function destroy(Pieza $pieza)
    {
        $pieza->delete();

        return redirect()->route('piezas.index')->with('success', 'Pieza eliminada correctamente.');
    }
}
