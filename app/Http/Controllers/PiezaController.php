<?php
namespace App\Http\Controllers;

use App\Models\Pieza;
use App\Models\Yacimiento;
use Illuminate\Http\Request;

class PiezaController extends Controller
{
    public function __construct()
    {
        // Middleware para proteger las rutas según roles y permisos
        $this->middleware('permission:view piezas', ['only' => ['index']]);
        $this->middleware('permission:create piezas', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit piezas', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete piezas', ['only' => ['destroy']]);
    }

    public function index()
    {
        $piezas = Pieza::with('yacimiento')->get();
        return view('piezas.index', compact('piezas'));
    }

    public function create()
    {
        $yacimientos = Yacimiento::all();
        return view('piezas.create', compact('yacimientos'));
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'yacimiento_id' => 'required|exists:yacimientos,id',
        ]);

        // Crear nueva pieza
        $pieza = new Pieza();
        $pieza->nombre = $request->nombre;
        $pieza->descripcion = $request->descripcion;
        $pieza->yacimiento_id = $request->yacimiento_id;
        $pieza->save();

        return redirect()->route('piezas.index')
            ->with('success', 'Pieza creada correctamente.');
    }

    public function edit(Pieza $pieza)
    {
        $yacimientos = Yacimiento::all();
        return view('piezas.edit', compact('pieza', 'yacimientos'));
    }

    public function update(Request $request, Pieza $pieza)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'yacimiento_id' => 'required|exists:yacimientos,id',
        ]);

        // Actualizar pieza
        $pieza->nombre = $request->nombre;
        $pieza->descripcion = $request->descripcion;
        $pieza->yacimiento_id = $request->yacimiento_id;
        $pieza->save();

        return redirect()->route('piezas.index')
            ->with('success', 'Pieza actualizada correctamente.');
    }

    public function destroy(Pieza $pieza)
    {
        // Eliminar pieza
        $pieza->delete();

        return redirect()->route('piezas.index')
            ->with('success', 'Pieza eliminada correctamente.');
    }
}